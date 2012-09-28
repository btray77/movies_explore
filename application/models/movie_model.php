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
		
		
	}


	function get_movies(){
		 $this->db->select('*');
                 $this->db->from('movies');
                 $this->db->where('movie_status','0');
                 $this->db->order_by('movie_date','asc');
                 return $this->db->get();
        }
	function get_movies_aside(){
		 $this->db->select('*');
       $this->db->from('movies');
       $this->db->where('movie_status','0');
       $this->db->order_by('movie_date','asc');
       return $this->db->get();
        }        
        
        
        
     function get_movies_count(){
     					$this->db->select('count(movie_id) as count');
                 $this->db->from('movies');
                 $this->db->where('movie_status','0');
                
                 $query=$this->db->get();
                foreach($query->result_array() as $row)
                return $row['count'];
     	
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
function get_movie_photo_gallery($m_id){
		$this->db->select('*');
         $this->db->from('photos');
         $this->db->where('movie_or_actor_id',$m_id);
         $this->db->where('status','0');
	$this->db->where('type','1');
            return $this->db->get();

	}
	function insert_movie_review($data){
	
		
		return $res=$this->db->insert('comments',$data);
	
		
		
	}
	function get_movie_reviews($m_id){
	
		
		$this->db->select('rating,title,comment,comment_id,user.user_name,dated');
		$this->db->from('comments');
		$this->db->join('user','user.user_id=comments.user_id','left');
		$this->db->where('to_id',$m_id);
		$this->db->where('comments.status',0);
		$this->db->order_by('comment_id','desc');
		$query=$this->db->get();
		return $query;
	
		
		
	}
	function get_movies_list_main($current_page='0',$post_per_page=''){
			$offset=($current_page-1)*$post_per_page;
		if($current_page==1) {
			$offset = 0;
		}
					
					$this->db->select('*');
               $this->db->from('movies');
               $this->db->where('movie_status','0');
             
               $this->db->order_by('movie_date','asc');
             	if($post_per_page!='')
               $this->db->limit($post_per_page,$offset);
               return $this->db->get(); 
             
             
        }
        
        function get_cast_list_main($current_page='0',$post_per_page=''){
			$offset=($current_page-1)*$post_per_page;
		if($current_page==1) {
			$offset = 0;
		}
					
					$this->db->select('*');
               $this->db->from('actors');
               $this->db->where('actor_status','0');
             
              
             	if($post_per_page!='')
               $this->db->limit($post_per_page,$offset);
               return $this->db->get(); 
             
             
        }
        function get_casts_count(){
     					$this->db->select('count(actor_id) as count');
                 $this->db->from('actors');
                 $this->db->where('actor_status','0');
                
                 $query=$this->db->get();
                foreach($query->result_array() as $row)
                return $row['count'];
     	
     	}   
     
}
