<?php
    $thumb = theme_catch_first_image();
    if (empty($thumb)){
        $post_class_arg = ['post'];
        $thumb = get_template_directory_uri() . '/images/bg.jpg';
    }else{
        $post_class_arg = ['post','has-post-thumbnail'];
    }
?>

<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class($post_class_arg); ?> style="background-image: url(<?php echo $thumb; ?>);">

	<div class="post-overlay">

		<?php if ( is_sticky() && !is_single() ) : ?>

			<p><span class="fa fw fa-star"></span><?php _e('Sticky','hitchcock'); ?></p>

		<?php endif; ?>

		<div class="archive-post-header">

		    <p class="archive-post-date"><?php the_time(get_option('date_format')); ?></p>

		    <?php if ( get_the_title() != '' ) : ?>
		    	<h2 class="archive-post-title"><?php the_title(); ?></h2>
		    <?php endif; ?>

		</div>

	</div>

</a> <!-- /post -->
