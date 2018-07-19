<?php

add_action('widgets_init', 'dragifywp_fw_sidebars_init');
function dragifywp_fw_sidebars_init() {
	$options = dragifywp_fw_get_options();

	if (!empty($options['sidebars']) && is_array($options['sidebars'])) {
		foreach ($options['sidebars'] as $sidebar) {
			register_sidebar( array(
				'name' => $sidebar['name'],
				'id' => 'dragifywp-sidebar-' . $sidebar['id'],
				'description' => 'Widget',
				'before_widget' => '<li id="%1$s" class="dragifywp-widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="dragifywp-widget__title">',
				'after_title'   => '</h2>',
			) );
		}
	}
}