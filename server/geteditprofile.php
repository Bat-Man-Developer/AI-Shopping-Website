<?php
include('connection.php');
//Edit Profile Details
if(isset($_POST['editprofilebtn'])){
  $userid = $_POST['flduserid'];
  $userfirstname = $_POST['flduserfirstname'];
  $userlastname = $_POST['flduserlastname'];
  $useraddressline1 = $_POST['flduseraddressline1'];
  $useraddressline2 = $_POST['flduseraddressline2'];
  $userpostalcode = $_POST['flduserpostalcode'];
  $usercity = $_POST['fldusercity'];
  $usercountry = $_POST['fldusercountry'];
  $useremail = $_SESSION['flduseremail'];
  //1. Update Profile Details In User Table
  $stmt = $conn->prepare("UPDATE users SET flduserfirstname=?,flduserlastname=?,flduseraddressline1=?,flduseraddressline2=?,flduserpostalcode=?,fldusercity=?,fldusercountry=? WHERE flduseremail=?");
  $stmt->bind_param('ssssssss',$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail);
  if($stmt->execute()){
    $stmt1 = $conn->prepare("SELECT flduserfirstname,flduserlastname,flduseraddressline1,flduseraddressline2,flduserpostalcode,fldusercity,fldusercountry,flduseremail FROM users WHERE flduseremail = ? LIMIT 1");
    $stmt1->bind_param('s',$useremail);
    if($stmt1->execute()){
      $stmt1->bind_result($userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail);
      $stmt1->store_result();
      //If user is found in database
      if($stmt1->num_rows() == 1){
        $stmt1->fetch();
        //Set Users, Billing & Tesimonials/Suggestions Session
        $_SESSION['flduserfirstname'] = $_SESSION['fldbillingfirstname'] = $_SESSION['fldtestimonialsfirstname'] = $userfirstname;
        $_SESSION['flduserlastname'] = $_SESSION['fldbillinglastname'] = $_SESSION['fldtestimonialslastname'] = $userlastname;
        $_SESSION['flduseraddressline1'] = $_SESSION['fldbillingaddressline1'] = $useraddressline1;
        $_SESSION['flduseraddressline2'] = $_SESSION['fldbillingaddressline2'] = $useraddressline2;
        $_SESSION['flduserpostalcode'] = $_SESSION['fldbillingpostalcode'] = $userpostalcode;
        $_SESSION['fldusercity'] = $_SESSION['fldbillingcity'] = $usercity;
        $_SESSION['fldusercountry'] = $_SESSION['fldbillingcountry'] = $_SESSION['fldtestimonialscountry'] = $usercountry;
        $_SESSION['flduseremail'] = $_SESSION['fldbillingemail'] = $_SESSION['fldtestimonialsemail'] = $useremail;
        $_SESSION['logged_in'] = true;
      }
      else{
        header('location: ../editprofile.php?error=Error Occured, Try Again. 404 Failed To Find User Information In Database.');
      }
    }
    else{
      header('location: ../editprofile.php?error=Error Occured, Try Again. 404 Failed To Find User Information In Database.');
    }
  }
  else{
    header('location: ../editprofile.php?error=Error Occured, Try Again. 404 Failed To Update User Details.');
  }
}
else if(isset($_POST['editprofileimagebtn'])){
  $userfirstname = $_SESSION['flduserfirstname'];
  $useremail = $_SESSION['flduseremail'];
  //The File
  $target_dir = $_SERVER['DOCUMENT_ROOT']."/assets/images/";
  $userimage = basename($_FILES["flduserimage"]["name"]);

  //Check Files
  $uploadOk = 1;
  $imageFileType = pathinfo($userimage,PATHINFO_EXTENSION);

  // Check file size
  if($_FILES["flduserimage"]["size"] > 500000) {
    $uploadOk = 0;
    header('location: ../editprofile.php?editmessage=Error Occured, Your File Is Too Large.');
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"){
    $uploadOk = 0;
    header('location: ../editprofile.php?editmessage=Error Occured, Only JPG, JPEG, PNG & GIF Files Are Allowed.');
  }
  else if($imageFileType == "jpg"){
    //Image Name
    $userimagename = $userfirstname.uniqid().".jpg";
    $target_file = $target_dir.$userimagename;
  }
  else if($imageFileType == "jpeg"){
    $userimagename = $userfirstname.uniqid().".jpeg";
    $target_file = $target_dir.$userimagename;
  }
  else if($imageFileType == "png"){
    $userimagename = $userfirstname.uniqid().".png";
    $target_file = $target_dir.$userimagename;
  }
  else if($imageFileType == "gif"){
    $userimagename = $userfirstname.uniqid().".gif";
    $target_file = $target_dir.$userimagename."gif";
  }
  
  // Check if $uploadOk is set to 0 by an error
  if($uploadOk == 0){
    header('location: ../editprofile.php?errormessage=Unexpected Error, Try Again.');
  }
  else{// if everything is ok, try to Upload File
    if(move_uploaded_file($_FILES["flduserimage"]["tmp_name"], $target_file)){

    }
    else{
      header('location: ../editprofile.php?errormessage=Image Upload Failed, Try Again.');
    }
  }
  //1. Update Image In Users & Testimonials Table
  $stmt2 = $conn->prepare("UPDATE users SET flduserimage=? WHERE flduseremail=?");
  $stmt2->bind_param('ss',$userimagename,$useremail); 
  if($stmt2->execute()){
    //1. Update Testimonials Table
    $stmt3 = $conn->prepare("UPDATE testimonials SET fldtestimonialsimage=? WHERE fldtestimonialsemail=?");
    $stmt3->bind_param('ss',$userimagename,$useremail); 
    if($stmt3->execute()){
      $stmt4 = $conn->prepare("SELECT flduserimage FROM users WHERE flduseremail = ? LIMIT 1");
      $stmt4->bind_param('s',$useremail);
      if($stmt4->execute()){
        $stmt4->bind_result($userimage);
        $stmt4->store_result();
        //If user is found in database
        if($stmt4->num_rows() == 1){
          $stmt4->fetch();
          //Set Users & Tesimonials/Suggestions Image Session
          $_SESSION['flduserimage'] = $_SESSION['fldtestimonialsimage'] = $userimage;
        }
      }
    }
    else{
      header('location: ../editprofile.php?error=Error Occured, Try Again. 404 Failed To Update Testimonials Database.');
    }
  }
  else{
    header('location: ../editprofile.php?error=Error Occured, Try Again.');
  }
}

if(isset($_GET['flduserid'])){
  $userid = $_GET['flduserid'];
  $stmt5 = $conn->prepare("SELECT * FROM users WHERE flduserid = ?");
  $stmt5->bind_param('i',$userid);
  $stmt5->execute();
  $editprofile = $stmt5->get_result();// This is an array
}
else if(isset($_POST['flduserid'])){
  $userid = $_POST['flduserid'];
  $stmt5 = $conn->prepare("SELECT * FROM users WHERE flduserid = ?");
  $stmt5->bind_param('i',$userid);
  if($stmt5->execute()){
    $editprofile = $stmt5->get_result();// This is an array
  }
  else{
    header('location: account.php?errormessage=Something Went Wrong. Contact Support Team!!');
  }
}