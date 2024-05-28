<?php
include('sellersconnection.php');
if(isset($_SESSION['fldproductsellersid'])){
  $productsellersid = $_SESSION['fldproductsellersid'];
  $stmt = $conn->prepare("SELECT * FROM productsellers WHERE fldproductsellersid = ?");
  $stmt->bind_param("i",$productsellersid);
  $stmt->execute();
  // This is an array of 1 product
  $admins = $stmt->get_result();
}