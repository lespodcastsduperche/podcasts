<?php

/**
 * WordPress REST API
 *
 * @link https://developer.wordpress.org/rest-api/
 *
 */

declare(strict_types=1);

namespace podcasts\mimes;

/**
 * Add more or remove allowed mime types and file extensions.
 *
 * @param array $aMimes The list of the default allowed mime types.
 * @return array
 */
function updateAllowedMimes(array $aMimes): array
{
    // Remove java and c/c++ file extentions.
    unset($aMimes['class']);
    unset($aMimes['txt|asc|c|cc|h|srt']);
    // New allowed mime types.
    $aMimes['txt|asc|srt'] = 'text/plain';
    $aMimes['svg'] = 'image/svg+xml';
    return $aMimes;
}
