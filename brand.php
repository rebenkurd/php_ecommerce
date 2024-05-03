
<?php

include './config.php';

if(!isset($_COOKIE['username'])){
    header('location:login.php');
}
$success = "";
$error = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM brand WHERE id='$id'";
    if($conn->query($query)){
        $success="delete brand successfully";

    }else{
        $error="Failed to delete brand";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">
<?php include './navbar.php';?>

    <?php include './message.php';?>
    
    <div class="row  mt-5 ">



        <div class="card p-3 col-12 shadow">

        <div class="row">
            <div class="col-9">
                <h2>Brand List</h2>
            </div>
            <div class="col-3 text-right">
                <a href="./add_brand.php" class="btn btn-primary my-3">Add Brand</a>
                <a href="./dashboard.php" class="btn btn-primary my-3">Dashboard</a>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $query = "SELECT * FROM brand";
            $result = $conn->query($query);
            $a=1;
            if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
?>
                <tr>
                <th scope="row"><?php echo $a++; ?></th> 
                <td><?php echo $row['name'];?></td>

                <td>
                    <a href="edit_brand.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="brand.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>

                </tr>
        
<?php
            }
            }else{?>
                <tr>
                    <td colspan="7" align="center">No brand found.</td>
                </tr>

            <?php
            }
            ?>
            </tbody>
            </table>
        </div>
  
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>