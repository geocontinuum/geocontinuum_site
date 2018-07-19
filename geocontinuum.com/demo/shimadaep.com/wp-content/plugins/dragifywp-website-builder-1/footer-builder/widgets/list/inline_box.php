<?php
$manager = DragifyWPFooterBuilderWidgetManager::getInstance();

$widget =  array(
    "name" => "Inline Box",
    "tag" => "inline_box",
    "keywords" => ["inline box","flex","nested"],
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
                    "bind_to" => "@attrs.item_margin",
                    "attrs" => array(
                        "label" => "Item Margin",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 5
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-inlineList > *" => array(
                            "margin" => "0px {{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.container_margin",
                    "attrs" => array(
                        "label" => "Container Margin",
                        "type" => "res-area2",
                        "config" => array(
                            "min" => -300,
                            "max" => 300,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "0px 0px 0px 0px"
                    ),
                    "responsive_styles" => array(
                        "@id" => array(
                            "margin" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.h_align",
                    "attrs" => array(
                        "label" => "Horizontal Alignment",
                        "type" => "h-align"
                    ),
                    "default_value" => "middle"
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.v_align",
                    "attrs" => array(
                        "label" => "Vertical Alignment",
                        "type" => "res-image-buttons",
                        "config" => array(
                            "left" => "left.svg",
                            "center" => "center.svg",
                            "right" => "right.svg",
                            "spaceBetween" => "space-between.svg",
                            "spaceAround" => "space-around.svg"
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "center"
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
<div class="dragifywp-dnd__emptyItem" style="height:75px;" ng-if="!$ctrl.edited.content">
    <span class="dragifywp-dnd__emptyItem__label">Inline Box</span>
</div>

<div class="dragifywp-inlineBox {{::$ctrl.getID()}}" ng-class="[$ctrl.service.formResClass($ctrl.edited.attrs.v_align, 'dragifywp-inlineBox', 'vAlign'), 'dragifywp-inlineBox--hAlign-' + $ctrl.edited.attrs.h_align, $ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]" id="{{$ctrl.edited.attrs.id}}">
    <div class="dragifywp-dnd__dropMe dragifywp-dnd__dropMe--lv3 dragifywp-dnd__dropMe--nested">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <dragifywp-nested-horizontal-item-list model="$ctrl.edited"></dragifywp-nested-horizontal-item-list>
</div>

<div class="dragifywp-dnd__visualBlock"></div>
<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('lfb_inline_box', 'lfb_inline_box_callback');
function lfb_inline_box_callback($attrs, $content) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'hidden' => '',
        'v_align' => json_encode(array(
            'desktop' => 'center'
        )),
        'h_align' => '',
    ), $attrs, DragifyWPHeaderBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    $attrs['v_align'] = json_decode($attrs['v_align'], true);
    $v_align = dragifywp_form_res_class($attrs['v_align'], 'dragifywp-inlineBox', 'vAlign');
    if($v_align){
        $classes[] = $v_align;
    }

    $classes[] = 'dragifywp-inlineBox--hAlign-'.$attrs['h_align'];
    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';

    ob_start(); ?>
    <div class="dragifywp-inlineBox <?php echo implode(' ', $classes) ?>"<?php echo $id; ?>>
        <div class="dragifywp-inlineList"><?php echo do_shortcode($content); ?></div>
    </div>
    <?php
    return ob_get_clean();
}