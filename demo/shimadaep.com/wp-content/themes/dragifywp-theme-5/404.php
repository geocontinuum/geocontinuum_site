<?php
// Page not found template
$options = dragifywp_fw_get_options();

if (!empty($options['error_page_id']) && get_post_type($options['error_page_id']) == 'page' && get_post_status($options['error_page_id']) == 'publish') {
	$post = get_post($options['error_page_id']);
	setup_postdata($post);
	get_header();
	dragifywp_fw_page_render();
	get_footer();
}

