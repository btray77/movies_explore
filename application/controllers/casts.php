<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casts extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	
	 */
         public function __construct()
	{
		parent::__construct();
		$this->load->model('movie_model');
		//$this->check_autologin();
		
	}
	public function index()
	{
			$data['page_counter']=4;
			
			$data['cast_list']=$this->movie_model->get_cast_list_main('1','12');
         $this->load->view('casts_list_view',$data);
		
		
		}
		
}