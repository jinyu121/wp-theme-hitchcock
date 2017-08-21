<?php get_header(); ?>

<div class="content section-inner">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('single single-post'); ?>>

            <div class="post-container">

		        <?php get_template_part( 'content-parts/post', get_post_format() ); ?>

                <?php comments_template( '', true ); ?>
                
            </div> <!-- /post-container -->

        </div> <!-- /post -->

	</div> <!-- /content -->

	<?php hitchcock_related_posts(); ?>

   	<?php endwhile; else: ?>

		<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hitchcock"); ?></p>

	<?php endif; ?>

</div> <!-- /content -->

<?php get_footer(); ?>
