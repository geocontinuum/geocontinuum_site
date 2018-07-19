# DRAGIFYWP Framework

This folder contains the main logic and style code for DRAGIFYWP Site Options and Live Customizer tool.

## Core Sections

* `/metabox`: provides the custom metabox fields for page and post.
* `/site-options`: register panels for DRAGIFYWP Live Customizer and Site Options using DRAGIFYWP website builder APIs.
* `/page-builder-widgets`: register widgets for Page Builder using DRAGIFYWP website builder APIs.
* `/theme-scripts`: the main frontend script and style of the theme.

## Main Modules

* `DragifyWPOptions.php`: add backend menu and toolbar and enqueue frontend script.
* `DragifyWPBackendOptions.php`: mainly used to embed scripts for the Site Options app.
* `DragifyWPFrontendOptions.php`: mainly used to embed scripts for the Live Customizer app.
* `DragifyWPOptionsAPI.php`: register the request endpoints based on WordPress RESTful APIs.
* `initial_data.json`: contains the default data after installing the plugin.
