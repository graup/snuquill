<?php get_header(); ?>
		<div id="content" class="wrapper">
			<?php get_sidebar(); ?>
			
			<div id="main">
			<?php if ( have_posts() ) : ?>
				<header class="archiveshead">
					<h2>Search Results for '<?php echo esc_attr(get_search_query()); ?>'</h2>
				</header>
				
				<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="post postbrdr" role="article">
					<header class="posthead">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<span class="meta">
							<i>Published <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time> by <?php the_author_posts_link(); ?>.</i>
							<i>Filed under <a href="#" rel="category"><?php the_category(', '); ?></a>. Total of <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a> in the discussion.<?php edit_post_link('Admin Edit', ' ', '.'); ?></i>
						</span>
					</header>
					
					<section class="post-content clearfix">
						<?php the_excerpt('<span class="readmore">Read more &rarr;</span>'); ?>
					</section>
				</article>
					
				<?php endwhile; ?>	
					
				<div id="navbelow" class="clearfix">
		        <div class="nav-prev"><?php previous_posts_link("&laquo; Older Entries"); ?></div>
		        <div class="nav-next"><?php next_posts_link("Newer Entries &raquo;"); ?></div>
				</div>
					
				<?php else : ?>
				<article class="post">
					<header class="posthead">
				  	<h2>Sorry, no results found searching '<?php echo esc_attr(get_search_query()); ?>'</h2>
				  </header>
				  
				  <section class="post-content">
				  	<p>Maybe try searching under a different keyword?</p>
				  	
				  	<p>Or head back to the <a href="<?php echo site_url(); ?>/">home page</a> and look for your content again.</p>
				  </section>
				</article>					
					
				<?php endif; ?>
			
			</div> <!-- /#main -->
		</div> <!-- /#content -->
		
		<br style="clear:both;">

		<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>