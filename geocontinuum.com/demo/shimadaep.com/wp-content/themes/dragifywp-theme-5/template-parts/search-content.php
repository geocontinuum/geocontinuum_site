<?php
$options = dragifywp_fw_get_options();

?>
<div class="dragifywp-search__header">
	<div class="dragifywp-search__bg">
		<?php if (dragifywp_fw_in_live_customizer_preview()) : ?>
		<div class="dragifywp-search__bg__image"></div>
		<?php elseif (!empty($options['search_header_bg']['sizes'])) : ?>
			<?php echo dragifywp_fw_get_lazy_image($options['search_header_bg']['sizes']); ?>
		<?php endif; ?>
	</div>
	<div class="dragifywp-search__overlay"></div>
	<div class="dragifywp-container dragifywp-search__info">
		<form class="dragifywp-search__form" role="search" method="get" action="<?php echo get_home_url(); ?>">
			<input  class="dragifywp-search__input" type="text" name="s" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" placeholder="<?php _e('Type and hit enter', 'dragifywp'); ?>" />
			<button class="dragifywp-search__submit" type="submit"><span class="fa fa-search"></span></button>
		</form>
	</div>
</div>

<div class="dragifywp-search__container dragifywp-page__content">
	<div class="dragifywp-container">
		<div class="dragifywp-search__result dragifywp-eBold lc-h lc-b"><h5><?php _e('Search results','dragifywp'); ?></h5> <span class="dragifywp-search__count"><?php echo $wp_query->found_posts.' '.__('found', 'dragifywp'); ?></span></div>
		<?php
		if (have_posts()) :
			echo '<div class="dragifywp-search__list">';
			while (have_posts()) : the_post();
				dragifywp_fw_search_item_render();
			endwhile;
			echo '</div>';
		else:
			echo '<div class="dragifywp-search__noResult">'.__('No result was found', 'dragifywp').'</div>';
		endif;
		?>
	<div>
</div>

<?php
$per_page = get_option('posts_per_page');

if ($wp_query->found_posts > $per_page) {
	echo dragifywp_fw_generate_pagination(2);
}