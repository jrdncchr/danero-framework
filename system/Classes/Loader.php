<?php

class Loader {

    public function view($name, $param = array()) {
        $view_path = VIEWS_PATH . $name . ".php";
        if(file_exists($view_path)) {
            extract($param, EXTR_OVERWRITE);
            include $view_path;
        } else {
            Error::display('NOT_FOUND');
        }

    }

} 