<?php 
include "database.php";
if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password=password_hash($password,PASSWORD_DEFAULT);
        $query=$conn->prepare("select * FROM users where email=?");
        $query->execute([$email]);
        $user=$query->fetch();
        //if(password_verify($password,$user['password'])){
        //     var_dump($user)."<br>";
        //    echo $user['password']."<br>";
        //    echo $password."<br>";
        //    if( password_verify($password,$user['password'])){
        //        echo "true";
        //    }else{
        //        echo "false";
        //    }
        //}
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
                <label class="form-label" for="form1Example13">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form1Example23" class="form-control form-control-lg" name="password"/>
                <label class="form-label" for="form1Example23">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block" name='login'>Login</button>
            </form>
        </div>
        </div>
    </div>
    </section>
</body>
</html>