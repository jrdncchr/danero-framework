<?php

class BaseController extends Controller {

    private $site = array();

    public function __construct() {
        parent::__construct();
        global $config;
        $this->site = $config['site'];
    }

    public function _render($view, $params = array(), $type = 'DEFAULT') {
        $params['site'] = $this->site;

        if($type == 'DEFAULT') {
            $params['styles'] = $this->load->view('Templates/styles', $params, TRUE);
            $params['scripts'] = $this->load->view('Templates/scripts', $params, TRUE);
            $params['footer'] = $this->load->view('Templates/footer', $params, TRUE);
            $params['content'] = $this->load->view($view, $params, TRUE);
            $this->load->view('Templates/skeleton', $params);
        }

    }


} 