<?php
/*
 * Facebook model
 * @package	 onehome
 * @category	 Model
 * @author	 prabin
 * @usage        facebook related api call
 * @actors       Admin,users
 * Created Date  26-03-2012
 * Last updated  26-04-2012(prabin)
 */
class Facebook_model extends CI_Model {
       		private $_api_url;
		private $_api_key;
		private $_api_secret;
		private $_default_scope;
		private $_user;
    
	public function __construct()
	{
		parent::__construct();
		//load the config file to set the(FB app key,Secret key,scope)
		$this->load->config('facebook');
                $this->_api_url 	= $this->config->item('facebook_api_url');
		$this->_api_key 	= $this->config->item('facebook_app_id');
		$this->_api_secret 	= $this->config->item('facebook_api_secret');
		$this->_default_scope	= $this->config->item('facebook_default_scope');
		$config = array(
					'appId'  => $this->_api_key,
					'secret' => 	$this->_api_secret,
					'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
				);
		$this->load->library('Facebook', $config);//load facebook library for facebook sdk
	}


	function get_user(){//return the facebook user id
		return $this->_user=$this->facebook->getUser();
	}

function get_app_id(){//return the facebook app id
	return $this->_api_key;
}


function get_login_url(){//return the facebook login url. like to change the scope of loginUrl(config/facebook.php)
	return  $this->facebook->getLoginUrl(
            array(
                'scope'         => $this->_default_scope
            )
    );
}

function get_logout_url(){//return the facebook logoutUrl

	return  $this->facebook->getLogoutUrl();
}
function set_session_data(){//set session variable return true if set else false
	try {
		$user=$this->get_user();
		$fqlResult   =   $this->facebook->api('/'.$user);
		
		$fb_data = array(
						'uid' => $fqlResult['id'],
						'full_name' => $fqlResult['name'],
						'email' =>$fqlResult['email'],
						'is_logged_in' =>'1'
						
				);		
		//session create
		$this->session->set_userdata($fb_data);
		$this->save_user_details();//save user facebook id to data base
		$this->session->set_userdata('user_id',$this->get_current_user_id($user));
		$this->session->set_userdata('rm_type',$this->get_latest_room());
		return true;
			
			} catch (FacebookApiException $e) {
				error_log($e);

			    $user = null;
			    return false;
			}
	}

function check_is_app_user(){//return 1 if the user is using the current application
	try{
	$user=$this->get_user();
        $fql    =   "select is_app_user from user where uid=" . $user;
            $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
	
            $fqlResult   =   $this->facebook->api($param);
	
	if($fqlResult)
		return $fqlResult['0']['is_app_user'];
        }
	 catch(Exception $o){
            d($o);
        }

}
function get_current_thumb_userphoto(){//return pic the current user
	try{
	$user=$this->get_user();
        $fql    =   "select pic_square from user where uid=" . $user;
            $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
	
            $fqlResult   =   $this->facebook->api($param);
	
	if($fqlResult)
		return $fqlResult['0']['pic_square'];
        }
	 catch(Exception $o){

            d($o);
        }

}




function upload_photo($file,$desc='onehome photo',$room_type_id='0'){
		 $this->facebook->setFileUploadSupport(true);

//Create an album
$album_details = array(
        'message'=> 'Album desc',
        'name'=> 'Album name'
);
//$create_album = $this->facebook->api('/me/albums', 'post', $album_details);
 

//Get album ID of the album you've just created
//$album_uid = $create_album['id'];
  
//Upload a photo to album of ID...
$photo_details = array(
    'message'=> $desc
);
//$file='prabin.jpeg'; //Example image file
 $photo_details['image'] = '@' .$file;
$upload_photo = $this->facebook->api('/me/photos', 'post', $photo_details);


	if($upload_photo){
 		$this->db->insert('photos',array('photo_fb_id' => $upload_photo["id"],'user_id'=>$this->session->userdata('user_id'),'room_type_id'=>$room_type_id));
 		$id = $this->db->insert_id();
		return $id;
	}
	else{
		die('error occur photos upload');
	}
}
function edit_fb_photo_desc(){
	$photo_details = array(
    	'message'=> 'desc changed',
	
	);
	$upload_photo = $this->facebook->api('me/283281691765202/name', 'post', $photo_details);
	if($upload_photo)
	echo $upload_photo."gfgf";
	else
	echo "error occured";
	
}

function friends_list(){

$user_facebook_id=$this->get_user();
$users_json= $this->facebook->api("/$user_facebook_id/friends");
return $users_json;
}

function post_wall(){

$result = $this->facebook->api(
    '/me/feed/',
    'post',
    array('message' => 'hai all friends')
);
return $result;

}

function invite_friends(){

$result = $this->facebook->api(
    '/me/feed/',
    'post',
    array('message' => 'hai all friends')
);
return $result;

}
function get_selected_photo($room_type_id='0'){
		$result_array=array();
		$this->db->select('p.photo_fb_id,p.photo_id');
		$this->db->from('room_follow rf');
		$this->db->join('photos p','p.photo_id=rf.follow_room_photo');
		$this->db->where('rf.follower_user_id',$this->session->userdata('user_id'));
		$this->db->where('rf.room_type_id',$room_type_id);
		$this->db->where('rf.status','0');
		$this->db->where('rf.follow_room_photo !=','0');
		$query= $this->db->get();
		$result=$query->result_array();
		if($query->num_rows() > 0){
		
		foreach($query->result_array() as $rows){
			
			$res=$this->get_fb_photo($rows['photo_fb_id']);
						
			if($res){
			$res['0']['photo_id']= $rows['photo_id'];
			$res['0']['photo_fb_id']= $rows['photo_fb_id'];
			$result_array[]=$res[0];
				
			}
			
		}
		return $result_array;
		}
		else{
			return $result_array;
		}
	}

function get_room_photos($room_type_id='0'){
		$result_array=array();
		$this->db->select('photo_fb_id,photo_id');
		$this->db->from('photos');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('room_type_id',$room_type_id);
		$this->db->where('status','0');
		$this->db->order_by('photo_id','desc');
		$query= $this->db->get();
		$result=$query->result_array();
		if($query->num_rows() > 0){
		$i=0;
		foreach($query->result_array() as $rows){
			
			$res=$this->get_fb_photo($rows['photo_fb_id']);
						
			if($res){
			
			$res['0']['photo_id']= $rows['photo_id'];
			$result_array[]=$res[0];
			$i++;
			
			}
			if($i==6)
			break;
		}
		return $result_array;
		}
		else{
			return $result_array;
		}
	}
function get_fb_photo($fb_photo_id){

if($fb_photo_id){

        $fql            =    'SELECT pid,src_big,caption,src FROM photo WHERE object_id ="'.$fb_photo_id.'"';
	
                $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );

            $fqlResult   =   $this->facebook->api($param);
			return $fqlResult;
	}
}


function get_album_id_by_album_name($album_name='Onehome Photos'){//return array of data


        $fql            =   'SELECT aid, owner, name, object_id FROM album WHERE owner=me() and name="'.$album_name.'"';
			 
                $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $this->facebook->api($param);
	return $fqlResult;

}
function get_photos_by_album_id($album_id){

if($album_id)
        $fql            =   'SELECT object_id,pid,src_big,owner,link,position,created,caption,src FROM photo WHERE aid="'.$album_id.'" ORDER BY created DESC LIMIT 0,6';
			 
                $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $this->facebook->api($param);
		//print_r($fqlResult);
		return $fqlResult;

}
function friends_autocomplete_data(){
			
	
        $fql    =   "SELECT uid, name, pic_square 
FROM user  
WHERE is_app_user=1 AND uid IN (SELECT uid2 FROM friend WHERE uid1 =".$this->get_user().")";
	
                $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $this->facebook->api($param);
	return $fqlResult;

	}
function fetch_user_details_autocomplete(){
		$user_id=$this->session->userdata('user_id');//user id 
		$name_startsWith=$this->input->get('name_startsWith');
		$this->db->select('user_id,user_facebook_id,user_full_name as name,user_picture_url as pic_square');
		$this->db->from('users');
		$this->db->where('`user_id` NOT IN (SELECT `friend_id` FROM `user_friend` where `user_id`='.$user_id.' and status=0)', NULL, FALSE);

		$this->db->like('user_full_name',$name_startsWith);
		$query= $this->db->get();
		$result=$query->result();
		/*$detail_array=array();	
		
		foreach($result as $row){
			$detail_array[]=$this->get_facebook_user_details($row->user_facebook_id);
		
		}*/
		$res=json_encode($result);
		$res= str_replace('name":','value":',$res);
		echo $res;//str_replace('null,','"",',$res);
     
	}
function get_facebook_user_details($user_facebook_id){
	
	 $fql    =   "SELECT name,pic_square,hometown_location,current_location,uid 
FROM user  
WHERE is_app_user=1 AND uid  =".$user_facebook_id;

                $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $this->facebook->api($param);
		
return $fqlResult['0'];

}
function get_user_profile_details($user_facebook_id){
	
		$fql    =   "SELECT name,pic_square,pic,uid 
FROM user  where	
 uid  =".$user_facebook_id;

                $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql
                
            );
            $fqlResult   =   $this->facebook->api($param);
		return $fqlResult[0];
}
function save_user_details(){// save or update user information call when login
	
        $this->db->select('user_facebook_id');
        $this->db->from('users');
        $this->db->where('user_facebook_id',$this->get_user());
        $query = $this->db->get();
        if($query->num_rows()>0) {
		foreach($query->result_array() as $row){
			$this->db->where('user_facebook_id',$row['user_facebook_id']);
			$this->db->update('users',array('user_facebook_id' => $this->get_user(),'user_full_name'=>$this->session->userdata('full_name'),'user_picture_url'=>$this->get_current_thumb_userphoto()));
	}
            return true;
        } else {
            $this->db->insert('users',array('user_facebook_id' => $this->get_user(),'user_full_name'=>$this->session->userdata('full_name'),'user_picture_url'=>$this->get_current_thumb_userphoto()));
            $id = $this->db->insert_id();
		return $id;
        }
       
       
}

function get_stores(){
	$user_id=$this->session->userdata('user_id');//user id 
	$name_startsWith=$this->input->get('name_startsWith');
	$this->db->select('store_name as value,store_id,store_url,store_description,store_image');
	$this->db->from('stores');
	$this->db->where('`store_id` NOT IN (SELECT `store_id` FROM `user_store` where `user_id`='.$user_id.' and status=0)', NULL, FALSE);

	
	$this->db->like('store_name',$name_startsWith);
	
        $query = $this->db->get();
	return $query->result_array();
}
function add_follow_store($data){
	$this->db->select('store_id');
	$this->db->from('user_store');
	$this->db->where('user_id',$data['user_id']);
	$this->db->where('store_id',$data['store_id']);
	$this->db->where('status',0);
	$res=$this->db->get();
	if($res->num_rows() > 0){
	return 0;
	}
	else{
	$query=$this->db->insert('user_store',$data);
	return $query;
	}
}
function add_follow_friend($data){
	 $cnt = $this->db->query("SELECT * FROM user_friend WHERE user_id = ".$data['user_id']." AND friend_id = ".$data['friend_id']." AND status='0'");

	if($cnt->num_rows()==0)
	{
	$query=$this->db->insert('user_friend',$data);
	return $query;
	
	}
	else
	{
	return 0;
	}
}
function get_follow_friends($offset='0',$limit='6'){

	
	$current_user_id=$this->session->userdata('user_id');
	$this->db->select('u.user_full_name,u.user_facebook_id,u.user_picture_url');
	$this->db->from('user_friend as uf');
	$this->db->where('uf.user_id',$current_user_id);
	$this->db->where('uf.status',0);
	$this->db->join('users as u','uf.friend_id=u.user_id','left');
	$this->db->limit($limit,$offset);
	$query=$this->db->get();
	return $query->result_array();	
	}
	
		
	
function get_follow_stores($offset='0',$limit='6'){
	$current_user_id=$this->session->userdata('user_id');
	$this->db->select('s.*');
	$this->db->from('user_store as ss');
	$this->db->where('ss.user_id',$current_user_id);
	$this->db->where('status',0);
	$this->db->join('stores as s','ss.store_id=s.store_id');
	$this->db->limit($limit,$offset);
	$query=$this->db->get();
	return $query->result_array();	
	}
	

function get_current_user_id($fb_id){//return current user id
	
	$fb_id=($fb_id=='') ? $this->get_user() :$fb_id;
	$this->db->select('user_id');
	$this->db->where('user_facebook_id',$fb_id);
	$query=$this->db->get('users');
	foreach($query->result_array() as $row)
	return $row['user_id'];
}

function get_room_type(){
	
	$this->db->select('*');
        $this->db->from('room_types');
	 $query = $this->db->get();
	return $query->result_array();
}
function get_report_error_type(){
	
	$this->db->select('*');
        $this->db->from('report_error_types');
	 $query = $this->db->get();
	return $query->result_array();
}
function get_type_style_image(){
	$this->db->select('*');
        $this->db->from('styles');
	 $query = $this->db->get();
	return $query->result_array();

}
function change_follow_status($user_id,$friend_id,$status){
		
		$this->db->where('user_id',$user_id);
		$this->db->where('friend_id',$friend_id);	
		return $query=$this->db->update('user_friend',array('status'=>$status));
		
}
function change_user_store_status($user_id,$store_id,$status){
		
		$this->db->where('user_id',$user_id);
		$this->db->where('store_id',$store_id);	
		return $query=$this->db->update('user_store',array('status'=>$status));
		
}
//function to get rooms details return current logged in user rooms
	function get_rooms_created(){
		$current_user_id=$this->session->userdata('user_id');
	$this->db->select('rt.*');
	$this->db->from('room_follow as rf');
	$this->db->where('rf.follower_user_id',$current_user_id);
	$this->db->where('rf.status',0);
	$this->db->join('room_types as rt','rf.room_type_id=rt.room_type_id');
	
	$query=$this->db->get();
	return $query->result_array();	

	}
	function set_session_room_type($id){
		
		$data = array(
						
						'rm_type'=>$id
				);	
		$this->session->set_userdata('rm_type',$data['rm_type']);
	}
	function insert_follow_room_photo($photo_id){
		 $this->db->where('room_type_id',$this->session->userdata("rm_type"));
		$this->db->where('status',0);
		$this->db->where('follower_user_id',$this->session->userdata("user_id"));
		$results=$this->db->update('room_follow',array('follow_room_photo'=>$photo_id));
		if($results)
		return '<script type="text/javascript" src="<?php echo $this->config->item(/"base_url/");?>js/jquery.imgareaselect.js"></script>';
        	
	}
	function insert_follow_room($room_type){
		$result=$this->db->insert('room_follow',array('room_type_id'=>$room_type,'follower_user_id'=>$this->session->userdata("user_id")));
		return $result;

	}
	function get_follow_room_photo_id(){
			 $this->db->where('room_type_id',$this->session->userdata("rm_type"));
			$this->db->where('status',0);
			$this->db->where('follower_user_id',$this->session->userdata("user_id"));
		$query=$this->db->get('room_follow');
		foreach ($query->result() as $row)
			{
    				return $row->follow_room_photo;
			}
		}

	function is_room_type($room_type_id){
		$this->db->select('room_type_id');
		$this->db->where('room_type_id',$room_type_id);
		$this->db->where('status',0);
		$this->db->where('follower_user_id',$this->session->userdata("user_id"));
		$query=$this->db->get('room_follow');
		if($query->num_rows()>0)
			return 1;
		else
			return 0;
		
	}
	function get_compare_room_photos($room_type_id='0'){
			


		$result_array=array();
		$this->db->select('photo_fb_id,photo_id');
		$this->db->from('photos');
		$subquery='select friend_id from user_friend where status=0 and user_id='.$this->session->userdata("user_id");
		$this->db->where("`user_id` IN ($subquery)", NULL, FALSE);
		$this->db->where('room_type_id',$room_type_id);
		$this->db->where('user_id !=',$this->session->userdata("user_id"));
		$this->db->where('status','0');
		$this->db->order_by('photo_id','desc');
		$query= $this->db->get();
		$result=$query->result_array();
		if($query->num_rows() > 0){
		$i=0;
		foreach($query->result_array() as $rows){
			
			$res=$this->get_fb_photo($rows['photo_fb_id']);
						
			if($res){
			
			$res['0']['photo_id']= $rows['photo_id'];
			$result_array[]=$res[0];
			$i++;
			
			}
			//if($i==6)
			//break;
		}
		return $result_array;
		}
		else{
			return $result_array;
		}
	}	
	function get_suggested_products($room_type_id)	{
		$this->db->select('products_id,products_sku_id,product_name,products_main_image,products_descr');
		$this->db->from('products');
		$subquery='select room_type_name from room_types where status=0 and room_type_id='.$room_type_id;
		$this->db->where("room_category in($subquery)");
		$this->db->order_by('products_id','desc');
		$query= $this->db->get();
		$result=$query->result_array();
		return  $result;
	
	}

	function get_suggested_products1($room_type_id)	{
		$user_id=$this->session->userdata('user_id');
		$this->db->select('p.products_id,p.products_sku_id,p.product_name,p.products_main_image,p.products_descr,p.products_url');
		$this->db->from('product_styles ps');
		$this->db->join('products as p','ps.product_id=p.products_id');
		$this->db->join('room_styles as rs','ps.room_style_id=rs.room_style_id');
		$this->db->join('room_style_user as rsu','rsu.style_type_id=rs.style_id');
		$this->db->where('rs.room_type_id',$room_type_id);
		$this->db->where('rsu.room_type_id',$room_type_id);
		$this->db->where('rsu.user_id',$user_id);
		$this->db->order_by('p.products_id','desc');
		$query= $this->db->get();
		$result=$query->result_array();
		return  $result;
	
	}

	function insert_room_style_type($data){
		$res=$this->db->insert('room_style_user',$data);
		return $res;
	}
	function get_rooms_created_profile(){
		$current_user_id=$this->session->userdata('user_id');
	$this->db->select('rt.room_type_name,rt.room_type_id,styles.*');
	$this->db->from('room_follow as rf');
	$this->db->where('rf.follower_user_id',$current_user_id);
	$this->db->where('rf.status',0);
	$this->db->join('room_types as rt','rf.room_type_id=rt.room_type_id');
	$this->db->join('room_style_user as rsu','rf.room_type_id=rsu.room_type_id');
	$this->db->join('styles','styles.style_id=rsu.style_type_id');
	$this->db->where('rsu.user_id',$current_user_id);
	$this->db->where('rsu.status',0);
	$query=$this->db->get();
	return $query->result_array();	

	}

	function insert_con_talk_msg($data){
		$current_photo_id=$data['photo_fb_id'];
		$comment=$data['connection_msg'];
		$this->db->insert('connection_talk',$data);
            	$id = $this->db->insert_id();
		if($current_photo_id)
		$this->insert_con_talk_msg_to_fb($current_photo_id,$comment);
		return $id;
		
	}
	function insert_con_talk_msg_to_fb($current_photo_id,$comment){
		
		$current_photo_id=trim($current_photo_id);
		$result=$this->facebook->api('/'.$current_photo_id.'/comments',"POST",array("message"=>$comment));
		 return true;
		

	}
	


	function get_con_talk_msg($limit){
		$user_id=$this->session->userdata('user_id');
		$room_type=$this->session->userdata('rm_type');
		$this->db->select('ct.connection_msg,ct.connection_talk_id,u.user_picture_url,u.user_full_name');
		$this->db->from('connection_talk ct');
		$this->db->join('users as u','u.user_id=ct.user_id');
		$this->db->where('ct.status',0);
		$this->db->order_by('ct.connection_talk_id','desc');
		if($room_type)
		$this->db->where('ct.room_type_id',$room_type);
		$subquery='select friend_id from user_friend where status=0 and user_id='.$user_id.' UNION select '.$user_id;
		if($limit)
		$this->db->limit($limit);
		$this->db->where("`ct`.`user_id` IN ($subquery)", NULL, FALSE);
		
            	$query = $this->db->get();
		return $query;

	}
	function insert_featured_img($data){

	return $this->db->insert('featured_image',$data);
	}

	function get_featured_img($limit){
		
		$photo_id=$this->get_follow_room_photo_id();
		$this->db->select('f_img_url,featured_image_id,tg_name');
		$this->db->from('featured_image');
		$this->db->where('status',0);
		$this->db->where('photo_id',$photo_id);
		$this->db->order_by('featured_image_id','desc');
		$query = $this->db->get();
		return $query;
	}
	function get_latest_room(){//get latest room that add by user
		$current_user_id=$this->session->userdata('user_id');
		$this->db->select('rt.room_type_id');
		$this->db->from('room_follow as rf');
		$this->db->where('rf.follower_user_id',$current_user_id);
		$this->db->where('rf.status',0);
		$this->db->join('room_types as rt','rf.room_type_id=rt.room_type_id');
		$this->db->order_by('rf.room_follow_id','desc');
		$this->db->limit('1');
		$query=$this->db->get();
		foreach($query->result_array() as $row)
			return $row['room_type_id'];
			
	}
	
	function get_room_style_id(){
		$current_user_id=$this->session->userdata('user_id');	
		$current_room_id=$this->session->userdata('rm_type');
		$this->db->select('rsu.style_type_id');
		$this->db->from('room_style_user as rsu');
		$this->db->where('rsu.room_type_id',$current_room_id);		
		$this->db->where('rsu.user_id',$current_user_id);
		$this->db->where('rsu.status',0);
		$query=$this->db->get();
		foreach($query->result_array() as $row)
			return $row['style_type_id'];	
		}

	function get_similar_style_users(){
		$style_id=$this->get_room_style_id();
		$this->db->select('u.user_picture_url,u.user_full_name,u.user_id,s.style_name');
		$this->db->from('room_style_user as rsu1');
		$this->db->join('users as u','u.user_id=rsu1.user_id');
		$this->db->join('styles as s','s.style_id=rsu1.style_type_id');
		$this->db->where('u.status',0);
		$this->db->where('rsu1.status',0);
		$this->db->where('rsu1.user_id !=',$this->session->userdata("user_id"));
		$this->db->where('rsu1.style_type_id',$style_id);
		$this->db->where('rsu1.room_type_id',$this->session->userdata('rm_type'));
		$query=$this->db->get();
		return $query;

	}
	function get_content($id=1){
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where('content_id',$id);
		$query=$this->db->get();
		return $query;

	}
	//common search feature
	function get_common_search($key='',$post_per_page,$current_page){
		
		$offset=($current_page-1)*$post_per_page;
		if($current_page==1) {
			$offset = 0;
		}

		 $sql = "(SELECT  'u' as type,user_id as id,user_full_name as name, user_picture_url as img_url FROM users   WHERE  MATCH (user_full_name) AGAINST (?)) 
UNION 
(SELECT  's' as type, store_id as id,store_name as name,store_image as img_url FROM stores WHERE  MATCH (store_name) AGAINST (?)) 
UNION 
(SELECT 'p' as type,products_id as id,product_name as name,products_main_image as img_url FROM products WHERE  MATCH (product_name) AGAINST (?)) 
 LIMIT ?,?";
		$query = $this->db->query($sql, array($key,$key,$key,$offset, $post_per_page));
		return $query;

	}
	// Get the number of rows, use for pagination
	function get_numrows_search($key) {
	
		$rows=0;
	
		 $sql = "(SELECT user_id as id FROM users WHERE  MATCH (user_full_name) AGAINST (?))
 UNION 
(SELECT store_id as id FROM stores WHERE  MATCH (store_name) AGAINST (?))
UNION
(SELECT products_id as id FROM products WHERE  MATCH (product_name) AGAINST (?)) 

";
		$query = $this->db->query($sql, array($key,$key,$key));
		
		$rows=$query->num_rows();
		
		return $rows;
	}
	function is_follow($user_id,$status){
		if($status!='p'){
		$this->db->select('user_id');
		if($status=='s'){
		$this->db->from('user_store');
		$this->db->where('store_id',$user_id);
		}else{
		$this->db->from('user_friend');
		$this->db->where('friend_id',$user_id);
		}
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('status',0);
		$query=$this->db->get();
		if($query->num_rows > 0)
			return 1;
		else
			return 0;
		}else{
			return 0;
		}
	}

	function get_friends_search_list($key){
		
		$user_id=$this->session->userdata('user_id');//user id 
		
		$this->db->select('user_id,user_facebook_id,user_full_name as name,user_picture_url as pic_square');
		$this->db->from('users');
		$this->db->where('`user_id` NOT IN (SELECT `friend_id` FROM `user_friend` where `user_id`='.$user_id.' and status=0)', NULL, FALSE);

		$this->db->like('user_full_name',$key);
		$query= $this->db->get();
		return $query;

	}
	function get_stores_search_list($key){
		
		$user_id=$this->session->userdata('user_id');//user id 
		
		$this->db->select('store_name,store_id,store_url,store_description,store_image');
	$this->db->from('stores');
	$this->db->where('`store_id` NOT IN (SELECT `store_id` FROM `user_store` where `user_id`='.$user_id.' and status=0)', NULL, FALSE);

	
	$this->db->like('store_name',$key);
		
		$query= $this->db->get();
		return $query;

	}
	

}
