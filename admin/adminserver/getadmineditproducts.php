<?php
include('adminconnection.php');
//1. View Product Details
if(isset($_GET['fldproductid'])){
  $productid = $_GET['fldproductid'];
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
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
  $productbrand = $_POST['fldproductbrand'];
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
  $productowner = $_POST['fldproductowner'];

  $stmt = $conn->prepare("UPDATE products SET fldproductname=?,fldproductdepartment=?,fldproductcategory=?,fldproducttype=?,fldproductbrand=?,fldproductcolor=?,fldproductgender=?,fldproductsize=?,fldproductstock=?,fldproductdescription=?,fldproductprice=?, fldproductdiscount=?,fldproductdiscountcode=?,fldproductlength=?,fldproductwidth=?,fldproductheight=?,fldproductweight=?,fldproductfragile=?,fldproductspecialhandlingreq=?,fldproductinsurancereq=?,fldproductaddressline1=?,fldproductaddressline2=?,fldproductpostalcode=?,fldproductcity=?,fldproductcountry=?,fldproductowner=? WHERE fldproductid=?");

  $stmt->bind_param('ssssssssssssssssssssssssssi',$productname,$productdepartment,$productcategory,$producttype,$productbrand,$productcolor,$productgender,$productsize,$productstock,$productdescription,$productprice,$productdiscount,$productdiscountcode,$productlength,$productwidth,$productheight,$productweight,$productfragile,$productspecialhandlingreq,$productinsurancereq,$productaddressline1,$productaddressline2,$productpostalcode,$productcity,$productcountry,$productowner,$productid);
  
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