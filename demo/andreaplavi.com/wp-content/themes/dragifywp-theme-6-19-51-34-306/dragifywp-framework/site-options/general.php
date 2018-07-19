<?php
$manager = DragifyWPOptionsManager::getInstance();

$manager::addPanel("general", array(
    "name" => "General",
    "side" => "frontend"
),1);

$manager::addChildPanel("body", "general", array(
    "name" => "Body",
    "models" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Overflow",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "overflow_x",
                    "attrs" => array(
                        "label" => "Overflow X",
                        "type" => "toggle-class",
                        "config" => array(
                            "selector" => "body",
                            "class" => "dragifywp-body--overflowX"
                        ),
                        "desc" => "Enable this button to clip the left/right edges of your Site"
                    ),
                    "default_value" => true
                )
            ]
        ),
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Background",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "body_bg_color",
                    "attrs" => array(
                        "label" => "Background Color",
                        "type" => "colorpicker"
                    ),
                    "default_value" => "#ffffff",
                    "styles" => array(
                        "body, .dragifywp--bodyBg, #content" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "bg_image",
                    "attrs" => array(
                        "label" => "Image",
                        "type" => "upload-image",
                        "config" => array(
                            "cover" => true
                        )
                    ),
                    "default_value" => array(
                        "url" => ""
                    ),
                    "styles" => array(
                        "body" => array(
                            "backgroundImage" => "url({{@model.url}})"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "bg_props",
                    "if" => "@options.bg_image.url",
                    "attrs" => array(
                        "type" => "background-props",
                        "fullwidth" => "true"
                    ),
                    "default_value" => array(
                        "repeat" => "no-repeat",
                        "position" => "50% 50%",
                        "size" => "cover",
                        "attachment" => "scroll"
                    ),
                    "styles" => array(
                        "body" => array(
                            "backgroundRepeat" => "{{@model.repeat}}",
                            "backgroundPosition" => "{{@model.position}}",
                            "backgroundSize" => "{{@model.size}}",
                            "backgroundAttachment" => "{{@model.attachment}}"
                        )
                    )
                )
            ]
        )
    ]
));

$manager::addChildPanel("site_colors", "general", array(
    "name" => "Global Color",
    "models" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Global Colors",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "primary_color",
                    "attrs" => array(
                        "label" => "Primary",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["primary"],
                    "styles" => array(
                        "a,.lc-p,.lc-ph:hover,.lc-plh a:hover,.lc-d-p:hover,.lcs-d-p a:hover,.lc-h-p:hover,.lcs-h-p a:hover,.lcs-t-p a:hover, .lc-t-p:hover,.comment-respond .required,.comment-reply-title a,.comment-reply-title a:hover" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "heading_color",
                    "attrs" => array(
                        "label" => "Heading",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["heading"],
                    "styles" => array(
                        ".lc-h,.lc-hh:hover,.lcs-d-h a:hover,.lc-d-h:hover,.lcs-t-h a:hover,.lc-t-h:hover,.lc-h-p,.lcs-h-p a,.dragifywp-widget .dragifywp-widget__main-link, .dragifywp-widget__title,.comment-reply-link:hover,.comment-reply-title,.logged-in-as a:hover,.comment-respond label,.dragifywp-searchItem__title a" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "desc_color",
                    "attrs" => array(
                        "label" => "Description",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["desc"],
                    "styles" => array(
                        ".lc-d, .lc-dh:hover, .lcs-d-h a,.lc-d-h,.lc-d-p,.lcs-d-p a,.comment-reply-link,.comment-reply-title small a,.wp-caption-text,.gallery-caption, .dragifywp-searchItem__time,.comment-edit-link" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "text_color",
                    "attrs" => array(
                        "label" => "Text",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["text"],
                    "styles" => array(
                        ".lc-t,.lc-th:hover,.lcs-t-h a,.lc-t-h,.lcs-t-p a, .lcs-t-p,.logged-in-as a,.comment-reply-title small a:hover,.comment-edit-link:hover" => array(
                            "color" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "border_color",
                    "attrs" => array(
                        "label" => "Border",
                        "type" => "colorpicker"
                    ),
                    "default_value" => $manager::$colors["border"],
                    "styles" => array(
                        ".lc-b,.lc-bh:hover,.dragifywp-page--hasBorder .dragifywp-page__content,.dragifywp-page--hasBorder .dragifywp-page__sidebar--first,.dragifywp-widget__title--hasBorder,.widget_categories select,.dragifywp-postComment .dragifywp-singlePost__wrap,.comment-body,.comment-respond,.dragifywp-page__sidebar:before,.dragifywp-page__content:before,.widget_pages li,.widget_archive li,.widget_recent_entries li,.widget_recent_comments li, table, td, th,.dragifywp-widget" => array(
                            "borderColor" => "{{@model}}"
                        )
                    )
                )
            ]
        )
    ]
));

$manager::addChildPanel("selection_color", "general", array(
    "name" => "Selection",
    "models" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Selection Color",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "selection_bg",
                    "attrs" => array(
                        "label" => "Background",
                        "type" => "colorpicker"
                    ),
                    "default_value" => "#fff8a6",
                    "styles" => array(
                        "::-moz-selection" => array(
                            "backgroundColor" => "{{@model}}"
                        ),
                        "::selection" => array(
                            "backgroundColor" => "{{@model}}"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "selection_color",
                    "attrs" => array(
                        "label" => "Color",
                        "type" => "colorpicker",
                        "desc" => "Specify the Text & Background Color for the portion of a document that has been highlighted"
                    ),
                    "default_value" => $manager::$colors["heading"],
                    "styles" => array(
                        "::-moz-selection" => array(
                            "color" => "{{@model}}"
                        ),
                        "::selection" => array(
                            "color" => "{{@model}}"
                        )
                    )
                )
            ]
        )
    ]
));

?>