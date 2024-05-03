
<?php

include './config.php';
if(!isset($_COOKIE['username'])){
    header('location:login.php');
}

$_SESSION['cart_count'] = 0;
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['name'];
        $product_price = $row['price'];
        $product_image = $row['image'];
        $product_category = $row['category_id'];
        $product_brand = $row['brand_id'];
        $username = $_COOKIE['username'];

        if($product_id == $row['id']){
            $sql = "SELECT * FROM cart WHERE product_id = $product_id AND username = '$username'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $success = "Product already added to cart";
                echo $success;
            }else{
            $sql = "INSERT INTO cart (product_id, product_name, product_price, product_image, product_category,product_brand,username) VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$product_category', '$product_brand','$username')";
            $result = mysqli_query($conn, $sql);
        }
        }


        
        if($result){
            
            $sql = "SELECT * FROM cart WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            echo $count;

        }else{
            echo "Something went wrong";
        }
    }else{
        echo "No product found";
    }
}else{
    echo "No product found";
}

?>
