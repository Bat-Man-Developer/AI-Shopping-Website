<?php
include('adminconnection.php');
if(isset($_POST['admindeletesellersproductsbtn'])){
  $productid = $_POST['fldproductid'];
  $productsellersid = $_POST['fldproductsellersid'];
  $stmt = $conn->prepare("DELETE FROM products WHERE fldproductid=?");
  $stmt->bind_param("i",$productid);
  if($stmt->execute()){
    header('location: ../admin/adminsellers.php?editmessage=Product Was Deleted Succesfully!');
  }
  else{
    header('location: ../admin/adminsellers.php?errormessage=Error Occured, Try Again.');
  }
}
else if(isset($_POST['admincancelsellersproductsbtn'])){
  header('location: ../admin/adminsellers.php?');
}
else if(isset($_GET['fldproductid']) && isset($_GET['fldproductsellersid'])){
  $productid = $_GET['fldproductid'];
  $productsellersid = $_GET['fldproductsellersid'];
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid=? AND fldproductsellersid=?");
  $stmt1->bind_param("ii",$productid,$productsellersid);
  $stmt1->execute();
  // This is an array of 1 product
  $deleteproducts = $stmt1->get_result();
}
else{//no product id was given
  header('admin/dashboard.php?errormessage=Something went wrong!');
}