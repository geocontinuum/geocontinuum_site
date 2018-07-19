<?php

class DragifyWPMenuItemColumn extends DragifyWPMenuItem {

	protected $type = 'column';

	function get_start_el() {
		$width = get_post_meta($this->item->ID, '_dragifywp_menu_item_column_width', true);
		$width = ' data-width="' . $width . '"';
		$output = '<li class="dragifywp-menu-column dragifywp-menu-column-id-' . $this->item->ID . '"' . $width . '>';
		$title = sanitize_text_field(get_post_meta($this->item->ID, '_dragifywp_menu_item_column_title', true));
		$type = property_exists($this->args, 'type') ? $this->args->type : '';

		if (!empty($title)) {
			$output .= '<h6 class="dragifywp-menu-column-title">';
			$output .= '<span>';
			$output .= $title;

			if ($type == 'toggle') {
				$output .= '<i class="fa fa-angle-down" aria-hidden="true"></i>';
			}

			$output .= '</span>';
			$output .= '</h6>';
		}

		return $output;
	}

	function get_end_el() {
		$output = '</li>';

		return $output;
	}

}