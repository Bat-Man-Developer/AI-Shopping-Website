<?php 
include('connection.php');
if(isset($_GET['fldproductid'])){
  $_SESSION['fldproductid'] = $productid = $_GET['fldproductid'];
  if(isset($_GET['fldproductmostviewed'])){
    $productmostviewed = $_GET['fldproductmostviewed'];
  }
  $stmt = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
  $stmt->bind_param("i",$productid);
  if($stmt->execute()){
  // This is an array of 1 product
  $product = $stmt->get_result();
  }
  else{
    header('index.php?error=Something Went Wrong!! Contact Support Team.');
  }
  //Look for product most viewed value in database
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
  $stmt1->bind_param('i',$productid);
  if($stmt1->execute()){
    $mostviewedproducts = $stmt1->get_result();// This is an array
    while($row = $mostviewedproducts->fetch_assoc()){
      $productmostviewed = $row['fldproductmostviewed'] + 1;
    }
    //Update product most viewed column in products table
    $stmt2 = $conn->prepare("UPDATE products SET fldproductmostviewed=? WHERE fldproductid=?");
    $stmt2->bind_param('ii',$productmostviewed,$productid);
    if($stmt2->execute()){

    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
    }
  }
  else{
    header('location: index.php?error=Something Went Wrong!');
  }
}
else if(isset($_POST['fldproductid'])){
  $_SESSION['fldproductid'] = $productid = $_POST['fldproductid'];
  if(isset($_POST['fldproductmostviewed'])){
    $productmostviewed = $_POST['fldproductmostviewed'];
  }
  $stmt = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
  $stmt->bind_param("i",$productid);
  if($stmt->execute()){
  // This is an array of 1 product
  $product = $stmt->get_result();
  }
  else{
    header('index.php?error=Something Went Wrong!! Contact Support Team.');
  }
  //Look for product most viewed value in database
  $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
  $stmt1->bind_param('i',$productid);
  if($stmt1->execute()){
    $mostviewedproducts = $stmt1->get_result();// This is an array
    while($row = $mostviewedproducts->fetch_assoc()){
      $productmostviewed = $row['fldproductmostviewed'] + 1;
    }
    //Update product most viewed column in products table
    $stmt2 = $conn->prepare("UPDATE products SET fldproductmostviewed=? WHERE fldproductid=?");
    $stmt2->bind_param('ii',$productmostviewed,$productid);
    if($stmt2->execute()){

    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
    }
  }
  else{
    header('location: index.php?error=Something Went Wrong!');
  }
}
else{// no product id was given
  header('location: index.php?error=Something Went Wrong!');
}

if(isset($_POST['addtowishlistbtn'])){//3. If Add to Wishlist Button Is Clicked
  //3.1. if user has already added to wishlist cart
  if(isset($_SESSION['wishlistcart'])){
    $productsarrayids = array_column($_SESSION['wishlistcart'],"fldproductid");
    //3.1.1. if product has already been added to wishlist cart or not
    if(!in_array($_POST['fldproductid'], $productsarrayids)){
      $productid = $_POST['fldproductid'];
      $productsellersid = $_POST['fldproductsellersid'];
      $productarray = array(
        'fldproductid' => $_POST['fldproductid'],
        'fldproductsellersid' => $_POST['fldproductsellersid'],
        'fldproductname' => $_POST['fldproductname'],
        'fldproductprice' => $_POST['fldproductprice'],
        'fldproductimage' => $_POST['fldproductimage'],
        'fldproductquantity' => $_POST['fldproductquantity'],
        'fldproductdiscount' => $_POST['fldproductdiscount'],
        'fldproductstock' => $_POST['fldproductstock'],
      );
      $_SESSION['wishlistcart'][$productid] = $productarray;
    }
    else{//3.1.2 product has already been added
      echo '<script> alert("Product Was Already Added To Wishlist!")</script>';   
    }
  }
  else{//3.2 if this is the first product
    $productid = $_POST['fldproductid'];
    $productsellersid = $_POST['fldproductsellersid'];
    $productname = $_POST['fldproductname'];
    $productprice = $_POST['fldproductprice'];
    $productimage = $_POST['fldproductimage'];
    $productquantity = $_POST['fldproductquantity'];
    $productdiscount = $_POST['fldproductdiscount'];
    $productstock = $_POST['fldproductstock'];
    $productarray = array(
      'fldproductid' => $productid,
      'fldproductsellersid' => $productsellersid,
      'fldproductname' => $productname,
      'fldproductprice' => $productprice,
      'fldproductimage' => $productimage,
      'fldproductquantity' => $productquantity,
      'fldproductdiscount' => $productdiscount,
      'fldproductstock' => $productstock,
    );
    $_SESSION['wishlistcart'][$productid] = $productarray;
  }
  $_SESSION['wishlisttotalitems'] = count($_SESSION['wishlistcart']);
  header('location: ../productdetails.php?fldproductid='.$productid.'&message=Added To Wishlist Succesfully!');
}
else if(isset($_POST['addtocartbtn'])){//4. If Add To Cart Button Is Clicked
  //4.1. if user has already added to cart
  if(isset($_SESSION['cart'])){
    $productsarrayids = array_column($_SESSION['cart'],'fldproductid');
    //4.1.1 if product has already been added to cart or not
    if(!in_array($_POST['fldproductid'], $productsarrayids)){
      $productid = $_POST['fldproductid'];
      $productsellersid = $_POST['fldproductsellersid'];
      $productarray = array(
        'fldproductid' => $_POST['fldproductid'],
        'fldproductsellersid' => $_POST['fldproductsellersid'],
        'fldproductname' => $_POST['fldproductname'],
        'fldproductprice' => $_POST['fldproductprice'],
        'fldproductimage' => $_POST['fldproductimage'],
        'fldproductquantity' => $_POST['fldproductquantity'],
        'fldproductdiscount' => $_POST['fldproductdiscount'],
        'fldproductstock' => $_POST['fldproductstock'],
      );
      $_SESSION['cart'][$productid] = $productarray;
    }
    else{//4.1.2 product has already been added
      echo '<script> alert("Product Was Already Added To Cart!")</script>';
    }
  }
  else{//4.2 if this is the first product
    $productid = $_POST['fldproductid'];
    $productsellersid = $_POST['fldproductsellersid'];
    $productname = $_POST['fldproductname'];
    $productprice = $_POST['fldproductprice'];
    $productimage = $_POST['fldproductimage'];
    $productquantity = $_POST['fldproductquantity'];
    $productdiscount = $_POST['fldproductdiscount'];
    $productstock = $_POST['fldproductstock'];   

    $productarray = array(
      'fldproductid' => $productid,
      'fldproductsellersid' => $productsellersid,
      'fldproductname' => $productname,
      'fldproductprice' => $productprice,
      'fldproductimage' => $productimage,
      'fldproductquantity' => $productquantity,
      'fldproductdiscount' => $productdiscount,
      'fldproductstock' => $productstock,
    );
    $_SESSION['cart'][$productid] = $productarray;
  }
  //4.2.1 calculate total
  calculatetotalcart();
  header('location: ../productdetails.php?fldproductid='.$productid.'&message=Added To Cart Successfully!');
}

//5. Function for Calculating Total Amount in Cart
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
  $_SESSION['total'] = $totalprice;
  $_SESSION['totalquantity'] = $totalquantity;
}