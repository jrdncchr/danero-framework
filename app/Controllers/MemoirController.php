<?php

class MemoirController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->_redirectIfNotLoggedIn();
        $this->load->model('memoir');
    }

    public function index() {
        $memoirs = $this->memoir->get(array('user_id' => $this->user['id']));
        $this->_render('Memoir/list', array('memoir' => $memoirs));
    }

    public function view($id = 0) {
        $memoir = $this->memoir->get(array('id' => $id, 'user_id' => $this->user['id']));
        if($id > 0) {
            if($memoir) {
                $this->_render('Memoir/view', array('memoir' => $memoir));
            } else {
                Error::display('NOT_FOUND');
            }
        } else {
            $this->index();
        }
    }

    public function form($id = 0) {
        $data = array();
        if($id > 0) {
            $memoir = $this->memoir->get(array('id' => $id, 'user_id' => $this->user['id']));
            if($memoir) {
                $this->_render('Memoir/form', array('memoir' => $memoir));
            } else {
                Error::display('NOT_FOUND');
            }
        } else {
            $this->_render('Memoir/form', $data);
        }
    }

    public function save() {
        if($this->input->post('action') == 'add') {
            $response = $this->memoir->add(array(
                'message' => $this->input->post('message'),
                'user_id' => $this->user['id']
            ));
            echo json_encode($response);
        };
    }

    public function delete() {
        $response = $this->memoir->delete(array(
            'id' => $this->input->post('id')
        ));
        echo json_encode($response);
    }

} 