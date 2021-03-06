<?php


// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Timezone
date_default_timezone_set('Asia/Tehran');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);

// Error Handling Middleware settings
$settings['error'] = [

    // Should be set to false in production
    'display_error_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

$settings['db'] = [
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'php_mvc',
    'username' => 'root',
    'password' => '',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'prefix' => '',
    'options' => [
        // Turn off persistent connections
        PDO::ATTR_PERSISTENT => false,
        // Enable exceptions
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Emulate prepared statements
        PDO::ATTR_EMULATE_PREPARES => true,
        // Set default fetch mode to array
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Set character set
    ],
];

$settings['MAIL'] = [

    'SMTP' => [
        'Host'       => 'smtp.gmail.com',
        'SMTPAuth'   => true,
        'Username'   => 'avrpic8@gmail.com',
        'Password'   => '1804154318041',
        'Port'       => 587,
        'setFrom'    => [
            'mail'  =>  'avrpic8@gmail.com',
            'name'  =>  'PHP-MVC'
        ]
    ]
];

$settings['APP'] = [
    'APP_TITLE' => 'Amlak-slim4',
    'BASE_URL'  => 'https://phpmvc.iran.liara.run',
    'BASE_DIR'  => dirname(__DIR__),
    'locale'    => 'en',
    'fallback_locale' => 'en',
    'providers' =>[
        \App\Providers\SessionProvider::class,
        \App\Providers\DatabaseProvider::class
    ]
];

return $settings;