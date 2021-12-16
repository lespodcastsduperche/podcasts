<?php

/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package podcasts
 * @version 1.0
 */


declare(strict_types=1);

/**
 * Loads Les Podcasts du Perche files.
 */
require_once get_stylesheet_directory() . '/inc/api.php';
require_once get_stylesheet_directory() . '/inc/mimes.php';
require_once get_stylesheet_directory() . '/inc/theming.php';
require_once get_stylesheet_directory() . '/inc/tracking.php';

/**
 * Add Actions
 */
add_action('wp_enqueue_scripts', '\podcasts\theming\enqueueScripts'); // Add theme stylesheet and custom scripts
add_action('login_enqueue_scripts', '\podcasts\theming\enqueueLoginScripts'); // Add login stylesheet and custom scripts

/**
 * Add Filters
 */
add_filter('xmlrpc_enabled', '__return_false'); // Disables XML RPC API
add_filter('rest_authentication_errors', '\podcasts\api\setAuthenticationForREST'); // Forces authentication on REST API
add_filter('upload_mimes', '\podcasts\mimes\updateAllowedMimes'); // Updates allowed mime types and file extensions.
add_filter('feed_links_show_comments_feed', '__return_false'); // Removes comments feed
//add_filter('post_comments_feed_link','remove_comments_rss'); see https://developer.wordpress.org/reference/functions/post_comments_feed_link/
add_filter('the_generator', '__return_empty_string'); // Removes WordPress version number from head and rss
add_filter('style_loader_src', '\podcasts\tracking\removeWordPressVersionTag', 10, 2); // Remove the version parameter, ver=, from enqueued CSS script
add_filter('script_loader_src', '\podcasts\tracking\removeWordPressVersionTag', 10, 2); // Remove the version parameter, ver=, from enqueued JS script
add_filter('login_headerurl', '\podcasts\theming\updateLoginHeaderUrl'); // Filter the url of the logo in WordPress login page.
add_filter('login_headertext', '\podcasts\theming\updateLoginHeaderText'); // Filters the title attribute of the header logo in WordPress login page.
