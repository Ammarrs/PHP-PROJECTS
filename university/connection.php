<?php
    require_once "config.php";

    $connection = mysqli_connect($host,$username,$password,$db);
    
    // if($connection){
    //     echo "Connected to the database!<br>";
    // }else{
    //     die("Failed to connect with MySQL:");
    // }

    
    
    // try{
    //     $conn = new PDO("
    //     mysql:host=$host;
    //     dbname=$db",
    //     $username,
    //     $password
    //     );
    //     echo "connected to $db";
    // } catch(PDOException $e){
    //     echo "faild to connect $db:".$e->getMessage();
    // }
?>