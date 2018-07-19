<?php
$manager = DragifyWPPageBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Carousel Posts",
    "tag" => "dragifywp_carousel_posts",
    "keywords" => ["carousel posts"],
    "native" => false,
    "icon_url" => DRAGIFYWP_FW_ROOT."/page-builder-widgets/img/carousel-posts.png",
    "filter" => "other",
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Content",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.num",
                    "attrs" => array(
                        "label" => "Number of Posts",
                        "type" => "number",
                        "config" => array(
                            "min" => 2,
                            "max" => 8,
                            "step" => 1
                        )
                    ),
                    "default_value" => 6
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.start",
                    "attrs" => array(
                        "label" => "Start",
                        "type" => "number",
                        "config" => array(
                            "min" => 1,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => 1
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.categories",
                    "attrs" => array(
                        "label" => "Categories",
                        "type" => "multi-select",
                        "config" => array(
                            "message" => "Select Categories",
                            "list" => $category_obj
                        )
                    ),
                    "default_value" => ""
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.order",
                    "attrs" => array(
                        "label" => "Order",
                        "type" => "text-buttons",
                        "config" => array(
                            "options" => array(
                                "DESC" => "Descending",
                                "ASC" => "Ascending"
                            )
                        )
                    ),
                    "default_value" => "DESC"
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Settings",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.items",
                    "attrs" => array(
                        "label" => "Column",
                        "type" => "text-buttons",
                        "config" => array(
                            "options" => array(
                                "1" => "1",
                                "2" => "2",
                                "3" => "3",
                                "4" => "4",
                                "5" => "5"
                            ),
                            "class" => "column"
                        )
                    ),
                    "default_value" => "4"
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.margin",
                    "attrs" => array(
                        "label" => "Margin",
                        "type" => "selection",
                        "config" => array(
                            "0" => "0 pixel",
                            "5" => "5 pixel",
                            "10" => "10 pixel",
                            "15" => "15 pixel",
                            "20" => "20 pixel",
                            "25" => "25 pixel",
                            "30" => "30 pixel",
                            "35" => "35 pixel",
                            "40" => "40 pixel",
                            "45" => "45 pixel",
                            "50" => "50 pixel"
                        )
                    ),
                    "default_value" => "20"
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.dots",
                    "attrs" => array(
                        "label" => "Pagination",
                        "type" => "switch"
                    ),
                    "default_value" => true
                ),
                array(
                    "if" => "@attrs.dots",
                    "content" => [
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.dot_color",
                            "attrs" => array(
                                "label" => "Dots",
                                "type" => "colorpicker"
                            ),
                            "default_value" => $manager::$colors["border"],
                            "styles" => array(
                                "@id .owl-dot" => array(
                                    "backgroundColor" => "{{@model}}"
                                )
                            )
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.dot_active_color",
                            "attrs" => array(
                                "label" => "Dots Active",
                                "type" => "colorpicker"
                            ),
                            "default_value" => $manager::$colors["primary"],
                            "styles" => array(
                                "@id .owl-dot.active" => array(
                                    "backgroundColor" => "{{@model}}"
                                )
                            )
                        )
                    ]
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Container",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.c_spacing",
                    "attrs" => array(
                        "type" => "spacing",
                        "fullwidth" => true,
                        "config" => array(
                            "margin" => ["1","0","1","0"],
                            "border" => ["1","1","1","1"],
                            "padding" => ["1","1","1","1"]
                        )
                    ),
                    "default_value" => array(
                        "padding" => "0px 0px 0px 0px",
                        "margin" => "0px 0px 0px 0px",
                        "border" => "0px 0px 0px 0px"
                    ),
                    "styles" => array(
                        "@id .dragifywp-carouselPost__wrap" => array(
                            "padding" => "{{@model.padding}}",
                            "margin" => "{{@model.margin}}",
                            "borderWidth" => "{{@model.border}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.c_border_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["border"],
                    "styles" => array(
                        "@id .dragifywp-carouselPost__wrap" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.c_border_radius",
                    "attrs" => array(
                        "label" => "Border Radius",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 20,
                            "step" => 1
                        )
                    ),
                    "default_value" => 0,
                    "styles" => array(
                        "@id .dragifywp-carouselPost__wrap" => array(
                            "borderRadius" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.c_box_shadow",
                    "attrs" => array(
                        "label" => "Box Shadow",
                        "type" => "box-shadow"
                    ),
                    "default_value" => "none",
                    "styles" => array(
                        "@id .dragifywp-carouselPost__wrap" => array(
                            "boxShadow" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Image",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.image_height",
                    "attrs" => array(
                        "label" => "Height",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 20,
                            "max" => 150,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 56
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-carouselPost__img" => array(
                            "paddingBottom" => "{{@model}}%"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.image_radius",
                    "attrs" => array(
                        "label" => "Border Radius",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 20,
                            "step" => 1
                        )
                    ),
                    "default_value" => 0,
                    "styles" => array(
                        "@id .dragifywp-carouselPost__img" => array(
                            "borderRadius" => "{{@model}}px"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Spacing",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.spacing",
                    "attrs" => array(
                        "label" => "Spacing",
                        "type" => "res-area",
                        "config" => array(
                            "min" => 0,
                            "max" => 150,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "10px 0px 0px 0px"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-carouselPost__content" => array(
                            "padding" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Category",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.cat_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["desc"],
                    "styles" => array(
                        "@id .dragifywp-carouselPost__cats a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Title",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_size",
                    "attrs" => array(
                        "label" => "Font Size",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 10,
                            "max" => 60,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 16
                    ),
                    "responsive_styles" => array(
                        "@id h6" => array(
                            "fontSize" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["heading"],
                    "styles" => array(
                        "@id h6 a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_hover_color",
                    "attrs" => array(
                        "label" => "Hover Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "@id h6:hover a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_margin",
                    "attrs" => array(
                        "label" => "Margin",
                        "type" => "res-area2",
                        "config" => array(
                            "min" => -100,
                            "max" => 200,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "10px 0px 10px 0px"
                    ),
                    "responsive_styles" => array(
                        "@id h6" => array(
                            "margin" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_weight",
                    "attrs" => array(
                        "label" => "Weight",
                        "type" => "slider",
                        "config" => array(
                            "min" => 100,
                            "max" => 900,
                            "step" => 100
                        )
                    ),
                    "default_value" => 700,
                    "styles" => array(
                        "@id h6" => array(
                            "fontWeight" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_letter_spacing",
                    "attrs" => array(
                        "label" => "Letter Spacing",
                        "type" => "slider",
                        "config" => array(
                            "min" => -0.1,
                            "max" => 0.5,
                            "step" => 0.01
                        )
                    ),
                    "default_value" => 0.05,
                    "styles" => array(
                        "@id h6" => array(
                            "letterSpacing" => "{{@model}}em"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.title_transform",
                    "attrs" => array(
                        "label" => "Text Transform",
                        "type" => "text-transform"
                    ),
                    "default_value" => "uppercase",
                    "styles" => array(
                        "@id h6" => array(
                            "textTransform" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Author",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.author_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["desc"],
                    "styles" => array(
                        "@id .dragifywp-carouselPost__author" => array(
                            "color" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Hidden on",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.hidden",
                    "attrs" => array(
                        "label" => "Devices",
                        "type" => "device-hidden"
                    ),
                    "default_value" => ""
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "ID & Class",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.class",
                    "attrs" => array(
                        "label" => "Class",
                        "type" => "class"
                    ),
                    "default_value" => ""
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.id",
                    "attrs" => array(
                        "label" => "ID",
                        "type" => "id"
                    ),
                    "default_value" => ""
                )
            ]
        )
    ]
);

ob_start();
?>
    <div class="dragifywp-carousel-posts {{::$ctrl.getID()}}"
         ng-class="[$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]"
         id="{{$ctrl.edited.attrs.id}}">
        <dragifywp-shortcode tag="dragifywp_carousel_posts_content" model="$ctrl.edited"
                         attrs="['num', 'start', 'categories', 'order', 'items', 'margin', 'dots']"
                         callback="[{'function':'dragifywpLazyImage','selector':'.dragifywp-carouselPosts'},{'function':'dragifywpCarouselPosts','selector':'.dragifywp-carouselPosts'}]"></div>
<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('dragifywp_carousel_posts', 'dragifywp_carousel_posts_callback');
function dragifywp_carousel_posts_callback($attrs) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'num' => 6,
        'items' => '4',
        'margin' => '20',
        'dots' => 'false',
        'start' => 1,
        'hidden' => '',
        'order' => 'DESC',
        'categories' => ''
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';

    ob_start(); ?>
    <div class="dragifywp-carousel-posts <?php echo implode(' ', $classes); ?>"<?php echo $id; ?>>
        <?php echo do_shortcode('[dragifywp_carousel_posts_content order="' . $attrs['order'] . '" categories="' . $attrs['categories'] . '" num="'.$attrs['num'].'" dots="'.$attrs['dots'].'" items="'.$attrs['items'].'" margin="'.$attrs['margin'].'"  start="'.$attrs['start'].'" ]'); ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('dragifywp_carousel_posts_content', 'dragifywp_carousel_posts_content_callback');
function dragifywp_carousel_posts_content_callback($attrs) {
    $attrs = shortcode_atts(array(
        'order' => 'DESC',
        'dots' => 'false',
        'items' => '4',
        'margin' => '20',
        'num' => 6,
        'categories' => '',
        'start' => 1
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $categories = array();

    $args = array(
        'numberposts' => $attrs['num'],
        'order' => $attrs['order'],
        'offset' => $attrs['start'] - 1
    );

    if (!empty($attrs['categories'])) {
        $attrs['categories'] = explode(',', $attrs['categories']);

        foreach ($attrs['categories'] as $category_id) {
            $categories[] = (int)$category_id;
        }

        $args['category__in'] = $categories;
    }

    $posts = get_posts($args);

    $settings = array(
        'dots' => dragifywp_fw_theme_to_boolean($attrs['dots']),
        'items' => $attrs['items'],
        'margin' => $attrs['margin']
    );

    ob_start(); ?>
    <div class="dragifywp-carouselPosts owl-carousel" data-settings="<?php echo esc_attr(json_encode($settings)); ?>">
        <?php
        if (!empty($posts)) :
            foreach ($posts as $post) :
                $ID = $post->ID;
                $settings = dragifywp_get_settings($ID);
                echo '<div class="dragifywp-carouselPost"><div class="dragifywp-carouselPost__wrap">';
                if(has_post_thumbnail($ID)):
                    echo '<a class="dragifywp-carouselPost__img" href="'.get_the_permalink($ID).'">'.dragifywp_fw_get_post_feature_lazy_image($ID).'</a>';
                endif; ?>
                <div class="dragifywp-carouselPost__content">
                    <div class="dragifywp-carouselPost__cats dragifywp--bold">
                        <?php echo dragifywp_fw_get_category_list_html(get_the_category($ID)); ?>
                    </div>
                    <h6 class="dragifywp-carouselPost__title"><a href="<?php echo get_the_permalink($ID); ?>"><?php echo get_the_title($ID); ?></a></h6>

                    <footer class="dragifywp-carouselPost__footer">
                        <?php
                        $author_id = $post->post_author;
                        $href = get_author_posts_url($author_id);
                        $url = get_avatar_url($author_id);
                        echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-carouselPost__avatar']);
                        ?>
                        <a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-carouselPost__author"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
                    </footer>
                </div>
                <?php
                echo '</div></div>';
            endforeach;
        endif;
        ?>
    </div>
    <?php
    return ob_get_clean();
}