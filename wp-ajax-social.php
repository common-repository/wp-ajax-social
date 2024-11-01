<?php

/*

Plugin Name: Wordpress Ajax Social

Version:     1.1

Plugin URI:  http://php-freelancer.in/wp-ajax-social-wordpress-social-plugin-to-load-social-buttonswidgets-via-ajax-to-reduce-loading-time-of-site/

Description: This plugin load social icons(facebook, twitter etc.. ) by Ajax Like Mashable.com,So by default all social code not loaded on website, instead of this it will show one common icon for social network and by clicking that icon it will load all heavy code of social network.So Ultimately this plugin will simply load a very small image instead of all social network js and other code and by this way your site will load fast and it will effect your search engine ranking.Plugin By <a href="http://php-freelancer.in"><strong>PHP Freelancer</strong></a>.You can <a href="options-general.php?page=wp-ajax-social">Configure...</a> it from <a href="options-general.php?page=wp-ajax-social">Here.

Author:      Ankur Gandhi

Author URI:  http://php-freelancer.in/





License: GNU General Public License (GPL), v3 (or newer)

License URI: http://www.gnu.org/licenses/gpl-3.0.html

Tags:Related posts, related post with images

Copyright (c) 2010 - 2012 Ankur Gandhi. All rights reserved.

 

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

*/





if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");

if ( ! defined( 'WP_CONTENT_URL' ) )

      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );

if ( ! defined( 'WP_CONTENT_DIR' ) )

      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

if ( ! defined( 'WP_PLUGIN_URL' ) )

      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );

if ( ! defined( 'WP_AJAX_SOCIAL_CSS_URL' ) )

      define( 'WP_AJAX_SOCIAL_CSS_URL', WP_CONTENT_URL. '/plugins/wp-ajax-social/css' );

require_once(dirname(__FILE__).'/inc/wp_ajax_social_init.php');

require_once(dirname(__FILE__).'/inc/admin_core.php');

require_once(dirname(__FILE__).'/inc/core.php');

if(is_admin())

{

	global $wp_ajax_social;

	add_action('init', create_function('', 'wp_enqueue_script("jquery");')); // Make sure jQuery is always loaded

	wp_enqueue_script('jquery-form');   

	//wp_enqueue_script('jscolor','/wp-content/plugins/igit-related-posts-with-thumb-images-after-posts/jsscripts/jscolor.js'); 

	wp_enqueue_style('my-style', '/wp-content/plugins/wp-ajax-social/css/wpas_style.css');

	add_action('admin_head', 'wp_ajax_social_action_javascript');
	add_action('wp_ajax_social_save_ajax', 'wp_ajax_action_callback');
	//add_action('wp_ajax_social_save_ajax', 'wp_ajax_social_action_callback');
add_action('wp_ajax_dhf_loadme_ajax', 'dhf_loadme_ajax');
	add_action('wp_ajax_nopriv_dhf_loadme_ajax', 'dhf_loadme_ajax');
	add_action('admin_menu', 'wp_ajax_social_plugin_menu'); // for admin menu inside this after clicking on plugin file function will be called.

}

else

{
add_action('init', create_function('', 'wp_enqueue_script("jquery");')); // Make sure jQuery is always loaded
	$wp_ajax_social_lat = get_option('wp_ajax_social');

	if($wp_ajax_social_lat)

	{

		$wp_ajax_social = $wp_ajax_social_lat;

	}

	//add_action('wp_head', 'wpas_add_css_style');

	if($wp_ajax_social['auto_show'] == "1")
	{

		add_filter('the_content', 'wpas_total_content');

	}
	//add_action('wp_ajax_social_load_ajax', 'wpas_front_load_icons');
	//add_action('wp_ajax_dhf_loadme_ajax', 'dhf_loadme_ajax' );
//add_action('wp_ajax_nopriv_dhf_loadme_ajax', 'dhf_loadme_ajax');
	// Include the Ajax library on the front end
	add_action( 'wp_head', 'wpas_add_ajax_library');
}

?>