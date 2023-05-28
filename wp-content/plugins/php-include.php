<?php
/*
Plugin Name: PHP File Includer
Plugin URI: http://effectst.com/
Description: Include PHP files using a shortcode
Version: 1.0
Author: ahmed shaban
Author URI: http://effectst.com/
License: Use this how you like!
*/
// include PHP file
function PHP_Include($params = array()) {

	extract(shortcode_atts(array(
	    'file' => 'default'
	), $params));
	
	ob_start();

    	include(get_theme_root() . '/' . get_template() . "/ahmed/$file.php");

	
	return ob_get_clean();
}
// register shortcode
add_shortcode('phpinclude', 'PHP_Include');