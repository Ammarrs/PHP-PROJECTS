<?php
    require_once "config.php";

    //$connection = mysqli_connect($host,$username,$password,$db);

    
        try{
            $conn = new PDO("mysql:host=$host;dbname=$db",$username,$password);
            echo "connected to database";
        } catch(PDOException $e){
            echo "connection failed".$e -> getMessage();
        }
    
?>