
<?php

include './config.php';

if(!isset($_COOKIE['username'])){
    header('location:login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">

<?php include './navbar.php';?>
    <div class="row  mt-5 ">
        <div class="card p-3 col-12 mb-2 shadow">
            <h2>Dashboard</h2>
            <p>Welcome to the Dashboard</p>
        </div>
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>