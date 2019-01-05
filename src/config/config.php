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
                | Mocan Response Format
                |--------------------------------------------------------------------------
                |
                | Response format. By default, response format will be returned in XML.
                | Supported formats are:
                | * XML
                | * JSON
                |
                */

                'MOCEAN_RESP_FORMAT' => getenv('MOCEAN_RESP_FORMAT') ?: '',
            ],
        ],
    ],
];
