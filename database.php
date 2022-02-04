<?php
    $host="mysql:host=localhost;dbname=itidb";
    $user="root";
    $password="";
    try{
        $conn=new PDO($host,$user,$password);
    }catch(PDOException $error){
        echo $error->getMessage();
    }
?>