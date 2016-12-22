<?php

return [

    /**
     * unique id
     */
    'realm' => env('DIGEST_REALM'),

    /**
     * user name/login
     *
     * only work when DIGEST_DRIVER is set to env
     */
    'user' => env('DIGEST_USER', 'digest-user'),

    /**
     * user password
     *
     * only work when DIGEST_DRIVER is set to env
     */
    'password' => env('DIGEST_PASS', 'digest-password'),

    /**
     * If you want use user from database set 'db'
     * If you want use user from .env file set 'env
     *
     * Possible variables: env, db
     */
    'driver' => env('DIGEST_DRIVER', 'db'),
];
