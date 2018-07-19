<?php
function dragifywp_client_enqueue_scripts(){
    $options = dragifywp_get_option();

    $data = array(
        'api' => get_rest_url() . 'dragifywp-website-builder/v1',
        'nonce' => wp_create_nonce('wp_rest'),
        'parallax_delta' => 3
    );

    if (!empty($options['google_map_api_key'])) {
        $data['map_api_key'] = $options['google_map_api_key'];
    }

    if (!empty($options['parallax_bg_delta'])) {
        $data['parallax_delta'] = $options['parallax_bg_delta'];
    }

    if (current_user_can('edit_theme_options')) {
        $data['theme_options_url'] = admin_url('admin.php?page=dragifywp-options');
    }

    wp_enqueue_script('jquery');

    wp_register_script('dragifywp_builder_js', DRAGIFYWP_CORE_ROOT . '/client/dist/js/core.min.js', array('jquery'), DRAGIFYWP_APP_VERSION);
    wp_localize_script('dragifywp_builder_js', 'dragifywp_builder_data', $data);
    wp_enqueue_script('dragifywp_builder_js');

    wp_register_style('fontawesome', DRAGIFYWP_CORE_ROOT.'/modules/3rd/fontawesome/font-awesome.min.css',array(), '4.7.0', 'screen');
    wp_enqueue_style('fontawesome');

    wp_register_style('linearicons_free',DRAGIFYWP_CORE_ROOT.'/modules/3rd/linearicon-free/style.css',array(), '1.0.0', 'screen');
    wp_enqueue_style('linearicons_free');

    wp_register_style('dragifywp_builder_css', DRAGIFYWP_CORE_ROOT . '/client/dist/css/main.min.css', array(), DRAGIFYWP_APP_VERSION, 'all');
    wp_enqueue_style('dragifywp_builder_css');

    // Enqueue external widget scripts
    DragifyWPHeaderBuilderWidgetManager::enqueue_scripts();
    DragifyWPPageBuilderWidgetManager::enqueue_scripts();
    DragifyWPFooterBuilderWidgetManager::enqueue_scripts();
}

add_action("wp_enqueue_scripts", 'dragifywp_client_enqueue_scripts', 12);