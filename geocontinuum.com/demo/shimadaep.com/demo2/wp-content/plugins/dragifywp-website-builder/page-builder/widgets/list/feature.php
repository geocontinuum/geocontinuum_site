<?php
$manager = DragifyWPPageBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Feature",
    "tag" => "feature",
    "keywords" => ["image","feature"],
    "native" => true,
    "filter" => "other",
    "nested" => true,
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Media",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.image",
                    "attrs" => array(
                        "label" => "Image",
                        "type" => "upload-image"
                    ),
                    "default_value" => array(
                        "url" => ""
                    ),
                    "styles" => array(
                        "@id .dragifywp-feature__image" => array(
                            "backgroundImage" => "url({{@model.url}})"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.height",
                    "attrs" => array(
                        "label" => "Media Height",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 30,
                            "max" => 200,
                            "step" => 1
                        ),
                        "desc" => "<strong>Note:</strong> Drag to 100 to have a square image."
                    ),
                    "default_value" => array(
                        "desktop" => 100
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-feature__image" => array(
                            "paddingBottom" => "{{@model}}%"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.width",
                    "attrs" => array(
                        "label" => "Content Width",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 25,
                            "max" => 75,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 50
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-feature__content" => array(
                            "width" => "{{@model}}%"
                        ),
                        "@id .dragifywp-feature__media" => array(
                            "width" => "{{100 - @model}}%"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Content",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.reversed",
                    "attrs" => array(
                        "label" => "Reversed",
                        "type" => "Switch"
                    ),
                    "default_value" => false
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.mobile",
                    "attrs" => array(
                        "label" => "Mobile Column",
                        "type" => "Switch",
                        "desc" => "Enable this feature to allow your content to display in columns on Mobile Screen."
                    ),
                    "default_value" => true
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.bg",
                    "attrs" => array(
                        "label" => "Background",
                        "type" => "colorpicker"
                    ),
                    "default_value" => "",
                    "styles" => array(
                        "@id" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.align",
                    "attrs" => array(
                        "label" => "Alignment",
                        "type" => "res-align"
                    ),
                    "default_value" => array(
                        "desktop" => "center"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-feature__content" => array(
                            "textAlign" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.max_width",
                    "attrs" => array(
                        "label" => "Max Width",
                        "type" => "unit"
                    ),
                    "default_value" => "90%",
                    "styles" => array(
                        "@id .dragifywp-feature__content__wrap" => array(
                            "maxWidth" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.padding",
                    "attrs" => array(
                        "label" => "Padding",
                        "type" => "res-area",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "15px 15px 15px 15px",
                        "mobile" => "30px 15px 40px 15px"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-feature__content__wrap" => array(
                            "padding" => "{{@model}}"
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
                        "type" => "text"
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
<div class="dragifywp-dnd__emptyItem" style="height:150px;" ng-if="!$ctrl.edited.attrs.image.url">
    <span class="dragifywp-dnd__emptyItem__label">Feature</span>
</div>

<div class="dragifywp-feature {{::$ctrl.getID()}}" ng-class="[{'dragifywp-feature--reversed':$ctrl.edited.attrs.reversed},{'dragifywp-feature--mobile':$ctrl.edited.attrs.mobile},$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]" id="{{$ctrl.edited.attrs.id}}">
    <div class="dragifywp-feature__media">
        <div class="dragifywp-feature__image"></div>
    </div>
    <div class="dragifywp-feature__content">
        <div class="dragifywp-dnd__dropMe dragifywp-dnd__dropMe--lv3 dragifywp-dnd__dropMe--nested">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="dragifywp-feature__content__wrap">
            <dragifywp-nested-item-list model="$ctrl.edited"></dragifywp-nested-item-list>
        </div>
    </div>
    <div class="dragifywp-dnd__visualBlock"></div>
</div>
<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('dragifywp_feature', 'dragifywp_feature_callback');
function dragifywp_feature_callback($attrs, $content = null) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'hidden' => '',
        'reversed' => 'false',
        'mobile' => 'true'
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    if (dragifywp_to_boolean($attrs['reversed'])) {
        $classes[] = 'dragifywp-feature--reversed';
    }

    if (dragifywp_to_boolean($attrs['mobile'])) {
        $classes[] = 'dragifywp-feature--mobile';
    }

    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';

    ob_start(); ?>
    <div class="dragifywp-feature <?php echo implode(' ', $classes); ?>"<?php echo $id; ?>>
        <div class="dragifywp-feature__media">
            <div class="dragifywp-feature__image"></div>
        </div>
        <div class="dragifywp-feature__content">
            <div class="dragifywp-feature__content__wrap">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
