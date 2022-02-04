<?php
    function test($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (empty($full_name)) {
        $FullNameErr = "Name is required";
    }else{
        $full_name = test($full_name);
        if (!preg_match("/^[a-z ,.'-]+$/i",$full_name)) {
          $FullNameErr = "Only letters Not Allowed Special Characters Or White Space Or Numbers";
        }
    }

    if (empty($username)) {
        $UserNameErr = "Name is required";
    }else{
        $username = test($username);
        if (!preg_match("/^[a-z ,.'-]+$/i",$username)) {
          $UserNameErr = "Only letters Not Allowed Special Characters Or White Space Or Numbers";
        }
    }
    if (empty($email)) {
        $EmailErr = "Email is required";
    } else {
        $email = test($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $EmailErr = "Invalid email format";
        }
    }

    if(empty($password)){
        $PasswordErr = "Password is required";
    }else {
        $password=password_hash($password,PASSWORD_DEFAULT);
    }

    if(empty($confirm_password)){
        $ConfirmPasswordErr = "Password is required";
    }else {
        if(password_verify($confirm_password,$password)){
            $confirm_password=password_hash($confirm_password,PASSWORD_DEFAULT);
        }else {
            $ConfirmPasswordErr = "Not Matched Password";
        }
    }
    $ck_email=$conn->prepare("select * from users where email=?");
    $ck_email->execute([$email]);
    $foundEmail=$ck_email->fetch();
    if($foundEmail){
        $EmailErr = "This Email Existly already";
    }

    $ck_username=$conn->prepare("select * from users where username=?");
    $ck_username->execute([$username]);
    $foundUserName=$ck_username->fetch();
    if($foundUserName){
        $UserNameErr = "This User Existly already";
    }
?>