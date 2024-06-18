<?php
include('adminconnection.php');
//Logout Admin from Dashboard
if(isset($_GET['adminlogout'])){
  if(isset($_SESSION['adminlogged_in'])){
    unset($_SESSION['adminlogged_in']);
    unset($_SESSION['fldadminemail']);
    unset($_SESSION['fldadminname']);
    unset($_SESSION['fldadminposition']);
    unset($_SESSION['fldadmindepartment']);
    header('location: adminlogin.php');
    exit;
  }
}