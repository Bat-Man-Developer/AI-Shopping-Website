<?php
include('connection.php');
if(isset($_POST['noaccountloginbtn'])){
  $useremail = $_SESSION['fldbillingemail'];
  $userpassword = md5($_POST['flduserpassword']);
  $userconfirmpassword = md5($_POST['flduserconfirmpassword']);
  $_SESSION['noaccountloginbtn'] = $_POST['noaccountloginbtn'];

  //1. if password dont match
  if($userpassword !== $userconfirmpassword){
    header('location: ../noaccountlogin.php?error=passwords dont match');
  }
  else if(strlen($userpassword) < 8)
  {//2. if password is less than 8 characters
    header('location: ../noaccountlogin.php?error=password must be atleast 8 characters');
  }
  else{//3. if there is no error
    $stmt = $conn->prepare("UPDATE users SET flduserpassword=? WHERE flduseremail=?");
    $stmt->bind_param('ss',$userpassword,$useremail);

    $stmt1 = $conn->prepare("UPDATE testimonials SET fldtestimonialspassword=? WHERE fldtestimonialsemail=?");
    $stmt1->bind_param('ss',$testimonialspassword,$useremail);

    //if account was created succesfully
    if($stmt->execute()){
      if($stmt1->execute()){
        $_SESSION['logged_in'] = true;
        header('location: ../account.php?paymentmessage=Paid Successfully. Check Email For Order Reciept and Tracking.');
      }
    }
  }
}

//Get Session For Users
$useremail = $_SESSION['flduseremail'];
//Check whether there is a user with this email or not
$stmt = $conn->prepare("SELECT * FROM users WHERE flduseremail = ? LIMIT 1");
$stmt->bind_param('s',$useremail);
if($stmt->execute()){
  $stmt->bind_result($userid,$userimage,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber,$userpassword);
  $stmt->store_result();

  //If there is a email linked already
  if($stmt->num_rows() == 1){
    $stmt1 = $conn->prepare("SELECT * FROM users WHERE flduseremail=?");
    $stmt1->bind_param('s',$useremail);
    if($stmt1->execute()){
      $getuser = $stmt1->get_result();
    }
    else{
      header('location: ../index.php?error=Something Went Wrong. Contact Support Team.');
    }
    foreach($getuser as $user){
      if($user['flduserpassword'] != "")
      {
        $_SESSION['logged_in'] = true;
        header('location: ../account.php?paymentmessage=Paid Successfully. Check Email For Order Reciept and Tracking.');
      }
    } 
  }
}
else{
  header('location: ../index.php?error=Something Went Wrong. Contact Support Team!');
}