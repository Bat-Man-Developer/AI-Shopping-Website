<?php
include('adminconnection.php');
if(isset($_POST['admindeleteproductsbtn'])){
  $productid = $_POST['fldproductid'];
  $stmt = $conn->prepare("DELETE FROM products WHERE fldproductid = ?");
  $stmt->bind_param("i",$productid);
  if($stmt->execute()){
    header('location: ../admin/adminproducts.php?editmessage=Product Was Deleted Succesfully!');
  }
  else{
    header('location: ../admin/adminproducts.php?errormessage=Error Occured, Try Again.');
  }
}
else if(isset($_POST['admincancelproductsbtn'])){
  header('location: ../admin/adminproducts.php');
}
else if(isset($_GET['fldproductid'])){
  $productid = $_GET['fldproductid'];
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid = ?");
  $stmt1->bind_param("i",$productid);
  $stmt1->execute();
  // This is an array of 1 product
  $deleteproducts = $stmt1->get_result();
}
else{//no product id was given
  header('admin/dashboard.php?errormessage=Something went wrong!');
}