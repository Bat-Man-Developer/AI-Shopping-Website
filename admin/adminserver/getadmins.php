<?php
include('adminconnection.php');
if(isset($_SESSION['fldadminid'])){
  $adminid = $_SESSION['fldadminid'];
  $stmt = $conn->prepare("SELECT * FROM admins WHERE fldadminid = ?");
  $stmt->bind_param("i",$adminid);
  $stmt->execute();
  // This is an array of 1 product
  $admins = $stmt->get_result();
}