<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Site</title>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script defer src="./src/app.js"></script>
</head>
<body>
  <?php include('./templates/header.php') ?>


  <div class="container">
    <div class="home-grid-container">
      <div class="square-1x1">
        <div class="img-box">
          <a href="/ecommerce/products.php">
          <h1 class="img-text">View All Items</h1>
          <img src="./assets/images/all-home.png" alt="">
        </div>
        </a>

      </div>
      <div class="grid-2x2">
        <div class="small-2x2">
        <div class="img-box">
          <a href="/ecommerce/products.php?category=sports">

          <h1 class="img-text">Sports</h1>

            <img src="./assets/images/sports-home.png" alt="">

          </a>
        </div>

        </div>
        <div class="small-2x2">
        <div class="img-box">
          <a href="/ecommerce/products.php?category=clothing">
            <h1 class="img-text">Clothing</h1>
            <img src="./assets/images/clothing-home.png" alt="">
          </a>
        </div>
        </div>
        <div class="small-2x2">
          <div class="img-box">
            <a href="/ecommerce/products.php?category=accessories">
              <h1 class="img-text">Accessories</h1>
              <img src="./assets/images/accessories-home.png" alt="">
            </a>
          </div>

        </div>
        <div class="small-2x2">
          <div class="img-box">
            <a href="/ecommerce/products.php?category=sports">
              <h1 class="img-text">Outerwear</h1>
              <img src="./assets/images/outerwear-home.png" alt="">
            </a>
          </div>
        </div>
      </div>
    <h1 class="featured-h1">Featured Products</h1>

  </div>
</div>

  <?php include('./templates/footer.php') ?>
</body>
</html>

