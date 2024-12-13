<?php
namespace App\Services;

class DatabaseService {

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'menu_catalog';
    private $port = 3306;
    private $conn;
    private $dsn;

    public function __construct() {
        try {
            $this->dsn = "mysql:host=$this->host;dbname=$this->db_name;port=$this->port;charset=UTF8";
            $this->conn = new  \PDO($this->dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql, $col_name = array()) {
        $sth = $this->conn->prepare($sql);
        if (!empty($col_name)) {
            $sth->execute($col_name);
        }else{
            $sth->execute();
        }
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function close() {
        $this->conn = null ;
    }
}