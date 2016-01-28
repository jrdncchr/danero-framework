<?php

class Memoir extends Model {

    public function get($options = array()) {
        return $this->db->get('memoir', $options);
    }

    public function add($values) {
        return $this->db->add('memoir', $values);
    }

} 