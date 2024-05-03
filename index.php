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
           <h2>Welcome to the Our Website</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p> 
    </div>


<div class="row">
    <div class="col-9">
    <div class="d-flex align-items-center flex-wrap gap-4">
    
    <?php

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="card" style="width: 18rem; height:22rem">
        <img src="./assets/imgs/<?php echo $row['image'];?>" class="card-img-top" height="200" alt="product image">
        <div class="card-body">
            <h5 title="<?php echo $row['name'];?>" class="card-title"><?php echo substr($row['name'],0,50) ;?>...</h5>
            <div class="d-flex justify-between align-items-center gap-4 mt-3 ">
                <button type="button" href="./addtocart.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm addtocart" data-id="<?php echo $row['id'];?>">Add To Card</button>
                <p class="card-text">Price: <strong>$<?php echo $row['price'];?></strong></p>
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
    <div class="col-3">
        <?php include './sidebar.php';?>
  </div>

</div>

</div>





<?php include './footer.php';?>

</body>
</html>