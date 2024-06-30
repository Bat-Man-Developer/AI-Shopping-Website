<?php
session_start();
include('server/getwishlist.php');
if(empty($_SESSION['wishlistcart'])){
	header('location: index.php?error=Oops.. Wishlist Bag Is Empty');
	exit;
}
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NSSA STORE</title>
			<link rel="stylesheet" type="text/css" href="assets/styles/styledefault.css">
			<link rel="stylesheet" type="text/css" href="assets/styles/stylecart.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		</head>
	  <body>

	  <div class="header">
		  <div class="container">
		    <div class="navbar">
			    <div class="logocontainer">
				    <a href="index.php"><img class="logo" src="assets/images/newstufflogo_pic.png" alt="Snow" align="left"></a>
			    </div>
			    <nav>
						<ul id="menuitems">
							<li class="exitmenutogglebtn" id="nav-exit" onclick="menutoggle()"><a href="#">X</a></li>
							<li class="active"><a href="index.php">Home</a></li>
							<li class="active"><a href="about.php">About</a></li>
							<li class="active" id="departmentitems" onclick="departmentsmenutoggle()"><a href="#">Shop Departments</a></li>
							<li class="active"><a href="contact.php">Contact</a></li>
							<li class="active"><a href="sellers/sellerslogin.php" target="_blank" rel="noopener noreferrer">Sell on NSSA</a></li>
							<li class="active"><a href="#">Careers</a></li>
				    </ul>
					</nav>
					<!---------------Wishlist Image---------------->
					<a href="wishlist.php" id="wishlistlink"><img id="wishlistpic" class="wishlistpic" src="assets/images/wishlist_pic.png" alt="Snow" align="left"><?php if(isset($_SESSION['wishlisttotalitems']) && $_SESSION['wishlisttotalitems'] != 0) { ?><span class="cartquantity"><?php echo $_SESSION['wishlisttotalitems']; } ?></span></a>
					<!---------------Account Image---------------->
					<a href="login.php" class="account_pic_link"><img id="accountpic" class="accountpic" src="assets/images/accounticon_pic.png" alt="Snow" align="left"></a>
					<!---------------Cart Image---------------->
					<a href="cart.php"><img id="cart-pic" class="cartpic" src="assets/images/cartpic.png" alt="Snow" align="left">
					<?php if(isset($_SESSION['totalquantity']) && $_SESSION['totalquantity'] != 0) { ?><span class="cartquantity"><?php echo $_SESSION['totalquantity']; } ?></span></a>
					<!-- Menu icon -->
					<img src="assets/images/menu.png" alt="Snow" class="menu-icon" onclick="menutoggle()" align="center">
				</div>
				<!---Search Bar--->
				<div class="searchProductsContainer">
					<form name="searchProductsForm" method="POST" action="products.php">
						<div class="searchProductsDiv">
								<input type="text" id="searchInput" name="searchproductstring" placeholder="Search...">
							  <button type="submit" id="searchButton">Search</button>
								<div id="suggestionsContainer"></div>
						</div>
					</form>
				</div>
				<!-------- Departments Navbar ------->
				<div class="departmentsnavbar" id="departmentsnavbar">
					<nav class="departmentsnav">
						<ul class="departmentsnavitems">
						  <li class="departmentsactive" onclick="departmentsmenutoggle()"><a id="departmentsexitmenutogglebtn" href="#">Close</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Automotive">Automotive</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=DIY">DIY</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Baby, Toddler & Kids">Baby, Toddler & Kids</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Health, Beauty & Personal Care">Health, Beauty & Personal Care</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Sports">Sports</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Outdoors">Outdoors</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Healthy Living">Healthy Living</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Clothing, Shoes & Accessories">Clothing, Shoes & Accessories</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Electronics & Devices">Electronics & Devices</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Garden, Pool & Patio">Garden, Pool & Patio</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Home & Appliances">Home & Appliances</a></li><li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Home & Furniture">Home & Furniture</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Household Essentials">Household Essentials</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Office, Stationary & Books">Office, Stationary & Books</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Party Ocassions">Party Ocassions</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Pets">Pets</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Liquor">Liquor</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Sweets & Snacks">Sweets & Snacks</a></li>
						</ul>
					</nav>
				</div>

				<!---- Voice Recognition AI Search Button --->
				<div class="voicerecognitioncontainer">
          <img src="assets/images/voicerecognitionicon_pic.png" alt="snow" class="btn" id="voicerecognitionbtn"/>
					<p id="result"></p>
					<p id="voicerecognitionhelplink">Need Help?<a href="voicerecognitionhelp.php">Voice Command List</a><p>
        </div>
			</div>
		</div>
		<!--------- Wishlist Items Details ------------>
		<section class="wishlistContainer my-5 py-5">
			<div class="wishlistContainer container mt-5">
        <h2 class="fontweightbold">Wishlist</h2>
        <hr>
      </div>
      <!------------- Website Messages----------->
      <p style="color: red; font-weight: bold; text-align: center" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
      <p style="color: green" class="text-center"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
			<div class="cartDiv">
				<table class="cartTable">
					<tr>
						<th>Product</th>
						<th>Price</th>
						<th>Purchase</th>
					</tr> 

					<?php if(isset($_SESSION['wishlistcart'])) { ?>
					<?php foreach($_SESSION['wishlistcart'] as $key => $value) { ?>
					
					<tr>
						<td>
							<div class="cartProductInfo">
								<img id="cartProductPic" src="assets/images/<?php echo $value['fldproductimage']; ?>" alt="Snow">
								<div>
									<p class="cartProductName"><?php echo $value['fldproductname']; ?></p>
									<small class="cartProductPrice">R<?php echo $value['fldproductprice']; ?></small>
									<br>
									<form method="POST" action="wishlist.php">
										<input type="hidden" name="fldproductid" value="<?php echo $value['fldproductid']; ?>"/>
										<input type="submit" name="removeproductbtn" class="wishlistRemoveBtn" value="remove"/>
									</form>
								</div>
							</div>
						</td>
						<td>
							<span class="cartProductSubTotal">R<?php $discount = $value['fldproductprice']-($value['fldproductdiscount']*$value['fldproductprice']); echo $discount; ?></span>
						</td>
						<td>
							<div>
								<form method="POST" action="wishlist.php">
									<input type="hidden" name="fldproductid" value="<?php echo $value['fldproductid']; ?>"/>
									<input type="submit" name="gotoproductbtn" class="cartBtn" id="goToProductBtn" value="view product"/>
								</form>
							</div>
						</td>
					</tr>
					<?php } ?>
					<?php } ?>
				</table>
			</div>
		</section>
<?php
include('layouts/footer.php');
?>