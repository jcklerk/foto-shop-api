<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Title
    |--------------------------------------------------------------------------
    |
    | The title of your API documentation.
    |
    */
    "title" => env("SWAGGER_TITLE", "Api Documentation"),

    /*
    |--------------------------------------------------------------------------
    | API Description
    |--------------------------------------------------------------------------
    |
    | The description of your API.
    |
    */
    "description" => env("SWAGGER_DESCRIPTION", "Laravel autogenerate swagger"),

    /*
    |--------------------------------------------------------------------------
    | API Email
    |--------------------------------------------------------------------------
    |
    | The email associated with your API documentation.
    |
    */
    "email" => env("SWAGGER_EMAIL", "hussein4alaa@gmail.com"),

    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | The version of your API.
    |
    */
    "version" => env("SWAGGER_VERSION", "3.0.7"),

    /*
    |--------------------------------------------------------------------------
    | Enable Response Schema
    |--------------------------------------------------------------------------
    |
    | Whether to enable response schema or not.
    |
    */
    "enable_response_schema" => true,

    /*
    |--------------------------------------------------------------------------
    | Stop Saving Response
    |--------------------------------------------------------------------------
    |
    | Whether to stop saving responses or not.
    |
    */
    "stop_saving_response" => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Middlewares
    |--------------------------------------------------------------------------
    |
    | List of middleware names used for authentication.
    |
    */
    "auth_middlewares" => [
        "auth",
        "auth:sanctum"
    ],

    /*
    |--------------------------------------------------------------------------
    | API URL
    |--------------------------------------------------------------------------
    |
    | The URL path for accessing your API documentation.
    |
    */
    "url" => env("SWAGGER_URL", "documentation"),

    /*
    |--------------------------------------------------------------------------
    | Issues URL
    |--------------------------------------------------------------------------
    |
    | The URL path for accessing issues related to your API documentation.
    |
    */
    "issues_url" => env("SWAGGER_ISSUE_URL", "issues"),

    /*
    |--------------------------------------------------------------------------
    | Enable Swagger
    |--------------------------------------------------------------------------
    |
    | Whether Swagger is enabled or not.
    |
    */
    "enable" => env('SWAGGER_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Show Prefix
    |--------------------------------------------------------------------------
    |
    | List of prefixes to show in Swagger.
    |
    */
    "show_prefix" => [],


    /*
    |--------------------------------------------------------------------------
    | API Versions
    |--------------------------------------------------------------------------
    |
    | List of versions to show in Swagger.
    |
    */
    "versions" => [
        "all",
        // "v1",
    ],

    "default" => "all",


    /*
    |--------------------------------------------------------------------------
    | Servers
    |--------------------------------------------------------------------------
    |
    | List of servers associated with your API.
    |
    */
    "servers" => [
        [
            "url" => env("APP_URL"),
            "description" => "application on this server"
        ],
        // [
        //     "url" => "http://localhost",
        //     "description" => "production"
        // ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Security Schemes
    |--------------------------------------------------------------------------
    |
    | Security schemes used in your API.
    |
    */
    "security_schemes" => [
        "authorization" => [
            "type" => "bearerToken", // need correct type for auth.
            "name" => "authorization",
            "in" => "header"
        ],
        // "apiKey1" => [
        //     "type" => "apiKey",
        //     "name" => "key1",
        //     "in" => "query"
        // ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Status
    |--------------------------------------------------------------------------
    |
    | HTTP response statuses for various methods.
    |
    */
    "status" => [
        "GET" => [
            "200" => [
                "description" => "Successful Operation",
            ],
            "400" => [
                "description" => "Bad Request"
            ], 
            "404" => [
                "description" => "Not Found"
            ],
            "429" => [
                "description" => "Too many attempts"
            ],
            "422" => [
                "description" => "Validation Issues"
            ],
            "500" => [
                "description" => "Server Error"
            ],
            "405" => [
                "description" => "Validation exception"
            ]
        ],
        "POST" => [
            "200" => [
                "description" => "Successful Operation",
            ],
            "400" => [
                "description" => "Bad Request"
            ], 
            "404" => [
                "description" => "Not Found"
            ],
            "429" => [
                "description" => "Too many attempts"
            ],
            "422" => [
                "description" => "Validation Issues"
            ],
            "500" => [
                "description" => "Server Error"
            ],
            "405" => [
                "description" => "Validation exception"
            ]
        ],
        "PUT" => [
            "200" => [
                "description" => "Successful Operation",
            ],
            "400" => [
                "description" => "Bad Request"
            ], 
            "404" => [
                "description" => "Not Found"
            ],
            "429" => [
                "description" => "Too many attempts"
            ],
            "422" => [
                "description" => "Validation Issues"
            ],
            "500" => [
                "description" => "Server Error"
            ],
            "405" => [
                "description" => "Validation exception"
            ]
        ],
        "PATCH" => [
            "200" => [
                "description" => "Successful Operation",
            ],
            "400" => [
                "description" => "Bad Request"
            ], 
            "404" => [
                "description" => "Not Found"
            ],
            "429" => [
                "description" => "Too many attempts"
            ],
            "422" => [
                "description" => "Validation Issues"
            ],
            "500" => [
                "description" => "Server Error"
            ],
            "405" => [
                "description" => "Validation exception"
            ]
        ],
        "DELETE" => [
            "200" => [
                "description" => "Successful Operation",
            ],
            "400" => [
                "description" => "Bad Request"
            ], 
            "404" => [
                "description" => "Not Found"
            ],
            "429" => [
                "description" => "Too many attempts"
            ],
            "422" => [
                "description" => "Validation Issues"
            ],
            "500" => [
                "description" => "Server Error"
            ],
            "405" => [
                "description" => "Validation exception"
            ]
        ],
    ],

];
