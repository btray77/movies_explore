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
class Admin extends CI_Model {
       		
    
	public function __construct()
	{
		parent::__construct();
		//load the config file to set the(FB app key,Secret key,scope)
		//$this->load->library('simple_html_dom');
		
	}

 function get_array_filim_links($url){
	die('gf');
	


	}
        function get_movies(){
		 $this->db->select('*');
                 $this->db->from('movies');
                 $this->db->order_by('movie_date','desc');
                 return $this->db->get();
        }
	function get_actors(){
		 $this->db->select('*');
                 $this->db->from('actors');
                 $this->db->order_by('actor_id','desc');
                 return $this->db->get();
        }
        function trash_movie_status_change($id){
                $this->db->select('movie_status');
                 $this->db->from('movies');
                 $this->db->where('movie_id',$id);
                 $query=$this->db->get();
            foreach($query->result_array() as $row){
                if($row['movie_status']==0){
                    $this->db->where('movie_id',$id);
                  $this->db->update('movies',array('movie_status'=>'1'));
                  
                  return '1';
                 
                }
                else if($row['movie_status']==1){
                        $this->db->where('movie_id',$id);
                    $this->db->update('movies',array('movie_status'=>'0'));
                    return '0';
                   
                }
                
            }
            
        }

	 function trash_actor_status_change($id){
                $this->db->select('actor_status');
                 $this->db->from('actors');
                 $this->db->where('actor_id',$id);
                 $query=$this->db->get();
            foreach($query->result_array() as $row){
                if($row['actor_status']==0){
                    $this->db->where('actor_id',$id);
                  $this->db->update('actors',array('actor_status'=>'1'));
                  
                  return '1';
                 
                }
                else if($row['actor_status']==1){
                        $this->db->where('actor_id',$id);
                    $this->db->update('actors',array('actor_status'=>'0'));
                    return '0';
                   
                }
                
            }
            
        }
	function update_actor_details($data){
		$this->db->where('actor_id',$data['actor_id']);
		$this->db->update('actors',array('actor_photo'=>$data['actor_photo'] , 'actor_name'=>$data['actor_name'] ,'actor_desc'=>$data['actor_desc']));
		
		return $this->get_actor($data['actor_id']);
		

		

	}
	function get_actor($id){
		$this->db->select('*');
		$this->db->from('actors');
		$this->db->where('actor_id',$id);
		return $this->db->get();
	}
	
	function insert_movie_photo_details($d_array){
		return $this->db->insert('photos',$d_array);
		
	}
	function update_actor_photo($adata,$actor_id){
	$this->db->where('actor_id',$actor_id);
	return $this->db->update('actors',$adata);
	
	}
	function update_movie_photo($adata,$movie_id){
	$this->db->where('movie_id',$movie_id);
	return $this->db->update('movies',$adata);
	
	}
	function get_actor_detail($id){
		$this->db->select('*');
		$this->db->from('actors');
		$this->db->where('actor_id',$id);
		return $this->db->get();
	}
	
}
