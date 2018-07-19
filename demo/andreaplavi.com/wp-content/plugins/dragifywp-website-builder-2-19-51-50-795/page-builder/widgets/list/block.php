<?php
if(get_post_type(get_the_ID()) == 'dragifywp_block'):

    $manager = DragifyWPPageBuilderWidgetManager::getInstance();

    $widget = array(
        "name" => "Block",
        "tag" => "pb_block",
        "keywords" => ["block"],
        "native" => true,
        "filter" => "other",
        "content" => [
            array(
                "tag" => "editor-container",
                "attrs" => array(
                ),
                "content" => [
                    array(
                        "tag" => "editor-field",
                        "bind_to" => "@attrs.block_id",
                        "attrs" => array(
                            "label" => "Block",
                            "type" => "selection-loader",
                            "config" => array(
                                "url" => "/dragifywp-page-builder/v1/blocks",
                                "rest_url" => true,
                                "name" => "block",
                                "add_new_url" => add_query_arg(array('post_type' => 'dragifywp_block'), admin_url('edit.php'))
                            )
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
    <div class="dragifywp-dnd__emptyItem" style="height:100px;" ng-if="!$ctrl.edited.attrs.block_id">
        <span class="dragifywp-dnd__emptyItem__label">Block</span>
    </div>

    <div class="dragifywp-block {{::$ctrl.getID()}}">
        <dragifywp-post-shortcode model="$ctrl.edited.attrs.block_id" format="[dragifywp_block id='@model']" node_id="{{::$ctrl.getID()}}"></dragifywp-post-shortcode>
    </div>
    <?php
    $widget['visual_view'] = ob_get_clean();

    $manager->add($widget);



    add_shortcode('dragifywp_pb_block', 'dragifywp_pb_block_callback');
    function dragifywp_pb_block_callback($attrs) {
        $attrs = shortcode_atts(array(
            'block_id' => '',
            'class_id' => '',
            'class' => '',
            'id' => '',
            'hidden' => ''
        ), $attrs);

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
        <div class="dragifywp-block <?php echo implode(' ', $classes); ?>"<?php echo $id; ?>>
            <?php echo do_shortcode('[dragifywp_block id="' . $attrs['block_id'] . '"]'); ?>
        </div>
        <?php
        return ob_get_clean();
    }

endif;