<?php

class Memoir extends Model {

    public function get($options = array()) {
        $result = $this->db->get('memoir', $options);
        return $result;
    }

} 