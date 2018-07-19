<?php
// Inital setup for the theme

function dragifywp_fw_setup() {
    load_theme_textdomain('dragifywp', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');

    register_nav_menus( array(
        'primary' => __('Primary Menu', 'dragifywp')
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}

add_action('after_setup_theme', 'dragifywp_fw_setup');

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since DragifyWP 1.0
 */
function dragifywp_fw_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'dragifywp_fw_javascript_detection', 0);


/**
 * Enqueues scripts and styles.
 *
 * @since DragifyWP 1.0
 */
function dragifywp_fw_scripts() {
    $options = dragifywp_fw_get_options();

    if (!is_admin()) {
        wp_enqueue_style('dragifywp_fw_theme_style', DRAGIFYWP_FW_ROOT . '/theme-scripts/dist/css/main.css', array(), null);
        wp_register_script('dragifywp_fw_theme_script', DRAGIFYWP_FW_ROOT . '/theme-scripts/dist/js/main.min.js', array('jquery'), DRAGIFYWP_FW_VERSION, false);

        $translation = array(
            'api' => get_rest_url() . 'dragifywp-theme/v1',
            'nonce' => wp_create_nonce('wp_rest')
        );

        if(dragifywp_fw_module_is_enabled('animated_link')){
            $translation['animated_link'] = array(
                'domain' => $_SERVER['HTTP_HOST'],
                'selector' => $options['animated_link_selector'],
                'delay' => $options['animated_link_delay'],
                'scroll'=> $options['animated_link_scroll_top'],
                'scrollDelay' => $options['animated_link_scroll_delay']
            );
        };

        if (current_user_can('edit_theme_options')) {
            $translation['theme_options_url'] = admin_url('admin.php?page=dragifywp-options');
        }

        wp_localize_script('dragifywp_fw_theme_script', 'dragifywp_theme_data', $translation);
        wp_enqueue_script('dragifywp_fw_theme_script');
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'dragifywp_fw_scripts');

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since DragifyWP 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function dragifywp_fw_content_image_sizes_attr( $sizes, $size ) {
    $options = dragifywp_fw_get_options();

    if (is_archive() || is_home()) {
        if ($options['blog_style'] == 'classic' && !empty($options['classic_blog_image_responsive'])) {
            $sizes = DragifyWPTheme::getImageSizes($options['classic_blog_image_responsive']);
        } else if ($options['blog_style'] == 'image-grid' && !empty($options['grid_blog_image_responsive'])) {
            $sizes = DragifyWPTheme::getImageSizes($options['grid_blog_image_responsive']);
        }
    } else if (is_page() && !empty($options['page_image_responsive'])) {
        $sizes = DragifyWPTheme::getImageSizes($options['page_image_responsive']);
    }  else if (is_single() && !empty($options['post_image_responsive'])) {
        $sizes = DragifyWPTheme::getImageSizes($options['post_image_responsive']);
    }

    return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'dragifywp_fw_content_image_sizes_attr', 10 , 2 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since DragifyWP 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function dragifywp_fw_widget_tag_cloud_args($args) {
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    return $args;
}
add_filter('widget_tag_cloud_args', 'dragifywp_fw_widget_tag_cloud_args');

function dragifywp_fw_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'dragifywp_fw_excerpt_more');

add_theme_support('title-tag');

add_action('init', 'dragifywp_fw_add_excerpt_to_page');
function dragifywp_fw_add_excerpt_to_page() {
    add_post_type_support('page', 'excerpt');
}

add_filter('attachment_link', 'dragifywp_fw_attachment_link_filter', 10, 2);
function dragifywp_fw_attachment_link_filter($link, $id) {
    return wp_get_attachment_url($id);
}

add_filter('site_transient_update_plugins', 'dragifywp_fw_cf_remove_update_notifications');
function dragifywp_fw_cf_remove_update_notifications($value) {
	if (!empty($value) && is_object($value) && !empty($value->response)) {
		foreach ($value->response as $path => $plugin) {
			if ($plugin->slug == 'contact-form-7') {
				unset($value->response[$path]);
			}
		}
	}

	return $value;
}
?>