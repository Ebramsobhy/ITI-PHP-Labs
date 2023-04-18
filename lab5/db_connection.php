<?php

class db {
    private $host = "localhost";
    private $dbname = "iti_assiut";
    private $username = "root";
    private $password = "msn3459900";
    private $connection = null;

    function __construct(){
        $this->connection = new pdo("mysql:dbname=$this->dbname;host=$this->host;",$this->username, $this->password);
    }

    function getConnection(){
        return $this->connection;
    }

    function delete($table, $condition){
        $this->connection->query("delete from $table where $condition");
    }

    function getData($table){
        return $this->connection->query("select * from $table");
    }

    function addData($table, $cols, $values, $dataArray){
        $query=$this->connection->prepare("insert into $table($cols)values($values)");
        $query->execute($dataArray);
    }

    function updateData($table, $data, $condition){
        $query=$this->connection->query("update $table set $data where $condition");
    }
}