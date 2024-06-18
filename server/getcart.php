<?php
include('connection.php');
if(isset($_POST['removeproductbtn'])){//3. remove product from cart
  $productid = $_POST['fldproductid'];
  unset($_SESSION['cart'][$productid]);

  //3.1 calculate total
  calculatetotalcart();
  header("location: ../cart.php");
}
else if(isset($_POST['editquantitybtn'])){//4. add quantity to product
  //4.1 we get id & quantity from form
  $productid = $_POST['fldproductid'];
  $productquantity = $_POST['fldproductquantity'];

  //4.2 we  get the product array from the session
  $productarray = $_SESSION['cart'][$productid];

  //4.3 update product quantity
  $productarray['fldproductquantity'] = $productquantity;

  //4.4 return array back to its place
  $_SESSION['cart'][$productid] = $productarray;

  //4.5 calculate total
  calculatetotalcart();
  header("location: ../cart.php");
}
else if(empty($_SESSION['cart'])){//6. if cart is empty dont let user go to checkout
  header('location: ../index.php?error=Oops.. Bag Is Empty');
} 
else{
}

function calculatetotalcart(){
  $totalprice = 0;
  $totalquantity = 0;

  foreach($_SESSION['cart'] as $key => $value){
    $product = $_SESSION['cart'][$key];

    $price = $product['fldproductprice'];
    $quantity = $product['fldproductquantity'];
    $discount = $product['fldproductdiscount'];
    
    $totalprice = $totalprice+($price*$quantity)-($price*$quantity*$discount);
    $totalquantity = $totalquantity + $quantity; 

  }
  //Store Information in Session
  $_SESSION['total'] = $totalprice;
  $_SESSION['totalquantity'] = $totalquantity;
}