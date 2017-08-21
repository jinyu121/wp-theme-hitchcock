<?php
// Comment function
if ( ! function_exists( 'hitchcock_comment' ) ) :
function hitchcock_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

		<?php __( 'Pingback:', 'hitchcock' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'hitchcock' ), '<span class="edit-link">', '</span>' ); ?>

	</li>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div id="comment-<?php comment_ID(); ?>" class="comment">

			<h4 class="comment-title">
				<?php echo get_comment_author_link(); ?>
				<span><a class="comment-date-link" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>" title="<?php echo get_comment_date() . ' at ' . get_comment_time(); ?>"><?php echo get_comment_date(get_option('date_format')) ?></a>
				<?php
					if ( $post = get_post($post->ID) ) {
			            if ( $comment->user_id === $post->post_author )
			               echo ' &mdash; ' . __('Post Author','hitchcock');
			        }
				?>
				</span>
			</h4>

			<div class="comment-content post-content">

				<?php comment_text(); ?>

			</div><!-- /comment-content -->

			<div class="comment-actions">

				<?php
					comment_reply_link( array(
						'reply_text' 	=>  	__('Reply','hitchcock'),
						'depth'			=> 		$depth,
						'max_depth' 	=> 		$args['max_depth'],
						'before'		=>		'',
						'after'			=>		''
						)
					);
				?>

				<?php edit_comment_link( __( 'Edit', 'hitchcock' ), '', '' ); ?>

				<?php if ( '0' == $comment->comment_approved ) : ?>

					<p class="comment-awaiting-moderation fright"><?php _e( 'Your comment is awaiting moderation.', 'hitchcock' ); ?></p>

				<?php endif; ?>

			</div> <!-- /comment-actions -->

		</div><!-- /comment-## -->

	<?php
		break;
	endswitch;
}
endif;
