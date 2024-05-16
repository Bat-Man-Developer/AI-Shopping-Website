<?php
include('connection.php');
$stmt = $conn->prepare("SELECT * FROM products");
if($stmt->execute()){
  $randomproducts = $stmt->get_result();// This is an array
}
else{
  header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
}