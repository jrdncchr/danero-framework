<?php

class InputValue extends Model {

    public function getCountries() {
        $this->db->orderBy('name');
        $result = $this->db->get('country');
        return $result['isFetched'] ? $result['result'] : array();
    }

} 