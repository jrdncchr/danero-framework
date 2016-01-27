<?php

class MemoirController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('memoir');
    }

    public function index() {
        $memoirs = $this->memoir->get();
        $this->_render('Memoir/list', array('memoir' => $memoirs['result']));
    }

    public function view($id = 0) {
        if($id > 0) {
            $memoir = $this->memoir->get(array("id" => $id));
            if($memoir['isFetched']) {
                $this->_render('Memoir/view', array('memoir' => $memoir['result']));
            }
        } else {
            $this->index();
        }
    }

} 