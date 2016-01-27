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
        $result['isFetched'] = false;
        $query = "SELECT * FROM $table";
        $where_values = array();
        try {
            $this->init();
            if(sizeof($option) > 0) {
                $where = $this->_setupWhere($option);
                $query .= $where['query'];
                $where_values = $where['values'];
            }
            $stmt = $this->db->prepare($query);
            $stmt->execute($where_values);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result['result'] = sizeof($rows) > 1 ? $rows : (sizeof($rows) == 1 ? $rows[0] : array());
            $result['isFetched'] = true;
        } catch (PDOException $e) {
            Error::display('PDO_ERROR', $e->getMessage());
        }
        return $result;
    }

    private function _setupWhere($where = array()) {
        $setup = [];
        if(sizeof($where) > 0) {
            $setup['query'] = " WHERE ";
            foreach($where as $k => $v) {
                $setup['query'] .= "$k = :$k ";
                $setup['values'][":$k"] = $v;
            }
        }
        return $setup;
    }




} 