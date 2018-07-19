<?php
require_once "widgets/widgets.php";
require_once "section-dividers/section-divider-switcher.php";
require_once('DragifyWPPageBuilderAPI.php');
require_once('DragifyWPPageBuilder.php');
require_once "DragifyWPPageBuilderAdmin.php";
require_once "DragifyWPPageBuilderClient.php";
require_once 'DragifyWPBlockWidget.php';

function lpb_register_widgets() {
	register_widget('DragifyWPBlockWidget');
}
add_action('widgets_init', 'lpb_register_widgets');