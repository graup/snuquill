
<?php get_header(); ?>

<section class="main">

    <div class="issue-list-container">

        <ul class="big-issue-list medium-list">
        <?php
            if (have_posts()) : while (have_posts()) : the_post(); 

                get_the_post_thumbnail('full-reduced');
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-reduced');
            ?><li class="issue" style="background-image:url(<?php echo $thumb[0]; ?>)"><h2><a href="<?php the_permalink(); ?>">
            <span><?php the_title(); ?></span></a></h2>
            </li><?php endwhile; endif; ?>
        </ul>
    </div>
    
</section>

<?php get_footer(); ?>