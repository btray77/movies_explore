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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
