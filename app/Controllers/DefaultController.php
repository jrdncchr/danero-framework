<?php

class DefaultController extends BaseController {

    public function index() {
        $this->load->view('welcome');
    }

} 