<?php

$options = dragifywp_fw_get_options();
$ID = get_the_ID();
$setting = dragifywp_fw_get_settings($ID);
$author_id = get_the_author_meta('ID');

$wrap_class = !empty($options['single_post_has_container']) ? ' dragifywp-container' : '';

dragifywp_fw_single_post_hero_render($options, $author_id);
?>

<div class="dragifywp-page__content">
	<article id="post-<?php the_ID(); ?>" <?php post_class('dragifywp-singlePost'); ?>>
		<div class="dragifywp-entry <?php echo $wrap_class; ?>">
			<?php the_content(); ?>
		</div>

		<div class="dragifywp-container">
			<footer class="dragifywp-singlePost__footer">
				<?php
				if (dragifywp_fw_module_is_enabled('single_post_tags')) {
					dragifywp_fw_single_post_tags_render();
				}

				if(dragifywp_fw_module_is_enabled('single_post_share')){
					dragifywp_fw_single_post_share_render($options);
				}
				?>

				<div class="dragifywp-singlePost__linkPages"><?php wp_link_pages(); ?></div>

				<?php
				if (dragifywp_fw_module_is_enabled('single_post_nav')) {
					dragifywp_fw_single_post_nav_render();
				}
				?>
			</footer>
		</div>
	</article>

    <div class="dragifywp-postsNav"><?php posts_nav_link(); ?></div>

	<?php
	if (dragifywp_fw_module_is_enabled('single_post_comment') &&
		(comments_open() || get_comments_number()) && !post_password_required()) :
	?>
		<div class="dragifywp-postComment dragifywp-container">
			<div class="dragifywp-postComment__wrap lc-b">
			<?php comments_template(); ?>
			</div>
		</div><!-- post comment -->
	<?php
	endif;
	?>
</div>