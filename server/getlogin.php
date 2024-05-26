<?php
include('connection.php');
if(isset($_POST['staffsigninbtn'])){
  header('location: ../admin/adminlogin.php');
}
if(isset($_POST['loginbtn'])){
  $useremail = $_POST['flduseremail'];
  $userpassword = md5($_POST['flduserpassword']);

  $stmt = $conn->prepare("SELECT flduserid,flduserimage,flduserfirstname,flduserlastname,flduseraddressline1,flduseraddressline2,flduserpostalcode,fldusercity,fldusercountry,flduseremail,flduserphonenumber,flduseridnumber,flduserpassword FROM users WHERE flduseremail = ? AND flduserpassword = ? LIMIT 1");
  $stmt->bind_param('ss',$useremail,$userpassword);
  if($stmt->execute()){
    $stmt->bind_result($userid,$userimage,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber,$userpassword);
    $stmt->store_result();
    //If user is found in database
    if($stmt->num_rows() == 1){
      $stmt->fetch();
      //Set Users, Billing & Tesimonials/Suggestions Session
      $_SESSION['flduserid'] = $_SESSION['fldbillingid'] = $userid;
      $_SESSION['flduserimage'] = $_SESSION['fldtestimonialsimage'] = $userimage;
      $_SESSION['flduserfirstname'] = $_SESSION['fldbillingfirstname'] = $_SESSION['fldtestimonialsfirstname'] = $userfirstname;
      $_SESSION['flduserlastname'] = $_SESSION['fldbillinglastname'] = $_SESSION['fldtestimonialslastname'] = $userlastname;
      $_SESSION['flduseraddressline1'] = $_SESSION['fldbillingaddressline1'] = $useraddressline1;
      $_SESSION['flduseraddressline2'] = $_SESSION['fldbillingaddressline2'] = $useraddressline2;
      $_SESSION['flduserpostalcode'] = $_SESSION['fldbillingpostalcode'] = $userpostalcode;
      $_SESSION['fldusercity'] = $_SESSION['fldbillingcity'] = $usercity;
      $_SESSION['fldusercountry'] = $_SESSION['fldbillingcountry'] = $_SESSION['fldtestimonialscountry'] = $usercountry;
      $_SESSION['flduseremail'] = $_SESSION['fldbillingemail'] = $_SESSION['fldtestimonialsemail'] = $useremail;
      $_SESSION['flduserphonenumber'] = $_SESSION['fldbillingphonenumber'] = $userphonenumber;
      $_SESSION['flduseridnumber'] = $_SESSION['fldbillingidnumber'] = $useridnumber;
      $_SESSION['fldtestimonialspassword'] = $userpassword; 
      $_SESSION['logged_in'] = true;
      //Go To Account Page
      header('location: ../account.php?loginmessage=Logged In Successfully');
    }
    else{//Password or Email is Wrong Or not in Database
      //Go To Login Page
      header('location: ../login.php?error=Could Not Verify Your Account!');
    }
  }
  else{
    header('location: ../login.php?error=Could Not Login At The Moment');
  }
}