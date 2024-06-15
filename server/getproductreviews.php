<?php 
include('connection.php');
if(isset($_POST['productreviewbtn'])){//If Product Review Button Is Clicked
  $productid = $_POST['fldproductid'];
	//Check if user is logged in
	if(isset($_SESSION['logged_in'])){
		$userfirstname = $_SESSION['flduserfirstname'];
    $userlastname = $_SESSION['flduserlastname'];
    $usercountry = $_SESSION['fldusercountry'];
	}
	else{
		header('location: productreviewslogin.php?fldproductid='.$productid.'&error=Sign Up or Login To Review Products');
	}

  //Declare Variables
  if(isset($_POST['fldproductmostrated'])){ $productmostrated = $_POST['fldproductmostrated']; }
  else{ $productmostrated = 0; }
  $productid = $_POST['fldproductid'];
  $userid = $_POST['flduserid'];
	$useremail = $_SESSION['flduseremail'];
  $productreviewcomment = $_POST['fldproductreviewcomment'];
  $productreviewdate = date('Y-m-d H:i:s');

  //check whether there is a user with this email or not
  $stmt = $conn->prepare("SELECT count(*) FROM users WHERE flduseremail=?");
  $stmt->bind_param('s',$useremail);
  if($stmt->execute()){
    $stmt->bind_result($num_rows);
    $stmt->store_result();
    $stmt->fetch();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }

  //if there is a user already registered with this email
  if($num_rows != 0){
    $totalproductreviews = 0;
    $addproductreviewrating = 0;
    //Look for product most rated value in database
    $stmt1 = $conn->prepare("SELECT * FROM productreviews WHERE fldproductid=?");
    $stmt1->bind_param('i',$productid);
    if($stmt1->execute()){
      $mostratedproducts = $stmt1->get_result();// This is an array
      while($row = $mostratedproducts->fetch_assoc()){
        $totalproductreviews = $totalproductreviews + 1;
        $addproductreviewrating = $addproductreviewrating + $row['fldproductreviewrating'];
      }
      $totalproductreviews = $totalproductreviews + 1;
      $addproductreviewrating = $addproductreviewrating + $productmostrated;
      $averageproductmostrated = $addproductreviewrating/$totalproductreviews;
    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //Update product most rated column in products table
    $stmt2 = $conn->prepare("UPDATE products SET fldproductmostrated=? WHERE fldproductid=?");
    $stmt2->bind_param('ii',$averageproductmostrated,$productid);
    if($stmt2->execute()){

    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //Insert in product reviews table
    $stmt3 = $conn->prepare("INSERT INTO productreviews (fldproductid,flduserid,flduserfirstname,flduserlastname,fldusercountry,fldproductreviewcomment,fldproductreviewdate,fldproductreviewrating,flduseremail)
    VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt3->bind_param('iisssssss',$productid,$userid,$userfirstname,$userlastname,$usercountry,$productreviewcomment,$productreviewdate,$productmostrated,$useremail);
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
    header('location: productreviewslogin.php?fldproductid='.$productid.'&error=Sign Up or Login To Review Products');
  }
}