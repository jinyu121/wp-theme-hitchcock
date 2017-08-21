<?php
// Flexslider function for format-gallery
function hitchcock_flexslider($size) {

	if ( is_page()) :
		$attachment_parent = $post->ID;
	else :
		$attachment_parent = get_the_ID();
	endif;

	if($images = get_posts(array(
		'post_parent'    => $attachment_parent,
		'post_type'      => 'attachment',
		'numberposts'    => -1, // show all
		'post_status'    => null,
		'post_mime_type' => 'image',
                'orderby'        => 'menu_order',
                'order'           => 'ASC',
	))) { ?>

		<div class="flexslider">

			<ul class="slides">

				<?php foreach($images as $image) {

					$attimg = wp_get_attachment_image($image->ID, $size); ?>

					<li>
						<?php echo $attimg; ?>
					</li>

				<?php }; ?>

			</ul>

		</div><?php

	}
}
