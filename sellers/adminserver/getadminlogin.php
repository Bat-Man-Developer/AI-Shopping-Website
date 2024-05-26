<?php
include('adminconnection.php');
if(isset($_POST['productsellersloginbtn'])){
  $productsellersemail = $_POST['fldproductsellersemail'];
  $productsellerspassword = md5($_POST['fldproductsellerspassword']);

  //look up row in product sellers database where password & email match
  $stmt = $conn->prepare("SELECT fldproductsellersid,fldproductsellersfirstname,fldproductsellerslastname,fldproductsellersemail,fldproductsellerspassword FROM productsellers WHERE fldproductsellersemail = ? AND fldproductsellerspassword = ? LIMIT 1");
  $stmt->bind_param('ss',$productsellersemail,$productsellerspassword);
  if($stmt->execute()){
    $stmt->bind_result($productsellersid,$productsellersfirstname,$productsellerslastname,$productsellersemail,$productsellerspassword);
    $stmt->store_result();
    $stmt->fetch();
    if($stmt->num_rows() == 1){
      $_SESSION['fldproductsellersid'] = $productsellersid;
      $_SESSION['fldproductsellersfirstname'] = $productsellersfirstname;
      $_SESSION['fldproductsellerslastname'] = $productsellerslastname;
      $_SESSION['fldproductsellersemail'] = $productsellersemail;
      $_SESSION['fldproductowner'] = $productsellersfirstname." ".$productsellerslastname;
      $_SESSION['productsellerslogged_in'] = true;

      header('location: ../sellers/dashboard.php?loginmessage=Logged In Successfully');
    }
    else{//Password or Email is Wrong Or not in Database
      header('location: ../sellers/adminlogin.php?error=Could Not Verify Your Account!');
    }
  }
  else{
    header('location: ../sellers/adminlogin.php?error=Could Not Login At The Moment');
  }
}