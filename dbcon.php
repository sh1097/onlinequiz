<?php
class Dbconn{
    public $conn;
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public function __construct(){
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="onlinetest";
    }
    public function createConnection(){
        $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname="onlinetest");
        if ($this->conn){
           
            return $this->conn;
           
        }
        else {
            echo "connection error";
        }
        
    }
}
