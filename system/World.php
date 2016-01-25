<?php

/* Default Constants
 */
define('ROOT', getcwd());

/* Include config files and auto load the needed classes.
 */
include_once ROOT . "/app/config.php";
include_once "Functions.php";
include_once "Constants.php";

spl_autoload_register(function ($class) {
    include_once 'Classes/' . $class . '.php';
});

/* Lets GO!
 */
Castle::initialize();
