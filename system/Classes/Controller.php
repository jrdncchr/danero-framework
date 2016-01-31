<?php


class Controller {

    public $load = null;
    public $input = null;

    public function __construct() {
        $this->load = new Loader($this);
        $this->input = new Input();
    }

} 