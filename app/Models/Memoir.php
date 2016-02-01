<?php

class Memoir extends Model {

    private $table = 'memoir';

    public function get($filter = array()) {
        $this->db->orderBy('date_created', 'DESC');
        $result = $this->db->get($this->table, $filter);
        return $result['isFetched'] ? $result['result'] : array();
    }

    public function add($values) {
        $result = $this->db->add($this->table, $values);
        $response = array('success' => false);
        if($result['isAdded']) {
            $response['success'] = true;
            $response['id'] = $result['lastInsertId'];
            $_SESSION['memoirSaved'] = true;
        }
        return $response;
    }

    public function delete($option = array()) {
        $result = $this->db->delete($this->table, $option);
        $response = array('success' => false);
        if($result['isDeleted']) {
            $response['success'] = true;
        }
        return $response;
    }

} 