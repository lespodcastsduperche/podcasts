<?php

/**
 * Tracking customization
 *
 * @link https://developer.wordpress.org/reference/functions/the_generator/
 *
 */

declare(strict_types=1);

namespace podcasts\tracking;

/**
 * Removes WordPress version parameter from any enqueued scripts.
 *
 * @param string $sSrc The source URL of the enqueued style.
 * @param string $sHandle The style's registered handle.
 * @return string
 */
function removeWordPressVersionTag(string $sSrc, string $sHandle): string
{
    if (false !== strpos($sSrc, '?ver=' . \get_bloginfo('version'))) {
        $sSrc = \remove_query_arg('ver', $sSrc);
    }
    return $sSrc;
}
