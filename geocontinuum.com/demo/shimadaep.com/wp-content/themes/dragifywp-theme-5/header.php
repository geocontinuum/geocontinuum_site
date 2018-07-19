<?php

$options = dragifywp_fw_get_options();

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if(!empty($options['overflow_x'])) echo 'class="dragifywp-hiddenX"'?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<?php
$body_classes = array();
$body_attrs = '';

$loading_html = '';
if(dragifywp_fw_module_is_enabled('loading_screen')){
	$body_classes[] = "dragifywp-site--loadingState";

	$data_loading = '';
	if(!empty($options['loading_class'])){
		$body_classes[] = $options['loading_class'];
		$body_attrs .= ' data-loading-class="'.$options['loading_class'].'"';
	}

	$loading_html .= '<div class="dragifywp-sitePreloader">';
	$loading_html .= '<div class="dragifywp-sitePreloader__icon dragifywp-sitePreloader__icon--'.$options['loading_icon_type'].'">';
	if($options['loading_icon_type'] == 'html'){
		$loading_html .= $options['loading_html'];
	}
	$loading_html .= '</div>';
	$loading_html .= '</div>';
	$body_attrs .= ' data-loading-delay="'.$options['loading_time_delay'].'"';
}
?>

<body <?php body_class(implode(' ', $body_classes)); ?><?php echo $body_attrs; ?>>

<?php
echo $loading_html;

if (function_exists('dragifywp_header_builder_render')) {
	dragifywp_header_builder_render();
}
?>

<main id="content" class="dragifywp-site__content">