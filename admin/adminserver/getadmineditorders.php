<?php
include('adminconnection.php');
//1. View Product Details
if(isset($_GET['fldorderid'])){
  $orderid = $_GET['fldorderid'];
  $stmt1 = $conn->prepare("SELECT * FROM orders WHERE fldorderid = ?");
  $stmt1->bind_param("i",$orderid);
  $stmt1->execute();
  // This is an array of 1 product
  $editorders = $stmt1->get_result();
}
else if($_POST['admineditordersbtn']){//Edit Product Details
  $orderid = $_POST['fldorderid'];
  $orderstatus = $_POST['fldorderstatus'];
  $shippingaddressline1 = $_POST['fldshippingaddressline1'];
  $shippingcity = $_POST['fldshippingcity'];
  $shippingcountry = $_POST['fldshippingcountry'];

  $stmt = $conn->prepare("UPDATE orders SET fldorderstatus=?, fldshippingphonenumber=?, fldshippingaddressline1=?, fldshippingcity=?, fldshippingcountry=? WHERE fldorderid=?");

  $stmt->bind_param('sssssi',$orderstatus,$shippingphonenumber,$shippingaddressline1,$shippingcity,$shippingcountry,$orderid);
  
  if($stmt->execute()){
    header('location: ../admin/adminorders.php?editmessage=Order Updated Succesfully!');
  }
  else{
    header('location: ../admin/adminorders.php?errormessage=Error Occured, Try Again.');
  }
}
else{//no product id was given
  header('admin/dashboard.php?errormessage=Something went wrong!');
}