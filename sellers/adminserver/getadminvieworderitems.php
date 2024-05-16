<?php
include('adminconnection.php');
//1. View Product Details
if(isset($_GET['fldorderid']) && isset($_GET['fldproductsellersid'])){
  $orderid = $_GET['fldorderid'];
  $productsellersid = $_GET['fldproductsellersid'];
  $stmt1 = $conn->prepare("SELECT * FROM orderitems WHERE fldorderid=? AND fldproductsellersid=?");
  $stmt1->bind_param("ii",$orderid,$productsellersid);
  $stmt1->execute();
  // This is an array of 1 product
  $vieworderitems = $stmt1->get_result();
}
else{//no product id was given
  header('sellers/dashboard.php?errormessage=Something went wrong!');
}