<?php

class MemoirController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('memoir');
    }

    public function index() {
        $memoirs = $this->memoir->get(array('user_id' => 1));
        $result = $memoirs['isFetched'] ? array('memoir' => $memoirs['result']) : array();
        $this->_render('Memoir/list', $result);
    }

    public function view($id = 0) {
        if($id > 0) {
            $memoir = $this->memoir->get(array('id' => $id, 'user_id' => 1));
            $result = $memoir['isFetched'] ? array('memoir' => $memoir['result']) : array();
            $this->_render('Memoir/view', $result);
        } else {
            $this->index();
        }
    }

    public function form($id = 0) {
        $data = array();
        if($id > 0) {
            $memoir = $this->memoir->get(array('id' => $id, 'user_id' => 1));
            if($memoir['isFetched']) {
                $this->_render('Memoir/form', array('memoir' => $memoir['result']));
            }
        } else {
            $this->_render('Memoir/form', $data);
        }
    }

    public function add() {
        $memoir = $this->memoir->add(array(
            'message' => 'Test Message',
            'user_id' => 1
        ));
        var_dump($memoir);
    }

} 