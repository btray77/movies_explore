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
class Movie_model extends CI_Model {
       		
    
	public function __construct()
	{
		parent::__construct();
		//load the config file to set the(FB app key,Secret key,scope)
		
	}


	function get_movies(){//return the facebook user id
		 $this->db->select('*');
                 $this->db->from('movies');
                 $this->db->where('movie_status','0');
                 $this->db->order_by('movie_date','asc');
                 return $this->db->get();
        }
           function get_movie_details($m_id){//return the facebook user id
               
		 $this->db->select('*');
                 $this->db->from('movies');
                 
                 if($m_id)
                 $this->db->where('movie_id',$m_id);
                 else {
                     $this->db->order_by('movie_date','asc');
                     $this->db->limit('1','0');
                 }
                 return $this->db->get();
        }
         function get_actors_details($m_id,$limit){
                $this->db->select('*');
                $this->db->from('actors');
		 $this->db->where('actor_status','0');
                if($limit)
                $this->db->limit($limit);
                $this->db->where('`actor_id` IN (SELECT `actor_id` FROM `movies_actors` where `movie_id`='.$m_id.')', NULL, FALSE);
                
                 return $this->db->get();
         }
          function get_directors_details($m_id){
                $this->db->select('*');
                $this->db->from('actors');
		 $this->db->where('actor_status','0');
                $this->db->where('`actor_id` IN (SELECT `movie_director` FROM `movies` where `movie_id`='.$m_id.')', NULL, FALSE);
                
                 return $this->db->get();
         }
         function get_main_actor_details($a_id){
               
		 $this->db->select('*');
                 $this->db->from('actors');
               
                 $this->db->where('actor_id',$a_id);
                
                     
                     $this->db->limit('1','0');
                
                 return $this->db->get();
        }
    function get_contents($url)  
    {  
       $ch = curl_init();  
      
       curl_setopt ($ch, CURLOPT_URL, $url);  
       curl_setopt ($ch, CURLOPT_HEADER, 0);  
      
       ob_start();  
      
       curl_exec ($ch);  
       curl_close ($ch);  
       $string = ob_get_contents();  
      
       ob_end_clean();  
         
       return $string;      
      
    }
     function get_movies_by_actors($a_id){
         
         $this->db->select('m.*');
         $this->db->from('movies_actors ma');
         
         $this->db->join('movies as m','m.movie_id=ma.movie_id');
         $this->db->where('m.movie_status','0');
         $this->db->where('ma.actor_id',$a_id);
           return $this->db->get();
     }
     function get_movies_by_dire($d_id){
         $this->db->select('*');
         $this->db->from('movies');
         $this->db->where('movie_status','0');
         $this->db->where('movie_director',$d_id);
            return $this->db->get();
     }
     
}
