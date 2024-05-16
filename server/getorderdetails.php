<?php
include('connection.php');
if(isset($_POST['ordersbtn'])){
  if(isset($_POST['fldorderid'])){
    unset($_SESSION['checkoutbtn']);
    $userid = $_POST['flduserid'];
    $orderid = $_POST['fldorderid'];
    $orderstatus = $_POST['fldorderstatus'];
    $ordercost = $_POST['fldordercost'];
    $couriercost = $_POST['fldcouriercost'];
    //Look for Matching Order with Billing & Shipping
    $stmt = $conn->prepare("SELECT fldbillingid,fldbillingfirstname,fldbillinglastname,fldbillingaddressline1,fldbillingaddressline2,fldbillingpostalcode,fldbillingcity,fldbillingcountry,fldbillingemail,fldbillingphonenumber,fldbillingidnumber FROM customerbillingaddress WHERE fldorderid = ? LIMIT 1");
    $stmt->bind_param('s',$orderid);
    if($stmt->execute()){
      $stmt->bind_result($billingid,$billingfirstname,$billinglastname,$billingaddressline1,$billingaddressline2,$billingpostalcode,$billingcity,$billingcountry,$billingemail,$billingphonenumber,$billingidnumber);
      $stmt->store_result();
      //If Order Id Is Found In Billing Table
      if($stmt->num_rows() == 1){
        $stmt->fetch();
        //Set Billing Session
        $_SESSION['fldbillingid'] = $billingid;
        $_SESSION['fldbillingfirstname'] = $billingfirstname;
        $_SESSION['fldbillinglastname'] = $billinglastname;
        $_SESSION['fldbillingaddressline1'] = $billingaddressline1;
        $_SESSION['fldbillingaddressline2'] = $billingaddressline2;
        $_SESSION['fldbillingpostalcode'] = $billingpostalcode;
        $_SESSION['fldbillingcity'] = $billingcity;
        $_SESSION['fldbillingcountry'] = $billingcountry;
        $_SESSION['fldbillingphonenumber'] = $billingphonenumber;
        $_SESSION['fldbillingemail'] = $billingemail;
        $_SESSION['fldbillingidnumber'] = $billingidnumber;
      }
      else{
        header('index.php?error=Something Went Wrong!! Contact Support Team.');
      }
    }

    $stmt1 = $conn->prepare("SELECT fldshippingid,fldshippingfirstname,fldshippinglastname,fldshippingaddressline1,fldshippingaddressline2,fldshippingpostalcode,fldshippingcity,fldshippingcountry,fldshippingemail,fldshippingphonenumber,fldshippingdeliverycomment FROM customershippingaddress WHERE fldorderid = ? LIMIT 1");
    $stmt1->bind_param('s',$orderid);
    if($stmt1->execute()){
      $stmt1->bind_result($shippingid,$shippingfirstname,$shippinglastname,$shippingaddressline1,$shippingaddressline2,$shippingpostalcode,$shippingcity,$shippingcountry,$shippingemail,$shippingphonenumber,$shippingdeliverycomment);
      $stmt1->store_result();
      //If Order Id Is Found In Shipping Table
      if($stmt1->num_rows() == 1){
        $stmt1->fetch();
        //Set Shipping Session
        $_SESSION['fldshippingid'] = $shippingid;
        $_SESSION['fldshippingfirstname'] = $shippingfirstname;
        $_SESSION['fldshippinglastname'] = $shippinglastname;
        $_SESSION['fldshippingaddressline1'] = $shippingaddressline1;
        $_SESSION['fldshippingaddressline2'] = $shippingaddressline2;
        $_SESSION['fldshippingpostalcode'] = $shippingpostalcode;
        $_SESSION['fldshippingcity'] = $shippingcity;
        $_SESSION['fldshippingcountry'] = $shippingcountry;
        $_SESSION['fldshippingphonenumber'] = $shippingphonenumber;
        $_SESSION['fldshippingemail'] = $shippingemail;
        $_SESSION['fldshippingdeliverycomment'] = $shippingdeliverycomment;
      }
      else{
        header('index.php?error=Something Went Wrong!! Contact Support Team.');
      }
    }
    //View Order Items Matching Billing & Shipping
    $stmt = $conn->prepare("SELECT * FROM orderitems WHERE fldorderid = ?");
    $stmt->bind_param('i',$orderid);
    $stmt->execute();
    $orderdetails = $stmt->get_result();
    $ordercost = calculatetotalorderprice($orderdetails) + $couriercost;
  }
}

function calculatetotalorderprice($orderdetails){
  $totalproductprice = 0;
  foreach($orderdetails as $row){
    $productprice = $row['fldproductprice'];
    $productquantity = $row['fldproductquantity'];
    $productdiscount = $row['fldproductdiscount'];
    
    $totalproductprice = $totalproductprice+($productprice*$productquantity)-($productprice*$productquantity*$productdiscount);
  }
  return $totalproductprice;
}