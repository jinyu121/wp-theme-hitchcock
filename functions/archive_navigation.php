<?php
// Hitchcock archive navigation function
function hitchcock_archive_navigation() {

	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>

		<div class="archive-nav">

			<?php
				if ( get_previous_posts_link() ) {
					previous_posts_link( '<span class="fa fw fa-angle-left"></span>' );
				} else {
					echo '<span class="fa fw fa-angle-left"></span>';
				}
			?>
			<span class="sep">/</span>
			<?php
				if ( get_next_posts_link() ) {
					next_posts_link( '<span class="fa fw fa-angle-right"></span>' );
				} else {
					echo '<span class="fa fw fa-angle-right"></span>';
				}
			?>

			<div class="clear"></div>

		</div> <!-- /archive-nav-->

	<?php endif;
}
