<?php
$manager = DragifyWPFooterBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Grid",
    "tag" => "grid",
    "native" => true,
    "core" => true,
    "nested" => true,
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Setting",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.break",
                    "attrs" => array(
                        "label" => "Column Break",
                        "type" => "res-class",
                        "config" => array(
                            "prefix" => "dragifywp-grid",
                            "devices" => ["desktop","tablet","mobile"],
                            "suffix" => "break"
                        ),
                        "desc" => "Select the device to force one column per row."
                    ),
                    "default_value" => ""
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.max_width",
                    "attrs" => array(
                        "label" => "Max Width",
                        "type" => "res-unit",
                        "config" => array(
                            "setting" => array(
                                "min" => 0,
                                "max" => 1500,
                                "step" => 1
                            ),
                            "units" => ["px","%","vw"]
                        )
                    ),
                    "default_value" => array(
                        "desktop" => "100%"
                    ),
                    "responsive_styles" => array(
                        "@id .dragifywp-grid__container" => array(
                            "maxWidth" => "{{@model}}"
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
    ],
    "child" => array(
        "tag" => "grid_column",
        "native" => true,
        "content" => [
            array(
                "bind_to" => "@attrs.width"
            )
        ]
    )
);

ob_start();
?>
<div class="dragifywp-grid dragifywp-row {{::$ctrl.getID()}}" ng-class="[$ctrl.edited.attrs.break,$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]" id="{{$ctrl.edited.attrs.id}}">
    <div class="dragifywp-grid__container">
        <div class="dragifywp-column dragifywp-col-{{::column.attrs.width}}" ng-repeat="column in ::$ctrl.edited.content">

            <div class="dragifywp-dnd__dropMe dragifywp-dnd__dropMe--lv3 dragifywp-dnd__dropMe--nested">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <dragifywp-nested-item-list model="column" parent="$ctrl.edited"></dragifywp-nested-item-list>
        </div>
    </div>
    <div class="dragifywp-dnd__visualBlock"></div>
</div>
<?php
$widget['visual_view'] = ob_get_clean();
$manager->add($widget);


add_shortcode('lfb_grid', 'lfb_grid_callback');
function lfb_grid_callback($attrs, $content) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'hidden' => '',
        'break' => ''
    ), $attrs, DragifyWPFooterBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    if ($attrs['class']) {
        $classes[] = $attrs['class'];
    }

    if ($attrs['hidden']) {
        $classes[] = $attrs['hidden'];
    }

    if ($attrs['break']) {
        $classes[] = $attrs['break'];
    }

    $classes[] = $attrs['class_id'];
    $id = $attrs['id'] ? ' id="' . $attrs['id'] . '"' : '';

    ob_start(); ?>
    <div class="dragifywp-grid dragifywp-row <?php echo implode(' ', $classes); ?>"<?php echo $id; ?>><div class="dragifywp-grid__container"><?php echo do_shortcode($content); ?></div></div>
    <?php
    return ob_get_clean();
}

add_shortcode('lfb_grid_column', 'lfb_grid_column_callback');
function lfb_grid_column_callback($attrs, $content) {
    $attrs = shortcode_atts(array(
        'width' => '1-2',
    ), $attrs, DragifyWPFooterBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    ob_start(); ?>
    <div class="dragifywp-column dragifywp-col-<?php echo $attrs['width']; ?>"><?php echo do_shortcode($content); ?></div>
    <?php
    return ob_get_clean();
}