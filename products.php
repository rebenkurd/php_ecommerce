
<?php

include './config.php';

if(!isset($_COOKIE['username'])){
    header('location:login.php');
}

$success = "";
$error = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id='$id'";
    if($conn->query($query)){
        $success="delete product successfully";

    }else{
        $error="Failed to delete product";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">

<?php include './navbar.php';?>

    <?php include './message.php';?>
    
    <div class="row  mt-5 ">



        <div class="card p-3 col-12 shadow">
            <h2>Product List</h2>
            
            <a href="add_product.php" class="btn btn-primary my-3 w-25">Add Product</a>


        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Brand</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $query = "SELECT * FROM products";
            $result = $conn->query($query);
            $a=1;
            if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
?>
                <tr>
                <th scope="row"><?php echo $a++; ?></th> 
                <td> <img src="./assets/imgs/<?php echo $row['image']; ?>" alt="Product Image" class="thumbnail rounded float-start me-3" width="35" height="35"> <span title="<?php echo $row['name'];?>"><?php echo substr($row['name'],0,30) ;?>...</span></td>
                <td>$<?php echo number_format($row['price'],2) ;?></td>
                <td>
                    <?php
                    $brand_id = $row['brand_id'];
                    $query2 = "SELECT name FROM brand WHERE id='$brand_id'";
                    $result2 = $conn->query($query2);
                    $brand = mysqli_fetch_assoc($result2);
                    echo $brand['name'];
                    ?>
                </td>
                <td>
                    <?php
                    $category_id = $row['category_id'];
                    $query2 = "SELECT name FROM category WHERE id='$category_id'";
                    $result2 = $conn->query($query2);
                    $category = mysqli_fetch_assoc($result2);
                    echo $category['name'];
                    ?>
                </td>

                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="products.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>

                </tr>
        
<?php
            }
            }else{?>
                <tr>
                    <td colspan="7" align="center">No products found.</td>
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