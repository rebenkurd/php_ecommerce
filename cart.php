<?php
include './config.php';

?>


<?php




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/webfont/tabler-icons.min.css">
</head>
<body>
<div class="container">
<!-- header -->

<?php include './header.php';?>


<div class="card mt-5 p-4">
    <div class="text-center my-3">
           <h2>Thats Your Cart!</h2>
    </div>


<div class="row">
    <div class="col-8 ">
    <div class="d-flex flex-column"  >
    
    <?php

    $sql = "SELECT * FROM cart";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
<div class="card mb-3 shopping_cart" id="cart">
  <div class="row g-0">
    <div class="col-md-2" >
      <img src="./assets/imgs/<?php echo $row['product_image'];?>" class="rounded-start img-fluid"  alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['product_name'];?></h5>
        
      </div>
    </div>
    <div class="col-md-2">
      <div class="card-body">
        <h5 class="card-title 
        ">Price: $ <span class="product_price"><?php echo $row['product_price'];?></span></h5>
        <input type="number" class="form-control my-1" name="product_qty" value="1" min="1">
        <button class="btn btn-danger remove-item" data-id="<?php echo $row['product_id'];?>"><i class="ti ti-trash"></i> Remove</button>
      </div>
      </div>


  </div>
</div>
    <?php
        }
    }else{
        echo "No products found";
    }
    ?>

    </div>
    </div>
    <div class="col-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title
            ">Total Price: $<span class="total_price"></span></h5>
            <button class="btn btn-primary" id="checkout">Checkout</button>
        </div>
    </div>

</div>

</div>





<?php include './footer.php';?>

</body>
</html>