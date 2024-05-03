
<?php

include './config.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

$success = "";
$error = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}


if(isset($_POST['update'])) {
    $name = $_POST['name'];

    if(empty($name)) {
        $error = "Name fields are required.";
    }else{

    $query = "UPDATE category SET name = '$name' WHERE id = '$id'";
    $result = $conn->query( $query);

    if($result) {
        $success = "Category updated successfully.";
        header('location:category.php');
    } else {
        $error = "Error updating Category.";
    }
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">
<?php include './navbar.php';?>

    
   <?php include './message.php';?>

<?php

$query = "SELECT * FROM category WHERE id='$id'";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);
?>
    <div class="row  mt-5 ">
        <div class="card p-3 col-12 mb-2 shadow">
            <h2>Edit Category</h2>
            <form method="post" action="">
                <div class="col-12 mb-2">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" value="<?php echo $row['name'];  ?>" id="name" name="name">
                </div>

                
                

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="update">Update Category</button>
                </div>

            </form>
        </div>
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>