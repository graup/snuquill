	<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="single post" id="post-<?php the_ID(); ?>" role="article">
			
			<header class="posthead">
				<h1 class="article-title">
					<?php the_title(); ?>
					<span class="issue-date"><?php the_time('F Y'); ?></span>
				</h1>
				<div class="intro"><?php the_excerpt(); ?></div>
			</header>

			<section class="post-content issue-articles">
				<?php 
					global $post;
					$q = 'post_type=simplemag-article' .
					     '&order=ASC&orderby=menu_order' .
					     '&meta_key=simplemag_issue&meta_value='.$post->ID .
					     '&nopaging=1';
					$article_query = new WP_Query( $q );
					
					$last_cat = false;
					while ($article_query->have_posts()) {
						$article_query->next_post();

						$cat = get_one_category($article_query->post->ID);
						if ($cat != $last_cat) {
							echo '<h2 class="section-title">' . $cat->name .'</h2>';
							$last_cat = $cat;
						}

						echo '<article><h3><a href="' . get_permalink($article_query->post->ID) . '">'. get_the_title( $article_query->post->ID ) . '</a></h2>
							<p>'. $article_query->post->post_excerpt . '</p>
						</article>';
					}
				?>
			</section>


		</article>

		<?php endwhile; ?>
		<?php else : ?>

		<article id="post-not-found" class="post">
			<header class="posthead">
				<h1>Whoops! Looks like we can't find this issue.</h2>
			</header>

			<section class="post-content">
				<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
			</section>
		</article>
		<?php endif; ?>
	</section><!-- /.main -->

	<?php get_sidebar(); ?>
	
	<?php get_footer(); ?>