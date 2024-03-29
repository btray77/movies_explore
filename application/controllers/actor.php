<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actor extends CI_Controller {

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
		$this->load->model('movie_model');
		
	}
	public function index()
	{
                $data['actor_id']=$this->input->get('a_id');
                 $key=$data['actor_id'];
		$data['movie_id']='0';
                $data['type']='actor';
                $data['actor_movies']=$this->movie_model->get_movies_by_actors($key);
                 $data['dire_movies']=$this->movie_model->get_movies_by_dire($key);
                $data['result']=$this->movie_model->get_main_actor_details($key);
		$this->load->view('home_page',$data);
	}
        function get_actors_details(){
            $key=$this->input->post('a_id');
           //  $data['actor_movie_array']=$this->movie_model->get_movies_details_by_actor($key);
          $data['actor_movies']=$this->movie_model->get_movies_by_actors($key);
               $data['dire_movies']=$this->movie_model->get_movies_by_dire($key);
             
            $data['result']=$this->movie_model->get_main_actor_details($key);
           
            $this->load->view('actor_main_detail_view',$data);
            
        }
}
