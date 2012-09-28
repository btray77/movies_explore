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
class Login_model extends CI_Model {
       		
    
	public function __construct()
	{
		parent::__construct();
		//load the config file to set the(FB app key,Secret key,scope)
		
	}


	function check_login($data){
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where('user_email',$data['email']);
	$this->db->where('password',$data['password']);
	$this->db->where('status',0);
	$res=$this->db->get();
	$data1=array();
	if($res->num_rows() > 0){
		foreach($res->result_array() as $row){
			$data1['user_name']=$row['user_name'];
			$data1['user_id']=$row['user_id'];
			$data1['user_type']=$row['user_type'];
		
		}
	return $data1;

	
	}
	else{
		return false;
	}
	

	}
	function update_session_key($user_id){
	$data=array('session_key'=>md5($_SERVER['REMOTE_ADDR']));
	
	$this->db->where('user_id',$user_id);
	if($this->db->update('user',$data)){
	setcookie("autologin", md5($_SERVER['REMOTE_ADDR']), time()+3600);

	}

	}

	function check_autologin($c_session_key){
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where('session_key',$c_session_key);
	
	$this->db->where('status',0);
	$res=$this->db->get();
	$data1=array();
	if($res->num_rows() > 0){
		foreach($res->result_array() as $row){
			$data1['user_name']=$row['user_name'];
			$data1['user_id']=$row['user_id'];
			$data1['user_type']=$row['user_type'];
			$data1['session_key']=$row['session_key'];
		}
	return $data1;

	
	}
	else{
		return false;
	}
	

	}

	function save_user_details(){// save or update user information call when login
	
        $this->db->select('fb_id');
        $this->db->from('user');
        $this->db->where('fb_id',$data['fb_id']);
        $query = $this->db->get();
        if($query->num_rows()>0) {
		foreach($query->result_array() as $row){
			$this->db->where('fb_id',$row['fb_id']);
			$this->db->update('user',array('fb_id' => $data['fb_id'],'user_name'=>$data['user_name'],'user_email'=>$data['user_email'],'pic_square'=>$data['pic_square']));
		$id=$row['fb_id'];
	}
            return $id;
        } else {
            $this->db->insert('user',('user',array('fb_id' => $data['fb_id'],'user_name'=>$data['user_name'],'user_email'=>$data['user_email'],'pic_square'=>$data['pic_square']));
            $id = $this->db->insert_id();
		return $id;
        }
       
       
}
     
}
