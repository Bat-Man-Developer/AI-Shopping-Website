<?php
include('adminconnection.php');
if(isset($_POST['admindeleteordersbtn'])){
  $orderid = $_POST['fldorderid'];
  $stmt = $conn->prepare("DELETE FROM orders WHERE fldorderid = ?");
  $stmt->bind_param("i",$orderid);
  if($stmt->execute()){
    header('location: ../admin/adminorders.php?editmessage=Order Was Deleted Succesfully!');
  }
  else{
    header('location: ../admin/adminorders.php?errormessage=Error Occured, Try Again.');
  }
}
else if(isset($_POST['admincancelordersbtn'])){
  header('location: ../admin/adminorders.php');
}
else if(isset($_GET['fldorderid'])){
  $orderid = $_GET['fldorderid'];
  $stmt1 = $conn->prepare("SELECT * FROM orders WHERE fldorderid = ?");
  $stmt1->bind_param("i",$orderid);
  $stmt1->execute();
  // This is an array of 1 product
  $deleteorders = $stmt1->get_result();
}
else{//no product id was given
  header('admin/dashboard.php?errormessage=Something went wrong!');
}