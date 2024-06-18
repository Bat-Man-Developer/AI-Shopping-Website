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

    //View Order Items Matching Order Id
    $stmt2 = $conn->prepare("SELECT * FROM orderitems WHERE fldorderid=?");
    $stmt2->bind_param('i',$orderid);
    if($stmt2->execute()){
      $orderitems = $stmt2->get_result();
    }
    else{
      header('cart.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //Get Order items As Rows
    foreach($orderitems as $product){
      $productid = $product['fldproductid'];
      unset($_SESSION['cart'][$productid]);
      calculatetotalcart();
      //View Products Matching Product Id
      $stmt3 = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
      $stmt3->bind_param('i',$productid);
      if($stmt3->execute()){
        $productdetails = $stmt3->get_result();
      }
      else{
        header('cart.php?error=Something Went Wrong!! Contact Support Team.');
      }

      //Get matching products from database
      foreach($productdetails as $row){
        $productstock = $row['fldproductstock'];
      }
      $productquantity = $product['fldproductquantity'];
      $productstock = $productstock-$productquantity;
      
      //Update Product Stock by Subtracting the Quantity Sold
      $stmt4 = $conn->prepare("UPDATE products SET fldproductstock=? WHERE fldproductid=?");
      $stmt4->bind_param('si',$productstock,$productid);
      if($stmt4->execute()){

      }
      else{
        header('cart.php?error=Something Went Wrong!! Contact Support Team.');
      }
      //Look for product most sold value in database
      $stmt5 = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
      $stmt5->bind_param('i',$productid);
      if($stmt5->execute()){
        $mostsoldproducts = $stmt5->get_result();// This is an array
        while($row = $mostsoldproducts->fetch_assoc()){
          $productmostsold = $row['fldproductmostsold'];
          $productmostsold = $productmostsold + $productquantity;
        }
      }
      else{
        header('cart.php?error=Something Went Wrong!! Contact Support Team.');
      }
  
      //Update product most sold column in products table
      $stmt6 = $conn->prepare("UPDATE products SET fldproductmostsold=? WHERE fldproductid=?");
      $stmt6->bind_param('ii',$productmostsold,$productid);
      if($stmt6->execute()){

      }
      else{
        header('cart.php?error=Something Went Wrong!! Contact Support Team.');
      }
    }

    //Check For Matching Order Id In Customer Shipping Address Table
    $stmt7 = $conn->prepare("SELECT fldshippingid,fldorderid,fldshippingfirstname,fldshippinglastname,fldshippingaddressline1,fldshippingaddressline2,fldshippingpostalcode,fldshippingcity,fldshippingcountry,fldshippingemail,fldshippingphonenumber,fldshippingdeliverycomment FROM customershippingaddress WHERE fldorderid = ? LIMIT 1");
    $stmt7->bind_param('i',$orderid);
    if($stmt7->execute()){
      $stmt7->bind_result($shippingid,$orderid,$shippingfirstname,$shippinglastname,$shippingaddressline1,$shippingaddressline2,$shippingpostalcode,$shippingcity,$shippingcountry,$shippingemail,$shippingphonenumber,$shippingdeliverycomment);
      $stmt7->store_result();
      //If Order Id Is Found In Customer Shipping Address Table
      if($stmt7->num_rows() == 1){
        $stmt7->fetch();
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

    //Remove everything from cart -> After Payment is done
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

function calculatetotalcart(){
  $totalprice = 0;
  $totalquantity = 0;

  foreach($_SESSION['cart'] as $key => $value){
    $product = $_SESSION['cart'][$key];

    $price = $product['fldproductprice'];
    $quantity = $product['fldproductquantity'];
    $discount = $product['fldproductdiscount'];
    
    $totalprice = $totalprice+($price*$quantity)-($price*$quantity*$discount);
    $totalquantity = $totalquantity + $quantity; 

  }
  //Store Information in Session
  $_SESSION['total'] = $totalprice;
  $_SESSION['totalquantity'] = $totalquantity;
}