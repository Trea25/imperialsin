<?php

return [
    /*
     * In order to integrate the Facebook SDK into your site,
     * you'll need to create an app on Facebook and enter the
     * app's ID and secret here.
     *
     * Add an app: https://developers.facebook.com/apps
     *
     * You can add additional config options here that are
     * available on the main Facebook\Facebook super service.
     *
     * https://developers.facebook.com/docs/php/Facebook/5.0.0#config
     *
     * Using environment variables is the recommended way of
     * storing your app ID and app secret. Make sure to update
     * your /.env file with your app ID and secret.
     */
    'facebook_config' => [
        'app_id' => '240850866276544',
        'app_secret' => '513577773e9c0ecc7e309497722db46a',
        'default_graph_version' => 'v2.6',
        
    ],

    /*
     * The default list of permissions that are
     * requested when authenticating a new user with your app.
     * The fewer, the better! Leaving this empty is the best.
     * You can overwrite this when creating the login link.
     *
     * Example:
     *
     * 'default_scope' => ['email', 'user_birthday'],
     *
     * For a full list of permissions see:
     *
     * https://developers.facebook.com/docs/facebook-login/permissions
     */
    'default_scope' => [],

    /*
     * The default endpoint that Facebook will redirect to after
     * an authentication attempt.
     * S'ha de canviar si es canvia de servidor
     */
    'default_redirect_uri' => 'http://festesdesants-definitiu.dev:8000/callback',

    ];
