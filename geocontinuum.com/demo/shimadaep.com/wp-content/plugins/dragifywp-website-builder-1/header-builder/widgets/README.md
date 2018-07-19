#Widgets

This folder contains the main logic and style code for DRAGIFYWP Header Builder tool. However, you can find the shared code in `root/modules` and client frontend code in `root/client` folder.

## Core Sections

* `/horizontal`: contains widget files for horizontal header. Each file contains both code for the Builder Tool as well as the WordPress Shortcode for client side.
* `/horizontal/core`: contains the core layout components of horizontal header as nav/section/column.
* `/vertical`: contains widget files for vertical header (sidebar). Each file contains both code for the Builder Tool as well as the WordPress Shortcode for client side.
* `/vertical/core`: contains the core layout components of vertical header as nav/section.

## Main Modules

* `widgets.php`: requires widgets from `./list`.
* `DragifyWPHeaderBuilderWidgetManager.php`: contains the APIs to add a widget to header builder.

## Add Widget API

```php
<?php
$manager = DragifyWPHeaderBuilderWidgetManager::getInstance();

$manager->add($widget, $scripts);
?>
```

**`$widget`**: the widget object requires the following properties:

* `name`: (string) name of the widget.
* `tag`: (string) an unique value and have to match with the shortcode name you declare later. If the value of `native` is true, the value later will be added the `lhb_` prefix.
* `native`: (boolean) if it is your own written widget the value should be `false`.
* `icon`: (string) URL of the widget icon. If the value of `native` is `false` you should fill the property, otherwise, the icon will be get from `/header-builder/img/widgets`.
* `v_nav`: (boolean) identify the widget is for Vertical Header, set `false` if the widget is for Horizontal Header.
* `keywords`: (array of string) the list of keywords used for search widget function.
* `content`: (array of object) the tree holding the editable fields for the widget. The data from that will be used to declare widget attributes to modify the behavior of the widget.
* `visual_view` (string) the HTML template based on Angular template engine. This is consider a visual view reflexting the WordPress Shortcode for the widget.

**`$scripts`**: the array holding objects of external CSS or JS files used for the widget. This param is not required if your widget do not need external scripts to run. One object should contains the following properties:

* `src`: (string) is required. The URL of the external file.
* `type`: (string) is required. Must be `js` or `css`.
* `handle`: (string) name of the script. Should be unique.
* `deps`: (array) a list of registered script handles this script depends on.
* `ver`: (string) specify script version.
* `in_footer`: (boolean) if the `type` is `js`. Whether to enqueue the script before </body> instead of in the <head>.
* `media`: (string) if the `type` is `css`. The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'.
