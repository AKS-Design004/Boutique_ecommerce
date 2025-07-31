<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configuration des performances
    |--------------------------------------------------------------------------
    |
    | Ce fichier contient les paramètres d'optimisation des performances
    | pour l'application e-commerce.
    |
    */

    'images' => [
        'sizes' => [
            'thumb' => [150, 150],
            'small' => [300, 300],
            'medium' => [600, 600],
            'large' => [800, 800],
            'original' => [1200, 1200]
        ],
        'quality' => [
            'thumb' => 70,
            'small' => 80,
            'medium' => 85,
            'large' => 85,
            'original' => 90
        ],
        'formats' => ['jpg', 'webp'],
        'lazy_loading' => true,
        'preload_critical' => true
    ],

    'cache' => [
        'images' => [
            'duration' => 31536000, // 1 an
            'headers' => [
                'Cache-Control' => 'public, max-age=31536000',
                'Vary' => 'Accept-Encoding'
            ]
        ],
        'pages' => [
            'duration' => 3600, // 1 heure
            'headers' => [
                'Cache-Control' => 'public, max-age=3600'
            ]
        ]
    ],

    'compression' => [
        'gzip' => true,
        'brotli' => true,
        'minify_html' => true,
        'minify_css' => true,
        'minify_js' => true
    ],

    'cdn' => [
        'enabled' => env('CDN_ENABLED', false),
        'url' => env('CDN_URL', ''),
        'images_path' => env('CDN_IMAGES_PATH', 'images/')
    ],

    'lazy_loading' => [
        'enabled' => true,
        'threshold' => 0.1,
        'root_margin' => '50px 0px'
    ],

    'preloading' => [
        'critical_images' => true,
        'fonts' => true,
        'css' => true
    ],

    'optimization' => [
        'database_queries' => true,
        'eager_loading' => true,
        'query_caching' => true,
        'page_caching' => false // À activer en production
    ]
]; 