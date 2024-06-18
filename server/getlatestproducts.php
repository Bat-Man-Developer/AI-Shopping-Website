<?php
include('connection.php');
$stmt = $conn->prepare("SELECT * FROM products ORDER BY fldproductid DESC LIMIT 8");
if($stmt->execute()){
  $latestproducts = $stmt->get_result();// This is an array
}