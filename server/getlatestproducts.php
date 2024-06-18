<?php
include('connection.php');
$stmt = $conn->prepare("SELECT * FROM products");
if($stmt->execute()){
  $latestproducts = $stmt->get_result();// This is an array
}