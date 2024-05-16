<?php
include('connection.php');
//Search section by category or type
if(isset($_POST['searchProductString'])){
  //1.determine page number
  if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
    //if user has already entered page then page number is the one that they selected
    $pagenumber = $_GET['pagenumber'];
  }
  else{
    //if user just entered the page then default page is 1
    $pagenumber = 1;
  }

  //Department Stored In Variable
  $searchProductString = $_POST['searchProductString'];

  //2. return number of products

  $stmt = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM products WHERE fldproductname = ?");
  $stmt->bind_param("s",$searchProductString);
  if($stmt->execute()){
    $stmt->bind_result($totalrecords);
    $stmt->store_result();
    $stmt->fetch();
  }
  else{
    header('location: ../products.php?error=Something Went Wrong. Try Again!!');
  }

  //3. determine a specific number of products to display per page
  $totalrecordsperpage = 10;
  $offset = ($pagenumber - 1) * $totalrecordsperpage;
  $previouspage = $pagenumber - 1;
  $nextpage = $pagenumber + 1;
  $adjacents = "2";
  $totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

  //4. get all products
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductname = ? LIMIT $offset,$totalrecordsperpage");
  $stmt1->bind_param("s",$searchProductString);
  $stmt1->execute();
  $allproducts = $stmt1->get_result();// This is an array

}
else{// return all products

  //1.determine page number
  if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
    //if user has already entered page then page number is the one that they selected
    $pagenumber = $_GET['pagenumber'];
  }
  else{
    //if user just entered the page then default page is 1
    $pagenumber = 1;
  }

  //2. return number of products
  $stmt = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM products");
  if($stmt->execute()){
    $stmt->bind_result($totalrecords);
    $stmt->store_result();
    $stmt->fetch();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }

  //3. determine a specific number of products to display per page
  $totalrecordsperpage = 10;
  $offset = ($pagenumber - 1) * $totalrecordsperpage;
  $previouspage = $pagenumber - 1;
  $nextpage = $pagenumber + 1;
  $adjacents = "2";
  $totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

  //4. get all products
  $stmt1 = $conn->prepare("SELECT * FROM products LIMIT $offset,$totalrecordsperpage");
  if($stmt1->execute()){
    $allproducts = $stmt1->get_result();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }
}