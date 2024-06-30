<?php
include('adminconnection.php');
//1. View Product Details
if(isset($_GET['fldapproveproductid'])){
  $productid = $_GET['fldapproveproductid'];
  $stmt1 = $conn->prepare("SELECT * FROM productsapprovals WHERE fldapproveproductid=?");
  $stmt1->bind_param("i",$productid);
  $stmt1->execute();
  // This is an array of 1 product
  $viewproductsapprovals = $stmt1->get_result();
}
else{//no product id was given
  header('location: ../admin/adminproductsapprovals.php?errormessage=Something went wrong!');
}