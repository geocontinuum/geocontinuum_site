<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('DragifyWPMenu')) :

    final class DragifyWPMenu {

        public function __construct() {
            $this->includes();
        }

        private function includes() {
            require_once 'admin/custom-menu-item-types.php';
            require_once DRAGIFYWP_DIR_PATH . '/header-builder/megamenu/includes/DragifyWPMenuWalker.php';
            require_once DRAGIFYWP_DIR_PATH . '/header-builder/megamenu/includes/functions.php';
            require_once DRAGIFYWP_DIR_PATH . '/header-builder/megamenu/includes/menuitems/menuitems.php';
        }

    }

endif;


$options = get_option('dragifywpOptions');

if(!isset($options["megamenu_enable"]) || (isset($options["megamenu_enable"]) && $options["megamenu_enable"])){
    new DragifyWPMenu();
}
