<?php
/*
  Custom functions designed specifically for Bare Responsive theme.
  Feel free to add your own dynamic functions, or clear out this file entirely.
  
*/

register_nav_menus( array( 'header-menu' => 'Header Menu' ) );

/**
 * Setting up custom sidebars
 *
 */
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'main',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'Responsive Sidebar',
		'id' => 'responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
}

/**
 * Customize the 'Read More' link text
 *
 */
function custom_more_link( $link, $link_text ) {
     return str_replace( $link_text, 'Read More...', $link);
}
add_filter( 'the_content_more_link', 'custom_more_link', 10, 2 );


/**
 * Remove the hash(#) from all 'Read More' links
 *
 */
function remove_more_jump($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump');


function get_one_category($post_id) {
	$post_categories = wp_get_post_categories( $post_id );
	$cats = array();
	foreach($post_categories as $c){
		$cats[] = get_category( $c );
	}
	return $cats[0];
}

function get_next_article() {
	global $post;
	$q = 'post_type=simplemag-article' .
	     '&order=ASC&orderby=menu_order' .
	     '&meta_key=simplemag_issue&meta_value='.get_post_meta($post->ID, 'simplemag_issue', true) .
	     '&nopaging=1';
	$article_query = new WP_Query( $q );
	
	$i = 0;
	while ($article_query->have_posts()) {
		$article_query->next_post();

		if ($article_query->post->ID == $post->ID) {
			$prev_article = $article_query->posts[$i-1];
			$next_article = $article_query->posts[$i+1];
			break;
		}
		$i++;
	}
	return $next_article;
}

?>