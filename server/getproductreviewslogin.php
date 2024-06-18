<?php
include('connection.php');
if(isset($_POST['productreviewsloginbtn'])){
  $productid = $_SESSION['fldproductid'];
  $productreviewsemail = $_POST['fldproductreviewsemail'];
  $productreviewspassword = md5($_POST['fldproductreviewspassword']);

  $stmt = $conn->prepare("SELECT flduserid,flduserfirstname,flduserlastname,flduseraddressline1,flduseraddressline2,flduserpostalcode,fldusercity,fldusercountry,flduseremail,flduserphonenumber,flduseridnumber,flduserpassword FROM users WHERE flduseremail = ? AND flduserpassword = ? LIMIT 1");
  $stmt->bind_param('ss',$productreviewsemail,$productreviewspassword);

  if($stmt->execute()){
    $stmt->bind_result($userid,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber,$userpassword);
    $stmt->store_result();
    //If user is found in database
    if($stmt->num_rows() == 1){
      $stmt->fetch();
      //Set Users Session
      $_SESSION['flduserid'] = $userid;
      $_SESSION['flduserfirstname'] = $userfirstname;
      $_SESSION['flduserlastname'] = $userlastname;
      $_SESSION['flduseraddressline1'] = $useraddressline1;
      $_SESSION['flduseraddressline2'] = $useraddressline2;
      $_SESSION['flduserpostalcode'] = $userpostalcode;
      $_SESSION['fldusercity'] = $usercity;
      $_SESSION['fldusercountry'] = $usercountry;
      $_SESSION['flduserphonenumber'] = $userphonenumber;
      $_SESSION['flduseremail'] = $useremail;
      $_SESSION['flduseridnumber'] = $useridnumber;

      //Set Testimonials & Suggestions Session
      $_SESSION['fldtestimonialsfirstname'] = $userfirstname;
      $_SESSION['fldtestimonialslastname'] = $userlastname;
      $_SESSION['fldtestimonialscountry'] = $usercountry;
      $_SESSION['fldtestimonialsemail'] = $useremail;
      $_SESSION['fldtestimonialspassword'] = $userpassword;

      $_SESSION['logged_in'] = true;
      header('location: ../productdetails.php?fldproductid='.$productid.'&message=Logged In Successsfully! You Can Now Submit Product Review.');
    }
    else{//Password or Email is Wrong Or not in Database
      header('location: ../productreviewslogin.php?fldproductid='.$productid.'&error=Could Not Verify Your Account!');
    }
  }
  else{
    header('location: ../productreviewslogin.php?fldproductid='.$productid.'&error=Could Not Login At The Moment');
  }
}