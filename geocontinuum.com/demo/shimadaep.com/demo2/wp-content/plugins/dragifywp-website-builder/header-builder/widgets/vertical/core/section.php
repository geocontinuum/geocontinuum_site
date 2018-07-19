<?php
$manager = DragifyWPHeaderBuilderWidgetManager::getInstance();

$widget = array(
    "tag" => "v_section",
    "name" => "Section",
    "native" => true,
    "core" => true,
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "collapsed" => false,
                "label" => "Spacing"
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.spacing",
                    "attrs" => array(
                        "fullwidth" => true,
                        "type" => "spacing",
                        "config" => array(
                            "margin" => ["1","1","1","1"],
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
                        "@id" => array(
                            "padding" => "{{@model.padding}}",
                            "margin" => "{{@model.margin}}",
                            "borderWidth" => "{{@model.border}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.border_style",
                    "attrs" => array(
                        "type" => "border-style",
                        "label" => "Border Style"
                    ),
                    "default_value" => "none",
                    "styles" => array(
                        "@id" => array(
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
                    "default_value" => $manager::$colors["border"],
                    "styles" => array(
                        "@id" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "collapsed" => false,
                "label" => "Content"
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.alignment",
                    "attrs" => array(
                        "label" => "Alignment",
                        "type" => "v-align"
                    ),
                    "default_value" => "left",
                    "styles" => array(
                        "@id" => array(
                            "textAlign" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.bg_color",
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
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "collapsed" => false,
                "label" => "Hidden & Class"
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
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.class",
                    "attrs" => array(
                        "label" => "Class",
                        "type" => "text"
                    ),
                    "default_value" => ""
                )
            ]
        )
    ]
);

ob_start();
?>
<div class="dragifywp-aside__section {{::$ctrl.getID()}}"
     ng-class="[$ctrl.section.attrs.hidden, $ctrl.section.attrs.class]">
    <vertical-item-list section="$ctrl.section"></vertical-item-list>

    <div class="dragifywp-dnd__dropMe dragifywp-dnd__dropMe--lv1">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="dragifywp-dnd__empty" ng-show="$ctrl.section.content.length == 0">
        <span class="dragifywp-dnd__empty__label" ng-bind="::$ctrl.section.name"></span>
    </div>

    <div class="dragifywp-dnd__visual dragifywp-dnd__visual--lv1 lvh__{{::$ctrl.service.getID($ctrl.section)}}"
         ng-click="$ctrl.service.setEdited($ctrl.section)"
         ng-class="{'show':$ctrl.section.hover}"
         dragifywp-detect-hover-node-vertical="$ctrl.section">
        <span class="dragifywp-dnd__visual__name" ng-bind="::$ctrl.section.name"></span>
    </div>
</div>
<?php
$widget['visual_view'] = ob_get_clean();
$manager->add($widget);


add_shortcode('lhb_v_section', 'lhb_v_section_callback');
function lhb_v_section_callback($attrs, $content = null) {
    $attrs = shortcode_atts(array(
        "class_id" => '',
        "class" => '',
        "hidden" => ""
    ), $attrs, DragifyWPHeaderBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = [];
    $classes[] = $attrs['class'];

    if($attrs['hidden']){
        $classes[] = $attrs['hidden'];
    }

    $classes[] = $attrs['class_id'];

    $html = '<div class="dragifywp-aside__section ' . implode(' ', $classes) . '">';
    $html .=  do_shortcode($content);
    $html .= '</div>';

    return $html;
}