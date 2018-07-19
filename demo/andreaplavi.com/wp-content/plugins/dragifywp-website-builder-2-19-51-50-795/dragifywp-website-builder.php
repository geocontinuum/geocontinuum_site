<?php
/*
Plugin Name: DragifyWP Website Builder
Plugin URI: https://popnetmedia.com
Description: A combination of visual editors help you quickly to build completed web pages including headers, footers, page content & global style with drag n drop and real time editing feature.
Author: popnetmedia.com
Author URI: https://popnetmedia.com
Version: 1.2.2
Text Domain:
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

define('DRAGIFYWP_PLUGIN_PATH', __FILE__);
define('DRAGIFYWP_DIR_PATH', plugin_dir_path(__FILE__));
define('DRAGIFYWP_CORE_ROOT', plugins_url('', __FILE__));
define('DRAGIFYWP_SO_DIR', DRAGIFYWP_CORE_ROOT.'/site-options');
define('DRAGIFYWP_PB_DIR', DRAGIFYWP_CORE_ROOT.'/page-builder');
define('DRAGIFYWP_FB_DIR', DRAGIFYWP_CORE_ROOT.'/footer-builder');
define('DRAGIFYWP_HB_DIR', DRAGIFYWP_CORE_ROOT.'/header-builder');
define('DRAGIFYWP_APP_VERSION', '1.2.1');
define('DRAGIFYWP_DEBUG_MODE', false);

require_once('functions.php');
require_once('modules/DragifyWPWebsiteBuilderAPI.php');
require_once('client/client_enqueue_scripts.php');
require_once('site-options/app.php');
require_once('footer-builder/app.php');
require_once('header-builder/app.php');
require_once('page-builder/app.php');
?>
