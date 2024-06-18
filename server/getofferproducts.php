<?php
include('connection.php');
$stmt = $conn->prepare("SELECT * FROM products ORDER BY fldproductid DESC LIMIT 1");
if($stmt->execute()){
  $offerproducts = $stmt->get_result();// This is an array
}