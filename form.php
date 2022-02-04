<?php 
include "database.php";
 $FullNameErr = $UserNameErr = $EmailErr = $PasswordErr =  $ConfirmPasswordErr  = "";
 $full_name = $username = $email = $password = $confirm_password = "";
if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['register'])){
        $full_name = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $birth_date=$year."-".$day."-".$month;
        $city = $_POST['city'];
        include "validate.php";
        include "add.php";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        form{
            background-color:#EEE;
            width:500px;
            padding: 10px;
            border-radius:10px;
            margin:auto;
        }
        .mb-3{
            margin-bottom:0rem!important
        }
        button{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $full_name?>">
                <span class="text-danger"><?=$FullNameErr;?></span>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $username?>">
                <span class="text-danger"><?=$UserNameErr;?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger"><?=$PasswordErr;?></span>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                <span class="text-danger"><?=$ConfirmPasswordErr;?></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $email?>">
                <span class="text-danger"><?=$EmailErr;?></span>
            </div>
            <div class="mb-3">
                <label class="form-label" style="width:100%">Birth Date</label>
                <select class="form-select" name="year" style="width:30%;float:left">
                    <?php 
                        for($i=2020;$i>=1980;$i--){
                            echo " <option value=".$i.">".$i."</option>";
                        }
                    ?>
                </select>
                <select class="form-select mx-2"  name="month" style="width:30%;float:left">
                    <?php 
                        $months=["يناير","فبراير","مارس","ابريل","مايو","يونيو","يوليو","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر"];
                        foreach($months as $month){
                            echo " <option value=".$month.">".$month."</option>";
                        }
                    ?>
                </select>
                <select class="form-select"  name="day" style="width:30%;float:left">
                    <?php 
                        for($i=1;$i<=31;$i++){
                            echo " <option value=".$i.">".$i."</option>";
                        }
                    ?>
                </select>
                <div class="clearfix"></div>
                
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select class="form-select" id="city" name="city">
                    <?php 
                        $cities=["Aswan","Looxur","Qena","Sohag","Asuit","Menia","Bani Suif","Giza","Cairo","Alex"];
                        foreach($cities as $city){
                            echo " <option value=".$city.">".$city."</option>";
                        }
                    ?>
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
</body>
</html>