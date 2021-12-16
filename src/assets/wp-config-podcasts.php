<?php

/**
 * The extended configuration for WordPress
 * Add those directives to the wp-config.php
 *
 * Project URL: https://github.com/lespodcastsduperche/podcasts
 * Author: Olivier Jullien <https://github.com/ojullien>
 *
 * @package lespodcastsduperche.com
 */

/* Custom WordPress editor */
define('WP_POST_REVISIONS', 1);
define('EMPTY_TRASH_DAYS', 90); // 30 days
define('AUTOSAVE_INTERVAL', 160); // Seconds
//define( 'DISALLOW_FILE_EDIT', true );
//define( 'DISALLOW_FILE_MODS', true );

/* Custom WordPress admin */
define('FORCE_SSL_ADMIN', true);
define('WP_SITEURL', 'https://lespodcastsduperche.com');
define('WP_HOME', 'https://lespodcastsduperche.com');
//define( 'DISABLE_WP_CRON', true );
//define( 'WP_CRON_LOCK_TIMEOUT', 60 );

/* Custom WordPress database
* Then access the following URL: /wp-admin/maint/repair.php
*/
define('WP_ALLOW_REPAIR', false);

/* Custom WordPress theme */
define('CONCATENATE_SCRIPTS', true);
define('WP_CACHE', true);

// Block External URL Requests
define('WP_HTTP_BLOCK_EXTERNAL', false);
//define('WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,*.github.com');

/* Custom PHP */
//define('WP_MEMORY_LIMIT', '256M');
//define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/* debugging */
define('WP_DEBUG', false);

if (WP_DEBUG) {
    // Enable/Disable Debug logging to the /wp-content/debug.log file
    define('WP_DEBUG_LOG', true);
    // Enable/Disable display of errors and warnings
    define('WP_DEBUG_DISPLAY', false);
    // Saves the database queries to an array and that array can be displayed to help analyze those queries.
    define('SAVEQUERIES', false);
    // Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
    define('SCRIPT_DEBUG', false);
    @ini_set('display_errors', 0);
}
