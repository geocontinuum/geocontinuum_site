<?php
$manager = DragifyWPPageBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Banner Posts",
    "tag" => "dragifywp_banner_posts",
    "keywords" => ["banner posts"],
    "native" => false,
    "icon_url" => DRAGIFYWP_FW_ROOT."/page-builder-widgets/img/banner-posts.png",
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
                "label" => "Image",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.huge_image",
                    "attrs" => array(
                        "label" => "Left",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 20,
                            "max" => 150,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 60
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-hugeBannerPost__img" => array(
                            "paddingBottom" => "{{@model}}%"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.small_image",
                    "attrs" => array(
                        "label" => "Right",
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
                        "@id .dragifywp-smallBannerPost__img" => array(
                            "paddingBottom" => "{{@model}}%"
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
                    "bind_to" => "@attrs.huge_spacing",
                    "attrs" => array(
                        "label" => "Left",
                        "type" => "res-area",
                        "config" => array(
                            "min" => 0,
                            "max" => 150,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "10px 10px 10px 10px",
                        "tablet" => "10px 10px 30px 10px",
                        "mobile" => "10px 0px 30px 0px"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-hugeBannerPost__content" => array(
                            "margin" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.small_spacing",
                    "attrs" => array(
                        "label" => "Right",
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
                        "@id .dragifywp-smallBannerPost__content" => array(
                            "margin" => "{{@model}}"
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
                        "@id .dragifywp-bannerPosts__cats a" => array(
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
                    "bind_to" => "@attrs.huge_title_size",
                    "attrs" => array(
                        "label" => "Left Size",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 10,
                            "max" => 60,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 26
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-hugeBannerPost__title" => array(
                            "fontSize" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.small_title_size",
                    "attrs" => array(
                        "label" => "Right Size",
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
                        "@id .dragifywp-smallBannerPost__title" => array(
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
                    "bind_to" => "@attrs.huge_title_margin",
                    "attrs" => array(
                        "label" => "Left Margin",
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
                        "@id .dragifywp-hugeBannerPost__title" => array(
                            "margin" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.small_title_margin",
                    "attrs" => array(
                        "label" => "Right Margin",
                        "type" => "res-area2",
                        "config" => array(
                            "min" => -100,
                            "max" => 200,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "5px 0px 10px 0px"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-smallBannerPost__title" => array(
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
                        "@id h6 a" => array(
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
                        "@id h6 a" => array(
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
                        "@id h6 a" => array(
                            "textTransform" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Excerpt",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.excerpt_size",
                    "attrs" => array(
                        "label" => "Left Size",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 10,
                            "max" => 60,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 14
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-hugeBannerPost__excerpt" => array(
                            "fontSize" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.excerpt_line_height",
                    "attrs" => array(
                        "label" => "Line Height",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0.5,
                            "max" => 3,
                            "step" => 0.1
                        )
                    ),
                    "default_value" => 1.5,
                    "styles" => array(
                        "@id .dragifywp-hugeBannerPost__excerpt" => array(
                            "lineHeight" => "{{@model}}em"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.excerpt_margin",
                    "attrs" => array(
                        "label" => "Margin",
                        "type" => "res-area2",
                        "config" => array(
                            "min" => -100,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "0px 0px 20px 0px"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-hugeBannerPost__excerpt" => array(
                            "margin" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.excerpt_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["text"],
                    "styles" => array(
                        "@id, @id .dragifywp-hugeBannerPost__excerpt" => array(
                            "color" => "{{@model}}"
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
                        "@id .dragifywp-bannerPost__author" => array(
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
    <div class="dragifywp-banner-posts {{::$ctrl.getID()}}" ng-class="[$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]" id="{{$ctrl.edited.attrs.id}}">
        <dragifywp-shortcode tag="dragifywp_banner_posts_content" model="$ctrl.edited"
                         attrs="['num', 'categories', 'order', 'start']"
                         callback="[{'function':'dragifywpLazyImage','selector':'.dragifywp-bannerPosts'}]"></div>
<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('dragifywp_banner_posts', 'dragifywp_banner_posts_callback');
function dragifywp_banner_posts_callback($attrs) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'hidden' => '',
        'order' => 'DESC',
        'categories' => '',
        'start' => 1
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
    <div class="dragifywp-banner-posts <?php echo implode(' ', $classes); ?>"<?php echo $id; ?>>
        <?php echo do_shortcode('[dragifywp_banner_posts_content start="' . $attrs['start'] . '" order="' . $attrs['order'] . '" categories="' . $attrs['categories'] . '"]'); ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('dragifywp_banner_posts_content', 'dragifywp_banner_posts_content_callback');
function dragifywp_banner_posts_content_callback($attrs) {
    $attrs = shortcode_atts(array(
        'order' => 'DESC',
        'categories' => '',
        'start' => 1
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $categories = array();

    $args = array(
        'numberposts' => 5,
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
    $post_left = array_shift($posts);
    $ID = $post_left->ID;

    ob_start(); ?>
    <div class="dragifywp-bannerPosts">
        <div class="dragifywp-bannerPosts__left">
            <?php
            if(has_post_thumbnail($ID)):
                echo '<a class="dragifywp-hugeBannerPost__img" href="'.get_the_permalink($ID).'">'.dragifywp_fw_get_post_feature_lazy_image($ID, array('full', 'large', 'medium')).'</a>';
            endif; ?>
            <div class="dragifywp-hugeBannerPost__content">
                <div class="dragifywp-bannerPosts__cats dragifywp-hugeBannerPost__cats dragifywp--bold">
                    <?php echo dragifywp_fw_get_category_list_html(get_the_category($ID)); ?>
                </div>
                <h6 class="dragifywp-hugeBannerPost__title"><a href="<?php echo get_the_permalink($ID); ?>"><?php echo get_the_title($ID); ?></a></h6>
                <?php if (has_excerpt($ID)) : ?>
                    <div class="dragifywp-hugeBannerPost__excerpt"><?php echo dragifywp_fw_trim_excerpt(get_the_excerpt($ID), 25); ?></div>
                <?php endif; ?>

                <footer class="dragifywp-hugeBannerPost__footer">
                    <?php
                    $author_id = $post_left->post_author;
                    $href = get_author_posts_url($author_id);
                    $url = get_avatar_url($author_id);
                    echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-hugeBannerPost__avatar']);
                    ?>

                    <a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-hugeBannerPost__author dragifywp-bannerPost__author"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
                </footer>
            </div>

        </div>
        <div class="dragifywp-bannerPosts__right">
            <?php
            if (!empty($posts)) :
                foreach ($posts as $post) :
                    $ID = $post->ID;
                    ?>
                    <div class="dragifywp-smallBannerPost">
                        <?php
                        if(has_post_thumbnail("ID")):
                            echo '<a class="dragifywp-smallBannerPost__img" href="'.get_the_permalink($ID).'">'.dragifywp_fw_get_post_feature_lazy_image($ID).'</a>';
                        endif; ?>
                        <div class="dragifywp-smallBannerPost__content">
                            <div class="dragifywp-bannerPosts__cats dragifywp-smallBannerPost__cats dragifywp--bold">
                                <?php echo dragifywp_fw_get_category_list_html(get_the_category($ID)); ?>
                            </div>
                            <h6 class="dragifywp-smallBannerPost__title"><a href="<?php echo get_the_permalink($ID); ?>"><?php echo get_the_title($ID); ?></a></h6>

                            <footer class="dragifywp-smallBannerPost__footer">
                                <?php
                                $author_id = $post->post_author;
                                $href = get_author_posts_url($author_id);
                                $url = get_avatar_url($author_id);
                                echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-smallBannerPost__avatar']);
                                ?>
                                <a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-smallBannerPost__author dragifywp-bannerPost__author"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
                            </footer>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
