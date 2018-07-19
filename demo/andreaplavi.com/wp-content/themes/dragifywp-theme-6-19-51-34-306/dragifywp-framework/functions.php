<?php

/**
 * Render breadcrumbs links for pages
 */
function dragifywp_fw_breadcrumbs() {
	// Settings
	$separator          = '»';
	$breadcrums_id      = 'dragifywp-breadcrumb__link';
	$breadcrums_class   = 'dragifywp-breadcrumb__link';
	$home_title         = 'Home';

	// Get the query & post information
	global $post;

	// Do not display on the homepage
	if ( !is_front_page() ) {

		// Build the breadcrums
		echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

		// Home page
		echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		echo '<li class="separator separator-home"> ' . $separator . ' </li>';

		if ( is_page() ) {

			// Standard page
			if( $post->post_parent ){

				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );

				// Get parents in the right order
				$anc = array_reverse($anc);

				// Parent page loop
				if ( !isset( $parents ) ) $parents = null;
				foreach ( $anc as $ancestor ) {
					$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
					$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
				}

				// Display parent pages
				echo $parents;

				// Current page
				echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

			} else {

				// Just display current page if not parents
				echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

			}

		} elseif ( is_404() ) {

			// 404 page
			echo '<li>' . 'Error 404' . '</li>';
		}

		echo '</ul>';

	}

}

function get_image_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach (get_intermediate_image_sizes() as $_size) {
		if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
			$sizes[$_size]['width'] = get_option("{$_size}_size_w");
			$sizes[$_size]['height'] = get_option("{$_size}_size_h");
			$sizes[$_size]['crop'] = (bool)get_option("{$_size}_crop");
		} elseif (isset($_wp_additional_image_sizes[$_size])) {
			$sizes[$_size] = array(
				'width'  => $_wp_additional_image_sizes[$_size]['width'],
				'height' => $_wp_additional_image_sizes[$_size]['height'],
				'crop'   => $_wp_additional_image_sizes[$_size]['crop'],
			);
		}
	}

	return $sizes;
}

function dragifywp_fw_get_image_size($size) {
	$sizes = get_image_sizes();

	if (isset($sizes[$size])) {
		return $sizes[$size];
	}

	return false;
}

/**
 * Get width of a given image from $size object
 * 
 * @param object $size the image object size
 */
function dragifywp_fw_get_image_width($size) {
	if (! $size = dragifywp_fw_get_image_size($size)) {
		return false;
	}

	if (isset( $size['width'])) {
		return $size['width'];
	}

	return false;
}

/**
 * Get height of a given image from $size object
 * 
 * @param $size the image object size
 */
function dragifywp_fw_get_image_height($size) {
	if (! $size = dragifywp_fw_get_image_size($size)) {
		return false;
	}

	if (isset($size['height'])) {
		return $size['height'];
	}

	return false;
}

function dragifywp_fw_get_fw_image($name='article.png'){
	return DRAGIFYWP_FW_ROOT.'/img/'.$name;
}

/**
 * Check whether the url exists or not
 * 
 * @param string $file the file directory
 */
function dragifywp_fw_exist_url($file) {
	$file_headers = @get_headers($file);
	return stripos($file_headers[0],"200 OK") ? true : false;
}

/**
 * Render pagination buttons for blog
 * 
 * @param int $range the alpha value to limit number of buttons
 * @param object $args settings
 */
function dragifywp_fw_generate_pagination($range = 2, $args = array()) {
	global $paged, $wp_query;

	$pagination = '';
	$pages = $wp_query->max_num_pages;

	if (empty($paged)) $paged = 1;
	if (empty($pages)) $pages = 1;

	if ($pages != 1) {
		$pagination .= '<div class="dragifywp-blogPagination">';
		$prev_disabled = '';
		$next_disabled = '';

		if ($paged == 1) {
			$prev_disabled = 'dragifywp-blogPagination__link--disabled';
		}

		if ($paged == $pages) {
			$next_disabled = 'dragifywp-blogPagination__link--disabled';
		}

		$pagination .= '<a href="' . get_pagenum_link($paged - 1) . '" class="dragifywp-blogPagination__prev ' . $prev_disabled . '">« Prev</a>';

		$start = $paged - $range;
		$end = $paged + $range;

		if ($start < 1) {
			$start = 1;
		}

		if ($end > $pages) {
			$end = $pages;
		}

		if ($start > 1) {
			$pagination .= '<a href="' . get_pagenum_link(1) . '" class="dragifywp-blogPagination__btn">1</a>';

			if ($start > 2) {
				$pagination .= '<span>...</span>';
			}
		}

		for ($i = $start; $i <= $end; $i++) {
			$current = '';

			if ($i == $paged) {
				$current = 'dragifywp-blogPagination__link--current';
			}

			$pagination .= '<a href="' . get_pagenum_link($i) . '" class="dragifywp-blogPagination__btn ' . $current . '">' . $i . '</a>';
		}

		if ($end < $pages) {
			if ($end < $pages - 1) {
				$pagination .= '<span>...</span>';
			}

			$pagination .= '<a href="' . get_pagenum_link($pages) . '" class="dragifywp-blogPagination__btn">' . $pages . '</a>';
		}

		$pagination .= '<a href="' . get_pagenum_link($paged + 1) . '" class="dragifywp-blogPagination__next ' . $next_disabled . '">Next »</a>';

		$pagination .= '</div>';
	}

	return $pagination;
}

if(!function_exists('dragifywp_fw_get_settings')) {
	function dragifywp_fw_get_settings($ID) {
		$settings = get_post_meta($ID, 'dragifywp-settings', true);
		return !empty($settings) && is_array($settings) ? $settings : array();
	}
}

/**
 * Render hero section containing feature image with paralax effect
 * 
 * @param object $options the global dragifywp_options from get_options func
 * @param string $custom_class
 */
function dragifywp_fw_get_page_hero_section($options, $custom_class = '') {
	$hero_class = array();

	if(!empty($options['page_hero_parallax'])){
		$hero_class[] = 'dragifywp-page__hero--parallax';
	}

	?>
	<div class="dragifywp-page__hero <?php echo implode(' ', $hero_class); ?>">
		<?php
		if(has_post_thumbnail()):
			$bg_class = ['dragifywp-hero__background__image'];
			$bg_class[] = 'dragifywp-' . $custom_class . '__hero__background';

		?>
		<div class="dragifywp-hero__background">
			<?php
			echo dragifywp_fw_get_post_feature_lazy_image();
			?>
		</div>
		<?php
		endif;
		?>
		<div class="dragifywp-hero__overlay"></div>

		<div class="dragifywp-container">
			<div class="dragifywp-page__hero__content dragifywp-page__column">
				<h1 class="dragifywp-page__hero__title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Render blog slideshow, the settings get from the global dragifywp_options
 */
function dragifywp_fw_get_blog_hero_slide() {
	$options = dragifywp_fw_get_options();

	$post_params = array(
		'posts_per_page' => !empty($options['blog_hero_slide_num_post']) ? $options['blog_hero_slide_num_post'] : 3,
		'post_status' => 'publish'
	);

	if (is_category()) {
		$post_params['category'] = get_query_var('cat');
	} else if (is_tag()) {
		$post_params['tag'] = get_query_var('tag');
	} else if (is_author()) {
		$post_params['author'] = get_query_var('author');
	} else if (is_date()) {
		$post_params['date_query'] = array();

		if (get_query_var('year')) {
			$post_params['date_query']['year'] = get_query_var('year');
		}

		if (get_query_var('month')) {
			$post_params['date_query']['month'] = get_query_var('month');
		}

		if (get_query_var('day')) {
			$post_params['date_query']['day'] = get_query_var('day');
		}
	}

	$slide_settings = array();
    $slide_settings['effect'] = !empty($options['blog_hero_slide_effect']) ? $options['blog_hero_slide_effect'] : 'fade';
    $slide_settings['autoplay'] = !empty($options['blog_hero_slide_autoplay']);
    $slide_settings['pagination'] = !empty($options['blog_hero_slide_pagination']);
    $slide_settings['nav'] = !empty($options['blog_hero_slide_nav']);


	echo dragifywp_fw_slideshow_post_render($slide_settings, $post_params);
}

/**
 * Render a container to hold the page breadcrumbs
 */
function dragifywp_fw_get_page_breadcrumb($custom_class='') {
	if(empty($custom_class)){
		$custom_class = 'p';
	}
	?>
	<div class="dragifywp-breadcrumb">
		<div class="dragifywp-container">
			<div class="dragifywp-breadcrumb__left">
				<h3 class="dragifywp-breadcrumb__title<?php echo ' dragifywp-' . $custom_class . '__breadcrumb__title'; ?>"><span><?php the_title(); ?></span></h3>
			</div>
			<div class="dragifywp-breadcrumb__right">
				<?php
					dragifywp_fw_breadcrumbs();
				?>
			</div>
		</div>
	</div>
	<?php
}

function dragifywp_fw_get_blog_header() {
	$title = '';

	if (is_category()) {
		$category = get_term(get_query_var('cat'));
		$title = $category->name;
	} else if (is_tag()) {
		$title = get_query_var('tag');
	} else if (is_author()) {
		$title = get_the_author_meta('display_name', get_query_var('author'));
	} else if (is_date()) {
		$year = get_query_var('year');
		$month = get_query_var('monthnum');
		$day = get_query_var('day');

		$title = $year;

		if ($month) {
			$title .= '/' . $month;
		}

		if ($day) {
			$title .= '/' . $day;
		}
	}
	?>
	<div class="dragifywp-blogHeader">
		<div class="dragifywp-container">
			<h4 class="dragifywp-blogHeader__label dragifywp--eBold lc-h"><?php echo ucfirst($title); ?></h4>
		</div>
	</div>
	<?php
}

/**
 * Check whether the blog archive page is categorized by slug, date or author, etc...
 */
function dragifywp_fw_blog_get_paging_data() {
	$data = array();

	if (is_category()) {
		$data['type'] = 'category';
		$data['data'] = array(get_query_var('cat'));
	} else if (is_tag()) {
		$data['type'] = 'tag';
		$data['data'] = get_query_var('tag');
	} else if (is_author()) {
		$data['type'] = 'author';
		$data['data'] = get_query_var('author');
	} else if (is_date()) {
		$data['type'] = 'date';
		$data['data'] = array(
			'year' => get_query_var('year'),
			'month' => get_query_var('monthnum'),
			'day' => get_query_var('day')
		);
	} else {
		$data['type'] = 'posts';
	}

	return $data;
}

/**
 * Get the global options dragifywpOptions
 * the object is controlled by DRAGIFYWP Site Options and Live Customizer
 */
function dragifywp_fw_get_options() {
	$options = get_option('dragifywpOptions');
	return !empty($options) && is_array($options) ? $options : array();
}

function dragifywp_fw_get_category_list_html($categories, $limit = null, $class = '', $separate = ', ', $link = true) {
	$categories_html = array();
	$limit = absint($limit);

	if (!empty($categories)) {
		if (!empty($limit)) {
			$categories = array_slice($categories, 0, $limit);
		}

		if($link){
			foreach ($categories as $category) {
				$categories_html[] = '<a href="' . get_category_link($category->term_id) . '" class="' . $class . '">' . $category->name . '</a>';
			}
		}else{
			foreach ($categories as $category) {
				$categories_html[] = $category->name;
			}
		}

	}

	return implode($separate, $categories_html);
}

/**
 * Just to debug an object or array
 * 
 * @param object | array $var the item you want to debug
 */
function dragifywp_fw_debug($var) {
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	die;
}

function dragifywp_fw_connect_fs($url) {
	require_once(ABSPATH . '/wp-admin/includes/file.php');

	global $wp_filesystem;

	if(false === ($credentials = request_filesystem_credentials($url, '', false))) {
		return false;
	}

	if(!WP_Filesystem($credentials)) {
		request_filesystem_credentials($url, '', true);
		return false;
	}

	return true;
}

/**
 * Shorten a given content based on length
 * 
 * @param string $content
 * @param int $length
 */
function dragifywp_fw_trim_excerpt($content, $length = 10) {
	$content = explode(' ', $content);

	if (count($content) > $length) {
		$content = array_slice($content, 0, $length);

		if ($content[count($content) - 1] != '...') {
			$content[] = '...';
		}
	}

	return implode(' ', $content);
}

function dragifywp_fw_get_thumb($href, $url, $classes=[]){
	$classes[] = 'dragifywp-lazyImage';
	$classes[] = 'dragifywp-thumb';
	if($href){
		$href = ' href="'.$href.'"';
		$tag = 'a';
	}else{
		$tag = 'div';
	}

	$src = Array();
	$src['full'] = $url;

	return '<'.$tag.$href.' class="'.implode($classes,' ').'" data-src="'.esc_attr(json_encode($src)).'"></'.$tag.'>';
}

/**
 * Get the author avatar of a post and wrap it in an <a></a> tag
 * 
 * @param string link to the author archive page
 * @param object list of images based on size
 * @param array list of extra classes
 */
function dragifywp_fw_get_avatar($href, $url, $classes=[]){
	$classes[] = 'dragifywp-lazyImage';
	$classes[] = 'dragifywp-avatar';
	if($href){
		$href = ' href="'.$href.'"';
		$tag = 'a';
	}else{
		$tag = 'div';
	}

	$src = Array();
	$src['full'] = $url;

	return '<'.$tag.$href.' class="'.implode($classes,' ').'" data-src="'.esc_attr(json_encode($src)).'"></'.$tag.'>';
}

function dragifywp_fw_get_metro_sizes($size_list, $size_list_custom) {
	$sizes = '';

	if (!empty($size_list)) {
		if ($size_list == 'custom') {
			$sizes = !empty($size_list_custom) ? $size_list_custom : '';
		} else {
			$sizes = $size_list;
		}
	}

	if (empty($sizes)) {
		$sizes = 's14';
	}

	return explode(',', str_replace(' ', '', $sizes));
}

/**
 * Check whether the current page is in DRAGIFYWP Live Customizer or not
 */
function dragifywp_fw_in_live_customizer_preview() {
	return isset($_GET['dragifywp-preview-enable']);
}

/**
 * Check a string variable is boolean type or not, normally used in a Shortcode
 * 
 * @param string $val "true" or "false"
 */
function dragifywp_fw_theme_to_boolean($val) {
	return filter_var($val, FILTER_VALIDATE_BOOLEAN);
}

function dragifywp_fw_get_post_feature_lazy_image($id = null, $sizes = null, $method = '') {
	$html = '';
	if(!$id){
		$id = get_the_ID();
	}
	if ( has_post_thumbnail($id) ) {
		$thumb_id = get_post_thumbnail_id($id);

		$urls = array();
		if(is_array($sizes) && count($sizes)){
			$matches = array("full" => "full", "large" => "1024", "medium_large" => "768", "medium" => "300");
			$urls = array();
			foreach ($sizes as $item) {
				$url = wp_get_attachment_image_src( $thumb_id, $item );
				if($url){
					$urls[$matches[$item]] = $url[0];
				}
			}
		}

		if(!count($urls)){
			$urls = array(
				"full" => wp_get_attachment_image_src($thumb_id, 'full' )[0],
			);

			$large = wp_get_attachment_image_src($thumb_id, 'large' );
			if($large){
				$urls["1024"] = $large[0];
			}

			$medium_large = wp_get_attachment_image_src($thumb_id, 'medium_large' );
			if($large){
				$urls["768"] = $medium_large[0];
			}

			$medium = wp_get_attachment_image_src($thumb_id, 'medium' );
			if($large){
				$urls["300"] = $medium[0];
			}
		}

		$data_method = '';
		if(!empty($method) && $method != 'scroll-to-load'){
			$data_method = ' data-method="' . $method . '"';
		}

		$html = '<div class="dragifywp-lazyImage" data-src="' . esc_attr(json_encode($urls)) . '"' . $data_method . '></div>';
	}

	return $html;
}