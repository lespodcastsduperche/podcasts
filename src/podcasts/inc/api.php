<?php

/**
 * WordPress API (REST and XML-RPC)
 *
 * @link https://developer.wordpress.org/rest-api/
 * @link https://codex.wordpress.org/XML-RPC_WordPress_API
 *
 */

declare(strict_types=1);

namespace podcasts\api;

/**
 * Sets up a filter to require that API consumers be authenticated, which effectively prevents anonymous external access.
 * We should not disable the REST API, because doing so would break future WordPress Admin functionality that will depend on the API being active.
 *
 * @link https://developer.wordpress.org/rest-api/using-the-rest-api/frequently-asked-questions/#can-i-disable-the-rest-api
 *
 * @param WP_Error|null|bool WP_Error if authentication error, null if authentication method wasn't used, true if authentication succeeded.
 * @return WP_Error|null|bool WP_Error if the user is not logged in, the $result, otherwise true.
 */
function setAuthenticationForREST($result)
{
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if (true === $result || \is_wp_error($result)) {
        return $result;
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if (!\is_user_logged_in()) {
        return new \WP_Error(
            'rest_not_logged_in',
            __('You are not currently logged in.'),
            ['status' => 401]
        );
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
}
