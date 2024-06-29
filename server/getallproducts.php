<?php
include('connection.php');
//Search by department, category, type or name.
if(isset($_POST['searchproductstring']) || isset($_GET['searchproductstring']) || isset($_GET['fldproductdepartment'])){
  //1.Determine page number
  if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
    //if user has already entered page then page number is the one that they selected
    $pagenumber = $_GET['pagenumber'];
  }
  else{
    //if user just entered the page then default page is 1
    $pagenumber = 1;
  }

  //2. Add Wildcard '%' before & after String and Store in Variable Unset Sessions irrespectively.
  if(isset($_POST['searchproductstring'])){
    $_SESSION['searchproductstring'] = $searchproductstring = '%'.$_POST['searchproductstring'].'%';
    unset($_SESSION['fldproductdepartment']);
  }
  if(isset($_GET['searchproductstring'])){
    $_SESSION['searchproductstring'] = $searchproductstring = '%'.$_GET['searchproductstring'].'%';
    unset($_SESSION['fldproductdepartment']);
  }
  if(isset($_GET['fldproductdepartment'])){
    $_SESSION['fldproductdepartment'] = $searchproductstring = '%'.$_GET['fldproductdepartment'].'%';
    unset($_SESSION['searchproductstring']);
  }

  //3. Return number of products
  //3.1. Prepare SQL query with placeholders to prevent SQL injection
  $stmt = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ?");
  $stmt->bind_param("sssss",$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);

  if($stmt->execute()){
      $stmt->bind_result($totalrecords);
      $stmt->store_result();
      $stmt->fetch();
  }
  else{
    header('location: ../products.php?error=Something Went Wrong. Try Again!!');
  }

  //4. Determine a specific number of products to display per page
  $totalrecordsperpage = 10;
  $offset = ($pagenumber - 1) * $totalrecordsperpage;
  $previouspage = $pagenumber - 1;
  $nextpage = $pagenumber + 1;
  $adjacents = "2";
  $totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

  //5. Get searched products
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ? LIMIT $offset,$totalrecordsperpage");
  $stmt1->bind_param("sssss",$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);
  $stmt1->execute();
  $allproducts = $stmt1->get_result();// This is an array
}
else{//Return all products

  //1.Determine page number
  if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
    //if user has already entered page then page number is the one that they selected
    $pagenumber = $_GET['pagenumber'];
  }
  else{
    //if user just entered the page then default page is 1
    $pagenumber = 1;
  }

  //2. Return number of products
  $stmt = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM products");
  if($stmt->execute()){
    $stmt->bind_result($totalrecords);
    $stmt->store_result();
    $stmt->fetch();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }

  //3. Determine a specific number of products to display per page
  $totalrecordsperpage = 10;
  $offset = ($pagenumber - 1) * $totalrecordsperpage;
  $previouspage = $pagenumber - 1;
  $nextpage = $pagenumber + 1;
  $adjacents = "2";
  $totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

  //4. Get all products
  $stmt1 = $conn->prepare("SELECT * FROM products ORDER BY fldproductid DESC LIMIT $offset,$totalrecordsperpage");
  if($stmt1->execute()){
    $allproducts = $stmt1->get_result();
  }
  else{
    header('location: ../index.php?error=Something Went Wrong. Contact Support Team!!');
  }
}

if(isset($_GET['filter'])){
  //1.Determine page number
  if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
    //if user has already entered page then page number is the one that they selected
    $pagenumber = $_GET['pagenumber'];
  }
  else{
    //if user just entered the page then default page is 1
    $pagenumber = 1;
  }

  //2. Store in Variable & Unset Sessions irrespectively
  if(isset($_SESSION['searchproductstring'])){
    $searchproductstring = $_SESSION['searchproductstring'];
    unset($_SESSION['fldproductdepartment']);
  }
  if(isset($_SESSION['fldproductdepartment'])){
    $searchproductstring = $_SESSION['fldproductdepartment'];
    unset($_SESSION['searchproductstring']);
  }

  //3. Store in filter variable
  if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
  }

  //4. Return number of products
  //4.1. Prepare SQL query with placeholders to prevent SQL injection
  $stmt = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ?");
  $stmt->bind_param("sssss",$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);

  if($stmt->execute()){
      $stmt->bind_result($totalrecords);
      $stmt->store_result();
      $stmt->fetch();
  }
  else{
    header('location: ../products.php?error=Something Went Wrong. Try Again!!');
  }

  //5. Determine a specific number of products to display per page
  $totalrecordsperpage = 10;
  $offset = ($pagenumber - 1) * $totalrecordsperpage;
  $previouspage = $pagenumber - 1;
  $nextpage = $pagenumber + 1;
  $adjacents = "2";
  $totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

  //6. Get filtered products
  if($_GET['filter'] = "Highest - Lowest Price"){
    $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ? ORDER BY fldproductprice DESC LIMIT $offset, $totalrecordsperpage");
    $stmt1->bind_param("sssss",$searchproductstring, $searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);
    $stmt1->execute();
    $allproducts = $stmt1->get_result(); // This is an array
  }
  else if($_GET['filter'] = "Lowest - Highest Price"){
    $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ? ORDER BY fldproductprice ASC LIMIT $offset, $totalrecordsperpage");
    $stmt1->bind_param("sssss",$searchproductstring, $searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);
    $stmt1->execute();
    $allproducts = $stmt1->get_result(); // This is an array
  }
  else if($_GET['filter'] = "Highest - Lowest Rating"){
    $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ? ORDER BY fldproductmostrated DESC LIMIT $offset, $totalrecordsperpage");
    $stmt1->bind_param("sssss",$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);
    $stmt1->execute();
    $allproducts = $stmt1->get_result(); // This is an array
  }
  else if($_GET['filter'] = "Lowest - Highest Rating"){
    $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ? ORDER BY fldproductmostrated ASC LIMIT $offset, $totalrecordsperpage");
    $stmt1->bind_param("sssss",$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);
    $stmt1->execute();
    $allproducts = $stmt1->get_result(); // This is an array
  }
  else if($_GET['filter'] = "Relevance"){
    $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductdepartment LIKE ? OR fldproductcategory LIKE ? OR fldproducttype LIKE ? OR fldproductbrand LIKE ? OR fldproductname LIKE ? ORDER BY fldproductmostviewed DESC LIMIT $offset, $totalrecordsperpage");
    $stmt1->bind_param("sssss",$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring,$searchproductstring);
    $stmt1->execute();
    $allproducts = $stmt1->get_result(); // This is an array
  }
}