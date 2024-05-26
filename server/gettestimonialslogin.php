<?php
include('connection.php');
if(isset($_POST['testimonialsloginbtn'])){
  $testimonialsemail = $_POST['fldtestimonialsemail'];
  $testimonialspassword = md5($_POST['fldtestimonialspassword']);

  $stmt = $conn->prepare("SELECT flduserid,flduserimage,flduserfirstname,flduserlastname,flduseraddressline1,flduseraddressline2,flduserpostalcode,fldusercity,fldusercountry,flduseremail,flduserphonenumber,flduseridnumber,flduserpassword FROM users WHERE flduseremail = ? AND flduserpassword = ? LIMIT 1");

  $stmt->bind_param('ss',$testimonialsemail,$testimonialspassword);

  if($stmt->execute()){
    $stmt->bind_result($userid,$userimage,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber,$userpassword);
    $stmt->store_result();
    //If user is found in database
    if($stmt->num_rows() == 1){
      $stmt->fetch();
      //Set Users Session
      $_SESSION['flduserimage'] = $userimage;
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
      $_SESSION['fldtestimonialsimage'] = $userimage;
      $_SESSION['fldtestimonialsfirstname'] = $userfirstname;
      $_SESSION['fldtestimonialslastname'] = $userlastname;
      $_SESSION['fldtestimonialscountry'] = $usercountry;
      $_SESSION['fldtestimonialsemail'] = $useremail;
      $_SESSION['fldtestimonialspassword'] = $userpassword;
      $_SESSION['logged_in'] = true;
      header('location: ../testimonials.php?testimonialsmessage=Logged In Successfully!');
    }
    else{//Password or Email is Wrong Or not in Database
      header('location: ../testimonialslogin.php?errormesssage=Could Not Verify Your Account!');
    }
  }
  else{
    header('location: ../testimonialslogin.php?error=Could Not Login At The Moment');
  }
}