<?php
include('adminconnection.php');
//1. View Product Sellers Product Details
if(isset($_GET['fldproductid']) && isset($_GET['fldproductsellersid'])){
  $productid = $_GET['fldproductid'];
  $productsellersid = $_GET['fldproductsellersid'];
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid=? AND fldproductsellersid=?");
  $stmt1->bind_param("ii",$productid, $productsellersid);
  $stmt1->execute();
  // This is an array of 1 product seller
  $editproductsellers = $stmt1->get_result();
}
else if($_POST['admineditproductsellersproductbtn']){//Edit Product Sellers Details
  $productid = $_POST['fldproductid'];
  $productsellersid = $_POST['fldproductsellersid'];
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
  $productdiscount = $_POST['fldproductdiscount']/100;
  $productdiscountcode = $_POST['fldproductdiscountcode'];
  $productlength = $_POST['fldproductlength'];
  $productwidth = $_POST['fldproductwidth'];
  $productheight = $_POST['fldproductheight'];
  $productweight = $_POST['fldproductweight'];
  $productfragile = $_POST['fldproductfragile'];
  $productspecialhandlingreq = $_POST['fldproductspecialhandlingreq'];
  $productinsurancereq = $_POST['fldproductinsurancereq'];
  $productaddressline1 = $_POST['fldproductaddressline1'];
  $productaddressline2 = $_POST['fldproductaddressline2'];
  $productpostalcode = $_POST['fldproductpostalcode'];
  $productcity = $_POST['fldproductcity'];
  $productcountry = $_POST['fldproductcountry'];

  $stmt = $conn->prepare("UPDATE products SET fldproductname=?,fldproductdepartment=?,fldproductcategory=?,fldproducttype=?,fldproductcolor=?,fldproductgender=?,fldproductsize=?,fldproductstock=?,fldproductdescription=?,fldproductprice=?, fldproductdiscount=?,fldproductdiscountcode=?,fldproductlength=?,fldproductwidth=?,fldproductheight=?,fldproductweight=?,fldproductfragile=?,fldproductspecialhandlingreq=?,fldproductinsurancereq=?,fldproductaddressline1=?,fldproductaddressline2=?,fldproductpostalcode=?,fldproductcity=?,fldproductcountry=? WHERE fldproductid=? AND fldproductsellersid=?");

  $stmt->bind_param('ssssssssssssssssssssssssii',$productname,$productdepartment,$productcategory,$producttype,$productcolor,$productgender,$productsize,$productstock,$productdescription,$productprice,$productdiscount,$productdiscountcode,$productlength,$productwidth,$productheight,$productweight,$productfragile,$productspecialhandlingreq,$productinsurancereq,$productaddressline1,$productaddressline2,$productpostalcode,$productcity,$productcountry,$productid,$productsellersid);
  
  if($stmt->execute()){
    header('location: ../admin/adminsellers.php?editmessage=Product Updated Succesfully!');
  }
  else{
    header('location: ../admin/adminsellers.php?errormessage=Error Occured, Try Again.');
  }
}
else{//no product sellers id was given
  header('location: ../admin/adminsellers.php?errormessage=Something went wrong!');
}