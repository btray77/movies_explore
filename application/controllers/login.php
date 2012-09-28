<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
         public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		
	}
	public function index()
	{
               $data['email']=($this->input->post('lemail')) ? $this->input->post('lemail') : '';
		$data['password']=($this->input->post('lpassword')) ? $this->input->post('lpassword') : '';
	$next=($this->input->post('next')) ? $this->input->post('next') : '';
		$result=$this->login_model->check_login($data);
		if($result==false)
		{

		}
		else{
			
		$user_data = array(
						'user_id' => $result['user_id'],
						'user_name' => $result['user_name'],
						'user_type' =>$result['user_type'],
						'is_logged_in' =>'1'
						
				);		
		//session create
		$this->session->set_userdata($user_data);
		$result=$this->login_model->update_session_key($result['user_id']);		

	
		}	
                
		 header('Location:'.$next);
		
	}
	
	function logout(){
		$array_items = array('user_id' => '','is_logged_in' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		setcookie("autologin", md5($_SERVER['REMOTE_ADDR']), time()-3600);
		 $next=$this->input->get('redirect');
		header('Location:'.$next);

	}

	function facebook_login(){

		$data['user_name']=$this->input->post('name');
		$data['user_email']=$this->input->post('email');
		$data['pic_square']=$this->input->post('pic_square');
		$data['fb_id']=$this->input->post('f_id');
		//$data['next']=($this->input->post('next')) ? $this->input->post('next') : '';
		
		$user_id=$this->login_model->save_user_details($data);	

		$result=$this->login_model->update_session_key($user_id);	

		
		$user_data = array(
						'user_id' => $user_id,
						'user_name' => $data['user_name'],
						'user_type' =>1,
						'is_logged_in' =>'1'
						
				);		
		//session create
		$this->session->set_userdata($user_data);
			

	
		}	
                
		 header('Location:'.$next);

	}
       
           
}
