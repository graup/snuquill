	<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="single post" id="post-<?php the_ID(); ?>" role="article">
			
			<header class="posthead">
				<p class="section"><?php
					$cat = get_one_category(get_the_ID());
					if ($cat) {
						echo $cat->name;
					}
				?></p>
				<h1 class="article-title"><?php the_title(); ?></h1>
				<?php if (has_excerpt()): ?>
					<div class="intro"><?php the_excerpt(); ?></div>
				<?php endif; ?>
				<p class="author">By <?php
					$author = get_post_meta(get_the_ID(), 'author', true);
					if ($author) echo $author;
					else the_author_posts_link();
				?>
				<?php edit_post_link('Edit', ' - ', ''); ?></p>
			</header>

			<section class="post-content">
				<?php the_content(); ?>
			</section>

			
				<?php
				$next = get_next_article();
				if ($next): ?><p>
				<a class="next-article" href="<?php echo get_permalink($next->ID); ?>">Next: <strong>
					<?php echo $next->post_title; ?>
				</strong></a>
				</p><?php endif; ?>
			


			<section class="post-comments">
				<?php /* comments_template(); */ ?>
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
	</section><!-- /.main -->

	<?php get_sidebar(); ?>
	
	<?php get_footer(); ?>