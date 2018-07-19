<?php
$manager = DragifyWPFooterBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Button",
    "tag" => "button",
    "keywords" => ["button"],
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
                    "bind_to" => "@content",
                    "attrs" => array(
                        "label" => "Text",
                        "type" => "text"
                    ),
                    "default_value" => "Button Text"
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
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Size",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.padding",
                    "attrs" => array(
                        "label" => "Padding",
                        "type" => "res-area",
                        "config" => array(
                            "min" => 0,
                            "max" => 50,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "10px 15px 10px 15px"
                    ),
                    "responsive_styles" => array(
                        "@id" => array(
                            "padding" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.font_size",
                    "attrs" => array(
                        "label" => "Font Size",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 8,
                            "max" => 60,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 14
                    ),
                    "responsive_styles" => array(
                        "@id" => array(
                            "fontSize" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.font_weight",
                    "attrs" => array(
                        "type" => "slider",
                        "label" => "Weight",
                        "config" => array(
                            "min" => 100,
                            "max" => 900,
                            "step" => 100
                        )
                    ),
                    "default_value" => 400,
                    "styles" => array(
                        "@id" => array(
                            "fontWeight" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.font_source",
                    "attrs" => array(
                        "label" => "Font Source",
                        "type" => "font-source"
                    ),
                    "default_value" => array(
                        "source" => "inherit",
                        "google" => array(
                            "family" => "Open Sans",
                            "variant" => "regular",
                            "subset" => "latin"
                        ),
                        "uploaded" => ""
                    ),
                    "directives" => [
                        array(
                            "tag" => "embed-font-source",
                            "attrs" => array(
                                "selector" => "@id"
                            )
                        )
                    ]
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.letter_spacing",
                    "attrs" => array(
                        "label" => "Letter Spacing",
                        "type" => "slider",
                        "config" => array(
                            "min" => -0.2,
                            "max" => 1,
                            "step" => 0.01
                        )
                    ),
                    "default_value" => 0,
                    "styles" => array(
                        "@id" => array(
                            "letterSpacing" => "{{@model}}em"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.border_width",
                    "attrs" => array(
                        "label" => "Border Width",
                        "type" => "area",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => "0px 0px 0px 0px",
                    "styles" => array(
                        "@id" => array(
                            "borderWidth" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.border_radius",
                    "attrs" => array(
                        "label" => "Border Radius",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => 0,
                    "styles" => array(
                        "@id" => array(
                            "borderRadius" => "{{@model}}px"
                        )
                    )
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
                    "bind_to" => "@attrs.color",
                    "attrs" => array(
                        "label" => "Text",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary_context"],
                    "styles" => array(
                        "@id" => array(
                            "color" => "{{@model}}"
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
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "@id" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.border_color",
                    "show" => "@attrs.border_width != '0px 0px 0px 0px'",
                    "attrs" => array(
                        "label" => "Border",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors['border'],
                    "styles" => array(
                        "@id" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.box_shadow",
                    "attrs" => array(
                        "label" => "Box Shadow",
                        "type" => "box-shadow"
                    ),
                    "default_value" => "none",
                    "styles" => array(
                        "@id" => array(
                            "boxShadow" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.block",
                    "attrs" => array(
                        "label" => "Block",
                        "type" => "switch"
                    ),
                    "default_value" => false
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Hover",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.hover_color",
                    "attrs" => array(
                        "label" => "Text",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary_context"],
                    "styles" => array(
                        "@id:hover" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.hover_bg_color",
                    "attrs" => array(
                        "label" => "Background",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "@id:hover" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.hover_border_color",
                    "show" => "@attrs.border_width != '0px 0px 0px 0px'",
                    "attrs" => array(
                        "label" => "Border",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors['border'],
                    "styles" => array(
                        "@id:hover" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Icon",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.icon",
                    "attrs" => array(
                        "label" => "Icon",
                        "type" => "icon",
                        "config" => array(
                            "requireValue" => false
                        )
                    ),
                    "default_value" => array(
                        "icon" => "",
                        "source" => "fa"
                    )
                ),
                array(
                    "if" => "@attrs.icon.icon",
                    "content" => [
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.icon_right",
                            "attrs" => array(
                                "label" => "Right",
                                "type" => "switch"
                            ),
                            "default_value" => true
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.icon_margin",
                            "attrs" => array(
                                "label" => "Margin",
                                "type" => "slider",
                                "config" => array(
                                    "min" => 0,
                                    "max" => 2.5,
                                    "step" => 0.1
                                )
                            ),
                            "default_value" => 0.5,
                            "styles" => array(
                                "@id > i" => array(
                                    "margin" => "0 {{@model}}em"
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
                        "type" => "class",
                        "config" => ["Hover.css","Hover Effect","Tilt Hover Effect"]
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
<div class="dragifywp-dnd__emptyItem" style="height:60px;" ng-if="!$ctrl.edited.content">
    <span class="dragifywp-dnd__emptyItem__label">Button</span>
</div>

<a class="dragifywp-button {{::$ctrl.getID()}}" ng-class="[{'dragifywp-button--block':$ctrl.edited.attrs.block},$ctrl.edited.attrs.hidden, $ctrl.edited.attrs.class]" id="{{$ctrl.edited.attrs.id}}">
    <i ng-if="!$ctrl.edited.attrs.icon_right && $ctrl.edited.attrs.icon.icon" ng-class="$ctrl.edited.attrs.icon.source + ' ' + $ctrl.edited.attrs.icon.source + '-' + $ctrl.edited.attrs.icon.icon"></i>
    <span ng-bind-html="$ctrl.edited.content" model="$ctrl.edited" dragifywp-editable config="{target:'content', editorType:'1'}"></span>
    <i ng-if="$ctrl.edited.attrs.icon_right && $ctrl.edited.attrs.icon.icon" ng-class="$ctrl.edited.attrs.icon.source + ' ' + $ctrl.edited.attrs.icon.source + '-' + $ctrl.edited.attrs.icon.icon"></i>
</a>
<?php
$widget['visual_view'] = ob_get_clean();

$manager->add($widget);


add_shortcode('lfb_button', 'lfb_button_callback');
function lfb_button_callback($attrs, $content = null) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'block' => 'false',
        'id' => '',
        'hidden' => '',
        'icon_right' => 'false',
        'icon' => json_encode(array(
            'icon' => '',
            'source' => 'fa'
        )),
        'link' => json_encode(array(
            'url' => '#',
            'new_tab' => 'false'
        ))
    ), $attrs, DragifyWPFooterBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $attrs['icon'] = json_decode($attrs['icon'], true);
    $classes = array();

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if(dragifywp_to_boolean($attrs['block'])){
        $classes[] = 'dragifywp-button--block';
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';
    $icon_class = $attrs['icon']['source'].' '.$attrs['icon']['source'].'-'.$attrs['icon']['icon'];

    $attrs['link'] = json_decode($attrs['link'], true);
    if (!empty($attrs['link']['url'])) {
        $target = dragifywp_to_boolean($attrs['link']['new_tab']) ? ' target="_blank"' : '';
        $link_before = '<a href="' . $attrs['link']['url'] . '" class="dragifywp-button ' . implode(' ', $classes) . '"' . $id . $target . '>';
        $link_after = '</a>';
    } else {
        $link_before = '<span class="dragifywp-button ' . implode(' ', $classes) . '"' . $id . '>';
        $link_after = '</span>';
    }

    $left = '<div class="dragifywp-buttonWrap">'.$link_before;;
    $right = $link_after.'</div>';

    if (!dragifywp_to_boolean($attrs['icon_right']) && $attrs['icon']['icon']){
        $left .= '<i class="'.$icon_class.'"></i>';
    }else if($attrs['icon']['icon']) {
        $right = '<i class="'.$icon_class.'"></i>'.$right;
    }

    return $left.'<span>'.do_shortcode($content).'</span>'.$right;
}