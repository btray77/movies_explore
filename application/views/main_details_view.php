<?php 

foreach($result->result_array() as $row){
    
    $movie_name=$row['movie_name'];
       $movie_photo=$row['movie_photo'];
         $movie_desc=$row['movie_desc'];
    
}
?>
<div class="main_inside">
		<h1><?php echo $movie_name; ?></h1>
		<section class="metadata">
  <div class="poster-area"><img alt="poster" src="<?php echo $movie_photo;?>" class="poster"></div>
  <div class="summary">
  
  
  <div class="movie-scores">
      <?php include('histogram_rating_view.php'); ?>
      
    <!--<div><span class="viewer">Critics:</span><span class="meter tomato-fresh">63</span><span class="rating-count">(8 reviews)</span></div>
    <div><span class="viewer">Audience:</span><span class="meter wts">95</span><span class="rating-count">(176,613 ratings)</span></div>-->
  </div>
  <div class="actions">
  	<div component="MovieTrailer" class="action-button" id="">
  		
  		<a videosource="http://www.videodetective.net/player.aspx?PublishedId=393632&amp;CustomerId=300120&amp;e=1337775714544&amp;cmd=6&amp;fmt=4&amp;VideoKbrate=750&amp;sub=mobile-iPad&amp;h=4cfbcf74f60833b2557581785f3ef5b7" class="trailer-icon">Play Trailer</a>
  	</div>
  	<div movieid="771041419" component="ShowtimesLink" class="action-button"><a class="showtimes-icon">Showtimes</a></div>
  </div>
  <ul class="movie-info">
    <li>PG-13, 1 hr. 45 min.</li>
    <li>Release Date: <time datetime="2012-05-25 00:00:00.0">May 25, 2012</time></li>
  </ul>
  <p component="ShowMoreText" class="synopsis" id="">
  	
  	<span class="blurb"><?php echo substr_replace($movie_desc, '...', 300); ?></span>
  	<span class="full" style="display:none;"><?php echo $movie_desc; ?></span>
  	<br><a href="#" class="button org_button" id="desc_more">More...</a>
  </p>
  </div>
</section>
                
                
          
    	<div class="list_carousel"><a id="prev3" class="prev" href="#">&lt;</a>
				<ul id="foo3">
					<li style="width: 50px; height: 50px;">c</li>
					<li style="width: 200px; height: 100px;">a</li>
					<li style="width: 50px; height: 150px;">r</li>
					<li style="width: 50px; height: 200px;">o</li>
					<li style="width: 50px; height: 150px;">u</li>
					<li style="width: 100px; height: 100px;">F</li>
					<li style="width: 250px; height: 50px;">r</li>
					<li style="width: 150px; height: 100px;">e</li>
					<li style="width: 150px; height: 150px;">d</li>
					<li style="width: 50px; height: 200px;">S</li>
					<li style="width: 100px; height: 150px;">e</li>
					<li style="width: 150px; height: 100px;">l</li>
					<li style="width: 200px; height: 50px;"> </li>
				</ul>
                                    <a id="next3" class="next" href="#">&gt;</a>
				<div class="clearfix"></div>
				
				
			</div>

			
                <!--
<section class="pictures">
<div component="PhotoBrowser" class="box" id="">

<div class="photo-overview">46 Photos for Men in Black III</div>
<div class="photo-container">
	<a href="javascript:void();" class="slider slideLeft"></a>
		<div class="photo-carousel"><div class="photo-slider" style="left: -2640px;">
			
			
			<img alt="Men in Black III (1 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89615_gal.jpg" tag="/movie/photo/89615" src="http://content9.flixster.com/rtmovie/89/61/89615_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89615">
			
			
			<img alt="Men in Black III (2 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/61/89614_gal.jpg" tag="/movie/photo/89614" src="http://content8.flixster.com/rtmovie/89/61/89614_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89614">
			
			
			<img alt="Men in Black III (3 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/89/61/89613_gal.jpg" tag="/movie/photo/89613" src="http://content7.flixster.com/rtmovie/89/61/89613_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89613">
			
			
			<img alt="Men in Black III (4 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/89/61/89612_gal.jpg" tag="/movie/photo/89612" src="http://content6.flixster.com/rtmovie/89/61/89612_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89612">
			
			
			<img alt="Men in Black III (5 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89611_gal.jpg" tag="/movie/photo/89611" src="http://content9.flixster.com/rtmovie/89/61/89611_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89611">
			
			
			<img alt="Men in Black III (6 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/61/89610_gal.jpg" tag="/movie/photo/89610" src="http://content8.flixster.com/rtmovie/89/61/89610_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89610">
			
			
			<img alt="Men in Black III (7 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/89/60/89609_gal.jpg" tag="/movie/photo/89609" src="http://content7.flixster.com/rtmovie/89/60/89609_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89609">
			
			
			<img alt="Men in Black III (8 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/89/60/89608_gal.jpg" tag="/movie/photo/89608" src="http://content6.flixster.com/rtmovie/89/60/89608_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89608">
			
			
			<img alt="Men in Black III (9 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/60/89607_gal.jpg" tag="/movie/photo/89607" src="http://content9.flixster.com/rtmovie/89/60/89607_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89607">
			
			
			<img alt="Men in Black III (10 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/60/89606_gal.jpg" tag="/movie/photo/89606" src="http://content8.flixster.com/rtmovie/89/60/89606_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89606">
			
			
			<img alt="Men in Black III (11 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/89/60/89605_gal.jpg" tag="/movie/photo/89605" src="http://content7.flixster.com/rtmovie/89/60/89605_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89605">
			
			
			<img alt="Men in Black III (12 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/89/60/89604_gal.jpg" tag="/movie/photo/89604" src="http://content6.flixster.com/rtmovie/89/60/89604_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89604">
			
			
			<img alt="Men in Black III (13 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/60/89603_gal.jpg" tag="/movie/photo/89603" src="http://content9.flixster.com/rtmovie/89/60/89603_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89603">
			
			
			<img alt="Men in Black III (14 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/60/89602_gal.jpg" tag="/movie/photo/89602" src="http://content8.flixster.com/rtmovie/89/60/89602_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89602">
			
			
			<img alt="Men in Black III (15 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/89/60/89601_gal.jpg" tag="/movie/photo/89601" src="http://content7.flixster.com/rtmovie/89/60/89601_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89601">
			
			
			<img alt="Men in Black III (16 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/89/60/89600_gal.jpg" tag="/movie/photo/89600" src="http://content6.flixster.com/rtmovie/89/60/89600_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89600">
			
			
			<img alt="Men in Black III (17 of 46)" _height="357" _width="600" _src="http://content9.flixster.com/rtmovie/89/59/89599_gal.jpg" tag="/movie/photo/89599" src="http://content9.flixster.com/rtmovie/89/59/89599_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89599">
			
			
			<img alt="Men in Black III (18 of 46)" _height="382" _width="600" _src="http://content8.flixster.com/rtmovie/89/59/89598_gal.jpg" tag="/movie/photo/89598" src="http://content8.flixster.com/rtmovie/89/59/89598_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89598">
			
			
			<img alt="Men in Black III (19 of 46)" _height="400" _width="600" _src="http://content7.flixster.com/rtmovie/89/59/89597_gal.jpg" tag="/movie/photo/89597" src="http://content7.flixster.com/rtmovie/89/59/89597_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89597">
			
			
			<img alt="Men in Black III (20 of 46)" _height="357" _width="600" _src="http://content6.flixster.com/rtmovie/89/59/89596_gal.jpg" tag="/movie/photo/89596" src="http://content6.flixster.com/rtmovie/89/59/89596_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89596">
			
			
			<img alt="Men in Black III (21 of 46)" _height="600" _width="405" _src="http://content8.flixster.com/rtmovie/89/44/89442_gal.jpg" tag="/movie/photo/89442" src="http://content8.flixster.com/rtmovie/89/44/89442_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89442">
			
			
			<img alt="Men in Black III (22 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/87/50/87500_gal.jpg" tag="/movie/photo/87500" src="http://content6.flixster.com/rtmovie/87/50/87500_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87500">
			
			
			<img alt="Men in Black III (23 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/87/49/87499_gal.jpg" tag="/movie/photo/87499" src="http://content9.flixster.com/rtmovie/87/49/87499_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87499">
			
			
			<img alt="Men in Black III (24 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/87/49/87498_gal.jpg" tag="/movie/photo/87498" src="http://content8.flixster.com/rtmovie/87/49/87498_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87498">
			
			
			<img alt="Men in Black III (25 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/87/49/87497_gal.jpg" tag="/movie/photo/87497" src="http://content7.flixster.com/rtmovie/87/49/87497_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87497">
			
			
			<img alt="Men in Black III (26 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/87/49/87496_gal.jpg" tag="/movie/photo/87496" src="http://content6.flixster.com/rtmovie/87/49/87496_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87496">
			
			
			<img alt="Men in Black III (27 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/87/49/87495_gal.jpg" tag="/movie/photo/87495" src="http://content9.flixster.com/rtmovie/87/49/87495_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87495">
			
			
			<img alt="Men in Black III (28 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/87/49/87494_gal.jpg" tag="/movie/photo/87494" src="http://content8.flixster.com/rtmovie/87/49/87494_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87494">
			
			
			<img alt="Men in Black III (29 of 46)" _height="355" _width="600" _src="http://content7.flixster.com/rtmovie/87/49/87493_gal.jpg" tag="/movie/photo/87493" src="http://content7.flixster.com/rtmovie/87/49/87493_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87493">
			
			
			<img alt="Men in Black III (30 of 46)" _height="338" _width="600" _src="http://content6.flixster.com/rtmovie/87/49/87492_gal.png" tag="/movie/photo/87492" src="http://content6.flixster.com/rtmovie/87/49/87492_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87492">
			
			
			<img alt="Men in Black III (31 of 46)" _height="338" _width="600" _src="http://content9.flixster.com/rtmovie/87/49/87491_gal.png" tag="/movie/photo/87491" src="http://content9.flixster.com/rtmovie/87/49/87491_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87491">
			
			
			<img alt="Men in Black III (32 of 46)" _height="338" _width="600" _src="http://content8.flixster.com/rtmovie/87/49/87490_gal.png" tag="/movie/photo/87490" src="http://content8.flixster.com/rtmovie/87/49/87490_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87490">
			
			
			<img alt="Men in Black III (33 of 46)" _height="338" _width="600" _src="http://content7.flixster.com/rtmovie/87/48/87489_gal.png" tag="/movie/photo/87489" src="http://content7.flixster.com/rtmovie/87/48/87489_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87489">
			
			
			<img alt="Men in Black III (34 of 46)" _height="338" _width="600" _src="http://content6.flixster.com/rtmovie/87/48/87488_gal.png" tag="/movie/photo/87488" src="http://content6.flixster.com/rtmovie/87/48/87488_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87488">
			
			
			<img alt="Men in Black III (35 of 46)" _height="338" _width="600" _src="http://content9.flixster.com/rtmovie/87/48/87487_gal.png" tag="/movie/photo/87487" src="http://content9.flixster.com/rtmovie/87/48/87487_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87487">
			
			
			<img alt="Men in Black III (36 of 46)" _height="338" _width="600" _src="http://content8.flixster.com/rtmovie/87/48/87486_gal.png" tag="/movie/photo/87486" src="http://content8.flixster.com/rtmovie/87/48/87486_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87486">
			
			
			<img alt="Men in Black III (37 of 46)" _height="338" _width="600" _src="http://content7.flixster.com/rtmovie/87/48/87485_gal.png" tag="/movie/photo/87485" src="http://content7.flixster.com/rtmovie/87/48/87485_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87485">
			
			
			<img alt="Men in Black III (38 of 46)" _height="338" _width="600" _src="http://content6.flixster.com/rtmovie/87/48/87484_gal.png" tag="/movie/photo/87484" src="http://content6.flixster.com/rtmovie/87/48/87484_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87484">
			
			
			<img alt="Men in Black III (39 of 46)" _height="338" _width="600" _src="http://content9.flixster.com/rtmovie/87/48/87483_gal.png" tag="/movie/photo/87483" src="http://content9.flixster.com/rtmovie/87/48/87483_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87483">
			
			
			<img alt="Men in Black III (40 of 46)" _height="338" _width="600" _src="http://content8.flixster.com/rtmovie/87/48/87482_gal.png" tag="/movie/photo/87482" src="http://content8.flixster.com/rtmovie/87/48/87482_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87482">
			
			
			<img alt="Men in Black III (41 of 46)" _height="338" _width="600" _src="http://content7.flixster.com/rtmovie/87/48/87481_gal.png" tag="/movie/photo/87481" src="http://content7.flixster.com/rtmovie/87/48/87481_tmb.png" class="thumbnail" component="PopupPhoto" id="thumb_87481">
			
			
			<img alt="Men in Black III (42 of 46)" _height="600" _width="412" _src="http://content6.flixster.com/rtmovie/87/31/87316_gal.jpg" tag="/movie/photo/87316" src="http://content6.flixster.com/rtmovie/87/31/87316_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87316">
			
			
			<img alt="Men in Black III (43 of 46)" _height="600" _width="412" _src="http://content9.flixster.com/rtmovie/87/31/87315_gal.jpg" tag="/movie/photo/87315" src="http://content9.flixster.com/rtmovie/87/31/87315_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87315">
			
			
			<img alt="Men in Black III (44 of 46)" _height="600" _width="404" _src="http://content6.flixster.com/rtmovie/87/25/87256_gal.jpg" tag="/movie/photo/87256" src="http://content6.flixster.com/rtmovie/87/25/87256_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_87256">
			
			
			<img alt="Men in Black III (45 of 46)" _height="600" _width="405" _src="http://content8.flixster.com/rtmovie/84/61/84614_gal.jpg" tag="/movie/photo/84614" src="http://content8.flixster.com/rtmovie/84/61/84614_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_84614">
			
			
			<img alt="Men in Black III (46 of 46)" _height="600" _width="405" _src="http://content7.flixster.com/rtmovie/84/61/84613_gal.jpg" tag="/movie/photo/84613" src="http://content7.flixster.com/rtmovie/84/61/84613_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_84613">
			
		</div></div>
	<a href="javascript:void();" class="slider slideRight"></a>
</div>
<div class="photo-controls"><span class="markers"><a class="marker" _left="0" onclick="this.fire('photo:clickMarker');"></a><a class="marker" _left="528" onclick="this.fire('photo:clickMarker');"></a><a class="marker" _left="1056" onclick="this.fire('photo:clickMarker');"></a><a class="marker" _left="1584" onclick="this.fire('photo:clickMarker');"></a><a class="marker" _left="2112" onclick="this.fire('photo:clickMarker');"></a><a class="marker on" _left="2640" onclick="this.fire('photo:clickMarker');"></a><a class="marker" _left="3168" onclick="this.fire('photo:clickMarker');"></a><a class="marker" _left="3696" onclick="this.fire('photo:clickMarker');"></a></span></div>
</div>
</section>
-->
<section class="movie-people">
    <?php if($directors_array->num_rows() > 0){?>
  <h2>Director</h2>
  <ul class="main-page-list">
      
      
     <?php foreach($directors_array->result_array() as $row){?> 
    <a href="<?php echo site_url('actor?a_id='.$row['actor_id']); ?>"><li class="box clickable" component="PageLink">
      
    <?php $img_url= base_url().'js/timthumb.php?src='.$row["actor_photo"].'&w=50&h=50&zc=0';?>
        <img src="<?php echo $img_url;?>" class="thumbnail person-thumbnail" />
      <div class="role"><span class="person-name"><?php echo $row['actor_name'];?></span></div>
    </li></a>
      <?php } ?>
    
  </ul>
  <?php } ?>
  <h2>Cast</h2>
  <ul class="main-page-list" lesstext="Show less cast" component="ShowMoreItems" id="">
   
  
   
  
   
  
   
  
   
  
   <?php foreach($cast_array->result_array() as $row){?>
  
    
  <a href="<?php echo site_url('actor?a_id='.$row['actor_id']);?>">
    <li  class="box clickable hidden" component="PageLink">
      <img alt="<?php echo $row['actor_name']?>" src="<?php echo base_url(); ?>js/timthumb.php?src=<?php echo $row['actor_photo']?>&w=50&h=50&zc=0" class="thumbnail person-thumbnail">
      <div class="role">
	      <span class="person-name"><?php echo $row['actor_name']?></span>
	     
      </div>
    </li></a>
    
    
    <?php } ?>
    
  <li class="box toggle"><a class="moreItems">Show all</a></li>
  </ul>
</section>





		</div>
