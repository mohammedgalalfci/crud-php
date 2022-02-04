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
    <?php
        if(isset($_GET["id"])&&!empty($_GET['id'])){
            require "database.php";
            $id=$_GET['id'];
            $query=$conn->prepare("select * FROM users where id=?");
            $query->execute([$id]);
            $user=$query->fetch();
            $birthdate=explode('-',$user['birth_date']);
            $year=$birthdate[0];
            $day=$birthdate[1];
            $month=$birthdate[2];
    ?>
    <div class="container">
        <form action="update.php" method="get">
            <input type="hidden" name="id" value="<?=$user['id']; ?>">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['full_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" style="width:100%">Birth Date</label>
                <select class="form-select" name="year" style="width:30%;float:left" value="<?= $year; ?>" >
                    <?php 
                        for($i=2020;$i>=1980;$i--){ ?>
                            <option value="<?= $i?>" <?=($year=="$i")?"selected":"";?>><?= $i?></option>";
                        <?php
                        }
                    ?>
                </select>
                <select class="form-select mx-2"  name="month" style="width:30%;float:left" value="<?= $month; ?>">
                    <?php 
                        $months=["يناير","فبراير","مارس","ابريل","مايو","يونيو","يوليو","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر"];
                        foreach($months as $mon){ ?>
                            <option value="<?= $mon?>" <?=($month=="$mon")?"selected":"";?>><?= $mon?></option>";
                        <?php }
                    ?>
                </select>
                <select class="form-select"  name="day" style="width:30%;float:left" value="<?= $day; ?>">
                    <?php 
                        for($i=1;$i<=31;$i++){ ?>
                            <option value="<?= $i?>" <?=($day=="$i")?"selected":"";?>><?= $i?></option>";
                        <?php
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
                        foreach($cities as $city){ ?>
                            <option value="<?= $city?>" <?=($user['city']=="$city")?"selected":"";?>><?= $city?></option>
                        <?php } ?>
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
    <?php }else{
        header("Location: index.php");
    }
?>
</body>
</html>