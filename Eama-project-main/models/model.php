<?php
//session_start();
require_once("../libraries/Database.php");
abstract class Model{
    protected $db;
    protected $conn;

    public function connect(){
        if(null === $this->conn ){
            $this->db = new Database();
        }
        return $this->db;
    }
}
?>