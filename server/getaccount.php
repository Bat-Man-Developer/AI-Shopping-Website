<?php
include('connection.php');
if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['address_captured']);
    unset($_SESSION['trackorderbtn']);
    unset($_SESSION['checkoutbtn']);
    //Unset Úser Session
    unset($_SESSION['flduserid']);
    unset($_SESSION['flduserimage']);
    unset($_SESSION['flduserfirstname']);
    unset($_SESSION['flduserlastname']);
    unset($_SESSION['flduseraddressline1']);
    unset($_SESSION['flduseraddressline2']);
    unset($_SESSION['flduserpostalcode']);
    unset($_SESSION['fldusercity']);
    unset($_SESSION['fldusercountry']);
    unset($_SESSION['flduseremail']);
    unset($_SESSION['flduserphonenumber']);
    unset($_SESSION['flduseridnumber']);
    //Unset Billing Session
    unset($_SESSION['fldbillingid']);
    unset($_SESSION['fldbillingfirstname']);
    unset($_SESSION['fldbillinglastname']);
    unset($_SESSION['fldbillingaddressline1']);
    unset($_SESSION['fldbillingaddressline2']);
    unset($_SESSION['fldbillingpostalcode']);
    unset($_SESSION['fldbillingcity']);
    unset($_SESSION['fldbillingcountry']);
    unset($_SESSION['fldbillingemail']);
    unset($_SESSION['fldbillingphonenumber']);
    unset($_SESSION['fldbillingidnumber']);
    //Unset Shipping Session
    unset($_SESSION['fldshippingid']);
    unset($_SESSION['fldshippingfirstname']);
    unset($_SESSION['fldshippinglastname']);
    unset($_SESSION['fldshippingaddressline1']);
    unset($_SESSION['fldshippingaddressline2']);
    unset($_SESSION['fldshippingpostalcode']);
    unset($_SESSION['fldshippingcity']);
    unset($_SESSION['fldshippingcountry']);
    unset($_SESSION['fldshippingemail']);
    unset($_SESSION['fldshippingphonenumber']);
    unset($_SESSION['fldshippingdeliverycomment']);
    //Unset Testimonials Session
    unset($_SESSION['fldtestimonialsid']);
    unset($_SESSION['fldtestimonialsfirstname']);
    unset($_SESSION['fldtestimonialslastname']);
    unset($_SESSION['fldtestimonialsemail']);
    unset($_SESSION['fldtestimonialspassword']);
    unset($_SESSION['fldtestimonialscomment']);
    unset($_SESSION['fldtestimonialsimage']);
    unset($_SESSION['fldtestimonialsdate']);
    //Go to login
    header('location: ../login.php');
    exit;
  }
}

//get Orders
if(isset($_SESSION['logged_in'])){
  $useremail = $_SESSION['flduseremail'];
  $userid = $_SESSION['flduserid'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE flduserid = ?");
  $stmt->bind_param('i',$userid);
  if($stmt->execute()){
    $orders = $stmt->get_result();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }
}