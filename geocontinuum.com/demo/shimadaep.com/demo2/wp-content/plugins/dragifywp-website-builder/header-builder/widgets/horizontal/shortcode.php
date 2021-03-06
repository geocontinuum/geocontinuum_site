<?php
$manager = DragifyWPHeaderBuilderWidgetManager::getInstance();

$widget = array(
    "name" => "Shortcode",
    "tag" => "h_shortcode",
    "keywords" => ["shortcode"],
    "native" => true,
    "h_nav" => true,
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
                    "bind_to" => "@content",
                    "attrs" => array(
                        "label" => "Shortcode",
                        "type" => "textarea"
                    ),
                    "default_value" => ""
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
    <div class="dragifywp-dnd__emptyItem dragifywp-dnd__emptyItem--v" style="height:100px;" ng-if="!$ctrl.edited.content">
        <span class="dragifywp-dnd__emptyItem__label">Shortcode</span>
    </div>

    <div class="dragifywp-shortcode {{::$ctrl.getID()}}"
         ng-class="[$ctrl.edited.attrs.class, $ctrl.edited.attrs.hidden]"
         id="{{$ctrl.edited.attrs.id}}">
        <lb-shortcode-vs ng-model="$ctrl.edited.content"></lb-shortcode-vs>
    </div>
<?php
$widget['visual_view'] = ob_get_clean();
$manager->add($widget);

add_shortcode('lhb_h_shortcode', 'lhb_h_shortcode_callback');
function lhb_h_shortcode_callback($attrs, $content = null) {
    $attrs = shortcode_atts(array(
        'class_id' => '',
        'class' => '',
        'id' => '',
        'hidden' => ''
    ), $attrs, DragifyWPHeaderBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

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
    <div class="dragifywp-shortcode <?php echo implode(' ', $classes); ?>"<?php echo $id; ?>>
        <?php echo do_shortcode($content); ?>
    </div>
    <?php
    return ob_get_clean();
}