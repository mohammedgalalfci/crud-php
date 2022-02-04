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
        #form1:focus{
            box-shadow:none;
        }
    </style>
</head>
<body>

<?php
    include "database.php";
    include("navbar.php");
    //read data from database
    $query=$conn->prepare("select * from users");
    $query->execute();
    $users=$query->fetchAll(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['search'])){
            $fullName=$_POST['inputsearch'];
            $search=$conn->prepare("select * from users where full_name like '%$fullName%'");
            $search->execute();
            $rows=$search->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="container">
            <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Birth Date</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($rows as $i=>$row){
                echo "<tr>
                <th scope='row'>".($i+1)."</th>
                <td>".$row['full_name']."</td>
                <td>".$row['username']."</td>
                <td>".$row['email']."</td>
                <td>".$row['birth_date']."</td>
                <td>".$row['city']."</td>
                <td><a class='btn btn-info' href='edit.php?id=".$row['id']."'>Edit</a></td>
                <td><a class='btn btn-danger' href='delete.php?id=".$row['id']."'>Delete</a></td>
            </tr>";
            } 
            ?>
        </tbody>
        </table>

            </div>
<?php
        }
    }else{

?>
    
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="container p-3">
                <div class="input-group">
            <div id="search-autocomplete" class="form-outline">
                <input type="search" id="form1" class="form-control" style="border-radius:0" name="inputsearch" placeholder="Search By Full Name"/>
            </div>
            <button type="submit" class="btn btn-primary" style="height: 38px;" name="search">
                <i class="fas fa-search"></i>
            </button>
            </div>  
        </form>
        <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Birth Date</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($users as $index=>$user){
                echo "<tr>
                <th scope='row'>".($index+1)."</th>
                <td>".$user['full_name']."</td>
                <td>".$user['username']."</td>
                <td>".$user['email']."</td>
                <td>".$user['birth_date']."</td>
                <td>".$user['city']."</td>
                <td><a class='btn btn-info' href='edit.php?id=".$user['id']."'>Edit</a></td>
                <td><a class='btn btn-danger' href='delete.php?id=".$user['id']."'>Delete</a></td>
            </tr>";
            } 
            ?>
        </tbody>
        </table>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
