<?php

require_once 'DragifyWPMenuItem.php';
require_once 'DragifyWPMenuItemDefault.php';
require_once 'DragifyWPMenuItemRow.php';
require_once 'DragifyWPMenuItemColumn.php';

add_filter('dragifywpmenu_item_object_class', 'dragifywpmenu_get_item_object_class', 10, 1);
function dragifywpmenu_get_item_object_class($item) {
	$item_type = get_post_meta($item->db_id, '_dragifywpmenu_item_type', true);

	switch ($item_type) {
		case 'row':
			$class = 'DragifyWPMenuItemRow';
			break;
		case 'column':
			$class = 'DragifyWPMenuItemColumn';
			break;
		default:
			$class = 'DragifyWPMenuItemDefault';
			break;
	}

	return $class;
}