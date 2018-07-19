<?php

define('DRAGIFYWP_FW_ROOT', get_template_directory_uri().'/dragifywp-framework');
define('DRAGIFYWP_FW_DIR', get_template_directory() . '/dragifywp-framework');
define('DRAGIFYWP_FW_SHARE_DIR', get_template_directory_uri().'/dragifywp-framework/share-resources');
define('DRAGIFYWP_FW_VERSION', '1.0');
define('DRAGIFYWP_FW_DEV', false);

require_once ABSPATH . '/wp-admin/includes/plugin.php';
require_once 'page-builder-widgets/require.php';
require_once 'theme-setup.php';
require_once 'DragifyWPPageLayout.php';
require_once 'DragifyWPSingleLayout.php';
require_once 'DragifyWPBlogLayout.php';
require_once 'functions.php';
require_once 'metabox/page-metabox.php';
require_once 'metabox/sidebars.php';
require_once 'DragifyWPTheme.php';
require_once 'render.php';
require_once 'site-options/require.php';