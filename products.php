<?php 

include('./config/db_connect.php');

$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$sql = '';

if($category === 'all'){
 $sql = 'SELECT * from products';
} else{
 $sql = "SELECT * from products WHERE category = '$category'";
}

$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>



<head>
 <link rel="stylesheet" href="./styles/products.css">
</head>

<body>
 <?php include('./templates/header.php') ?>

  <div class="product-img-box">
      <h1 class="product-text"><?php echo $category ?></h1>
      <img src="./assets/images/<?php echo $category ?>-home.png" alt="">
   </div>

 <div class="container">
  <div class="products-grid">
   <?php foreach($products as $product): ?>
    <a href="/ecommerce/product-details.php?id=<?php echo $product['product_id'] ?>">
     
    <div class="product-item">
     <h1 id="product-name"><?php echo $product['name'] ?></h1>
     <img src="./assets/product-images/<?php echo $product['image_url'] ?>" alt="">
     <p id="price" class="price-p">$<?php echo $product['price'] ?></p>
     <button id="cart-btn">More Details</button>
    </div>
    </a>

    <?php endforeach?>
  </div>
 </div>


 <?php include('./templates/footer.php') ?>
</body>