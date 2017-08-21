<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() || comments_open() ) : ?>

	<div class="comments-container">

		<?php if ( have_comments() ) : ?>

			<div class="comments-inner">

				<a name="comments"></a>

				<h3 class="comments-title">

					<div class="inner">

						<?php
                        $comment_counter = wp_count_comments(get_the_ID());
                        echo $comment_counter->approved;
						echo _n( 'Comment' , 'Comments' ,$comment_counter->approved, 'hitchcock' ); ?>

					</div>

				</h3>

				<div class="comments">

					<ol class="commentlist">
					    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'hitchcock_comment' ) ); ?>
					</ol>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

						<div class="comments-nav" role="navigation">

							<div class="fleft">

								<?php previous_comments_link( '&larr; ' . __( 'Older', 'hitchcock' ) ); ?>

							</div>

							<div class="fright">

								<?php next_comments_link( __( 'Newer', 'hitchcock' ) . ' &rarr;' ); ?>

							</div>

							<div class="clear"></div>

						</div> <!-- /comment-nav-below -->

					<?php endif; ?>

				</div> <!-- /comments -->

			</div> <!-- /comments-inner -->

		<?php endif; ?>

		<?php $comments_args = array(

			'title_reply' =>
				'<div class="inner">' . __('Leave a Reply','hitchcock') . '</div>',

			'comment_notes_before' =>
				'',

			'comment_notes_after' =>
				'',

			'comment_field' =>
				'<p class="comment-form-comment">
					<textarea id="comment" name="comment" cols="45" rows="6" required placeholder="'. __('Comment','hitchcock') .'"></textarea>
				</p>',

			'fields' => apply_filters( 'comment_form_default_fields', array(

				'author' =>
					'<p class="comment-form-author">
						<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'. __('Name','hitchcock') . ( $req ? '*' : '' ) .'"/>
					</p>',

				'email' =>
					'<p class="comment-form-email">
						<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'. __('Email','hitchcock') . ( $req ? '*' : '' ) .'" />
					</p>',

				'url' =>
					'<p class="comment-form-url">
						<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'. __('Website','hitchcock') .'"/>
					</p>')
			),
		);

		comment_form($comments_args);

		?>

	</div> <!-- /comments-container -->

<?php endif; ?>
