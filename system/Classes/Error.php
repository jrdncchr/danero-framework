<?php

class Error {

    public static function display($type, $message = "", $exit = TRUE) {
        switch($type) {

            case 'PDO_ERROR':
            case 'MODEL_NOT_FOUND':
            case 'VIEW_NOT_FOUND':
                self::show("This is embarrassing. Something went wrong!", $message);
                break;

            case 'NOT_FOUND':
                self::show("Sorry but the page was found.", $message);
                break;

            case 'UNDER_ATTACK':
                self::show("Oh ohh. Unauthorized Request.", $message);
                break;
        }

        if($exit) {
            exit;
        }
    }

    private static function show($error_message, $hidden_message) {
        $error_view_path = getcwd() . "/system/Pages/error.php";
        if(file_exists($error_view_path)) {
            include $error_view_path;
        } else {
            Error::display('VIEW_NOT_FOUND');
        }
    }
}