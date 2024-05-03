<nav class="navbar navbar-expand-lg bg-white shadow border navbar-white  rounded-3 mt-5">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Product
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./products.php">List</a></li>
            <li><a class="dropdown-item" href="./add_product.php">Add</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./category.php">List</a></li>
            <li><a class="dropdown-item" href="./add_category.php">Add</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Brand
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./brand.php">List</a></li>
            <li><a class="dropdown-item" href="./add_brand.php">Add</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php 
            
            $sql = "SELECT * FROM users WHERE username = '$_COOKIE[username]'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            echo $row['fullname']; ?>  

          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./">Go Back Home</a></li>


          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>