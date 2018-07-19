<?php
// The template for maintenance page
$options = dragifywp_fw_get_options();
$post = get_post($options['maintenance_page_id']);
setup_postdata($post);
get_header();
dragifywp_fw_page_render();
get_footer();

