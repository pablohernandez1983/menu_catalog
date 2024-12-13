<?php

namespace App\Models;

use App\Services\DatabaseService;

class Menu
{
    private $db;

    public function __construct() {
        $this->db = new DatabaseService();
    }

    public function get_by_id($id) {
        $sql = "SELECT * FROM menu WHERE id = $id";
        return $this->db->query($sql);
    }

    public function get_all() {
        $sql = "SELECT * FROM menu order by parent_id";
        return $this->db->query($sql);
    }

    public function get_all_ordered() {
        $sql  = " SELECT m1.id, m1.name, m1.description, ";
        $sql .= " (select m2.name from menu as m2 where m2.id = m1.parent_id limit 1) as parent ";
        $sql .= " FROM menu as m1 order by m1.id ";
        return $this->db->query($sql);
    }

    public function store($data) {
        $sql = "INSERT INTO menu (name, description, parent_id, created_at) VALUES (:name, :description, :parent_id, :created_at)";
        return $this->db->query($sql, $data);
    }
    
    public function update($data) {
        $sql = "UPDATE menu SET name=:name, description=:description, parent_id=:parent_id, updated_at=:updated_at WHERE id=:id";
        return $this->db->query($sql, $data);
    }
    
    public function delete($id) {
        $sql = "DELETE FROM menu WHERE id=".$id;
        return $this->db->query($sql);
    }

    public function __destruct() {
        $this->db->close();
    }
}
