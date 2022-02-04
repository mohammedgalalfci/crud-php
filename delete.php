<?php
    if(isset($_GET["id"])&&!empty($_GET['id'])){
        require "database.php";
        $id=$_GET['id'];
        $query=$conn->prepare("delete from users where id=?");
        $query->execute([$id]);
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }
?>