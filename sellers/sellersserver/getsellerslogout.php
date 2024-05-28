<?php
include('sellersconnection.php');
//Logout Seller from Dashboard
if(isset($_GET['productsellerslogout'])){
  if(isset($_SESSION['productsellerslogged_in'])){
    unset($_SESSION['fldproductsellersid']);
    unset($_SESSION['fldtempproductsellersid']);
    unset($_SESSION['fldproductsellersfirstname']);
    unset($_SESSION['fldproductsellerslastname']);
    unset($_SESSION['fldproductsellersemail']);
    unset($_SESSION['fldproductowner']);
    unset($_SESSION['productsellerslogged_in']);
    header('location: sellerslogin.php');
    exit;
  }
}