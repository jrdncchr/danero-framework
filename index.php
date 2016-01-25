<?php
/* This is where everything starts.
 * All request starts, parsed and processed here.
 */

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ENVIRONMENT', 'development');
} else {
    define('ENVIRONMENT', 'production');
}

/* Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;

        case 'testing':
        case 'production':
            error_reporting(0);
            ini_set('display_errors', 0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}

require_once "system/World.php";










