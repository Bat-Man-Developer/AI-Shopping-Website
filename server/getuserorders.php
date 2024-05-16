<?php
include('connection.php');
$orderid = $_SESSION['fldorderid'];
$stmt = $conn->prepare("SELECT * FROM orderitems WHERE fldorderid=?");
$stmt->bind_param('i',$orderid);
if($stmt->execute()){
  $userorders = $stmt->get_result();// This is an array
  unset($_SESSION['fldorderid']);
}
else{
  header('location: ../index.php?error=Something Went Wrong. Contact Support Team.');
}