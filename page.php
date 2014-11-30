	<?php get_header(); ?>

	<section class="main">
		<?php get_sidebar(); ?>

		<section class="content">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article class="single post" id="post-<?php the_ID(); ?>" role="article">
				
				<header class="posthead">
					<h1 class="article-title"><?php the_title(); ?></h1>
				</header>

				<section class="post-content">
					<?php the_content(); ?>
				</section>

			</article>

			<?php endwhile; ?>
			<?php else : ?>

			<article id="post-not-found" class="post">
				<header class="posthead">
					<h1>Whoops! Looks like we can't find this post.</h2>
				</header>

				<section class="post-content">
					<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
				</section>
			</article>
			<?php endif; ?>
		</section>
	</section><!-- /.main -->
	
	<?php get_footer(); ?>