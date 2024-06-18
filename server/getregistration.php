<?php
include('connection.php');
if(isset($_POST['registrationbtn'])){
  $testimonialsimage = $userimage = $_POST['flduserimage'];
  $testimonialsfirstname = $userfirstname = $_POST['flduserfirstname'];
  $testimonialslastname = $userlastname = $_POST['flduserlastname'];
  $useraddressline1 = $_POST['flduseraddressline1'];
  $useraddressline2 = $_POST['flduseraddressline2'];
  $userpostalcode = $_POST['flduserpostalcode'];
  $usercity = $_POST['fldusercity'];
  $usercountry = $_POST['fldusercountry'];
  $userphonenumber = $_POST['flduserphonenumber'];
  $testimonialsemail = $useremail = $_POST['flduseremail'];
  $useridnumber = $_POST['flduseridnumber'];
  $testimonialspassword = $userpassword = md5($_POST['flduserpassword']);
  $userconfirmpassword = md5($_POST['flduserconfirmpassword']);
  $orderid = -1;

  //if password dont match
  if($userpassword !== $userconfirmpassword){
    header('location: ../registration.php?error=passwords dont match');
  }
  else if(strlen($userpassword) < 8)
  {//if password is less than 8 characters
    header('location: ../registration.php?error=password must be atleast 8 characters');
  }
  else{//if there is no error
    //check whether there is a user with this email or not
    $stmt = $conn->prepare("SELECT count(*) FROM users WHERE flduseremail=?");
    $stmt->bind_param('s',$useremail);
    if($stmt->execute()){
      $stmt->bind_result($num_rows);
      $stmt->store_result();
      $stmt->fetch();
    }
    else{
      header('location: ../registration.php?errormessage=Something Went Wrong, Try Again!!');
    }

    //if there is a user already registered with this email
    if($num_rows != 0){
      header('location: ../registration.php?error=User With This Email Already Exists!');
    }
    else{//if no user registered with this email before
      //Create New User
      $stmt1 = $conn->prepare("INSERT INTO users (flduserimage,flduserfirstname,flduserlastname,flduseraddressline1,flduseraddressline2,flduserpostalcode,fldusercity,fldusercountry,flduseremail,flduserphonenumber,flduseridnumber,flduserpassword)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
      $stmt1->bind_param('ssssssssssss',$userimage,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber,md5($userpassword));

      //Create New Customer Billing Address
      $stmt2 = $conn->prepare("INSERT INTO customerbillingaddress (fldorderid,fldbillingfirstname,fldbillinglastname,fldbillingaddressline1,fldbillingaddressline2,fldbillingpostalcode,fldbillingcity,fldbillingcountry,fldbillingemail,fldbillingphonenumber,fldbillingidnumber)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $stmt2->bind_param('issssssssss',$orderid,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber);

      //Create New Testimonial User
      $stmt3 = $conn->prepare("INSERT INTO testimonials (fldtestimonialsfirstname,fldtestimonialslastname,fldtestimonialsemail,fldtestimonialspassword,fldtestimonialsimage)
            VALUES(?,?,?,?,?)");
      $stmt3->bind_param('sssss',$testimonialsfirstname,$testimonialslastname,$testimonialsemail,md5
      ($testimonialspassword),$userimage);

      //if account was created succesfully
      if($stmt1->execute()){
        if($stmt2->execute()){
          if($stmt3->execute()){
            $userid = $stmt1->insert_id;
            //Set Testimonials & Suggestions Session
            $_SESSION['flduserid'] = $userid;
            $_SESSION['flduseremail'] = $useremail;
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
            $_SESSION['flduserpassword'] = $userpassword;
            //Set Testimonials & Suggestions Session
            $_SESSION['fldtestimonialsimage'] = $userimage;
            $_SESSION['fldtestimonialsfirstname'] = $userfirstname;
            $_SESSION['fldtestimonialslastname'] = $userlastname;
            $_SESSION['fldtestimonialscountry'] = $usercountry;
            $_SESSION['fldtestimonialsemail'] = $useremail;
            $_SESSION['fldtestimonialspassword'] = $userpassword;
            $_SESSION['logged_in'] = true;
            header('location: ../account.php?registermessage=You Registered Succesfully');
          }
          else{//account could not be created
            header('location: ../registration.php?error=Could Not Create An Account At The Moment');
          }
        }
        else{//account could not be created
          header('location: ../registration.php?error=Could Not Create An Account At The Moment');
        }
      }
      else{//account could not be created
        header('location: ../registration.php?error=Could Not Create An Account At The Moment');
      }
    }
  }
}