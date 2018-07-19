<?php

class DragifyWPPageBuilder {
	// Enabling Page Builder for specific post types
	public static $accepted_post_types = array('page', 'post', 'portfolio', 'dragifywp_block');

	public function __construct() {
	}

	public static function post_type_is_accepted($post_type) {
		return in_array($post_type, self::$accepted_post_types);
	}

}