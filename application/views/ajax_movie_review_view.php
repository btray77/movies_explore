<?php if($review_array->num_rows() > 0){ 
foreach($review_array->result_array() as $rew){
?>
<div class="doc-review box">
<span class="doc-review-author">
<strong><?php echo ($rew['user_name']) ? $rew['user_name'] : 'Guest'; ?></strong>
</span>

<span class="doc-review-date"><?php echo ($rew['dated']!='0000-00-00 00:00:00') ? date('M d, Y',strtotime($rew['dated'])) : ''; ?>
<a href="/store/apps/details?id=uistore.fieldsystem.submarine&amp;reviewId=16465587085085931287">

<div title="Link to this review" class="goog-inline-block review-permalink"></div></a>

</span><div class="doc-review-ratings-line">
<div title="Rating: 5.0 stars (Above average)" class="ratings goog-inline-block">
<?php for($i=1;$i<=5;$i++){ 
if($rew['rating']>=$i)
$style='rate_on';
else
$style='rate_off';
?>

<div class="goog-inline-block star <?php echo $style; ?>"></div>

<?php } ?>

</div><h4 class="review-title"><?php echo $rew['title']; ?></h4></div>

<p class="review-text"><?php echo $rew['comment']; ?></p>

<div class="review-footer goog-inline-block"><div class="doc-review-label">&nbsp;</div><div class="per-review-controls goog-inline-block"></div></div></div>

<?php } } ?>
