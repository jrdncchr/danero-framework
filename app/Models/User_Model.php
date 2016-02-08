<?php

class User_Model extends Model {

    private $user_table = 'user';
    private $user_secret_table = 'user_secret';

    function __construct() {
        parent::__construct();
    }

    public function login($auth) {
        $result = array('success' => false,  'message' => 'Incorrect Email or Password.');
        if(isset($auth['email']) && isset($auth['password'])) {
            $user = $this->db->get($this->user_table, array('email' => $auth['email']));
            if($user['result']) {
                $user_secret = $this->db->get($this->user_secret_table, array('user_id' => $user['result']['id']));
                $password = $user_secret['result']['password'];
                if (hash_equals($password, crypt($auth['password'], $password))) {
                    $result = array('success' => true);
                    $_SESSION['user'] = $user['result'];
                }
            }
        }
        return $result;
    }

    public function addUser($user_info) {
        $result = array('success' => false, 'message' => "Something went wrong.");
        if(sizeof($user_info) > 0) {
            $result['success'] = (
                (isset($user_info['name']) AND ctype_alnum($user_info['name']) AND strlen($user_info['name']) > 2) OR
                (isset($user_info['email']) AND filter_var($user_info['email'], FILTER_VALIDATE_EMAIL)) OR
                (isset($user_info['country']) AND ctype_alpha($user_info['country'])) OR
                (isset($user_info['password']) AND strlen($user_info['password']) < 5) OR
                (isset($user_info['confirm_password']))
            ) ? true : false;

            if($user_info['password'] != $user_info['confirm_password']) {
                $result['success'] = false;
                $result['message'] = "Password did not match.";
                $result['field'] = "password";
                return $result;
            }

            if($this->db->checkExists($this->user_table, 'email', $user_info['email'])) {
                $result['success'] = false;
                $result['message'] = "Email already exists.";
                $result['field'] = "email";
                return $result;
            }

            if($result['success']) {
                $salt = random_str(20);
                $password = crypt($user_info['password'], $salt);
                unset($user_info['password']);
                unset($user_info['confirm_password']);

                $user_result = $this->db->add($this->user_table, $user_info);
                if($user_result['success']) {
                    $result['user_id'] = $user_result['lastInsertId'];
                    $result['secret_id'] = $this->_saveUserSecret(
                        array(
                            'user_id'            => $result['user_id'],
                            'password'           => $password,
                            'email_confirmation' => random_str(20)
                        )
                    );
                    if($result['secret_id']) {
                        /* TO DO :
                         * Email Confirmation
                         */
                        $result['success'] = true;
                        unset($result['message']);
                    }
                }
            }


        }
        return $result;
    }

    private function _saveUserSecret($user_secret, $id = 0) {
        if($id == 0) {
            $result = $this->db->add($this->user_secret_table, $user_secret);
            return $result['success'] ? $result['lastInsertId'] : false;
        }
        return false;
    }

} 