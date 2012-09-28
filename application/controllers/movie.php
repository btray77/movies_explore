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
		$this->check_autologin();
		
	}
	public function index()
	{
                $data['movie_id']=($this->input->get('m_id')) ? $this->input->get('m_id') : '178';

			
                   $data['type']='movie';
                $key=$data['movie_id'];
             $data['cast_array']=$this->movie_model->get_actors_details($key,'3');
		$data['mp_gallery']=$this->movie_model->get_movie_photo_gallery($key);
             $data['directors_array']=$this->movie_model->get_directors_details($key);
             $data['review_array']=$this->movie_model->get_movie_reviews($key);
            $data['result']=$this->movie_model->get_movie_details($key);
            $data['user_type']=($this->session->userdata('user_type'))? $this->session->userdata('user_type') : '1';
                
		 $data['actor_id']='0';
		$this->load->view('home_page',$data);
	}
	function check_autologin(){
	if (isset($_COOKIE['autologin'])) {

	$this->load->model('login_model');
	$result=$this->login_model->check_autologin($_COOKIE['autologin']);

        if ($_COOKIE['autologin'] == $result['session_key']) {

           		$user_data = array(
						'user_id' => $result['user_id'],
						'user_name' => $result['user_name'],
						'user_type' =>$result['user_type'],
						'is_logged_in' =>'1'
						
				);		
		//session create
		$this->session->set_userdata($user_data);
                   	
        }
    }



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
        function insert_movie_review(){
				
				$m_id=$this->input->post('m_id');
				$title=$this->input->post('title');
				$review=$this->input->post('r_review');
				$comment=$this->input->post('comment');
			 $user_type=$this->input->post('user_type');
				if($user_type==1){
					echo $user_id=$this->session->userdata('user_id');
					}
					else{
						$user_id=0;
						}
				$data=array(
							'to_id'=>$m_id,
							'to_type'=>1,//for movie 1 and cast 2
							'title'=>$title,
							'rating'=>$review,
							'comment'=>$comment,
							'dated' =>date('Y-m-d H:m:s'),
							'user_id'=>$user_id
								
							);
                
                
            $result=$this->movie_model->insert_movie_review($data);
            echo $result;
            
            
        }
        function ajax_get_movies_review(){
        			$m_id=$this->input->post('m_id');
        			 $data['review_array']=$this->movie_model->get_movie_reviews($m_id);
        			 $this->load->view('ajax_movie_review_view',$data);
        	}
           
}
