<?php

/**
 * Theme customization
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 */

declare(strict_types=1);

namespace podcasts\theming;

/**
 * Enqueue scripts and styles.
 */
function enqueueScripts()
{
    // Register the CSS stylesheet.
    if (\wp_register_style('podcasts-style', \get_stylesheet_directory_uri() . '/style.css', [], null, 'all')) {
        \wp_enqueue_style('podcasts-style'); // Enqueue it!
    }
}

/**
 * Enqueue scripts and styles for login form
 */
function enqueueLoginScripts()
{
    echo '<style type="text/css">#login h1 a{background-image:url(' . \get_stylesheet_directory_uri() . '/images/podcastsduperche_squared.svg);background-size: 200px;height: 200px;margin: 0 auto;width: 200px;}</style>';
}

/**
 * Filters the title attribute of the header logo above login form.
 *
 * @param string $sTitle The title.
 * @return string
 */
function updateLoginHeaderText(string $sTitle): string
{
    return \esc_attr(\get_bloginfo('description'));
}

/**
 * Filters the url attribute of the header logo above login form.
 *
 * @param string $sUrl The URL.
 * @return string
 */
function updateLoginHeaderUrl(string $sUrl): string
{
    return \esc_url(\get_site_url());
}
