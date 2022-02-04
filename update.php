<?php
if(isset($_GET['update'])){
    if(isset($_GET["id"])){
        require "database.php";
        $id=$_GET['id'];
        $full_name = $_GET['fullname'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $confirm_password = $_GET['confirm-password'];
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];
        $birth_date=$year."-".$day."-".$month;
        $city = $_GET['city'];
        $query=$conn->prepare("update users SET full_name=?,username=?,email=?,
                                        password=?,birth_date=? , city=? where id=?");
        $query->execute([$full_name,$username,$email,$password,$birth_date,$city,$id]);
    
        header("Location: index.php");
    }else{
       header("Location: index.php");
    }
}

