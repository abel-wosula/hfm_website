<?php
return [

    'paths' => ['api/*', 'graphql'], // Add 'graphql' to the paths array

    'allowed_methods' => ['*'], // Allow all HTTP methods

    'allowed_origins' => ['http://localhost:5173'], // Allow your frontend origin

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Allow all headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
