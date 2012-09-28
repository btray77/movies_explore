<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Radmin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('admin');
		//$this->admin->get_array_filim_links('');
                 $data['result']=$this->admin->get_movies();
		$this->load->view('admin_page',$data);
	}
	function actors()
	{
		$this->load->model('admin');
		//$this->admin->get_array_filim_links('');
                 $data['result']=$this->admin->get_actors();
		$this->load->view('admin_page_actors',$data);
	}
	function getactor($a_id)
	{
		$this->load->model('admin');
		//$this->admin->get_array_filim_links('');
                 $data['result']=$this->admin->get_actor_detail($a_id);
		$this->load->view('admin_actor_detail',$data);
	}
	function gets()
	{
		
		//$this->load->model('admin');
		//$this->admin->get_array_filim_links('');
		$this->load->view('admin_page');
	}
        function trash_movie(){
            $this->load->model('admin');
             $key=$this->input->post('m_id');
            $data['movie_id']= $key;
      $res=$this->admin->trash_movie_status_change($key);
       echo $res;
            
        }
	function trash_actor(){
            $this->load->model('admin');
             $key=$this->input->post('a_id');
            $data['actor_id']= $key;
      $res=$this->admin->trash_actor_status_change($key);
       echo $res;
            
        }
	function update_actor(){
		 $this->load->model('admin');
		$data['actor_id']=$this->input->post('a_id');
		$data['actor_photo']=$this->input->post('a_photo');
		$data['actor_name']=$this->input->post('a_name');
		$data['actor_desc']=$this->input->post('a_desc');
		$res['res']=$this->admin->update_actor_details($data);

		$this->load->view('admin_ajax_actor_list',$res);
		
	}
	function upload_movies_photo()
	{
	
	$movie_id=($this->input->post('h_movie_id')) ? $this->input->post('h_movie_id') : "";
	$photo_type=($this->input->post('photo_type')) ? $this->input->post('photo_type') : "0";//gallery or featured
	
	
		print_r($_FILES['f_upload_photo'.$movie_id]);	
	
	/*$userfile_name = $_FILES['up_image']['name'];
	$userfile_tmp = $_FILES['up_image']['tmp_name'];
	$userfile_size = $_FILES['up_image']['size'];
	$userfile_type = $_FILES['up_image']['type'];
	$filename = basename($_FILES['up_image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));*/
	//file upload start
$this->load->library('upload');




if($_FILES['f_upload_photo'.$movie_id]['size'] > 0) { // upload is the name of the file field in the form
$aConfig=array();
$newFileName = $_FILES['f_upload_photo'.$movie_id]['name'];
$fileExt = array_pop(explode(".", $newFileName));
$filename = $movie_id.md5(time()).".".$fileExt;

//set filename in config for upload
$aConfig['file_name'] = $filename;
$aConfig['upload_path']      = './m_images/';
$aConfig['allowed_types']    = 'pdf|jpg|png|jpeg|gif';
$aConfig['max_size']     = '3000';
$aConfig['max_width']        = '1280';
$aConfig['max_height']       = '1024';

$this->upload->initialize($aConfig);

  if($this->upload->do_upload('f_upload_photo'.$movie_id))
  {
	
	 $this->load->model('admin');
	 if($photo_type==1){//if featured image update the actor main photo in db
		$adata=array(
		'movie_photo'=>$filename
		
		);
		$this->admin->update_movie_photo($adata,$movie_id);
	 }
	 else{
	$pdata=array(
		'movie_or_actor_id'=>$movie_id,
		'type'=>'1',//1 for movies 2 for cast
		'photo_name'=>$filename,
		'photo_type'=>$photo_type
		
		);
	$this->admin->insert_movie_photo_details($pdata);
	}
    $ret = $this->upload->data();
	
  } else {
   
	$error = array('error' => $this->upload->display_errors());
	print_r($error);die('hghgf');
  }






	if($ret){
	
	$this->index();
	//$redirect=site_url("main/main_page/".$room_type_id);
	//echo "<script type='text/javascript'>top.location.href = '$redirect';</script>";
        	//exit;
	
		
	//$data['redirect']=site_url("main/main_page/".$room_type_id);
	//$this->load->view('redirect',$data);
	}
	}
	}

function upload_actor_photo()
	{
	
	$actor_id=($this->input->post('h_actor_id')) ? $this->input->post('h_actor_id') : "";
	$photo_type=($this->input->post('photo_type')) ? $this->input->post('photo_type') : "0";//gallery or featured or thumb
	
	
		print_r($_FILES['f_upload_photo'.$actor_id]);	
	
	/*$userfile_name = $_FILES['up_image']['name'];
	$userfile_tmp = $_FILES['up_image']['tmp_name'];
	$userfile_size = $_FILES['up_image']['size'];
	$userfile_type = $_FILES['up_image']['type'];
	$filename = basename($_FILES['up_image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));*/
	//file upload start
$this->load->library('upload');




if($_FILES['f_upload_photo'.$actor_id]['size'] > 0) { // upload is the name of the file field in the form
$aConfig=array();
$newFileName = $_FILES['f_upload_photo'.$actor_id]['name'];
$fileExt = array_pop(explode(".", $newFileName));
$filename = $actor_id.md5(time()).".".$fileExt;

//set filename in config for upload
$aConfig['file_name'] = $filename;
if($photo_type==2)
$aConfig['upload_path']      = './thumb_images/';
else
$aConfig['upload_path']      = './m_images/';
$aConfig['allowed_types']    = 'pdf|jpg|png|jpeg|gif';
$aConfig['max_size']     = '3000';
$aConfig['max_width']        = '1280';
$aConfig['max_height']       = '1024';

$this->upload->initialize($aConfig);




  if($this->upload->do_upload('f_upload_photo'.$actor_id))
  {
	$image_data = $this->upload->data();
	 $this->load->model('admin');
	 
	 if($photo_type==1){//if featured image update the actor main photo in db
		$adata=array(
		'actor_photo'=>$filename
		
		);
		$this->admin->update_actor_photo($adata,$actor_id);
	 }
	else if($photo_type==2){//if featured image update the actor main photo in db
		$this->create_thumb($image_data['full_path'],$filename);
		$adata=array(
		'actor_thumb_photo'=>$filename
		
		);
		$this->admin->update_actor_photo($adata,$actor_id);
	 }
	 else{
	$pdata=array(
		'movie_or_actor_id'=>$actor_id,
		'type'=>'2',//1 for movies 2 for cast
		'photo_name'=>$filename,
		'photo_type'=>$photo_type
		
		);
	$this->admin->insert_movie_photo_details($pdata);
	}
    $ret = $this->upload->data();
	
  } else {
   
	$error = array('error' => $this->upload->display_errors());
	print_r($error);die('hghgf');
  }






	if($ret){
	
	$this->actors();
	//$redirect=site_url("main/main_page/".$room_type_id);
	//echo "<script type='text/javascript'>top.location.href = '$redirect';</script>";
        	//exit;
	
		
	//$data['redirect']=site_url("main/main_page/".$room_type_id);
	//$this->load->view('redirect',$data);
	}
	}
	}
	
	
function makeRandomString($max=6) {
    $i = 0; //Reset the counter.
    $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $keys_length = strlen($possible_keys);
    $str = ""; //Let's declare the string, to add later.
    while($i<$max) {
        $rand = mt_rand(1,$keys_length-1);
        $str.= $possible_keys[$rand];
        $i++;
    }
    return $str;
}

function create_thumb($image_path,$filename){
	 //want to create thumbnail
     
    $image_data = $this->upload->data(); //get image data
     
    $config = array(
'file_name' => $filename,
      'source_image' => $image_path, //get original image
      'new_image' => './thumb_images/', //save as new image //need to create thumbs first
      'maintain_ratio' => true,
      'width' => 50,
      'height' => 50
       
    );
 
    $this->load->library('image_lib', $config); //load library
    $this->image_lib->resize(); //do whatever specified in config

}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
