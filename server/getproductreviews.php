<?php 
include('connection.php');
//1. If Product Review Button Is Clicked
if(isset($_POST['productreviewbtn'])){
  $productid = $_POST['fldproductid'];
	//1.1. Check if user is logged in
	if(isset($_SESSION['logged_in'])){
		$userfirstname = $_SESSION['flduserfirstname'];
    $userlastname = $_SESSION['flduserlastname'];
    $usercountry = $_SESSION['fldusercountry'];
	}
	else{
		header('location: productreviewslogin.php?fldproductid='.$productid.'&error=Sign Up or Login To Review Products');
	}

  //1.2. Declare Variables
  if(isset($_POST['fldproductmostrated'])){ $productmostrated = $_POST['fldproductmostrated']; }
  else{ $productmostrated = 0; }
  $productid = $_POST['fldproductid'];
  $userid = $_POST['flduserid'];
	$useremail = $_SESSION['flduseremail'];
  $productreviewcomment = $_POST['fldproductreviewcomment'];
  $productreviewdate = date('Y-m-d H:i:s');

  //1.3. check whether there is a user with this email or not
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

  //1.4. if there is a user already registered with this email
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

    //1.4.2 Update product most rated column in products table
    $stmt2 = $conn->prepare("UPDATE products SET fldproductmostrated=? WHERE fldproductid=?");
    $stmt2->bind_param('ii',$averageproductmostrated,$productid);
    if($stmt2->execute()){

    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
    }

    //1.4.3 Insert in product reviews table
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

//2. Product Reviews Pagination
//2.1. determine page number
if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
  //if user has already entered page then page number is the one that they selected
  $pagenumber = $_GET['pagenumber'];
}
else{
  //2.2. if user just entered the page then default page is 1
  $pagenumber = 1;
}

//3. return number of reviews
$stmt4 = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM productreviews");
if($stmt4->execute()){
  $stmt4->bind_result($totalrecords);
  $stmt4->store_result();
  $stmt4->fetch();
}
else{
  header('location: index.php?error=Something Went Wrong!');
}

//4. determine a specific number of reviews to display per page
$totalrecordsperpage = 3;
$offset = ($pagenumber - 1) * $totalrecordsperpage;
$previouspage = $pagenumber - 1;
$nextpage = $pagenumber + 1;
$adjacents = "2";
$totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

//5. View Product Reviews
$stmt5 = $conn->prepare("SELECT * FROM productreviews WHERE fldproductid = ? LIMIT $offset,$totalrecordsperpage");
$stmt5->bind_param("i",$productid);
if($stmt5->execute()){
  $productreviews = $stmt5->get_result();// This is an array
}
else{
  header('location: index.php?error=Something Went Wrong!');
}