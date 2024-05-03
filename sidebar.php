<div class="p-3 list-group">
      <a class="list-group-item list-group-item-action active" aria-current="true">
        Brands
      </a>
        <?php
        $sql = "SELECT * FROM brand";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
          <a href="./product_brand.php?id=<?php echo $row['id'];?>" class="list-group-item list-group-item-action"><?php echo $row['name'];?></a>
        <?php
            }
        }else{
            echo "No brands found";
        }
        ?>
    </div>
    <div class="p-3 list-group mt-1">
      <a class="list-group-item list-group-item-action active" aria-current="true">
        Category
      </a>
        <?php
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
          <a href="./product_category.php?id=<?php echo $row['id'];?>" class="list-group-item list-group-item-action"><?php echo $row['name'];?></a>
        <?php
            }
        }else{
            echo "No category found";
        }
        ?>
    </div>