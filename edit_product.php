
<?php

include './config.php';


$success = "";
$error = "";


if(!isset($_SESSION['username'])){
    header('location:login.php');
}


if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $id = $_GET['id'];

    $query = "SELECT image FROM products WHERE id='$id'";
    $result = $conn->query($query);
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    $imagePath = "./assets/imgs/" . $image;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $newImage = $_FILES['image']['name'];
    $target = "./assets/imgs/" . basename($newImage);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "UPDATE products SET name='$name', price='$price', detail='$detail', category_id='$category_id', brand_id='$brand_id', image='$newImage' WHERE id='$id'";

    if($conn->query($query)) {
        $success = "Product updated successfully";
        header('location:products.php');
    } else {
        $error = "Error: ".$conn->error;
    }
}


if(isset($_GET['id'])) {
    $id = $_GET['id'];

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">

<?php include './navbar.php';?>

    <?php include './message.php';?>

    <div class="row  mt-5 ">



        <div class="card p-3 col-12 mb-2 shadow">
        <div class="row">
            <div class="col-9">
                <h2>Edit Product</h2>
            </div>
            <div class="col-3 text-right">
                <a href="./add_product.php" class="btn btn-primary my-3">Add Product</a>
                <a href="./dashboard.php" class="btn btn-primary my-3">Dashboard</a>
            </div>
        </div>
<?php

$query = "SELECT * FROM products WHERE id='$id'";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

?>
            
            <form method="post" action="products.php" class="row g-3" enctype="multipart/form-data">
                <div class="col-12 mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="name" name="name">
                </div>
                <div class="col-12 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" value="<?php echo $row['price']; ?>" id="price" name="price">
                </div>

                <div class="col-12 mb-3 row">

                    <div class="col-9">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-3">
                        <img src="./assets/imgs/<?php echo $row['image']; ?>" class="thumbnail rounded float-start me-3" width="120" height="80">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="detail" class="form-label">Deatil</label>
                    <textarea name="detail" class="form-control"><?php echo $row['detail']; ?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-select">
                        <option value="">select a option</option>
                    <?php
                        $query = "SELECT * FROM category";
                        $result = $conn->query($query);
                        if(mysqli_num_rows($result) > 0) {
                            while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $rows['id']; ?>" <?php echo $row['category_id'] == $rows['id']?  "selected":''; ?>><?php echo $rows['name']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand_id" id="brand" class="form-select">
                    <option value="">select a option</option>
                        <?php
                        $query = "SELECT * FROM brand";
                        $result = $conn->query($query);
                        if(mysqli_num_rows($result) > 0) {
                            while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $rows['id']; ?>" <?php echo $row['brand_id'] == $rows['id']?  "selected":''; ?>><?php echo $rows['name']; ?></option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="update">Update Product</button>
                </div>

            </form>
        </div>
  
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>