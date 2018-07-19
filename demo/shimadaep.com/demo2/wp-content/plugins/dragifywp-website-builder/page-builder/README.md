#Page Builder

This folder contains the main logic and style code for DRAGIFYWP Page Builder tool. However, you can find the shared code in `root/modules` and client frontend code in `root/client` folder.

## Core Sections

* `/script`: contains the main javascript logic code of the app. Some shared modules are imported from `root/modules/script`.
* `/sass`: contains the main stylesheet code of the app. Some shared modules are imported from `root/modules/scss`.
* `/cards`: contains JSON data for pre-designed block. The cards are organized in different files based on their types as filter values.
* `/widgets`: contains the APIs and the code for main widgets of the app.

## Main Modules

* `DragifyWPPageBuilderAdmin.php`: mainly used to embed scripts for the Page Builder app and register post-type for templates, cards.
* `DragifyWPPageBuilderAPI.php`: register the request endpoints based on WordPress RESTful APIs.
* `DragifyWPPageBuilderClient.php`: register scripts code for client side.

## How to add a card (or block)

1.  Build a card by adding widgets to a section, styling the section and its inside widgets as you wish.
2.  Right click on the section then select **export** to export the JSON file.
3.  Extra the data from **content** property.
    ```js
    {"identify":"e2d10f942b580a563cb208b4e3238bd4","templates":[{"template_name":"Media 8","type":"section","content":{....}}]}
    ```
4.  Copy and paste the data into one of the JSON files in `/cards` folders. In the case you upload your own images, for example, on localhost. You can use following regex pattern for replacement: `http://localhost[^"]+\/` replace with `VNyFbKKOovtiFFyHYybt/`. Later when import the json data to your site database, the `VNyFbKKOovtiFFyHYybt/` will be replaced by your domain with the directory refering to `root/photos` folder.

5.  Create the card image, name it correctly and put the image into the `/img/cards` folder. (recommended using [Chrome Dev Tool](https://developers.google.com/web/updates/2017/08/devtools-release-notes#node-screenshots)).

## How to add a widget

Following is the instruction to add a simple gap widget. The widget simply contains 2 editable fields, once for changing the padding and the second for toggling class.

First, get static instance from the Page Builder Manager

```php
<?php
$manager = DragifyWPPageBuilderWidgetManager::getInstance();
?>
```

Second, declare an object holding data for editable fields and HTML with binding code of the widget for the preview area of Page Builder.

```php
<?php
$widget = array(
    "name" => "Gap",
    "native" => false, // If the value is true, the icon url will be taken from root/page-builder/img/widgets otherwises you should declare the URL as below.
    "tag" => "dragifywp_gap", // if the native is true the tag will automatically add `dragifywp_` prefix
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
add_shortcode('dragifywp_gap', 'dragifywp_gap_callback'); // dragifywp_gap as the `tag` attr of $widget
function dragifywp_gap_callback($attrs) {
    $attrs = shortcode_atts(array(
        'class_id' => '', // This is the @id
        'has_border' => '' // Remember the has_border attr
    ), $attrs, DragifyWPPageBuilderClient::DRAGIFYWP_SHORTCODE_ATTS_FILTER);

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

This is only a simple example. To create a complicated one please take a look at particular widget files in `./widget/list` folder. All the editor type can be found at `root/modules/script/page.builder.js`.
