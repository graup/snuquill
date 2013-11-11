
<?php

	// Do not delete these lines
 if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
 die ('Please do not load this page directly. Thanks!');
 
  if ( post_password_required() ) : ?>
  	<div class="help">
    	<p>This post is password protected. Enter the password to view any comments.</p>
  	</div>
  <?php
    return;
  endif;
?>

<div id="comments">
<h3>Comments - <?php comments_number('<span>No</span> Responses', '<span>One</span> Response', '<span>%</span> Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
<?php if ( have_comments() ) : ?>

	<div id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
	 	</ul>
	</div>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&avatar_size=32'); ?>
	</ol>
	
	<div id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
		</ul>
	</div>
  
	<?php else : // this is displayed if there are no comments so far ?>
	
	<?php if ( comments_open() ) : // open but no comments ?>
	<p><em>Sure is empty down here...</em></p>
	<?php else : // comments are closed ?>
	<p>Sorry but comments are closed at this time.</p>
	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond">
	<h3 class="comment-title"><?php comment_form_title( "Leave a Reply", "Leave a Reply to %s" ); ?></h3>

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link(); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php printf( 'You must be %1$slogged in%2$s to post a comment.', '<a href="<?php echo wp_login_url( get_permalink() ); ?>">', '</a>' ); ?></p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
	<div id="commentfields">
	
	<?php if ( is_user_logged_in() ) : ?>
	
	<p class="special">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out">Logout?</a></p>

	<?php else : ?>
	<!-- full comments input fields -->
		<div class="ibox">
		  <label for="author">Name<?php if ($req) echo " (required)"; ?></label>
		  <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="" tabindex="1"<?php if ($req) echo ' aria-required="true"'; ?> class="basicinput">
		</div>
		
		<br>
		
		<div class="ibox">
		  <label for="email" class="mail">E-mail<?php if ($req) echo " (required)"; ?> <small>(will not be published!)</small></label>
		  <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="" tabindex="2"<?php if ($req) echo ' aria-required=""true"'; ?> class="basicinput">
		</div>
		
		<br>
		
		<div class="ibox">
		  <label for="url">Website</label>
		  <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="" tabindex="3" class="basicinput">
		</div>
		
		<br>
	<?php endif; ?>
	
		<div class="ibox">
			<label for="comment">Enter a comment</label>
			<textarea name="comment" id="comment" placeholder="" tabindex="4"></textarea>
		</div>
		
		  <input name="submit" type="submit" id="submit" class="button" tabindex="5" value="Post Comment" />
		  <?php comment_id_fields(); ?>
	
	</div><!-- /#commentfields -->
	
	<div class="info">
		<p id="allowed_tags" class="small"><strong>HTML5</strong> Accepted Tags: <code><?php echo allowed_tags(); ?></code></p>
	</div>
	
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
	<?php endif; ?>
</section>

<?php endif; ?>
</div>