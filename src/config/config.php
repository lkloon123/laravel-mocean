<?php

return [

    'mocean' => [

        /*
        |--------------------------------------------------------------------------
        | default
        |--------------------------------------------------------------------------
        |
        | Specify the default account to be used
        |
        */

        'default' => 'main',

        'accounts' => [

            'main' => [

                /*
                |--------------------------------------------------------------------------
                | Mocean Api Key
                |--------------------------------------------------------------------------
                |
                | Your Mocean Account Api key
                |
                */

                'MOCEAN_API_KEY' => getenv('MOCEAN_API_KEY') ?: '',

                /*
                |--------------------------------------------------------------------------
                | Mocean Api Secret
                |--------------------------------------------------------------------------
                |
                | Your Mocean Account Api Secret
                |
                */

                'MOCEAN_API_SECRET' => getenv('MOCEAN_API_SECRET') ?: '',

                /*
                |--------------------------------------------------------------------------
                | From
                |--------------------------------------------------------------------------
                |
                | SMS Sender ID (also referred as to SMS Sender Name) is the information that
                | is displayed to the recipient as the sender of the SMS when a message is
                | received at a mobile device.
                |
                */

                'MOCEAN_FROM' => getenv('MOCEAN_FROM') ?: '',
            ],
        ],
    ],
];
