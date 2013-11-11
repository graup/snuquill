<?php get_header(); ?>
		<div id="content" class="wrapper">
			<?php get_sidebar(); ?>
			
			<div id="main">
				<header class="archiveshead">
				<?php if (is_category()) { ?>
				<h2>'<?php single_cat_title(); ?>' Category Archives</h2>

				<?php } elseif(is_tag()) { ?>
				<h2>Posts Tagged '<?php single_tag_title(); ?>'</h2>
				
				<?php } elseif(is_author()) { ?>
				<h2><?php get_the_author_meta('display_name'); ?> Author Archives</h2>
				
				<?php } elseif(is_day()) { ?>
				<h2><?php the_time('l, F j, Y'); ?>: Daily Archives</h2>
				
				<?php } elseif(is_month()) { ?>
					<h2><?php the_time('F Y'); ?> Monthly Archives</h2>
				
				<?php } elseif(is_year()) { ?>
					<h2><?php the_time('Y'); ?> Yearly Archives</h2>
				<?php } ?>
				</header>
				
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="post postbrdr" role="article">
					<header class="posthead">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<span class="meta">
							<i>Published <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time> by <?php the_author_posts_link(); ?>.</i>
							<i>Filed under <a href="#" rel="category"><?php the_category(', '); ?></a>. Total of <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a> in the discussion.<?php edit_post_link('Admin Edit', ' ', '.'); ?></i>
						</span>
					</header>
					
					<section class="post-content clearfix">
						<?php the_excerpt(); ?>
						<p><a href="<?php the_permalink() ?>">Read More...</a></p>
					</section>
				</article> <!-- /.post -->
				<?php endwhile; ?>
				
				<div id="navbelow" class="clearfix">
		        <div class="nav-prev"><?php previous_posts_link("&laquo; Older Entries"); ?></div>
		        <div class="nav-next"><?php next_posts_link("Newer Entries &raquo;"); ?></div>
				</div>
				
				<?php else : ?>
					<article id="post-not-found" class="post">
						<header class="posthead">
					  	<h2>Whoops! Looks like we can't find this post.</h2>
					  </header>
					  
					  <section class="post-content">
					  	<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
					  </section>
					</article>
				<?php endif; ?>
			</div> <!-- /#main -->
		</div> <!-- /#content -->
		
		<br style="clear:both;">

		<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>