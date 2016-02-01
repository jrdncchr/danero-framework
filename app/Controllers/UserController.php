<?php

class UserController extends BaseController {

    public function sign_up() {
        $this->load->model('InputValue');
        $countries = $this->InputValue->getCountries();
        $this->_render('User/sign-up', array('countries' => $countries));
    }

    public function login() {
        $this->_render('User/login');
    }

    public function add() {
        $user_info = $this->input->post();
        $this->load->model('User_Model');
        $result = $this->User_Model->addUser($user_info);
        echo json_encode($result);

    }

} 