
<?php

include './config.php';


$success = "";
$error = "";


if(!isset($_COOKIE['username'])){
    header('location:login.php');
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];

    if(isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        move_uploaded_file($image_tmp, './assets/imgs/' . $image_name);
    }

    if(empty($name) || empty($price) || empty($image_name)) {
        $error = "All fields are required.";
    }elseif(!is_numeric($price)){
        $error = "Price must be a number.";
    }elseif(empty($price)){
        $error = "Price Must be filled.";
    }elseif(empty($image_name)){
        $error = "Image Must be selected.";
    }
    
    
    else{

    $query = "INSERT INTO products (name, price, detail, category_id, brand_id, image) VALUES ('$name', '$price', '$detail', '$category_id', '$brand_id', '$image_name')";
    $result = mysqli_query($conn, $query);


    if($result) {
        $success = "Product inserted successfully.";
    } else {
        $error = "Error inserting Product.";
    }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">

<?php include './navbar.php';?>

    <?php include './message.php';?>

    <div class="row  mt-5 ">



        <div class="card p-3 col-12 mb-2 shadow">
            <h2>Add Product</h2>
            <a href="products.php" class="btn btn-primary my-3 w-25">Products</a>
            
            <form method="post" action="add_product.php" class="row g-3" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-12">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-12">
                    <label for="detail" class="form-label">Deatil</label>
                    <textarea name="detail" class="form-control"></textarea>
                </div>
                <div class="col-12">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-select">
                        <option value="">select a option</option>
                    <?php
                        $query = "SELECT * FROM category";
                        $result = $conn->query($query);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand_id" id="brand" class="form-select">
                    <option value="">select a option</option>
                        <?php
                        $query = "SELECT * FROM brand";
                        $result = $conn->query($query);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="add">Add Product</button>
                </div>

            </form>
        </div>
  
    </div>
</div>


<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>