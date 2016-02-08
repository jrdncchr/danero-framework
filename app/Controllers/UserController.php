<?php

class UserController extends BaseController {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function sign_up() {
        $this->_redirectIfLoggedIn();
        $this->load->model('InputValue');
        $countries = $this->InputValue->getCountries();
        $this->_render('User/sign-up', array('countries' => $countries));
    }

    public function login() {
        $this->_redirectIfLoggedIn();
        $this->_render('User/login');
    }

    public function logout() {
        if($this->_isLoggedIn()) {
            unset($_SESSION['user']);
            $this->_redirectIfNotLoggedIn();
        }
    }

    public function auth() {
        $auth = $this->input->post();
        $result = $this->User_Model->login($auth);
        $redirect = "memoir";
        if(!$result['success']) {
            $_SESSION['login_error'] = $result['message'];
            $redirect = "user/login";
        }
        header('Location: ' . base_url() . $redirect);
    }

    public function add() {
        $user_info = $this->input->post();
        $result = $this->User_Model->addUser($user_info);
        echo json_encode($result);

    }

} 