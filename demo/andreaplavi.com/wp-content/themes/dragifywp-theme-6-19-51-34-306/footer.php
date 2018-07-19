<?php

$options = dragifywp_fw_get_options();
?>

</main><!--Content-->

<?php
// Render footer builder content
if (function_exists('dragifywp_footer_builder_render')) {
	dragifywp_footer_builder_render();
}

// Render go top button
if(dragifywp_fw_module_is_enabled('go_top_button')):
	$go_top_data = 'data-time="'.$options['go_top_time'].'" ';
	$go_top_data .= 'data-show-when="'.$options['go_top_show_when'].'"';
?>
	<button class="dragifywp-siteGoTopBtn" <?php echo $go_top_data; ?>>
		<i class="fa fa-chevron-up" aria-hidden="true"></i>
	</button>
<?php
endif;
?>

<?php wp_footer(); ?>

</body>
</html>
