<?php
namespace umis\Model;

use umis\Database\DB;

class Model {
    protected $db;

    public function __construct () {
        $this->db = DB::getInstance();
    }

    protected function find ($id) {
        return $this->db->select($this->table, "*", [$this->pk, $id])->result();
    }

    protected function all () {
        return $this->db->select($this->table, "*")->results();
    }
}