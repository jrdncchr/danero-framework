<?php

class main extends Controller {

    public function index() {
        echo "You are in the index method.";
    }

    public function test($x, $y) {
        echo "hello $x $y <br />";
        $this->load->view("test", array("test" => "Jordan Pogi1"));
    }

}