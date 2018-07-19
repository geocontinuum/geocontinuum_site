<?php
$manager = DragifyWPOptionsManager::getInstance();

$manager::addPanel("conflict", array(
        "icon" => "bomb",
        "name" => "Conflict",
        "side" => "backend",
        "models" => [
            array(
                "tag" => "editor-container",
                "attrs" => array(
                    "label" => "Megamenu",
                    "collapsed" => false
                ),
                "content" => [
                    array(
                        "tag" => "editor-field",
                        "bind_to" => "megamenu_enable",
                        "attrs" => array(
                            "type" => "switch",
                            "desc" => "If you are using another theme rather than our starter theme or a particular plugin, that theme  or plugin might include its own mega-menu code which could conflict with the mega-menu code of our header builder. Then you may want to disable our mega-menu code to avoid the conflict."
                        ),
                        "default_value" => true
                    ),
                ]
            )
        ]
    )
);

?>