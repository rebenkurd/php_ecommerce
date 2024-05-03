
<?php

include './config.php';


$success = "";
$error = "";


if(!isset($_COOKIE['username'])){
    header('location:login.php');
}
if(isset($_POST['add'])) {
    $name = $_POST['name'];

    if(empty($name)) {
        $error = "Name fields are required.";
    }else{

    $query = "INSERT INTO brand (name) VALUES ('$name')";
    $result = $conn->query( $query);

    if($result) {
        $success = "Brand inserted successfully.";
    } else {
        $error = "Error inserting Brand.";
    }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">
<?php include './navbar.php';?>

    <?php include './message.php';?>

    <div class="row  mt-5 ">
        <div class="card p-3 col-12 mb-2 shadow">
            <h2>Add Brand</h2>
            
            <form method="post" action="add_brand.php">
                <div class="col-12 mb-2">
                    <label for="name" class="form-label">Brand Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="add">Add Brand</button>
                </div>

            </form>
        </div>
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>