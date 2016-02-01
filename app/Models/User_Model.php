<?php

class User_Model extends Model {

    private $user_table = 'user';
    private $user_secret_table = 'user_secret';

    function __construct() {
        parent::__construct();
    }

    public function addUser($user_info) {
        $result = array('success' => false);
        if(sizeof($user_info) > 0) {
            $valid = (
                (isset($user_info['name']) AND ctype_alnum($user_info['name'])) OR
                (isset($user_info['email']) AND filter_var($user_info['email'], FILTER_VALIDATE_EMAIL)) OR
                (isset($user_info['country']) AND ctype_alpha($user_info['country'])) OR
                (isset($user_info['password']) AND strlen($user_info['password']) < 6) OR
                (isset($user_info['confirm_password']))
            ) ? true : false;

            if($valid) {
                if($user_info['password'] == $user_info['confirm_password']) {
                    $salt = uniqid('', false);
                    $password = crypt($user_info['password'], $salt);
                    unset($user_info['password']);
                    unset($user_info['confirm_password']);

                    $user_result = $this->db->add($this->user_table, $user_info);
//                    var_dump($user_result); exit;
                    if($user_result['isAdded']) {
                        $result['user_id'] = $user_result['lastInsertId'];
                        $result['secret_id'] = $this->saveUserSecret(
                            array(
                                'user_id'   => $result['user_id'],
                                'password'  => $password
                            )
                        );
                        if($result['secret_id']) {
                            $result['success'] = true;
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function saveUserSecret($user_secret, $id = 0) {
        if($id == 0) {
            $result = $this->db->add($this->user_secret_table, $user_secret);
            return $result['isAdded'] ? $result['lastInsertId'] : false;
        }
        return false;
    }

} 