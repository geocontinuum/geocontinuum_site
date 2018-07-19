<?php
$options = dragifywp_fw_get_options();
$size_list = isset($options['blog_metro_size_list']) ? $options['blog_metro_size_list'] : '';
$size_list_custom = isset($options['blog_metro_size_list_custom']) ? $options['blog_metro_size_list_custom'] : '';
$sizes = dragifywp_fw_get_metro_sizes($size_list, $size_list_custom);
$sizes_temp = $sizes;

$data_animate_scroll = '';
if(!empty($options['blog_metro_scroll_effect']) && $options['blog_metro_scroll_effect'] != 'none'){
    $data_animate_scroll = ' data-animate-scroll="'.$options['blog_metro_scroll_effect'].'"';
}

$class_arrange_content = !empty($options['blog_metro_arrange_content']) ? ' '.$options['blog_metro_arrange_content'] : ' dragifywp-blogMetro--spaceBetween';


$min = array();

foreach ($sizes as $size) {
    $numerator = substr($size, 1, 1);
    $denominator = substr($size, 2, 1);

    if (empty($min) || $numerator / $denominator < $min['numerator'] / $min['denominator']) {
        $min = array(
            'numerator' => $numerator,
            'denominator' => $denominator
        );
    }
}
?>
<div class="dragifywp-blog dragifywp-blogMetro<?php echo $class_arrange_content; ?>"<?php echo $data_animate_scroll;?>>
    <div class="dragifywp-blogMetro__sizer dragifywp-metro--s<?php echo $min['numerator'] . $min['denominator'] ?>"></div>
    <?php
    $count = 0;
    while (have_posts()) : the_post();
        $count++;
        if (!count($sizes_temp)) {
            $sizes_temp = $sizes;
        }

        $metro_class = 'dragifywp-metro--' . array_shift($sizes_temp);
        $args = array();

        if (!empty($data_animate_scroll)) {
            $args['scroll_effect'] = $options['blog_metro_scroll_effect'];
        }

        dragifywp_fw_metro_post_item_render($args, array($metro_class));
        ?>
    <?php endwhile; ?>
</div>

<?php
$per_page = get_option('posts_per_page');

if (!empty($options['blog_paging_style'])) {
    if ($options['blog_paging_style'] == 'pagination') {
        if ($wp_query->found_posts > $per_page) {
            echo dragifywp_fw_generate_pagination(2, array('pagination_position' => $options['pagination_position']));
        }
    } else {
        if ($wp_query->found_posts > $count) {
            $data = dragifywp_fw_blog_get_paging_data();

            if ($options['blog_paging_style'] == 'button') {
                $config = array(
                    'settings' => array(
                        'limit' => $per_page,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'data' => $data,
                        'type' => 'metro',
                        'append_to' => '.dragifywp-blogMetro',
                        'text' => !empty($options['blog_loadmore_text']) ? $options['blog_loadmore_text'] : '',
                        'loading_text' => !empty($options['blog_loadmore_loading_text']) ? $options['blog_loadmore_loading_text'] : '',
                        'load_all_text' => !empty($options['blog_loadmore_load_all_text']) ? $options['blog_loadmore_load_all_text'] : '',
                        'masonry' => true
                    ),
                    'custom_settings' => array(
                        'sizes' => $sizes,
                        'sizes_temp' => $sizes_temp
                    ),
                    'custom_class' => 'dragifywp-blogMetro__loadMoreBtn'
                );

                if($data_animate_scroll){
                    $config['custom_settings']['scroll_effect'] = $options['blog_metro_scroll_effect'];
                }

                dragifywp_fw_load_more_button_render($config);
            } else {
                $config = array(
                    'settings' => array(
                        'limit' => $per_page,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'data' => $data,
                        'append_to' => '.dragifywp-blogMetro',
                        'type' => 'metro',
                        'masonry' => true
                    ),
                    'custom_settings' => array(
                        'sizes' => $sizes,
                        'sizes_temp' => $sizes_temp
                    ),
                    'custom_class' => 'dragifywp-blogMetro__infiniteScroller'
                );

                if($data_animate_scroll){
                    $config['custom_settings']['scroll_effect'] = $options['blog_metro_scroll_effect'];
                }

                dragifywp_fw_infinite_scroller_render($config);
            }
        }
    }
}