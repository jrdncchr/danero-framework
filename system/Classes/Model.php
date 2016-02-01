<?php

class Model {

    public $db = null;
    public $load = null;

    public function __construct() {
        $this->db = new Database();
        $this->load = new Loader($this);
    }

} 