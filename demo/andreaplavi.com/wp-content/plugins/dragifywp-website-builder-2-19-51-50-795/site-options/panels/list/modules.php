<?php
$manager = DragifyWPOptionsManager::getInstance();

$manager::addPanel("modules", array(
    "side" => "backend",
    "icon" => "plug",
    "name" => "Module Activation",
    "models" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Modules",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "attrs" => array(
                        "type" => "desc",
                        "fullwidth" => "true",
                        "config" => array(
                            "message" => "Some parts of Theme Stylist might not be necessary to use in your site. Uncheck the unused modules to disable them on Frontend Editor, this will make sure that these parts will not appear and the their associated style code will not be generated by the Frontend Editor."
                        )
                    ),
                    "default_value" => ""
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "exclude_modules",
                    "attrs" => array(
                        "label" => "Active Modules",
                        "fullwidth" => true,
                        "type" => "module-list"
                    ),
                    "default_value" => []
                )
            ]
        )
    ]
), 9999);

?>