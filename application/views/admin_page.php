<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<?php include_once(APPPATH.'simple_html_dom.php'); ?>
<div class="wrapper">

<?php   test(); 

 # this is the global array we fill with article information
    $articles = array();
	 $filim_name = array();
	$image = array();
	$story = array();
    # passing in the first page to parse, it will crawl to the end
    # on its own
   

function getArticles($page) {
    global $articles, $descriptions,$image,$filim_name,$stories;
    
    $htm = new simple_html_dom();
    $htm->load_file($page);

	foreach($htm->find('i') as $td) 
       {
		
				        

	      foreach($td->find('a') as $m_link) {
			
			$articles[] = array('http://en.wikipedia.org'.$m_link->href
				
				);
		

	}
       }





    
    


		
	
    

	

    # lets see if there's a next page
  /*  if($next = $html->find('a[class=nextpostslink]', 0)) {
        $URL = $next->href;
        echo "going on to $URL <<<\n";
        # memory leak clean up
        $html->clear();
        unset($html);
        
        getArticles($URL);
    }*/
}





function get_movie($page) {
echo $page;
global $article, $descriptions,$image,$filim_name,$stories;
    
    $html = new simple_html_dom();
    $html->load_file($page);
    
    $items = $html->find('div[id=mw-content-text]');  
   //$items=$items->children(0);
    foreach($items as $post) {
	foreach($post->find('img') as $img){
			$image[]=$img->src;
			}
	
       $article[] = array($post->children(0)->first_child()->innertext,
				$image['0']
				);
				                           
		
    }
}



echo '<pre>';

//print_r($filim_name[0]);

print_r($articles[3][0]);
echo '</pre>';
get_movie($articles[3][0]);




$article=$article[0];

print_r($article[0]);




 getArticles('http://en.wikipedia.org/wiki/Malayalam_films_of_2012');


 ?>

admin page
</div>


</body>





</html>

