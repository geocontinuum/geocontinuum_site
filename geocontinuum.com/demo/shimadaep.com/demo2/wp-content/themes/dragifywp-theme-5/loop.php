<?php
	$options = dragifywp_fw_get_options();

	if (dragifywp_fw_module_is_enabled('blog_hero_slide')) {
		$display = !empty($options['blog_hero_slide_display']) ? $options['blog_hero_slide_display'] : 'blog';

		if ((is_home() && in_array($display, array('blog', 'both')))
				|| (!is_home() && in_array($display, array('archive', 'both')))) {
			dragifywp_fw_get_blog_hero_slide();
		}
	}

	if (dragifywp_fw_module_is_enabled('blog_header') && !is_home()) {
		dragifywp_fw_get_blog_header();
	}

	echo '<div class="dragifywp-blog__wrap">';

	if (have_posts()) {
		$blog_style = !empty($options['blog_style']) ? $options['blog_style'] : 'classic-grid';

		get_template_part('template-parts/blog', $blog_style);
	}  else {
		get_template_part('template-parts/blog', 'none');
	}

	echo '</div>';
?>