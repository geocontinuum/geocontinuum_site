<?php
$manager = DragifyWPPageBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Client List",
    "tag" => "client_list",
    "keywords" => ["client list","carousel"],
    "native" => true,
    "filter" => "other",
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Items",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@model",
                    "attrs" => array(
                        "label" => "Clients",
                        "type" => "image-group"
                    ),
                    "default_value" => []
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Columns",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.column",
                    "attrs" => array(
                        "label" => "Number of Columns",
                        "type" => "res-text-buttons",
                        "config" => array(
                            "options" => array(
                                "1" => "1",
                                "2" => "2",
                                "3" => "3",
                                "4" => "4",
                                "5" => "5",
                                "6" => "6",
                                "7" => "7"
                            ),
                            "class" => "column"
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "3",
                        "tablet" => "2",
                        "mobile" => "1"
                    ),
                    "responsive_styles" => array(
                        "@id.dragifywp-clientList--grid .dragifywp-clientList__item" => array(
                            "width" => "calc((100% - 1px)/{{@model}})"
                        )
                    ),
                    "generate" => "both"
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Carousel",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.carousel",
                    "attrs" => array(
                        "label" => "Carousel",
                        "type" => "switch"
                    ),
                    "default_value" => false
                ),
                array(
                    "if" => "@attrs.carousel",
                    "content" => [
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.autoplay",
                            "attrs" => array(
                                "label" => "Auto Play",
                                "type" => "switch"
                            ),
                            "default_value" => false
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.duration",
                            "if" => "@attrs.autoplay",
                            "attrs" => array(
                                "label" => "Duration",
                                "type" => "Slider",
                                "config" => array(
                                    "min" => 3000,
                                    "max" => 20000,
                                    "step" => 500
                                )
                            ),
                            "default_value" => 7000
                        )
                    ]
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Style",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.overlay",
                    "attrs" => array(
                        "label" => "Overlay",
                        "type" => "colorpicker"
                    ),
                    "default_value" => "",
                    "styles" => array(
                        "@id .dragifywp-clientList__item__wrap:before" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.border_style",
                    "attrs" => array(
                        "label" => "Border Style",
                        "type" => "border-style"
                    ),
                    "default_value" => "none",
                    "styles" => array(
                        "@id .dragifywp-clientList__item, @id.dragifywp-clientList--carousel" => array(
                            "borderStyle" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.border_color",
                    "if" => "@attrs.border_style != 'none'",
                    "attrs" => array(
                        "label" => "Border Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors['border'],
                    "styles" => array(
                        "@id .dragifywp-clientList__item, @id.dragifywp-clientList--carousel" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Animation",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.animation",
                    "attrs" => array(
                        "label" => "Enable",
                        "type" => "animation",
                        "config" => array(
                            "group" => true
                        )
                    ),
                    "default_value" => array(
                        "enable" => false,
                        "distance" => "0px",
                        "rotate" => array(
                            "x" => 0,
                            "y" => 0,
                            "z" => 0
                        ),
                        "origin" => "bottom",
                        "easing" => "ease",
                        "delay" => 0,
                        "duration" => 1000,
                        "opacity" => 0,
                        "scale" => 1,
                        "viewFactor" => 0.2,
                        "reset" => false,
                        "interval" => 50
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
    ],
    "child" => array(
        "name" => "Client",
        "tag" => "client",
        "native" => true,
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
                        "bind_to" => "@attrs.image",
                        "attrs" => array(
                            "label" => "Logo",
                            "type" => "upload-image",
                            "config" => array(
                                "contain" => true
                            )
                        ),
                        "default_value" => array(
                            "url" => ""
                        )
                    ),
                    array(
                        "tag" => "editor-field",
                        "bind_to" => "@attrs.name",
                        "attrs" => array(
                            "label" => "Name",
                            "type" => "text"
                        ),
                        "default_value" => ""
                    ),
                    array(
                        "tag" => "editor-field",
                        "bind_to" => "@attrs.link",
                        "attrs" => array(
                            "label" => "Link",
                            "type" => "link"
                        ),
                        "default_value" => array(
                            "url" => "#",
                            "new_tab" => false
                        )
                    )
                ]
            )
        ]
    )
);

ob_start();
?>
<div class="dragifywp-dnd__emptyItem" style="height:100px" ng-if="$ctrl.edited.content.length == 0">
    <span class="dragifywp-dnd__emptyItem__label">Client List</span>
</div>

<div class="dragifywp-clientList dragifywp-clientList--grid {{::$ctrl.getID()}}" ng-class="[$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]"
     ng-if="!$ctrl.edited.attrs.carousel"
     id="{{$ctrl.edited.attrs.id}}">

    <div class="dragifywp-clientList__item" ng-repeat="item in $ctrl.edited.content track by $index">
        <a class="dragifywp-clientList__item__wrap">
            <img ng-src="{{item.attrs.image.url}}"/>
        </a>
    </div>
</div>

<div class="dragifywp-clientList dragifywp-clientList--carousel {{::$ctrl.getID()}}" ng-class="[$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]"
     ng-if="$ctrl.edited.attrs.carousel"
     id="{{$ctrl.edited.attrs.id}}">

    <div class="dragifywp-carousel owl-carousel"
         dragifywp-carousel
         list="$ctrl.edited.content"
         duration="$ctrl.edited.attrs.duration"
         autoplay="$ctrl.edited.attrs.autoplay"
         column="$ctrl.edited.attrs.column">
        <div class="dragifywp-clientList__item" ng-repeat="item in $ctrl.edited.content track by $index">
            <a class="dragifywp-clientList__item__wrap">
                <img ng-src="{{item.attrs.image.url}}"/>
            </a>
        </div>
    </div>
</div>
<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('dragifywp_client_list', 'dragifywp_client_list_callback');
function dragifywp_client_list_callback($attrs, $content = null) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'hidden' => '',
        'animation' => json_encode(array(
            'enable' => 'false',
            'delay' => 0,
            'duration' => 1000,
            'opacity' => 0,
            'rotate' => array('x' => 0, 'y' => 0, 'z' => 0),
            'origin' => 'bottom',
            'distance' => '20px',
            'scale' => 1,
            'easing' => 'ease',
            'reset' => 'false',
            'interval' => 50
        )),
        'carousel' => 'false',
        'duration' => 7000,
        'autoplay' => 'false',
        'column' => json_encode(array(
            'desktop' => 3
        ))
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $attrs['animation'] = json_decode($attrs['animation'], true);
    $attrs['animation']['selector'] = '.dragifywp-clientList__item';
    $animation = dragifywp_form_animation_data($attrs['animation']);

    $classes = array();

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    if (dragifywp_to_boolean($attrs['carousel'])) {
        $classes[] = 'dragifywp-clientList--carousel';
        $before_wrap = '<div class="dragifywp-carousel owl-carousel" data-duration="' . $attrs['duration'] . '" data-auto-play="' . $attrs['autoplay'] . '" data-column="' . esc_attr($attrs['column']) . '" >';
        $after_wrap = '</div>';
    } else {
        $classes[] = 'dragifywp-clientList--grid';
        $before_wrap = '';
        $after_wrap = '';
    }

    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';

    ob_start(); ?>
    <div class="dragifywp-clientList <?php echo implode(' ', $classes); ?>"<?php echo $id; ?><?php echo $animation; ?>>
        <?php echo $before_wrap . do_shortcode($content) . $after_wrap; ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('dragifywp_client', 'dragifywp_client_callback');
function dragifywp_client_callback($attrs) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'link' => json_encode(array(
            'url' => '#',
            'new_tab' => 'false'
        )),
        'image' => json_encode(array(
            'url' => ''
        )),
        'name' => ''
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $attrs['link'] = json_decode($attrs['link'], true);

    if (!empty($attrs['link']['url'])) {
        $target = dragifywp_to_boolean($attrs['link']['new_tab']) ? ' target="_blank"' : '';
        $link_before = '<a href="' . $attrs['link']['url'] . '" class="dragifywp-clientList__item__wrap"' . $target . '>';
        $link_after = '</a>';
    } else {
        $link_before = '<span class="dragifywp-clientList__item__wrap">';
        $link_after = '</span>';
    }

    ob_start(); ?>
    <div class="dragifywp-clientList__item">
        <?php echo $link_before; ?>
        <?php $attrs['image'] = json_decode($attrs['image'], true); ?>
        <img src="<?php echo $attrs['image']['url']; ?>" alt="<?php echo $attrs['name']; ?>" />
        <?php echo $link_after; ?>
    </div>
    <?php
    return ob_get_clean();
}