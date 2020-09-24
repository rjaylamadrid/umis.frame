<?php
namespace Database;

use PDO;

class DB {
    private static $db = null;
    private static $stmt;
    private $results;
    
    private function __construct() {
        self::$db = new PDO();
    }

    public static function getInstance() {
        if(!self::$db) self::$db = new DB();
        return self::$db;
    }

    public function select($table, $col = [], $where = [], $other = []) {
        if (!is_array($col)) $col = [];
        $cols = count($col) > 0 ? implode(', ', $col) : '*';
        if (!empty($table)) {
            if (count($where) > 0 && is_array($where)) {
            } else {
                self::$stmt = "SELECT $cols FROM $table $where $other";
            }
        }
        return;
    }

    private function execute () {

    }

    public function result() {
        return $this->results[0];
    }
    
    public function results() {
        return $this->results;
    }
}
