<?php

class Model {

    public $db = null;

    public function __construct() {
        $this->db = new Database();
    }

} 