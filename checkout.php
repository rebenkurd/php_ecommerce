
<?php

include './config.php';
if(!isset($_COOKIE['username'])){
    header('location:login.php');
}


if(isset($_POST['status'])){
    $total_price = $_POST['total_price'];
    $username = $_COOKIE['username'];
    $qty = $_POST['qty'];
    $p_id = $_POST['p_id'];

    if(empty($total_price)){
        echo "Please add some products to cart";
        exit();
    }


    foreach($p_id as $key=> $product_id){

        $sql = "SELECT * FROM cart WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_image = $row['product_image'];

        $sql = "INSERT INTO checkout (username, product_id, product_name, product_price, product_image, qty,total_price) VALUES ('$username', '$product_id', '$product_name', '$product_price', '$product_image', '$qty[$key]','$total_price')";
        $result=mysqli_query($conn, $sql);
    
        if($result){
            $sql = "DELETE FROM cart WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "Order Placed Successfully";

            }else{
                echo "Something went wrong";
            }
        }else{
            echo "Something went wrong";
        }
    }

    
}