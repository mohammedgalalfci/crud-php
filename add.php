<?php
if( $FullNameErr =="" &&
$UserNameErr == "" &&
$EmailErr == "" &&
$PasswordErr == "" &&
$ConfirmPasswordErr == ""){
//add data to database
$query=$conn->prepare("insert into users
                        (full_name,username,password,email,birth_date,city)
                        values(?,?,?,?,?,?)");
$query->execute([$full_name,$username,$password,$email,$birth_date,$city]);
header("location:login.php");
}

?>