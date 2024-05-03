
<?php

include './config.php';
if(!isset($_COOKIE['username'])){
    header('location:login.php');
}



if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $username = $_COOKIE['username'];
    $sql = "DELETE FROM cart WHERE product_id = $product_id AND username = '$username'";
    $result = mysqli_query($conn, $sql);
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

?>
