<?php
class DragifyWPPageBuilderWidgetManager
{
	protected static $instance = null;
	public static $dirs = array();
	public static $rest_url = '';

	public static $colors = array(
			'primary' => '#44D284',
			'heading' => '#32435c',
			'border' => '#dddddd',
			'desc' => '#999999',
			'text' => '#444444',
			'primary_context' => '#ffffff',
			'body' => '#ffffff',
			'body_diff' => '#fafafa'
	);

	public static $text = array(
			'heading' => 'Build Websites Fast & Furious',
			'paragraph' => 'No more wasting time of switching between backend and frontend. Instantly check your site while editing'
	);

	private static $widgets = [];
	public static $scripts = [];

	protected function __construct()
	{
	}

	public static function enqueue_scripts()
	{
		$count = 1;
		foreach(self::$scripts as $script){
			// The value of src must be defined
			if(!isset($script["src"]) || !isset($script["type"])) continue;

			if(!isset($script["handle"])){
				$script["handle"] = "dragifywp_pagebuilder_widget_script_".$count;
				$count++;
			}

			if(!isset($script["ver"])){
				$script["ver"] = "1.0";
			}

			if(!isset($script["deps"]) || !is_array($script["deps"])){
				$script["deps"] = array();
			}

			if($script["type"] == "css"){
				if(!isset($script["media"])){
					$script["media"] = "all";
				}
				wp_enqueue_style($script["handle"], $script["src"], $script["deps"], $script["ver"], $script["media"]);
			}else if($script["type"] == "js"){
				if(!isset($script["in_footer"])){
					$script["in_footer"] = false;
				}
				wp_enqueue_script($script["handle"], $script["src"], $script["deps"], $script["ver"], $script["in_footer"]);
			}
		}
	}

	/**
	 * Add a widget for Page Builder, the external script files are accepted
	 * as by passing the second param. Please refer to the wp_register_script API
	 * 
	 * @param $widget Object of widget data
	 * @param $script Object the exteral css or js files
	 * 
	 * @example
	 * $script = Array(
	 * 	Array(
	 * 	   "src": link of the external resource,	
	 *     "type": "css" | "js"	 	 
	 * 	)
	 * )	 
	 */
	public static function add($widget, $scripts = null)
	{
		if(array_key_exists('native',$widget) && $widget['native']){
			$widget['icon_url'] = static::$dirs['img'].(str_replace('_', '-', $widget['tag'])).'.png';
		}else if(!array_key_exists('icon_url', $widget)){
			$widget['icon_url'] = static::$dirs['img'].'default.png';
		}
		self::$widgets[] = $widget;

		if($scripts != null && is_array($scripts)){
			if(is_array($scripts[0])){
				foreach($scripts as $ex_script){
					self::$scripts[] = $ex_script;
				}
			}else{
				self::$scripts[] = $scripts;
			}
		}
	}

	public static function fetch(){
		return json_encode(self::$widgets);
	}

	public static function getInstance()
	{
		if (!isset(static::$instance)) {
			static::$instance = new static;

			static::$dirs = array(
				'client_img' => DRAGIFYWP_CORE_ROOT.'/client/img',
				'img' => DRAGIFYWP_PB_DIR.'/img/widgets/'
			);

			$options = get_option('dragifywpOptions');
			if(!empty($options) && is_array($options)){
				if (!empty($options['widget_primary_color'])) {
					static::$colors['primary'] = $options['widget_primary_color'];
				}

				if (!empty($options['widget_primary_context_color'])) {
					static::$colors['primary_context'] = $options['widget_primary_context_color'];
				}

				if (!empty($options['widget_heading_color'])) {
					static::$colors['heading'] = $options['widget_heading_color'];
				}

				if (!empty($options['widget_border_color'])) {
					static::$colors['border'] = $options['widget_border_color'];
				}

				if (!empty($options['widget_desc_color'])) {
					static::$colors['desc'] = $options['widget_desc_color'];
				}

				if (!empty($options['widget_text_color'])) {
					static::$colors['text'] = $options['widget_text_color'];
				}
			}
		}
		return static::$instance;
	}
}