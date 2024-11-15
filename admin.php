<?php

include('./config/db_connect.php');

$errors = array('product' => '', 'description' => '', 'stock' => '', 'price' => '', 'imageUrl' => '', 'category' => '');

$product = '';
$description = '';
$stock = '';
$price= '';
$category = '';
$imageUrl = '';


if(isset($_POST['submit'])){

  //check email
  if(empty($_POST['product'])){

    $errors['product'] = "Product is a required field <br>";
  }
  else{
    $product = $_POST['product'];
    $length = strlen($product);

    if($length < 3){
      $errors['product'] = "Product must have more than 2 characters";
    }
  }
  if(empty($_POST['description'])){
   $errors['description'] = 'Description is a required field';
  }
  else{
   $description = $_POST['description'];
   $length = strlen($description);

   if($length < 10){
    $errors['description'] = 'A description must have most than 10 characters';
   }
  }

  if(empty($_POST['stock'])){
    $errors['stock'] = 'Stock is a required filed';
  }
  else{
   $check = is_numeric($_POST['stock']);

   if(!$check){
    $errors['stock'] = 'Stock must be a number';
   }
   else{
    $stock = intval($_POST['stock']);
   }

  }

    if(empty($_POST['price'])){
    $errors['price'] = 'Price is a required filed';
  }
  else{
   $check = is_numeric($_POST['price']);

   if(!$check){
    $errors['price'] = 'Price must be a number';
   }
   else{
    $price = intval($_POST['price']);
   }

  }

  if(empty($_POST['imageUrl'])){
   $errors['imageUrl'] = 'Image Url is a requied field';
  }
  else{
   $imageUrl = $_POST['imageUrl'];

   if(!preg_match('/^[^?]*\.(jpg|jpeg|gif|png)/', $imageUrl)){
    $errors['imageUrl'] = 'Invalid format, image url must end either of .jpg, .jpeg, .gif or .png';
   }
  }

    if(empty($_POST['category'])){

    $errors['category'] = "Category is a required field <br>";
  }
  else{
    $category = $_POST['category'];
    $length = strlen($category);

    if($length < 3){
      $errors['category'] = "category must have more than 2 characters";
    }
  }

if(!array_filter($errors)){
     $sql = "INSERT INTO products(name, description, stock, price, image_url, category) VALUES('$product', '$description', '$stock', '$price', '$imageUrl', '$category')";

     
    if(mysqli_query($conn, $sql)){
      header('Location: admin.php');
    }else{
      echo'query error:' . mysqli_error($conn);
    }

    header('Location: admin.php');

}

}//end of is set POST check

?>

<head>
 <link rel="stylesheet" href="./styles/admin.css">

</head>

<body>
 <?php include('./templates/header.php') ?>
 
<form action="./admin.php" method="POST" class="product-form">
 <h1>Add New Product</h1>
 <label for="name">Product Name</label>
 <input type="text" name="product" value="<?php echo $product?>">
 <div class="error-text">
  <?php echo $errors['product'] ?>
 </div>


 <label for="description">Description</label>
 <input type="text" name="description" autofocus value="<?php echo $description?>">
  <div class="error-text">
  <?php echo $errors['description'] ?>
 </div>

 <label for="name">Category</label>
 <input type="text" name="category" value="<?php echo $category?>">
 <div class="error-text">
  <?php echo $errors['category'] ?>
 </div>

 <label for="stock">Stock</label>
 <input type="text" name="stock" value="<?php echo $stock?>">
   <div class="error-text">
  <?php echo $errors['stock'] ?>
 </div>


 <label for="price">Price</label>
 <input type="text" name="price" value="<?php echo $price ?>">
  <div class="error-text">
  <?php echo $errors['price'] ?>
 </div>



 <label for="imageUrl">Image Url</label>
 <input type="text" name="imageUrl" value="<?php echo $imageUrl ?>">
   <div class="error-text">
  <?php echo $errors['imageUrl'] ?>
 </div>


  <div class="center">
     <input type="submit" name="submit" value="Submit" class="add-prod-btn">  
  </div>
</form>
 <?php include('./templates/footer.php') ?>

</body>