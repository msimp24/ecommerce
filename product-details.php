<?php 
include('./config/db_connect.php');

if(isset($_GET['id'])){
 $id = mysqli_real_escape_string($conn, $_GET['id']);
}

$sql = "SELECT * FROM products where product_id = $id";

 $result = mysqli_query($conn, $sql);
 $product = mysqli_fetch_assoc($result);
 mysqli_free_result($result);
 mysqli_close($conn);




?>

<head>
</head>


<?php include('./templates/header.php') ?>
<body>
 <div class="container">
     <div class="cart-updated">
    <h1><?php echo $product['name'] ?> was successfully added to the cart</h1>
    <i id="close" class="fa-solid fa-x"></i>
   </div>
  <div class="row">

   <div class="col">
    <img class="product-details-img" src="./assets/product-images/sports.jpg" alt="">
   </div>
    <div class="product-details-desc">
 
      <h1 id="product-name"><?php echo $product['name'] ?></h1>
      <p><?php echo $product['description'] ?></p>
      <p id="price">$<?php echo $product['price'] ?></p>
     <input id="product-id" type="hidden" value="<?php echo $id ?>">

      <div class="center">
      <button id=cart-btn>Add To Cart</button>

      </div>
    </div>
   </div>
  </div>
 
</body>
<?php include('./templates/footer.php') ?>