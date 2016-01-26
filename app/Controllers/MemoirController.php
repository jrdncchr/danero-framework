<?php

class MemoirController extends BaseController {

    public function index() {
        $this->load->model('memoir');
        $memoirs = $this->memoir->get();
        $this->_render('Memoir/list', array('memoir' => $memoirs));
    }

} 