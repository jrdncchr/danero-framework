<?php

class BaseController extends Controller {

    private $site = array();
    protected  $user = null;

    public function __construct() {
        parent::__construct();
        global $config;
        $this->site = $config['site'];

        if(isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        }
    }

    public function _render($view, $params = array(), $type = 'DEFAULT') {
        $params['site'] = $this->site;
        if(null !== $this->user) {
            $params['user'] = $this->user;
        }

        if($type == 'DEFAULT') {
            $params['styles'] = $this->load->view('Templates/styles', $params, TRUE);
            $params['scripts'] = $this->load->view('Templates/scripts', $params, TRUE);
            $params['footer'] = $this->load->view('Templates/footer', $params, TRUE);
            $params['content'] = $this->load->view($view, $params, TRUE);
            $this->load->view('Templates/skeleton', $params);
        }

    }

    public function _isLoggedIn() {
        return isset($_SESSION['user']) ? true : false;
    }

    public function _redirectIfLoggedIn() {
        if($this->_isLoggedIn()) {
            global $config;
            header('Location: ' . $config['redirect']['logged']);
        }
    }

    public function _redirectIfNotLoggedIn() {
        if(!$this->_isLoggedIn()) {
            global $config;
            header('Location: ' . $config['redirect']['not_logged']);
        }
    }


} 