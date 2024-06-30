<?php
include('adminconnection.php');
if(isset($_POST['adminapproveproductbtn'])){
  $productid = $_POST['fldapproveproductid'];
  $stmt = $conn->prepare("DELETE FROM productsapprovals WHERE fldapproveproductid = ?");
  $stmt->bind_param("i",$productid);
  if($stmt->execute()){
    header('location: ../admin/adminproductsapprovals.php?editmessage=Product Was Approved, Seller has been notified!');
  }
  else{
    header('location: ../admin/adminproductsapprovals.php?errormessage=Error Occured, Try Again.');
  }
}
else if(isset($_POST['admincancelproductbtn'])){
  header('location: ../admin/adminproductsapprovals.php');
}
else if(isset($_GET['fldapproveproductid'])){
  $productid = $_GET['fldapproveproductid'];
  $stmt1 = $conn->prepare("SELECT * FROM productsapprovals WHERE fldapproveproductid = ?");
  $stmt1->bind_param("i",$productid);
  $stmt1->execute();
  // This is an array of 1 product
  $approveproduct = $stmt1->get_result();
}
else{//no product id was given
  header('admin/dashboard.php?errormessage=Something went wrong!');
}