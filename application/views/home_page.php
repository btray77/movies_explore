
<?php
if ($result && ($type == 'movie')) {
    foreach ($result->result_array() as $row) {

        $movie_name = $row['movie_name'];
        $movie_id = $row['movie_id'];
        $movie_photo = $row['movie_photo'];
        $movie_desc = $row['movie_desc'];
    }
}

if ($result && ($type == 'actor')) {

    foreach ($result->result_array() as $row) {

        $movie_name = $row['actor_name'];
        $movie_photo = $row['actor_photo'];
        $movie_desc = $row['actor_desc'];
    }
}
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title><?php echo $movie_name; ?></title>
        <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.carouFredSel-5.6.1.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
   	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	/*#gallery {
		background-color: #444;
		padding: 10px;
		width: 520px;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }*/
	</style>
        <script type="text/javascript" language="javascript">
            $(function() {

                //	Basic carousel, no options
                $('#foo0').carouFredSel();

                //	Basic carousel + timer
                $('#foo1').carouFredSel({
                    auto: {
                        pauseOnHover: 'resume',
                        onPauseStart: function( percentage, duration ) {
                            $(this).trigger( 'configuration', ['width', function( value ) { 
                                    $('#timer1').stop().animate({
                                        width: value
                                    }, {
                                        duration: duration,
                                        easing: 'linear'
                                    });
                                }]);
                        },
                        onPauseEnd: function( percentage, duration ) {
                            $('#timer1').stop().width( 0 );
                        },
                        onPausePause: function( percentage, duration ) {
                            $('#timer1').stop();
                        }
                    }
                });

                //	Scrolled by user interaction
                $('#foo2').carouFredSel({
                    prev: '#prev2',
                    next: '#next2',
                    pagination: "#pager2",
                    auto: false
                });

                //	Variable number of visible items with variable sizes
                $('#foo3').carouFredSel({
                    width: 360,
                    height: 'auto',
                    prev: '#prev3',
                    next: '#next3',
                    auto: false
                });

                //	Fluid layout example 1, resizing the items
                $('#foo4').carouFredSel({
                    responsive: true,
                    width: '100%',
                    scroll: 2,
                    items: {
                        width: 400,
                        //	height: '30%',	//	optionally resize item-height
                        visible: {
                            min: 2,
                            max: 6
                        }
                    }
                });

                //	Fuild layout example 2, centering the items
                $('#foo5').carouFredSel({
                    circular: false,
                    infinite: false,
                    auto    : false,
                    width   :500,
                    scroll  : {
                        items   : "page"
                    },
                    prev    : {
                        button  : "#foo2_prev",
                        key     : "left"
                    },
                    next    : {
                        button  : "#foo2_next",
                        key     : "right"
                    },
                    pagination  : "#foo2_pag"
                });

            });
        </script>
    </head>
    <body>
        <?php
        include_once(APPPATH . 'js/home_js.php');
        ?>  

        <header>
        </header>

        <aside id="rightbar">
            <div id="side_ul_con">
                loading
            </div>
        </aside>
        <div id="right_side">
            <div id="content_main">

                <div class="main_inside">
                    <h1><?php echo $movie_name; ?></h1>
                    <section class="metadata">
                        <div class="poster-area"><img alt="poster" src="<?php echo $movie_photo; ?>" class="poster"></div>
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





                    <section class="pictures">
                        <div component="PhotoBrowser" class="box" id="">

                            <div class="photo-overview">46 Photos for Men in Black III</div>
                            <div class="photo-container">

                                <div class="photo-carousel"><div class="photo-slide" style="left: -2640px;">
                                        <a class="prev" id="foo2_prev" href="#"><span>prev</span></a>
                                        <div class="list_carousel" id="gallery">

                                            <div id="foo5" >
 <a href="http://content9.flixster.com/rtmovie/89/61/89615_gal.jpg" title="Utilize a flexibilidade dos seletores da jQuery e crie um grupo de imagens como desejar. $('#gallery').lightBox();">
                                                <img alt="Men in Black III (1 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89615_gal.jpg" tag="/movie/photo/89615" src="http://content9.flixster.com/rtmovie/89/61/89615_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89615">
</a>

    <a href="http://content8.flixster.com/rtmovie/89/61/89614_gal.jpg" title="">                                                <img alt="Men in Black III (2 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/61/89614_gal.jpg" tag="/movie/photo/89614" src="http://content8.flixster.com/rtmovie/89/61/89614_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89614">
</a>
<a href="http://content9.flixster.com/rtmovie/89/61/89615_gal.jpg" title="Utilize a flexibilidade dos seletores da jQuery e crie um grupo de imagens como desejar. $('#gallery').lightBox();">
                                                <img alt="Men in Black III (1 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89615_gal.jpg" tag="/movie/photo/89615" src="http://content9.flixster.com/rtmovie/89/61/89615_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89615">
</a>

    <a href="http://content8.flixster.com/rtmovie/89/61/89614_gal.jpg" title="">                                                <img alt="Men in Black III (2 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/61/89614_gal.jpg" tag="/movie/photo/89614" src="http://content8.flixster.com/rtmovie/89/61/89614_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89614">
</a>
                                                        <img alt="Men in Black III (3 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/89/61/89613_ga.jpg" tag="/movie/photo/89613" src="http://content7.flixster.com/rtmovie/89/61/89613_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89613">


                                                            <img alt="Men in Black III (4 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/89/61/89612_gal.jpg" tag="/movie/photo/89612" src="http://content6.flixster.com/rtmovie/89/61/89612_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89612">


                                                                <img alt="Men in Black III (5 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89611_gal.jpg" tag="/movie/photo/89611" src="http://content9.flixster.com/rtmovie/89/61/89611_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89611">


                                                                    <img alt="Men in Black III (6 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/61/89610_gal.jpg" tag="/movie/photo/89610" src="http://content8.flixster.com/rtmovie/89/61/89610_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89610">

                                                                        <img alt="Men in Black III (1 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89615_gal.jpg" tag="/movie/photo/89615" src="http://content9.flixster.com/rtmovie/89/61/89615_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89615">


                                                                            <img alt="Men in Black III (2 of 46)" _height="399" _width="600" _src="http://content8.flixster.com/rtmovie/89/61/89614_gal.jpg" tag="/movie/photo/89614" src="http://content8.flixster.com/rtmovie/89/61/89614_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89614">


                                                                                <img alt="Men in Black III (3 of 46)" _height="399" _width="600" _src="http://content7.flixster.com/rtmovie/89/61/89613_gal.jpg" tag="/movie/photo/89613" src="http://content7.flixster.com/rtmovie/89/61/89613_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89613">


                                                                                    <img alt="Men in Black III (4 of 46)" _height="399" _width="600" _src="http://content6.flixster.com/rtmovie/89/61/89612_gal.jpg" tag="/movie/photo/89612" src="http://content6.flixster.com/rtmovie/89/61/89612_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89612">


                                                                                        <img alt="Men in Black III (5 of 46)" _height="399" _width="600" _src="http://content9.flixster.com/rtmovie/89/61/89611_gal.jpg" tag="/movie/photo/89611" src="http://content9.flixster.com/rtmovie/89/61/89611_tmb.jpg" class="thumbnail" component="PopupPhoto" id="thumb_89611">


                                                                                            

                                                                                                </div>

                                                                                                <div class="clearfix"></div>



                                                                                                <div class="pagination" id="foo2_pag"></div>
                                                                                                </div>
                                                                                                <a class="next" id="foo2_next" href="#"><span>next</span></a>
                                                                                                <div class="clearfix"></div>

                                                                                                </div></div>

                                                                                                </div>

                                                                                                </section>


                                                                                                <section class="movie-people">
                                                                                                    <?php if ($directors_array->num_rows() > 0) { ?>
                                                                                                        <h2>Director</h2>
                                                                                                        <ul class="main-page-list">


                                                                                                            <?php foreach ($directors_array->result_array() as $row) { ?> 
                                                                                                                <a href="<?php echo site_url('actor?a_id=' . $row['actor_id']); ?>"><li class="box clickable" component="PageLink">

                                                                                                                        <?php $img_url = $row["actor_photo"]; ?>
                                                                                                                        <img src="<?php echo base_url(); ?>js/timthumb.php?src=<?php echo $row['actor_photo']?>&w=50&h=50&zc=0" class="thumbnail person-thumbnail" />
                                                                                                                        <div class="role"><span class="person-name"><?php echo $row['actor_name']; ?></span></div>
                                                                                                                    </li></a>
                                                                                                            <?php } ?>

                                                                                                        </ul>
                                                                                                    <?php } ?>



                                                                                                    <?php if ($cast_array->num_rows() > 0) { ?>
                                                                                                        <h2>Cast</h2>
                                                                                                        <div id="cast_content_div">
                                                                                                            <?php
                                                                                                            include_once(APPPATH . 'views/cast_list_page.php');
                                                                                                            ?>  
                                                                                                        </div>
                                                                                                    <?php } ?>

                                                                                                </section>
                                                                                                <section class="movie-people">
                                                                                                    <h2>User Reviews<a class="moreItems button org_button right" onclick="show_review_add();">Add Review ></a>
                                                                                                    </h2>
                                                                                                    <div class="write_review_div box" id="write_review_div" style="display:none">
                                                                                                        <div class="write-review-input-panel">
                                                                                                            <div class="write-review-section write-review-rating">
                                                                                                                <span class="write-review-field-name">Rating:</span>
                                                                                                                <div class="write-review-star-rating goog-inline-block">
                                                                                                                    <div data-rating="1" tabindex="0" class="star write-review-star goog-inline-block SPRITE_star_on_dark">&nbsp;</div>
                                                                                                                    <div data-rating="2" tabindex="0" class="star write-review-star goog-inline-block SPRITE_star_off_dark">&nbsp;</div>
                                                                                                                    <div data-rating="3" tabindex="0" class="star write-review-star goog-inline-block SPRITE_star_off_dark">&nbsp;</div>
                                                                                                                    <div data-rating="4" tabindex="0" class="star write-review-star goog-inline-block SPRITE_star_off_dark">&nbsp;</div>
                                                                                                                    <div data-rating="5" tabindex="0" class="star write-review-star goog-inline-block SPRITE_star_off_dark">&nbsp;</div>

                                                                                                                </div></div><div class="write-review-section">
                                                                                                                <span class="write-review-field-name">Title:</span><input type="text" value="" class="form-text-box write-review-title" size="50" maxlength="50">
                                                                                                                    <span class="write-review-remaining">
                                                                                                                        <span class="write-review-title-remaining">50</span> remaining</span>
                                                                                                            </div><div class="write-review-section">
                                                                                                                <span class="write-review-field-name">Comment:</span><div>
                                                                                                                    <textarea class="form-text-box write-review-comment" maxlength="1200">

                                                                                                                    </textarea><div class="write-review-comment-remaining-num"><span class="write-review-comment-remaining">1200</span> remaining</div></div></div>
                                                                                                            <div class="write-review-section"><input type="button" class="button org_button" value="Submit Review" tabindex="0" class="write-review-submit"></div></div>
                                                                                                    </div>
                                                                                                    </session>



                                                                                                    </div>


                                                                                                    </div>

                                                                                                    <div id="extra"></div>


                                                                                                    </body>
                                                                                                    </html>

