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
    //Look for product most viewed value in database
    $stmt1 = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
    $stmt1->bind_param('i',$productid);
    if($stmt1->execute()){
      $mostviewedproducts = $stmt1->get_result();// This is an array
      while($row = $mostviewedproducts->fetch_assoc()){
        $productmostviewed = $row['fldproductmostviewed'] + 1;
      }
    }
    else{
      header('index.php?error=Something Went Wrong!! Contact Support Team.');
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
  $productid = $_POST['fldproductid'];
  if(isset($_POST['fldproductmostviewed'])){
    $productmostviewed = $_POST['fldproductmostviewed'];
  }
  $stmt = $conn->prepare("SELECT * FROM products WHERE fldproductid=?");
  $stmt->bind_param("i",$productid);
  if($stmt->execute()){
    // This is an array of 1 product
    $product = $stmt->get_result();

    //Update product most viewed column in products table
    $stmt1 = $conn->prepare("UPDATE products SET fldproductmostviewed=? WHERE fldproductid=?");
    $stmt1->bind_param('ii',$productmostviewed,$productid);
    if($stmt1->execute()){

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

//1.determine page number
if(isset($_GET['pagenumber']) && $_GET['pagenumber'] != ""){
  //if user has already entered page then page number is the one that they selected
  $pagenumber = $_GET['pagenumber'];
}
else{
  //if user just entered the page then default page is 1
  $pagenumber = 1;
}

//2. return number of reviews
$stmt3 = $conn->prepare("SELECT COUNT(*) AS fldtotalrecords FROM productreviews");
if($stmt3->execute()){
  $stmt3->bind_result($totalrecords);
  $stmt3->store_result();
  $stmt3->fetch();
}
else{
  header('location: index.php?error=Something Went Wrong!');
}

//3. determine a specific number of reviews to display per page
$totalrecordsperpage = 3;
$offset = ($pagenumber - 1) * $totalrecordsperpage;
$previouspage = $pagenumber - 1;
$nextpage = $pagenumber + 1;
$adjacents = "2";
$totalnumberofpages = ceil($totalrecords / $totalrecordsperpage);

//4. View Product Reviews
$stmt4 = $conn->prepare("SELECT * FROM productreviews WHERE fldproductid = ? LIMIT $offset,$totalrecordsperpage");
$stmt4->bind_param("i",$productid);
if($stmt4->execute()){
  $productreviews = $stmt4->get_result();// This is an array
}
else{
  header('location: index.php?error=Something Went Wrong!');
}

//5. If Buy Button Is Clicked
if(isset($_POST['buynowbtn'])){
  //5.1. if user has already added to cart
  if(isset($_SESSION['cart'])){
    $productsarrayids = array_column($_SESSION['cart'],"fldproductid");
    //5.1.1. if product has already been added to cart or not
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
    else{//5.1.2 product has already been added
      echo '<script> alert("Product Was Already Added To Cart!")</script>';   
    }
  }
  else{//5.2 if this is the first product
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

  //5.2.1 calculate total
  calculatetotalcart();
  header('location: ../cart.php?editmessage=Added To Cart Succesfully!&fldproductid='.$productid);
}
else if(isset($_POST['addtocartbtn'])){//6. If Add To Cart Button Is Clicked
  //6.1. if user has already added to cart
  if(isset($_SESSION['cart'])){
    $productsarrayids = array_column($_SESSION['cart'],"fldproductid");
    //6.1.1 if product has already been added to cart or not
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
    else{//6.1.2 product has already been added
      echo '<script> alert("Product Was Already Added To Cart!")</script>';
    }
  }
  else{//6.2 if this is the first product
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

  //6.2.1 calculate total
  calculatetotalcart();
  header('location: ../productdetails.php?fldproductid='.$productid);
}

//7. Function for Calculating Total Amount in Cart
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