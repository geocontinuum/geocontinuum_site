#Footer Builder

This folder contains the main logic and style code for DRAGIFYWP Header Builder tool. However, you can find the shared code in `root/modules` and client frontend code in `root/client` folder.

## Core Sections

* `/script`: contains the main javascript logic code of the app. Some shared modules are imported from `root/modules/script`.
* `/sass`: contains the main stylesheet code of the app. Some shared modules are imported from `root/modules/scss`.
* `/megamenu`: code to register mega menu used in Mega Menu Widget.
* `/presets`: contains JSON data for pre-designed presets.
* `/widgets`: contains the APIs and the code for main widgets of the app.

## Main Modules

* `DragifyWPFooterBuilderAdmin.php`: mainly used to embed scripts for the Footer Builder app and register post-type for footers.
* `DragifyWPFooterBuilderAPI.php`: register the request endpoints based on WordPress RESTful APIs.
* `DragifyWPFooterBuilderClient.php`: register scripts code for client side.

## How to add a widget

Following is the instruction to add a simple gap widget. The widget simply contains 2 editable fields, once for changing the padding and the second for toggling class.

First, get static instance from the Footer Builder Manager

```php
<?php
$manager = DragifyWPFooterBuilderWidgetManager::getInstance();
?>
```

Second, declare an object holding data for editable fields and HTML with binding code of the widget for the preview area of Footer Builder.

```php
<?php
$widget = array(
    "name" => "Gap",
    "native" => false, // If the value is true, the icon url will be taken from root/footer-builder/img/widgets otherwises you should declare the URL as below.
    "tag" => "lfb_gap", // if the native is true the tag will automatically add `lfb_` prefix
    "keywords" => ["gap","spacing"], // This keyword for search function
    "icon" => "your icon url here",    // The icon link for the widget
    "filter" => "other", // take one of the value "other" | "media" | "text" | "image" | "grid"
    "content" => [
        array(
            "tag" => "editor-container",
            "attrs" => array(
                "label" => "Distance",
                "collapsed" => false
            ),
            "content" => [
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.distance",
                    "attrs" => array(
                        "label" => "Value",
                        "type" => "res-slider",
                        "config" => array(
                            "min" => 0,
                            "max" => 1000,
                            "step" => 1
                        )
                    ),
                    "default_value" => array(
                        "desktop" => 30
                    ),
                    "responsive_styles" => array(
                        "@id" => array(
                            "paddingTop" => "{{@model}}px"
                        )
                    )
                ),
                array(
                    "tag" => "editor-field",
                    "bind_to" => "@attrs.has_border",
                    "attrs" => array(
                        "label" => "Has Border",
                        "type" => "switch"
                    ),
                    "default_value" => false
                ),
            ]
        )
    ]
);
?>
```

The above code simply adds two fields to the editor panel, once is a slider to change the padding top and the second is a switch button to toggle CSS class. Now you have two properties holding editable values, `distance` and `has_border`. The object containing the field `distance` has `responsive_styles` field, this will be used to render CSS style. Basically, you do not have to care about that since the code will be automatically generated if the object contains `responsive_style` or `style`. If not, the associalted attribute should be used for html behaviors like toggling classes or checking a condition to render a specific content. Take a look at the behind code:

```php
<?php
ob_start();
<div class="dragifywp-gap {{::$ctrl.getID()}}" ng-class="{'dragifywp-gap--hasBorder':$ctrl.edited.attrs.has_border}"></div>
$widget['visual_view'] = ob_get_clean();
?>
```

The above code follows the template markup style of AngularJS. For more detail please check the [official doc](https://code.angularjs.org/1.5.11/docs/api/ng/directive/ngClass).

1.  `{{::$ctrl.getID()}}`: this is required as the reference for `@id` for the CSS code rendered from `distance` attribute.
2.  `{'dragifywp-gap--hasBorder':$ctrl.edited.attrs.has_border}`: toggle `dragifywp-gap--hasBorder` based on the value of `has_border`.

After that, you can add the widget using the `add` method:

```php
$manager->add($widget);
```

If your widget use external style or script (the case you develop an add-on), you can add the files using the second param. For example:

```php
<?php
$scripts = Array(
    Array(
        "type":"css",
        "src": "http://cdn.domain.com/my-file.css"
    ),
    Array(
        "type":"js",
        "src": "http://cdn.domain.com/my-file.js"
    )
)
$manager->add($widget, $scripts);
?>
```

Finally, you should declare a WordPress Shortcode for that widget

```php
<?php
add_shortcode('lfb_gap', 'lfb_gap_callback'); // lfb_gap as the `tag` attr of $widget
function lfb_gap_callback($attrs) {
    $attrs = shortcode_atts(array(
        'class_id' => '', // This is the @id
        'has_border' => '' // Remember the has_border attr
    ), $attrs, DragifyWPFooterBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

    $classes = array();

    $classes[] = $attrs['class_id'];

    if(dragifywp_is_boolean($attrs['has_border'])){
        $classes[] = 'dragifywp-gap--hasBorder';
    }

    ob_start(); ?>
    <div class="dragifywp-gap <?php echo implode(' ', $classes); ?>"></div>
    return ob_get_clean();
}
?>
```

This is only a simple example. To create a complicated one please take a look at particular widget files in `./widgets/list` folder. All the editor type can be found at `root/modules/script/footer.builder.js`.
