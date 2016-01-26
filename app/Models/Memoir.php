<?php

class Memoir extends Model {

    public function get() {
        $result = $this->db->get('memoir');
        return $result;
    }

} 