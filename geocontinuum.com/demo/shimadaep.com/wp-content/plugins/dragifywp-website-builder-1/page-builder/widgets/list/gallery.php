<?php
$manager = DragifyWPPageBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Gallery",
    "tag" => "gallery",
    "keywords" => ["gallery","image"],
    "native" => true,
    "filter" => "image",
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Images",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@model",
                    "attrs" => array(
                        "label" => "Images",
                        "type" => "image-group",
                        "config" => array("full" => true)
                    ),
                    "default_value" => []
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.photoswipe",
                    "attrs" => array(
                        "label" => "Lightbox",
                        "type" => "switch",
                        "desc" => "Turn on the switch to enable a light box effect when clicking on an image from the gallery. Please go to check the effect on the real preview page."
                    ),
                    "default_value" => false
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
                    "bind_to" => "@attrs.style",
                    "attrs" => array(
                        "label" => "Style",
                        "type" => "selection",
                        "config" => array(
                            "equal" => "Equal",
                            "style-1" => "Style 1",
                            "style-2" => "Style 2"
                        )
                    ),
                    "default_value" => "style-1"
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.distance",
                    "attrs" => array(
                        "label" => "Distance",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 30,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 5
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-gridGallery__item" => array(
                            "padding" => "{{@model}}px"
                        ),
                        "@id.dragifywp-gridGallery--style-1 .dragifywp-gridGallery__item:nth-child(4n+1) .dragifywp-gridGallery__wrap" => array(
                            "paddingBottom" => "calc(100% + {{@model}}px)"
                        ),
                        "@id" => array(
                            "margin" => "0px -{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.radius",
                    "attrs" => array(
                        "label" => "Border Radius",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 30,
                            "step" => 1
                        )
                    ),
                    "default_value" => 0,
                    "styles" => array(
                        "@id .dragifywp-gridGallery__wrap" => array(
                            "borderRadius" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "if" => "@attrs.style == 'equal'",
                    "content" => [
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.height",
                            "attrs" => array(
                                "label" => "Height",
                                "type" => "res-unit"
                            ),
                            "default_value" => array(
                                "desktop" => '100%'
                            ),
                            "responsive_styles" => array(
                                "@id .dragifywp-gridGallery__wrap" => array(
                                    "paddingBottom" => "{{@model}}"
                                )
                            )
                        ),
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
                                "desktop" => "4",
                                "tablet" => "3",
                                "mobile" => "2"
                            ),
                            "responsive_styles" => array(
                                "@id.dragifywp-gridGallery--equal .dragifywp-gridGallery__item" => array(
                                    "width" => "calc((100% - 1px)/{{@model}})"
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
        "name" => "Gallery Item",
        "tag" => "gallery_item",
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
                        "generate" => "only_shortcode",
                        "tag" => "editor-field",
                        "bind_to" => "@attrs.image",
                        "attrs" => array(
                            "label" => "Image",
                            "type" => "upload-image",
                            "config" => array("full" => true)                            
                        ),
                        "default_value" => array(
                            "url" => ""
                        )
                    )
                ]
            )
        ]
    )
);

ob_start();
?>
<div class="dragifywp-dnd__emptyItem" style="height:200px" ng-if="$ctrl.edited.content.length == 0">
    <span class="dragifywp-dnd__emptyItem__label">Gallery</span>
</div>

<div class="dragifywp-gridGallery {{::$ctrl.getID()}}" ng-class="['dragifywp-gridGallery--' + $ctrl.edited.attrs.style, $ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]" id="{{$ctrl.edited.attrs.id}}">
     <div class="dragifywp-gridGallery__item" ng-repeat="item in $ctrl.edited.content track by $index">
        <div class="dragifywp-gridGallery__wrap">
            <div class="dragifywp-gridGallery__img" ng-style="{'background-image' : 'url(' + item.attrs.image.url + ')'}"></div>
        </div>
    </div>
</div>

<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('dragifywp_gallery', 'dragifywp_gallery_callback');
function dragifywp_gallery_callback($attrs, $content = null) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'style' => 'style-1',
        'photoswipe' => 'false',
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
        'id' => '',
        'hidden' => ''
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    $classes[] = 'dragifywp-gridGallery--'.$attrs['style'];

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    if(dragifywp_to_boolean($attrs['photoswipe'])){
        $classes[] = 'dragifywp-gridGallery--photoswipe';
    }

    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';

    $attrs['animation'] = json_decode($attrs['animation'], true);
    $attrs['animation']['selector'] = '.dragifywp-gridGallery__item';
    $animation = dragifywp_form_animation_data($attrs['animation']);

    ob_start(); ?>
    <div class="dragifywp-gridGallery <?php echo implode(' ', $classes); ?>"<?php echo $id.$animation; ?>>
        <?php echo do_shortcode($content); ?>
    </div>
    <?php
    return ob_get_clean();
}


add_shortcode('dragifywp_gallery_item', 'dragifywp_gallery_item_callback');
function dragifywp_gallery_item_callback($attrs) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'hidden' => '',
        'image' => json_encode(array(
            'url' => ''
        )),
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();
    $classes[] = $attrs['class_id'];

    $attrs['image'] = json_decode($attrs['image'], true);

    $data_ptsw = array();
    $data_ptsw['src'] = $attrs['image']['url'];
    $data_ptsw['w'] = $attrs['image']['width'];
    $data_ptsw['h'] = $attrs['image']['height'];

    ob_start(); ?>
    <div class="dragifywp-gridGallery__item <?php echo implode(' ', $classes); ?>"  data-ptsw="<?php echo esc_attr(json_encode($data_ptsw));?>">
        <div class="dragifywp-gridGallery__wrap">
            <?php echo dragifywp_get_uploaded_image_url_queries($attrs['image']); ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}