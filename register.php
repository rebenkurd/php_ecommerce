
<?php
    include './config.php';
?>
<?php

if(isset($_COOKIE['username'])){
  header('location:dashboard.php');
}


  if(isset($_POST['signup'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =md5($_POST['password']);
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password){
      $sql = "INSERT INTO users (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";
      if($conn->query($sql) === TRUE){
        echo "User Registered Successfully";
      }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }else{
      echo "Password and Confirm Password does not match";
    }
  }


echo md5('123');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="card p-3 mt-5 offset-2 col-md-6">
        <h2 class="text-center">Sign Up Form</h2>
        <hr>
<form method="post" action="" class="row g-3 mt-1">
  <div class="col-md-12 mb-3">
    <label for="fullname" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="fullname" name="fullname">
  </div>
  <div class="col-md-12 mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="col-md-12 mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-12 row mb-3">
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="col-md-6">
    <label for="confirm_password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
  </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
  </div>
  <div class="col-12">
    <a href="./login.php">Already have an account? Login</a>
  </div>
</form></div>
</div>

<script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>