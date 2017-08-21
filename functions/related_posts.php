<?php
// Related posts function
function hitchcock_related_posts() { ?>

<div class="related-posts posts section-inner">

	<?php

		global $post;
		$cat_ID = array();
		$categories = get_the_category();
		foreach($categories as $category) {
			array_push($cat_ID,$category->cat_ID);
		}

		$related_posts = new WP_Query( apply_filters(
		'rowling_related_posts_args', array(
		        'posts_per_page'		=>	3,
		        'post_status'			=>	'publish',
		        'category__in'			=>	$cat_ID,
		        'post__not_in'			=>	array($post->ID),
		        'ignore_sticky_posts'	=>	true
		) ) );

		if ($related_posts->have_posts()) :

			while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

			<?php global $post; ?>

			<?php get_template_part( 'content-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php else: // If there are no other posts in the post categories, get random posts ?>

		<?php

			$related_posts = new WP_Query( apply_filters(
			'rowling_related_posts_args', array(
			        'posts_per_page'		=>	3,
			        'post_status'			=>	'publish',
			        'orderby'				=>	'rand',
			        'post__not_in'			=>	array($post->ID),
			        'ignore_sticky_posts'	=>	true
			) ) );

			if ($related_posts->have_posts()) :

				while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

				<?php global $post; ?>

				<?php get_template_part( 'content-parts/content', get_post_format() ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	<?php endif; ?>

	<div class="clear"></div>

	<?php wp_reset_query(); ?>

</div> <!-- /related-posts --> <?php

}
