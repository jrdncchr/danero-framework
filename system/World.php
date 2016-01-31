<?php

/* Default Constants
 */
define('ROOT', getcwd());

/* Include config files and auto load the needed classes.
 */
include_once ROOT . "/app/Config/config.php";
include_once "Functions.php";
include_once "Constants.php";

spl_autoload_register(function ($class) {
    include_once 'Classes/' . $class . '.php';
});

/* Added the BaseController here by default.
 * Because I think auto loading all controllers & models even if not used is waste of runtime.
 */
$base_controller = CONTROLLERS_PATH . 'BaseController.php';
if(file_exists($base_controller)) {
    include_once $base_controller;
}


/* Lets GO!
 */
session_start();
Castle::initialize();
