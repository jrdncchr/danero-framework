<?php

class Error {

    public static function display($type, $exit = TRUE) {
        switch($type) {

            case 'VIEW_NOT_FOUND':
            case 'MODEL_NOT_FOUND':
                self::show("Something went wrong!", $type);
                break;

            case 'NOT_FOUND':
                self::show("Page not found.", $type);
                break;

            case 'UNDER_ATTACK':
                self::show("Unauthorized Request.", $type);
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