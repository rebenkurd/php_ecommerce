
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
    <title>Profile</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">

<?php

    $query = "SELECT * FROM users WHERE username = '".$_COOKIE['username']."'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();




?>

<?php include './navbar.php';?>
    <div class="row  mt-5 ">
        <div class="card p-3 col-12 mb-2 shadow">
            <h2>Profile</h2>
            <ul class="list-group mt-3">
                <li class="list-group-item"><strong>Name:</strong> <span><?php echo $row['fullname'] ?></span></li>
                <li class="list-group-item"><strong>Username:</strong> <span><?php echo $row['username'] ?></span></li>
                <li class="list-group-item"><strong>Email:</strong> <span><?php echo $row['email'] ?></span></li>
            </ul>
        </div>
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>