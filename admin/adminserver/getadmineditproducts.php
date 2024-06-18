<?php
include('adminconnection.php');
//1. View Product Details
if(isset($_GET['fldproductid'])){
  $productid = $_GET['fldproductid'];
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid = ?");
  $stmt1->bind_param("i",$productid);
  $stmt1->execute();
  // This is an array of 1 product
  $editproducts = $stmt1->get_result();
}
else if($_POST['admineditproductsbtn']){//Edit Product Details
  $productid = $_POST['fldproductid'];
  $productname = $_POST['fldproductname'];  
  $productdepartment = $_POST['fldproductdepartment'];
  $productcategory = $_POST['fldproductcategory'];
  $producttype = $_POST['fldproducttype'];
  $productcolor = $_POST['fldproductcolor'];
  $productgender = $_POST['fldproductgender'];
  $productsize = $_POST['fldproductsize'];
  $productstock = $_POST['fldproductstock'];
  $productdescription = $_POST['fldproductdescription'];
  $productprice = $_POST['fldproductprice'];
  $productdiscount = $_POST['fldproductdiscount'];
  $productdiscountcode = $_POST['fldproductdiscountcode'];

  $stmt = $conn->prepare("UPDATE products SET fldproductname=?,fldproductdepartment=?,fldproductcategory=?,fldproducttype=?,fldproductcolor=?,fldproductgender=?,fldproductsize=?,fldproductstock=?,fldproductdescription=?,fldproductprice=?, fldproductdiscount=?,fldproductdiscountcode=? WHERE fldproductid=?");

  $stmt->bind_param('ssssssssssssi',$productname,$productdepartment,$productcategory,$producttype,$productcolor,$productgender,$productsize,$productstock,$productdescription,$productprice,$productdiscount,$productdiscountcode,$productid);
  
  if($stmt->execute()){
    header('location: ../admin/adminproducts.php?editmessage=Product Updated Succesfully!');
  }
  else{
    header('location: ../admin/adminproducts.php?errormessage=Error Occured, Try Again.');
  }
}
else{//no product id was given
  header('location: ../admin/adminproducts.php?errormessage=Something went wrong!');
}