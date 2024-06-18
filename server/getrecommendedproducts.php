<?php
include('connection.php');
$stmt = $conn->prepare("SELECT * FROM products LIMIT 4");
if($stmt->execute()){
  $recommendedproducts = $stmt->get_result();// This is an array
}