
<?php
    include './config.php';
?>
<?php

if(isset($_COOKIE['username'])){
  header('location:dashboard.php');
}


    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=$conn->query($sql);

        
        if($result->num_rows>0){
            setcookie('username', $username, time() + (7 * 24 * 60 * 60)); 
            header('location:dashboard.php');
        }else{
            echo "Invalid username or password";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="card p-3 mt-5 offset-2 col-md-6">
        <h2 class="text-center">Login Form</h2>
        <hr>
<form method="post" action="login.php" class="row g-3 mt-1">
  <div class="col-md-12">
    <label for="inputUsername4" class="form-label">Username</label>
    <input type="text" class="form-control" id="inputUsername4" name="username">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="login">Sign in</button>
  </div>
  <div class="col-12">
    <a href="./register.php"> I don't account, sign up </a>
  </div>
</form></div>
</div>

<script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>