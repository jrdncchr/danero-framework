<?php

class Database {

    private $db = null;

    private function init() {
        global $config;
        $dsn = "mysql:host=" . $config['db']['host'] . ";dbname=" . $config['db']['database'];
        $user = $config['db']['user'];
        $password = $config['db']['password'];
        $options = array(
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
        );
        $db = new PDO($dsn, $user, $password, $options);
        if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) == $config['db']['driver']) {
            $this->db = $db;
        }
    }

    public function get($table, $option = array()) {
        $this->init();
        if(sizeof($option) == 0) {
            $stmt = $this->db->query("SELECT * FROM $table");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }



} 