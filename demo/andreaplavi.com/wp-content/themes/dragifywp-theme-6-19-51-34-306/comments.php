<?php
$options = dragifywp_fw_get_options();
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title lc-h dragifywp--eBold">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( __( '1 comment', 'dragifywp' ) );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx('%1$s comment', '%1$s comments', $comments_number, '', 'dragifywp'),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
					'callback' => 'dragifywp_fw_custom_comment_list'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments lc-d"><?php _e( 'Comments are closed.', 'dragifywp' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');

		comment_form(array(
			'class_form' => 'comment-form comment-form--hasBorder',
			'comment_field' => '<div class="comment-form-comment"><label class="dragifywp--bold" for="comment">' . _x('Comment', 'noun', 'dragifywp') .
								'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
								'</textarea></div>',
			'fields' => array(
					'author' => '<div class="dragifywp-row comment-form-fields"><div class="dragifywp-column dragifywp-col-sm-1-3 comment-form-author"><label class="dragifywp--mBold" for="author">' . __('Name', 'dragifywp') . ($req ? '<span class="required">*</span>' : "").'</label> '.
							'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
							'" size="30"' . $aria_req . ' /></div>',

					'email' => '<div class="dragifywp-column dragifywp-col-sm-1-3 comment-form-email"><label class="dragifywp--bold" for="email">' . __('Email', 'dragifywp') .($req ? '<span class="required">*</span>' : '') .'</label> ' .
							'<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
							'" size="30"' . $aria_req . ' /></div>',

					'url' => '<div class="dragifywp-column dragifywp-col-sm-1-3 comment-form-url"><label class="dragifywp--bold" for="url">' . __('Website', 'dragifywp') . '</label>' .
							'<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
							'" size="30" /></div></div>',
			),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title dragifywp--eBold">',
			'title_reply_after'  => '</h2>',
		));
	?>

</div><!-- .comments-area -->

<?php

function dragifywp_fw_custom_comment_list($comment, $args, $depth) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<footer class="dragifywp-vCard">

			<?php
			if ( 0 != $args['avatar_size'] && get_avatar( $comment, $args['avatar_size'] )):
				echo '<div class="comment-avatar">';
				$url = get_avatar_url( $comment, $args['avatar_size'] );
				echo dragifywp_fw_get_avatar('', $url);
				echo '</div>';
			endif;
			?>

			<div class="comment-metadata">
				<?php printf( sprintf( '<div class="comment-author dragifywp--bold lc-h lcs-h-p">%s</div>', get_comment_author_link() ) ); ?>
				<div class="comment-time dragifywp--subLinks">
					<time class="lc-d" datetime="<?php comment_time( 'c' ); ?>">
						<?php printf( _x( '%1$s', '1: date', 'dragifywp' ), get_comment_date('M d, Y') ); ?>
					</time>
					<?php edit_comment_link( __( 'Edit', 'dragifywp' ), '<span class="edit-link lch-d-h dragifywp--marginLeft5">', '</span>' ); ?>
				</div>
			</div><!-- .comment-metadata -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'dragifywp' ); ?></p>
			<?php endif; ?>
		</footer><!-- .comment-meta -->

		<div class="comment-content dragifywp-entry">
			<?php comment_text(); ?>
		</div><!-- .comment-content -->

		<?php
		comment_reply_link( array_merge( $args, array(
				'add_below' => 'div-comment',
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'before'    => '<div class="reply">',
				'after'     => '</div>'
		) ) );
		?>
	</article><!-- .comment-body -->
<?php

}