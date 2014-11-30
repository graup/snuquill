<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<section class="main">

	<ul class="big-issue-list">
	<?php
		$issues_query = new WP_Query( 'post_type=simplemag-issue&post_count=5' );
		while ($issues_query->have_posts()):
			$issues_query->the_post();

			get_the_post_thumbnail('full-reduced');
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-reduced');
		?><li class="issue" style="background-image:url(<?php echo $thumb[0]; ?>)"><h2><a href="<?php the_permalink(); ?>">
		<span><?php the_title(); ?></span></a></h2>
		</li><?php endwhile; ?>
	</ul>

</section>
<script>
$(function(){
	var height = $(window).height() - 150,
		width = height * (360/500);
	$(".big-issue-list").css({'height': height});
	$(".big-issue-list li").css({'width': width});
	$('.big-issue-list li').click(function(){
		location.href = $(this).find('a').attr('href');
	});
});
</script>

<?php get_footer(); ?>