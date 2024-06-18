<?php
include('connection.php');
$productid = "9";
$stmt = $conn->prepare("SELECT * FROM products WHERE fldproductid = ?");
$stmt->bind_param('i',$productid);
if($stmt->execute()){
  $offerproducts = $stmt->get_result();// This is an array
}