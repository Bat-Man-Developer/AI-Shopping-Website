<?php
include('sellersconnection.php');
if(isset($_POST['productsellersregistrationbtn'])){
  $productsellersimage = $_POST['fldproductsellersimage'];
  $productsellersfirstname = $_POST['fldproductsellersfirstname'];
  $productsellerslastname = $_POST['fldproductsellerslastname'];
  $productsellersaddressline1 = $_POST['fldproductsellersaddressline1'];
  $productsellersaddressline2 = $_POST['fldproductsellersaddressline2'];
  $productsellerspostalcode = $_POST['fldproductsellerspostalcode'];
  $productsellerscity = $_POST['fldproductsellerscity'];
  $productsellerscountry = $_POST['fldproductsellerscountry'];
  $productsellersphonenumber = $_POST['fldproductsellersphonenumber'];
  $productsellersemail = $_POST['fldproductsellersemail'];
  $productsellersidnumber = $_POST['fldproductsellersidnumber'];
  $productsellerspassword = $_POST['fldproductsellerspassword'];
  $productsellersconfirmpassword = $_POST['fldproductsellersconfirmpassword'];

  //if password dont match
  if($productsellerspassword != $productsellersconfirmpassword){
    header('location: sellersregistration.php?error=passwords dont match');
  }
  else if(strlen($productsellerspassword) < 8)
  {//if password is less than 8 characters
    header('location: sellersregistration.php?error=password must be atleast 8 characters');
  }
  else{//if there is no error
    //check whether there is a user with this email or not
    $stmt = $conn->prepare("SELECT count(*) FROM productsellers WHERE fldproductsellersemail=?");
    $stmt->bind_param('s',$productsellersemail);
    if($stmt->execute()){
      $stmt->bind_result($num_rows);
      $stmt->store_result();
      $stmt->fetch();
    }
    else{
      header('location: sellersregistration.php?errormessage=Something Went Wrong, Try Again!!');
    }

    //if there is a user already registered with this email
    if($num_rows != 0){
      header('location: sellersregistration.php?error=User With This Email Already Exists!');
    }
    else{//if no user registered with this email before
      //Create New Product Sellers
      $stmt1 = $conn->prepare("INSERT INTO productsellers (fldproductsellersimage,fldproductsellersfirstname,fldproductsellerslastname,fldproductsellersaddressline1,fldproductsellersaddressline2,fldproductsellerspostalcode,fldproductsellerscity,fldproductsellerscountry,fldproductsellersemail,fldproductsellersphonenumber,fldproductsellersidnumber,fldproductsellerspassword)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
      $stmt1->bind_param('ssssssssssss',$productsellersimage,$productsellersfirstname,$productsellerslastname,$productsellersaddressline1,$productsellersaddressline2,$productsellerspostalcode,$productsellerscity,$productsellerscountry,$productsellersemail,$productsellersphonenumber,$productsellersidnumber,md5($productsellerspassword));

      //if account was created succesfully
      if($stmt1->execute()){
        $productsellersid = $stmt1->insert_id;
        $_SESSION['fldproductsellersid'] = $productsellersid;
        $_SESSION['fldproductsellersemail'] = $productsellersemail;
        $_SESSION['fldproductsellersfirstname'] = $productsellersfirstname;
        $_SESSION['fldproductsellerslastname'] = $productsellerslastname;
        $_SESSION['fldproductsellersaddressline1'] = $productsellersaddressline1;
        $_SESSION['fldproductsellersaddressline2'] = $productsellersaddressline2;
        $_SESSION['fldproductsellerspostalcode'] = $productsellerspostalcode;
        $_SESSION['fldproductsellerscity'] = $productsellerscity;
        $_SESSION['fldproductsellerscountry'] = $productsellerscountry;
        $_SESSION['fldproductsellersphonenumber'] = $productsellersphonenumber;
        $_SESSION['fldproductsellersemail'] = $productsellersemail;
        $_SESSION['fldproductsellersidnumber'] = $productsellersidnumber;
        $_SESSION['fldproductsellerspassword'] = $productsellerspassword;
        $_SESSION['productsellerslogged_in'] = true;
        header('location: dashboard.php?registermessage=You Registered Succesfully');
      }
      else{//account could not be created
        header('location: sellersregistration.php?error=Could Not Create An Account At The Moment');
      }   
    }
  }
}