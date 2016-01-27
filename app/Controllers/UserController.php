<?php

class UserController extends BaseController {

    public function sign_up() {
        $this->_render('User/sign-up');
    }

    public function login() {
        $this->_render('User/login');
    }

} 