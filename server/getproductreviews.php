<?php 
include('connection.php');
if(isset($_POST['productreviewbtn'])){//If Product Review Button Is Clicked
	//Check if user is logged in
	if(isset($_SESSION['logged_in'])){
		$userfirstname = $_SESSION['flduserfirstname'];
    $userlastname = $_SESSION['flduserlastname'];
    $usercountry = $_SESSION['fldusercountry'];
	}
	else{
		header('location: productreviewslogin.php?error=Sign Up or Login To Review Products');
	}

  $productid = $_POST['fldproductid'];
  $userid = $_POST['flduserid'];
	$useremail = $_SESSION['flduseremail'];
  $productreviewcomment = $_POST['fldproductreviewcomment'];
  $productreviewdate = date('Y-m-d H:i:s');
  $productreviewrating = $_POST['fldproductreviewrating'];

  //check whether there is a user with this email or not
  $stmt2 = $conn->prepare("SELECT count(*) FROM users WHERE flduseremail=?");
  $stmt2->bind_param('s',$useremail);
  if($stmt2->execute()){
    $stmt2->bind_result($num_rows);
    $stmt2->store_result();
    $stmt2->fetch();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }

  //if there is a user already registered with this email
  if($num_rows != 0){
    //insert in Product Reviews
    $stmt3 = $conn->prepare("INSERT INTO productreviews (fldproductid,flduserid,flduserfirstname,flduserlastname,fldusercountry,fldproductreviewcomment,fldproductreviewdate,fldproductreviewrating,flduseremail)
    VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt3->bind_param('iisssssss',$productid,$userid,$userfirstname,$userlastname,$usercountry,$productreviewcomment,$productreviewdate,$productreviewrating,$useremail);
    //Issue New Product Review info in Database
    $_SESSION['fldproductreviewid'] = $productreviewid = $stmt3->insert_id;
    if($stmt3->execute()){
			unset($_POST['productreviewbtn']);
    }
		else{
			header('location: index.php?error=Something Went Wrong, Try Again.');
		}
  }
  else{//if no user registered with this email before
    header('location: productreviewslogin.php?error=Sign Up or Login To Review Products');
  }
}