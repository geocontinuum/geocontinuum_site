<?php
$manager = DragifyWPHeaderBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Mega Menu",
    "tag" => "h_mega_menu",
    "keywords" => ["mega menu","dropdown"],
    "native" => true,
    "h_nav" => true,
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Menu",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.menu_id",
                    "attrs" => array(
                        "type" => "selection-loader",
                        "label" => "Menu",
                        "config" => array(
                            "url" => "dragifywp-website-builder/v1/menus",
                            "rest_url" => true,
                            "name" => "menu",
                            "add_new_url" => admin_url('nav-menus.php')
                        )
                    ),
                    "default_value" => 0
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.one_page",
                    "attrs" => array(
                        "label" => "One Page",
                        "type" => "switch"
                    ),
                    "default_value" => false
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.font",
                    "attrs" => array(
                        "type" => "font-source",
                        "label" => "Font"
                    ),
                    "default_value" => array(
                        "source" => "inherit",
                        "google" => array(
                            "family" => "Open Sans",
                            "variant" => "regular",
                            "subset" => "latin"
                        ),
                        "uploaded" => "",
                        "typekit" => ""
                    ),
                    "directives" => [
                        array(
                            "tag" => "embed-font-source",
                            "attrs" => array(
                                "selector" => "@id"
                            )
                        )
                    ]
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Menu LV1",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.height",
                    "attrs" => array(
                        "label" => "Height",
                        "type" => "slider",
                        "config" => array(
                            "min" => 20,
                            "max" => 200,
                            "step" => 1
                        )
                    ),
                    "default_value" => 50,
                    "styles" => array(
                        "@id" => array(
                            "height" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.lv1_font_size",
                    "attrs" => array(
                        "label" => "Font Size",
                        "type" => "slider",
                        "config" => array(
                            "min" => 10,
                            "max" => 30,
                            "step" => 1
                        )
                    ),
                    "default_value" => 12,
                    "styles" => array(
                        "@id .menu > li > a" => array(
                            "fontSize" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.font_weight",
                    "attrs" => array(
                        "label" => "Weight",
                        "type" => "slider",
                        "config" => array(
                            "min" => 100,
                            "max" => 900,
                            "step" => 100
                        )
                    ),
                    "default_value" => 600,
                    "styles" => array(
                        "@id .menu > li > a" => array(
                            "fontWeight" => "{{@model}}"
                        )
                    )
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
                    "default_value" => 0.1,
                    "styles" => array(
                        "@id .menu > li > a" => array(
                            "letterSpacing" => "{{@model}}em"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.lv1_margin",
                    "attrs" => array(
                        "label" => "Item Margin",
                        "type" => "slider",
                        "config" => array(
                            "min" => 5,
                            "max" => 30,
                            "step" => 1
                        )
                    ),
                    "default_value" => 12,
                    "styles" => array(
                        "@id .menu > li > a" => array(
                            "margin" => "0 {{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.lv1_text_transform",
                    "attrs" => array(
                        "label" => "Text Transform",
                        "type" => "text-transform"
                    ),
                    "default_value" => "uppercase",
                    "styles" => array(
                        "@id .menu > li > a" => array(
                            "textTransform" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.lv1_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["heading"],
                    "styles" => array(
                        "@id .menu > li > a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.lv1_hover_color",
                    "attrs" => array(
                        "label" => "Hover Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["text"],
                    "styles" => array(
                        "@id .menu > li:hover > a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.lv1_active_color",
                    "attrs" => array(
                        "label" => "Active Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "@id .menu > li.dragifywp-menu-current-menu-item > a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Sub Menu",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_min_width",
                    "attrs" => array(
                        "label" => "Item Min Width",
                        "type" => "slider",
                        "config" => array(
                            "min" => 140,
                            "max" => 400,
                            "step" => 1
                        )
                    ),
                    "default_value" => 200,
                    "styles" => array(
                        "@id .dragifywp-menu-submenu > li" => array(
                            "minWidth" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_item_padding",
                    "attrs" => array(
                        "label" => "Item padding",
                        "type" => "slider",
                        "config" => array(
                            "min" => 5,
                            "max" => 20,
                            "step" => 1
                        )
                    ),
                    "default_value" => 10,
                    "styles" => array(
                        "@id .dragifywp-menu-submenu a" => array(
                            "padding" => "{{@model}}px 0"
                        ),
                        "@id ul.dragifywp-menu-submenu > li" => array(
                            "padding" => "0 {{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_padding",
                    "attrs" => array(
                        "label" => "Container Padding",
                        "type" => "area",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => "3px 3px 3px 3px",
                    "styles" => array(
                        "@id .dragifywp-menu-item > ul.dragifywp-menu-submenu" => array(
                            "padding" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_border_radius",
                    "attrs" => array(
                        "label" => "Border Radius",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 20,
                            "step" => 1
                        )
                    ),
                    "default_value" => 5,
                    "styles" => array(
                        "@id .dragifywp-menu-submenu" => array(
                            "borderRadius" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_font_size",
                    "attrs" => array(
                        "label" => "Font Size",
                        "type" => "slider",
                        "config" => array(
                            "min" => 8,
                            "max" => 24,
                            "step" => 1
                        )
                    ),
                    "default_value" => 10,
                    "styles" => array(
                        "@id .dragifywp-menu-submenu" => array(
                            "fontSize" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_font_weight",
                    "attrs" => array(
                        "label" => "Weight",
                        "type" => "slider",
                        "config" => array(
                            "min" => 100,
                            "max" => 900,
                            "step" => 100
                        )
                    ),
                    "default_value" => 600,
                    "styles" => array(
                        "@id ul.dragifywp-menu-submenu a" => array(
                            "fontWeight" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_letter_spacing",
                    "attrs" => array(
                        "label" => "Letter Spacing",
                        "type" => "slider",
                        "config" => array(
                            "min" => -0.2,
                            "max" => 1,
                            "step" => 0.01
                        )
                    ),
                    "default_value" => 0.1,
                    "styles" => array(
                        "@id ul.dragifywp-menu-submenu a" => array(
                            "letterSpacing" => "{{@model}}em"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_text_transform",
                    "attrs" => array(
                        "label" => "Text Transform",
                        "type" => "text-transform"
                    ),
                    "default_value" => "uppercase",
                    "styles" => array(
                        "@id ul.dragifywp-menu-submenu a" => array(
                            "textTransform" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.ct_border_width",
                    "attrs" => array(
                        "label" => "Border Width",
                        "type" => "slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 3,
                            "step" => 1
                        )
                    ),
                    "default_value" => 1,
                    "styles" => array(
                        "@id .dragifywp-menu-submenu" => array(
                            "borderWidth" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.ct_border_color",
                    "if" => "@attrs.ct_border_width > 0",
                    "attrs" => array(
                        "label" => "Border Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["border"],
                    "styles" => array(
                        "@id .dragifywp-menu-submenu" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_bg_color",
                    "attrs" => array(
                        "label" => "Background",
                        "type" => "colorpicker"
                    ),
                    "default_value" => "#ffffff",
                    "styles" => array(
                        "@id .dragifywp-menu-submenu" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["text"],
                    "styles" => array(
                        "@id .dragifywp-menu-submenu li > a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_hover_color",
                    "attrs" => array(
                        "label" => "Color Hover",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["heading"],
                    "styles" => array(
                        "@id .dragifywp-menu-submenu > li > a:hover" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_active_color",
                    "attrs" => array(
                        "label" => "Active Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "@id .dragifywp-menu-submenu li.dragifywp-menu-current-menu-item > a" => array(
                            "color" => "{{@model}}"
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
                    "default_value" => "0px 11px 10px rgba(0,0,0,0.07)",
                    "styles" => array(
                        "@id .dragifywp-menu-submenu" => array(
                            "boxShadow" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.sub_border_style",
                    "attrs" => array(
                        "label" => "Item Border Style",
                        "type" => "border-style"
                    ),
                    "default_value" => "solid",
                    "styles" => array(
                        "@id .dragifywp-menu-submenu > li > a" => array(
                            "borderBottomStyle" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "if" => "@attrs.sub_border_style != 'none'",
                    "content" => [
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.sub_border_width",
                            "attrs" => array(
                                "label" => "Border Width",
                                "type" => "slider",
                                "config" => array(
                                    "min" => 1,
                                    "max" => 5,
                                    "step" => 1
                                )
                            ),
                            "default_value" => 1,
                            "styles" => array(
                                "@id .dragifywp-menu-submenu > li > a" => array(
                                    "borderBottomWidth" => "{{@model}}px"
                                )
                            )
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.sub_border_color",
                            "attrs" => array(
                                "label" => "Border Color",
                                "type" => "colorpicker"
                            ),
                            "default_value" => $manager::$colors["border"],
                            "styles" => array(
                                "@id .dragifywp-menu-submenu > li > a" => array(
                                    "borderBottomColor" => "{{@model}}"
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
                "label" => "Mega Submenu",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.row_padding",
                    "attrs" => array(
                        "label" => "Row Padding",
                        "type" => "area",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => "15px 0px 15px 0px",
                    "styles" => array(
                        "@id .dragifywp-menu-row" => array(
                            "padding" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.col_padding",
                    "attrs" => array(
                        "label" => "Column Padding",
                        "type" => "area",
                        "config" => array(
                            "min" => 0,
                            "max" => 100,
                            "step" => 1
                        )
                    ),
                    "default_value" => "0px 15px 0px 15px",
                    "styles" => array(
                        "@id .dragifywp-menu-row > .dragifywp-menu-column" => array(
                            "padding" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.col_border_style",
                    "attrs" => array(
                        "label" => "Border Style",
                        "type" => "border-style"
                    ),
                    "default_value" => "solid",
                    "styles" => array(
                        "@id .dragifywp-menu-row > .dragifywp-menu-column" => array(
                            "borderStyle" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.col_border_color",
                    "if" => "@attrs.col_border_style != 'none'",
                    "attrs" => array(
                        "label" => "Border Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["border"],
                    "styles" => array(
                        "@id .dragifywp-menu-row > .dragifywp-menu-column" => array(
                            "borderColor" => "{{@model}}"
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
                    "bind_to" => "@attrs.title_show",
                    "attrs" => array(
                        "label" => "Enable",
                        "type" => "switch"
                    ),
                    "default_value" => true
                ),
                array(
                    "if" => "@attrs.title_show",
                    "content" => [
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.title_font_size",
                            "attrs" => array(
                                "label" => "Title Font Size",
                                "type" => "slider",
                                "config" => array(
                                    "min" => 0,
                                    "max" => 100,
                                    "step" => 1
                                )
                            ),
                            "default_value" => 11,
                            "styles" => array(
                                "@id .dragifywp-menu-column-title" => array(
                                    "fontSize" => "{{@model}}px"
                                )
                            )
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.title_font_weight",
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
                                "@id .dragifywp-menu-column-title" => array(
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
                                    "min" => -0.2,
                                    "max" => 1,
                                    "step" => 0.01
                                )
                            ),
                            "default_value" => 0.1,
                            "styles" => array(
                                "@id .dragifywp-menu-column-title" => array(
                                    "letterSpacing" => "{{@model}}em"
                                )
                            )
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.title_text_transform",
                            "attrs" => array(
                                "label" => "Text Transform",
                                "type" => "text-transform"
                            ),
                            "default_value" => "uppercase",
                            "styles" => array(
                                "@id .dragifywp-menu-column-title" => array(
                                    "textTransform" => "{{@model}}"
                                )
                            )
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.title_margin_btm",
                            "attrs" => array(
                                "label" => "Margin Bottom",
                                "type" => "slider",
                                "config" => array(
                                    "min" => 0,
                                    "max" => 100,
                                    "step" => 1
                                )
                            ),
                            "default_value" => 10,
                            "styles" => array(
                                "@id .dragifywp-menu-column-title" => array(
                                    "marginBottom" => "{{@model}}px"
                                )
                            )
                        ),
                        array(
                            "tag" => "editor-field",
                            "bind_to" => "@attrs.title_color",
                            "attrs" => array(
                                "label" => "Title Color",
                                "type" => "colorpicker"
                            ),
                            "default_value" => $manager::$colors["heading"],
                            "styles" => array(
                                "@id .dragifywp-menu-column-title" => array(
                                    "color" => "{{@model}}"
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
                "label" => "Emphasis Tag",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.em_bg",
                    "attrs" => array(
                        "label" => "Background",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "@id em" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.em_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary_context"],
                    "styles" => array(
                        "@id em" => array(
                            "color" => "{{@model}}"
                        )
                    )
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Arrow",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.arrow",
                    "attrs" => array(
                        "label" => "Enable",
                        "type" => "switch"
                    ),
                    "default_value" => false
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Hidden & Class",
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
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.class",
                    "attrs" => array(
                        "label" => "Custom Class",
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
<div class="dragifywp-dnd__emptyItem dragifywp-dnd__emptyItem--h" style="width:140px;" ng-if="!$ctrl.edited.attrs.menu_id">
    <span class="dragifywp-dnd__emptyItem__label">Mega Menu</span>
</div>

<div class="dragifywp-header__hMegaMenu {{::$ctrl.getID()}}"
     ng-class="[{'dragifywp-header__hMegaMenu--arrow' : $ctrl.edited.attrs.arrow},{'dragifywp-header__hMegaMenu--title' : $ctrl.edited.attrs.title_show},$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]">
    <lb-menu-vs node_id="{{::$ctrl.getID()}}" ng-model="$ctrl.edited.attrs.menu_id" ng-one-page="$ctrl.edited.attrs.one_page" ng-event-callback="horizontalMegaMenu"></lb-menu-vs>
</div>
<?php
$widget['visual_view'] = ob_get_clean();
$manager->add($widget);

add_shortcode('lhb_h_mega_menu', 'lhb_h_mega_menu_callback');
function lhb_h_mega_menu_callback($attrs) {
    $attrs = shortcode_atts(array(
        'menu_id' => "0",
        'hidden' => '',
        'class' => '',
        'title_show' => 'true',
        'class_id' => '',
        'arrow' => 'false',
        'one_page' => 'false'
    ), $attrs, DragifyWPHeaderBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    if(dragifywp_to_boolean($attrs['arrow'])){
        $classes[] = 'dragifywp-header__hMegaMenu--arrow';
    }

    if(dragifywp_to_boolean($attrs['title_show'])){
        $classes[] = 'dragifywp-header__hMegaMenu--title';
    }


    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if (dragifywp_to_boolean($attrs['one_page'])) {
        $classes[] = 'dragifywp-onePageMenu';
    }

    $classes[] = $attrs['class_id'];

    $html = '<div class="dragifywp-header__hMegaMenu ' . implode(' ', $classes).'">';
    $html .=dragifywp_get_menu_content($attrs['menu_id']);
    $html .= '</div>';

    return $html;
}