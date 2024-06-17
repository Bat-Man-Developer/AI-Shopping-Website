<?php
include('connection.php');
if(isset($_POST['removeproductbtn'])){//3. remove product from cart
  $productid = $_POST['fldproductid'];
  unset($_SESSION['wishlistcart'][$productid]);
  $_SESSION['wishlisttotalitems'] = $_SESSION['wishlisttotalitems'] - 1;
  if($_SESSION['wishlisttotalitems'] == 0){
    unset($_SESSION['wishlisttotalitems']);
  }
  header("location: ../wishlist.php");
}
else if(isset($_POST['gotoproductbtn'])){//4. go to product
  //4.1 we get id from POST
  $productid = $_POST['fldproductid'];
  header('location: ../productdetails.php?fldproductid='.$productid);
}
else if(empty($_SESSION['wishlistcart'])){//6. if Wishlist Cart is empty dont let user go to Wishlist
  header('location: ../index.php?error=Oops.. Wishlist Bag Is Empty');
}