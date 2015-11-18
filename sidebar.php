	<section class="sidebar">
		<ul class="nav nav-issues">

			<?php
				global $post;
				if ($post->post_type == 'simplemag-issue')
					$current_issue = $post->ID;
				else
					$current_issue = get_post_meta($post->ID, 'simplemag_issue', true);

				// Issues menu
				$issues_query = new WP_Query( 'post_type=simplemag-issue&posts_per_page=5' );
				$count = 5;
				while ($issues_query->have_posts()) {
					if ($count-- === 0) break;
					$issues_query->next_post();
					$class = "link-issue-title";
					if ($issues_query->post->ID == $post->ID)
						$class .= ' active';
					echo '<li><a class="'.$class.'" href="' . get_permalink($issues_query->post->ID) . '">' .
					     '<strong>'. get_the_title( $issues_query->post->ID ) . '</strong> ' .
					     get_the_time('F Y', $issues_query->post->ID) .
					     '</a>';
					
					// If issue is active, show articles as sub-menu
					if ($issues_query->post->ID == $current_issue) {
						
						$q = 'post_type=simplemag-article' .
						     '&order=ASC&orderby=menu_order' .
						     '&meta_key=simplemag_issue&meta_value='.$current_issue .
						     '&nopaging=1';
						$article_query = new WP_Query( $q );
						
						if ($article_query->have_posts()) {
							echo '<ul class="nav nav-issue-articles">';

							$last_cat = false;
							while ($article_query->have_posts()) {
								$article_query->next_post();

								// Section dividers
								$cat = get_one_category($article_query->post->ID);
								if ($cat != $last_cat) {
									echo '<li><a href="#" class="link-section">' . $cat->name .'</a></li>';
									$last_cat = $cat;
								}

								$class = "link-article";
								if ($article_query->post->ID == $post->ID)
									$class .= " active";
								echo '<li><a class="'.$class.'"" href="' . get_permalink($article_query->post->ID) . '">'. get_the_title( $article_query->post->ID ) . '</a></li>';
							}
							echo '</ul>';
						}
					}

					echo '</li>';
				}
			?>

			<li><a href="<?php echo get_post_type_archive_link('simplemag-issue'); ?>">Archive</a></li>
		</ul>

	</section>