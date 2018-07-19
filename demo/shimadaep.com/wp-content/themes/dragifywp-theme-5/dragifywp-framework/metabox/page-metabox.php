<?php

add_action('add_meta_boxes', 'dragifywp_fw_add_page_meta_box');
function dragifywp_fw_add_page_meta_box() {
	add_meta_box('dragifywp_page_meta_box', 'Page Settings', 'dragifywp_fw_page_meta_box_render', 'page', 'normal', 'high');
}

function dragifywp_fw_page_metabox_enqueue_script(){
	$ID = get_the_ID();

	if ('page' === get_post_type($ID) ){
		wp_register_script('angularjs', DRAGIFYWP_FW_SHARE_DIR.'/js/angular.min.js', array(), '1.5.8' ,false);
		wp_enqueue_script('angularjs');

		$options = dragifywp_fw_get_options();
		$settings = dragifywp_fw_get_settings($ID);
		$settings = array_merge(array(
			'layout' => array(
				'type' => 'blank',
				'sidebar' => '0',
				'breadcrumb' => false,
				'feature_image' => false
			),
			'addition' => array(
				'before' => '',
				'after' => ''
			)
		), $settings);

		$redirect_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		if (is_ssl()) {
			$redirect_url = 'https://' . $redirect_url;
		} else {
			$redirect_url = 'http://' . $redirect_url;
		}

		$data = array(
			"settings" => $settings,
			"sidebars" => isset($options['sidebars']) ? $options['sidebars'] : new stdClass(),
			"img_dir" => DRAGIFYWP_FW_ROOT.'/metabox/img',
			'api' => get_rest_url() . 'dragifywp-page-setting/v1',
			'post_id' => $ID,
			'nonce' => wp_create_nonce('wp_rest'),
			'login_url' => wp_login_url($redirect_url)
		);
		wp_register_script('dragifywp_page_metabox_js', DRAGIFYWP_FW_ROOT.'/metabox/dist/js/page.metabox.min.js', array(), DRAGIFYWP_FW_VERSION, false);
		wp_localize_script('dragifywp_page_metabox_js', 'dragifywp_mb_data', $data );
		wp_enqueue_script('dragifywp_page_metabox_js');

		wp_register_script('select2', DRAGIFYWP_FW_SHARE_DIR.'/js/select2.full.min.js', array(), '1.0', false);
		wp_enqueue_script('select2');

		wp_register_style('dragifywp_page_metabox_js', DRAGIFYWP_FW_ROOT.'/metabox/dist/css/page.metabox.css');
		wp_enqueue_style('dragifywp_page_metabox_js');
	}
}

add_action('admin_print_styles-post.php', 'dragifywp_fw_page_metabox_enqueue_script');
add_action('admin_print_styles-post-new.php', 'dragifywp_fw_page_metabox_enqueue_script');

function dragifywp_fw_page_meta_box_render() {
	wp_nonce_field( basename( __FILE__ ), 'meta_box_nonce' );
	echo "<div ng-app='dragifywp.page.metabox' ng-controller='dragifywp.page.metabox.controller'><page-metabox></page-metabox></div>";
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function page_save_meta_box_data( $post_id ){
	if (isset($_POST['post_type']) && 'page' != $_POST['post_type']){
		return;
	}

	// verify taxonomies meta box nonce
	if ( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	$settings = json_decode(preg_replace('/\\\\(.)/', '$1', $_POST['dragifywp-settings']), true);

	if (json_last_error() == JSON_ERROR_NONE) {
		update_post_meta($post_id, 'dragifywp-settings', $settings);
	}
}
add_action( 'save_post', 'page_save_meta_box_data' );

add_action('rest_api_init', function() {
	$base_api = 'dragifywp-page-setting/v1';

	register_rest_route($base_api, '/settings', array(
		'methods' => WP_REST_Server::CREATABLE,
		'callback' => function($request_data) {
			$params = $request_data->get_params();
			$id = $params['id'];
			$settings = json_decode($params['settings'], true);

			if (json_last_error() == JSON_ERROR_NONE) {
				update_post_meta($id, 'dragifywp-settings', $settings);
				return 1;
			}

			return -1;
		},
		'permission_callback' => function($request_data) {
			if (!current_user_can('edit_posts')) {
				return new WP_Error('dragifywp_fw_forbidden_context', 'You are not allowed to save page setting', array('status' => 403));
			}

			return true;
		}
	));
});