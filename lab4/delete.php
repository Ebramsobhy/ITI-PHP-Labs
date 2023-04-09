<?php
require_once('connection/db_connection.php');

//for displaying errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($db){
    try {
        $query = "DELETE FROM `iti_assiut`.`users` WHERE id=:id";
        $stmt = $db->prepare($query);
        
        $id = $_GET['id']; 
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        
        $query_execute = $stmt->execute();
        header("Location:display.php");
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>