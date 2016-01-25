<?php

class Error {

    public static function display($type, $exit = TRUE) {
        switch($type) {

            case 'NOT_FOUND':
                echo "Page not found. (-_-)";
                break;

            case 'UNDER_ATTACK':
                echo "Unwanted request detected! t(-_-t)";
                break;
        }

        if($exit) {
            exit;
        }
    }

}