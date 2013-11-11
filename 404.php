<?php get_header(); ?>
		<div id="content" class="wrapper">
			<?php get_sidebar(); ?>
			
			<div id="main">
				<article id="post-not-found" class="post">
					<header class="posthead">
				  	<h2 class="bigger">404 Error Page Not Found!</h2>
				  </header>
				  
				  <section class="post-content">
				  	<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
				  </section>
				</article>
			</div> <!-- /#main -->
			
		</div> <!-- /#content -->
		
		<br style="clear:both;">

		<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>