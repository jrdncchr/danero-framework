<?php

class Database {

    private $db = null;
    private $query = "";
    private $table;
    private $select = "*";
    private $filter = array();
    private $values = array();
    private $col_val = array();
    private $option = array();

    private function init() {
        try {
            if(null == $this->db) {
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
        } catch(Exception $e) {
            Error::display('PDO_ERROR', $e->getMessage());
        }
    }

    public function getInstance() {
        $this->init();
        return $this->db;
    }

    /* SELECT
     */
    public function get($table, $filter = array()) {
        $this->table = $table;
        $this->_setupFilter($filter);
        $result['isFetched'] = false;

        try {
            $this->init();
            if($this->_setupQuery('SELECT')) {
                $result['query'] = $this->query;
                $stmt = $this->db->prepare($this->query);
                if($stmt->execute($this->values)) {
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $result['result'] = sizeof($rows) > 1 ? $rows : (sizeof($rows) == 1 ? $rows[0] : array());
                    $result['isFetched'] = true;
                }
            }
        } catch (PDOException $e) {
            Error::display('PDO_ERROR', $e->getMessage());
        }

        return $result;
    }


    /* INSERT
     */
    public function add($table, $val) {
        $this->table = $table;
        $this->col_val = $val;
        $this->values = array();
        $result['isAdded'] = false;

        if(sizeof($val) > 0) {
            try {
                $this->init();
                if($this->_setupQuery('INSERT')) {
                    $result['query'] = $this->query;
                    $stmt = $this->db->prepare($this->query);
                    if($stmt->execute($this->values)) {
                        $result['isAdded'] = true;
                        $result['lastInsertId'] = $this->db->lastInsertId();
                    }
                }
            } catch (PDOException $e) {
                Error::display('PDO_ERROR', $e->getMessage());
            }
        }
        return $result;
    }

    /* DELETE
     */
    public function delete($table, $option = array()) {
        $this->table = $table;
        $this->_setupFilter($option);
        $result['isDeleted'] = false;
        if(sizeof($this->filter) > 0) {
            try {
                $this->init();
                if($this->_setupQuery('DELETE')) {
                    $result['query'] = $this->query;
                    $stmt = $this->db->prepare($this->query);
                    if($stmt->execute($this->values)) {
                        $result['isDeleted'] = true;
                    }
                }
            } catch (PDOException $e) {
                Error::display('PDO_ERROR', $e->getMessage());
            }
        }
        return $result;
    }

    /* ORDER BY
     */

    public function orderBy($column_name, $order = 'ASC') {
        $this->option['order_by'] = array(
            'column' => $column_name,
            'order' => $order
        );
    }

    /* CLASS FUNCTIONS
     */

    private function _setupQuery($type = 'SELECT') {
        switch($type) {

            case 'SELECT':
                $this->query = "SELECT " . $this->select . " FROM " . $this->table;
                if(sizeof($this->filter) > 0) {
                    $this->query .= " WHERE ";
                }
                $this->_addFilterQuery();
                $this->_addOptionQuery();
                break;

            case 'INSERT':
                $col_val = $this->_setupColumnValues($this->col_val);
                $this->query = "INSERT INTO " . $this->table . $col_val;
                break;

            case 'DELETE':
                $this->query = "DELETE FROM " . $this->table . " WHERE ";
                $this->_addFilterQuery();
                break;

            default:
                return false;
        }
        return true;
    }

    private function _addFilterQuery() {
        $i = 0;

        if(isset($this->filter['AND'])) {
            foreach($this->filter['AND'] as $k => $v) {
                if($i > 0) {
                    $this->query .= " AND ";
                }
                $finalize_key = $this->_finalizeKeyName($k);
                $this->query .= $k . "=:" . $finalize_key;
                $this->values[$finalize_key] = $v;
                $i++;
            }
        }

        if(isset($this->filter['OR'])) {
            foreach($this->filter['OR'] as $k => $v) {
                if($i > 0) {
                    $this->query .= " OR ";
                }
                $finalize_key = $this->_finalizeKeyName($k);
                $this->query .= $k . "=:" . $finalize_key;
                $this->values[$finalize_key] = $v;
                $i++;
            }
        }
    }

    public function _addOptionQuery() {
        if(isset($this->option['order_by'])) {
            $this->query .= " ORDER BY " .
                $this->option['order_by']['column'] . " " .
                $this->option['order_by']['order'];
        }
    }

    private function _setupFilter($filter = array()) {
        foreach($filter as $k => $v) {
            $and_or = 'AND';
            if(strpos($k, 'OR ') !== false) {
                $k = substr($k, 3);
                $and_or = 'OR';
            }
            $this->filter[$and_or][$k] = $v;
        }
    }

    private function _finalizeKeyName($k) {
        if(array_key_exists($k, $this->values)) {
            $k = "$k" . "_" . rand(1, 10000);
        }
        return $k;
    }

    private function _setupColumnValues($val) {
        $columns = "(";
        $values = "VALUES (";
        foreach($val as $k => $v) {
            $columns .= "$k,";
            $values .= ":$k,";
            $this->values[$k] = $v;
        }
        $columns = substr($columns, 0,-1) . ")";
        $values = substr($values, 0, -1) . ")";
        return $columns . " " . $values;
    }


} 