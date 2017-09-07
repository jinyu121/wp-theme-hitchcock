<?php get_header(); ?>

<div class="content section-inner">

	<?php if (have_posts()) : ?>

		<div class="posts" id="posts">

	    	<?php while (have_posts()) : the_post(); ?>

	    	    <?php get_template_part( 'content-parts/content', get_post_format() ); ?>

	        <?php endwhile; ?>

	        <div class="clear"></div>

		</div> <!-- /posts -->

	<?php endif; ?>

	<div class="clear"></div>

    <div class="archive-nav">
    	<?php
    	the_posts_pagination( array(
    		'mid_size' => 3,
    		'prev_text'          => __( '<span class="fa fw fa-angle-left"></span>', 'hitchcock' ),
    		'next_text'          => __( '<span class="fa fw fa-angle-right"></span>', 'hitchcock' ),
    		'before_page_number' => __( '<span>', 'hitchcock' ) ,
    		'after_page_number' => __( '</span>', 'hitchcock' ) ,
    	) );
    	?>
        <div class="clear"></div>
    </div> <!-- /archive-nav-->

</div> <!-- /content -->

<?php get_footer(); ?>
