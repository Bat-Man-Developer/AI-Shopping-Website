<?php
include('connection.php');
if(isset($_GET['fldtransactionid'])){
  if(isset($_GET['fldorderid']))
  {
    $_SESSION['flduserid'] = $userid = $_GET['flduserid'];
    $orderid = $_GET['fldorderid'];
    $orderstatus = "Paid";
    $transactionid = $_GET['fldtransactionid'];
    $paymentdate = date('Y-m-d H:i:s');
    
    //Insert Payment Info In Payment Table
    $stmt = $conn->prepare("INSERT INTO payments (fldorderid,flduserid,fldtransactionid,fldpaymentdate)
            VALUES (?,?,?,?); ");
    $stmt->bind_param('iiis',$orderid,$userid,$transactionid,$paymentdate);

    //Update Order Status To Paid
    $stmt1 = $conn->prepare("UPDATE orders SET fldorderstatus = ? WHERE fldorderid = ?");
    $stmt1->bind_param('si',$orderstatus,$orderid);

    if($stmt->execute()){
      if($stmt1->execute()){

      }
      else{
        header('cart.php?error=Something Went Wrong!! Contact Support Team.');
      }
    }
    else{
      header('cart.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //Check For Matching Order Id In Customer Shipping Address Table
    $stmt2 = $conn->prepare("SELECT fldshippingid,fldorderid,fldshippingfirstname,fldshippinglastname,fldshippingaddressline1,fldshippingaddressline2,fldshippingpostalcode,fldshippingcity,fldshippingcountry,fldshippingemail,fldshippingphonenumber,fldshippingdeliverycomment FROM customershippingaddress WHERE fldorderid = ? LIMIT 1");
    $stmt2->bind_param('i',$orderid);
    if($stmt2->execute()){
      $stmt2->bind_result($shippingid,$orderid,$shippingfirstname,$shippinglastname,$shippingaddressline1,$shippingaddressline2,$shippingpostalcode,$shippingcity,$shippingcountry,$shippingemail,$shippingphonenumber,$shippingdeliverycomment);
      $stmt2->store_result();
      //If Order Id Is Found In Customer Shipping Address Table
      if($stmt2->num_rows() == 1){
        $stmt2->fetch();
        //Set Shipping Session
        $_SESSION['fldshippingid'] = $shippingid;
        $_SESSION['fldshippingfirstname'] = $shippingfirstname;
        $_SESSION['fldshippinglastname'] = $shippinglastname;
        $_SESSION['fldshippingaddressline1'] = $shippingaddressline1;
        $_SESSION['fldshippingaddressline2'] = $shippingaddressline2;
        $_SESSION['fldshippingpostalcode'] = $shippingpostalcode;
        $_SESSION['fldshippingcity'] = $shippingcity;
        $_SESSION['fldshippingcountry'] = $shippingcountry;
        $_SESSION['fldshippingemail'] = $shippingemail;
        $_SESSION['fldshippingphonenumber'] = $shippingphonenumber;
        $_SESSION['fldshippingdeliverycomment'] = $shippingdeliverycomment;
      }
      else{
        header('index.php?error=Something Went Wrong!! Contact Support Team.');
      }
    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //Remove everything from cart -> Delay until Payment is done
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
    unset($_SESSION['totalquantity']);
    unset($_SESSION['checkoutbtn']);
    unset($_SESSION['fldorderid']);
    unset($_SESSION['fldorderstatus']);
    unset($_SESSION['fldordercost']);
    unset($_SESSION['fldorderdate']);
    unset($_SESSION['flddiscountcode']);
    unset($_SESSION['fldcouriercost']);
    unset($_SESSION['protectpaymentpage']);

    header('location: ../noaccountlogin.php?paymentmessage=Paid Successfully. Create New Password For Your Account.');
  }
  else{
    header('location: ../cart.php?error=Something Went Wrong!! Contact Support Team. No Order Id Detected 404');
  }
}