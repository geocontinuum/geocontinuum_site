# Site Options

This folder contains the main logic and style code for DRAGIFYWP Site Options and Live Customizer tool. However, you can find the shared code in `root/modules` and client frontend code in `root/client` folder.

## Core Sections

* `/script`: contains the main javascript logic code of the app. Some shared modules are imported from `root/modules/script`.
* `/sass`: contains the main stylesheet code of the app. Some shared modules are imported from `root/modules/scss`.
* `/panels`: contains the APIs and the code for adding custom fiels and tabs.

## Main Modules

* `DragifyWPOptions.php`: add backend menu and toolbar and enqueue frontend script.
* `DragifyWPBackendOptions.php`: mainly used to embed scripts for the Site Options app.
* `DragifyWPFrontendOptions.php`: mainly used to embed scripts for the Live Customizer app.
* `DragifyWPOptionsAPI.php`: register the request endpoints based on WordPress RESTful APIs.
* `initial_data.json`: contains the default data after installing the plugin.
