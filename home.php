<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="homepage-post" id="post-<?php the_ID(); ?>" role="article">
			<?php the_content(); ?>
		</article>

		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>