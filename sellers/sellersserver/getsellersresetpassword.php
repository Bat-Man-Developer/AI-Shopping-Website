<?php
include('sellersconnection.php');
if(isset($_POST['productsellersresetpasswordbtn'])){
  $productsellerspassword = $_POST['fldproductsellerspassword'];
  $productsellersconfirmpassword = $_POST['fldproductsellersconfirmpassword'];
  $productsellersemail = $_POST['fldproductsellersemail'];

  //1. if password dont match
  if($productsellerspassword != $productsellersconfirmpassword){
    header('location: sellersresetpassword.php?error=passwords dont match');
  }
  else if(strlen($productsellerspassword) < 8)
  {//2. if password is less than 8 characters
    header('location: sellersresetpassword.php?error=password must be atleast 8 characters');
  }
  else{//3. no errors
    //3.1 check whether there is a user with this email or not
    $stmt = $conn->prepare("SELECT count(*) FROM productsellers WHERE fldproductsellersemail=?");
    $stmt->bind_param('s',$productsellersemail);
    if($stmt->execute()){
      $stmt->bind_result($num_rows);
      $stmt->store_result();
      $stmt->fetch();
    }
    else{
      header('sellersresetpassword.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //3.1.1 if there is a user already registered with this email
    if($num_rows != 0){
      $stmt1 = $conn->prepare("UPDATE productsellers SET fldproductsellerspassword=? WHERE fldproductsellersemail=?");
      $stmt1->bind_param('ss',md5($productsellerspassword),$productsellersemail);
      if($stmt1->execute()){
        header('location: sellerslogin.php?message=Password Has Been Reset Succesfully. Login To Account!');
      }
      else{
        header('sellersresetpassword.php?error=Something Went Wrong!! Contact Support Team.');
      }
    }
    else{//3.1.2 if no user registered with this email before
        header('location: sellersresetpassword.php?error=Email not found!');
    }
  }
}