 <?php
 $conn = mysqli_connect(
  'localhost:3307', 'admin', 'Pass1234', 'garage-sale'
 );

 if(!$conn){
  echo 'Connnection error: ' . mysqli_connect_error();
 }
 ?>
