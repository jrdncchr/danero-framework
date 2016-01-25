<?php


class Controller {

    public $load = null;
    public $model = null;

    public function __construct() {
        $this->load = new Loader();
    }

} 