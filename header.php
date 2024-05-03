<nav class="navbar navbar-expand-lg bg-light rounded-3 shadow mt-5 ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">Home</a>
        </li>
        <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">

          <?php

            while($row = mysqli_fetch_assoc($result)){
        ?>
          <li><a class="dropdown-item" href="./product_category.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>

        <?php
            }
        }
        ?>
          </ul>
        </li>
        <?php
                $sql = "SELECT * FROM brand";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Brand
          </a>
          <ul class="dropdown-menu">

          <?php

            while($row = mysqli_fetch_assoc($result)){
        ?>
          <li><a class="dropdown-item" href="./product_brand.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>

        <?php
            }
        }
        ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
      </ul>
      <div class="d-flex gap-3">


      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php
        if(!isset($_COOKIE['username'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./register.php">Register</a>
        </li>
        <?php
        }else{
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
 
        <li class="nav-item">
        <a type="button" class="nav-link  position-relative" href="./cart.php">
          <i class="ti ti-shopping-cart fs-5"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success ">
          <span id="cart_count">
            <?php 
                $username = $_COOKIE['username'];
                $sql = "SELECT * FROM cart WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0){
                    echo $count;
                }else{
                    echo 0;
                }
            ?></span>
          </span>
        </a>
        </li>
        <?php
        }
        ?>
      </ul>

      <form class="d-flex" role="search" method="get" action="./search.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="product_name">
        <button class="btn btn-outline-success" type="submit"><i class="ti ti-search"></i></button>
      </form>
</div>
    </div>
  </div>
</nav>