<?php
namespace umis\Database;

use PDO;

class DB {
    private $stmt;

    public static function select ($table, $col = [], $where = [], $other = []) {
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
}