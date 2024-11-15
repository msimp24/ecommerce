<?php 
session_start();
//unset($_SESSION['cart']);

$cartLength = 0;
$cartItems = [];
if(isset($_SESSION['cart'])){
    $cartLength = count($_SESSION['cart']); 
    $cartItems = $_SESSION['cart'];
}

?>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script defer src="./src/app.js"></script>
</head>

<?php include('./templates/header.php') ?>
<body>
<h1 class="featured-h1">Your Cart (<?php echo $cartLength ?> items)</h1>


<div class="container">
<?php foreach($cartItems as $item): ?>
  <div class="cart-items">
    <h3><?php echo $item['product']?></h3>
    <div class="misc-container">
        <div class="price-container">
            <p>$<?php echo $item['price'] ?></p>
            <div class="quantity-container">
                <i class="fa-solid fa-minus item-icon"></i>
                <p><?php echo $item['quantity'] ?></p>
                <i class="fa-solid fa-plus item-icon"></i>
            </div>
        </div>
    <i class="fa-solid fa-trash item-icon" id="<?php echo $item['id']?>"></i>

    </div>
  </div>

<?php endforeach ?>
    
</div>


</body>

<?php include('./templates/footer.php')  ?>
