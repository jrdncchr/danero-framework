<?php

class Input {

    public function get($key = "") {
        if($key == "") {
            return $_GET[$key];
        }
        return $_GET;
    }

    public function post($key = "") {
        // this removes whitespace and related characters from the beginning and end of the string
        array_filter($_POST, 'trim_value');
        if($key == "") {
            return $_POST;
        }
        return trim($_POST[$key]);

    }

    public static function filterText($text) {
        $filteredText = filter_var($text,
            FILTER_SANITIZE_ENCODED,
            !FILTER_FLAG_STRIP_LOW
        );
        return $filteredText;
    }

    public static function filterString($string) {
        $filteredString = filter_var($string,
            FILTER_SANITIZE_ENCODED,
            FILTER_FLAG_STRIP_LOW
        );
        return $filteredString;
    }

    public function filterEmail($email) {
        $filteredEmail = filter_var($email,
            FILTER_SANITIZE_EMAIL
        );
        return $filteredEmail;
    }

    public static function filterInteger($integer) {
        $filteredInteger = filter_var($integer,
            FILTER_SANITIZE_NUMBER_INT
        );
        return $filteredInteger;
    }

    public static function filterFloat($float) {
        $filteredFloat = filter_var($float,
            FILTER_SANITIZE_NUMBER_FLOAT,
            FILTER_FLAG_ALLOW_THOUSAND
        );
        return $filteredFloat;
    }


} 