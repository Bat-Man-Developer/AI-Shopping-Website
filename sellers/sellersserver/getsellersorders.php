<?php
include('sellersconnection.php');
$productsellersid = $_SESSION['fldproductsellersid'];
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
$stmt = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM orders");
$stmt->execute();
$stmt->bind_result($totalrecords);
$stmt->store_result();
$stmt->fetch();

//3. determine a specific number of products to display per page
$totalrecordsperpage = 10;
$offset = ($pagenumber - 1) * $totalrecordsperpage;
$previouspage = $pagenumber - 1;
$nextpage = $pagenumber + 1;
$adjacents = "2";
$totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

//4. get all orders
$stmt1 = $conn->prepare("SELECT * FROM orders WHERE fldproductsellersid LIKE '%$productsellersid%' LIMIT $offset,$totalrecordsperpage");
//$stmt1->bind_param("i",$productsellersid);
$stmt1->execute();
$orders = $stmt1->get_result();// This is an array