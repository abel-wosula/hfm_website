<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'upload', 'graphql'], // Add 'graphql' here
    'allowed_methods' => ['*'], // Allow all HTTP methods
    'allowed_origins' => ['http://localhost:5173'], // Frontend origin
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, // Only set to true if you need credentials
];
