<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Controller {

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
                $data['movie_id']=$this->input->get('m_id');
                  
                $key=$data['movie_id'];
             $data['cast_array']=$this->movie_model->get_actors_details($key,'3');
             $data['directors_array']=$this->movie_model->get_directors_details($key);
            $data['result']=$this->movie_model->get_movie_details($key);
                
		 $data['actor_id']='0';
		$this->load->view('home_page',$data);
	}
        function get_all_actors(){
            $key=$this->input->post('m_id');
            $data['movie_id']= $key;
             $data['cast_array']=$this->movie_model->get_actors_details($key,'');
            $this->load->view('cast_list_page',$data);
        }
        
        function get_movies_lists(){
            $key=$this->input->post('s_keywords');
            $data['result']=$this->movie_model->get_movies();
            $this->load->view('aside_list_view',$data);
            
        }
           function get_movies_details(){
            $key=$this->input->post('m_id');
             $data['cast_array']=$this->movie_model->get_actors_details($key,'');
             $data['directors_array']=$this->movie_model->get_directors_details($key);
            $data['result']=$this->movie_model->get_movie_details($key);
            $this->load->view('main_details_view',$data);
            
        }
        function get_actors_details(){
            $key=$this->input->post('a_id');
           //  $data['actor_movie_array']=$this->movie_model->get_movies_details_by_actor($key);
          $data['actor_movies']=$this->movie_model->get_movies_by_actors($key);
               $data['dire_movies']=$this->movie_model->get_movies_by_dire($key);
             
            $data['result']=$this->movie_model->get_main_actor_details($key);
           
            $this->load->view('actor_main_detail_view',$data);
            
        }
        function get_contentss(){
                $url='http://en.wikipedia.org/wiki/Mallu_Singh';
                
            $result=$this->movie_model->get_contents($url);
            echo $result;
            
            
        }
        
           
}
