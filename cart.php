<?php
session_start();
include('server/getcheckout.php');
include('server/getcart.php');
$_SESSION['couriercost']=0;
if(empty($_SESSION['cart'])){
	header('location: index.php?error=Oops.. Bag Is Empty');
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
			<link rel="stylesheet" type="text/css" href="assets/styles/styletrackorderbanner.css">
			<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
							<li class="active"><a href="index.php"><img id="navbaricons" src="assets/images/homeicon_pic.png" alt="Snow">Home</a></li>
							<li class="active"><a href="about.php"><img id="navbaricons" src="assets/images/abouticon_pic.png" alt="Snow">About</a></li>
							<li class="active" id="departmentitems" onclick="departmentsmenutoggle()"><a href="#"><img id="navbaricons" src="assets/images/productsicon_pic.png" alt="Snow">Shop Departments</a></li>
							<li class="active"><a href="contact.php"><img id="navbaricons" src="assets/images/contacticon_pic.png" alt="Snow">Contact</a></li>
							<li class="active"><a href="sellers/adminlogin.php" target="_blank" rel="noopener noreferrer"><img id="navbaricons" src="assets/images/resellericon_pic.png" alt="Snow">Sell on NSSA</a></li>
							<li class="active"><a href="#"><img id="navbaricons" src="assets/images/careersicon_pic.png" alt="Snow">Careers</a></li>
				    </ul>
					</nav>
					<!---------------Account Image---------------->
					<a href="login.php" style="margin-right: 3%;"><img id="accountpic" class="accountpic" src="assets/images/accounticon_pic.png" alt="Snow" width="30px" height="30px" align="left"></a>
					<!---------------Cart Image---------------->
					<a href="cart.php"><img id="cart-pic" class="cartpic" src="assets/images/cartpic.png" alt="Snow" width="30px" height="30px" align="left">
					<?php if(isset($_SESSION['totalquantity']) && $_SESSION['totalquantity'] != 0) { ?>
						<span class="cartquantity"><?php echo $_SESSION['totalquantity']; ?></span>
					<?php } ?></a>

					<!-- Menu icon -->
					<img src="assets/images/menu.png" alt="Snow" class="menu-icon" onclick="menutoggle()" align="center">
				</div>

				<!-------- Departments Navbar ------->
				<div class="departmentsnavbar" id="departmentsnavbar">
					<nav class="departmentsnav">
						<ul class="departmentsnavitems">
						  <li class="departmentsactive" onclick="closeallmenutoggle()"><a id="departmentsexitmenutogglebtn" href="#">Close</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Automotive"><img id="navbaricons" src="assets/images/" alt="Snow">Automotive</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=DIY"><img id="navbaricons" src="assets/images/" alt="Snow">DIY</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Baby, Toddler & Kids"><img id="navbaricons" src="assets/images/" alt="Snow">Baby, Toddler & Kids</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Health, Beauty & Personal Care"><img id="navbaricons" src="assets/images/" alt="Snow">Health, Beauty & Personal Care</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Sports"><img id="navbaricons" src="assets/images/" alt="Snow">Sports</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Outdoors"><img id="navbaricons" src="assets/images/" alt="Snow">Outdoors</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Healthy Living"><img id="navbaricons" src="assets/images/" alt="Snow">Healthy Living</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Clothing, Shoes & Accessories"><img id="navbaricons" src="assets/images/" alt="Snow">Clothing, Shoes & Accessories</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Electronics & Devices"><img id="navbaricons" src="assets/images/" alt="Snow">Electronics & Devices</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Garden, Pool & Patio"><img id="navbaricons" src="assets/images/" alt="Snow">Garden, Pool & Patio</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Home & Appliances"><img id="navbaricons" src="assets/images/" alt="Snow">Home & Appliances</a></li><li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Home & Furniture"><img id="navbaricons" src="assets/images/" alt="Snow">Home & Furniture</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Household Essentials"><img id="navbaricons" src="assets/images/" alt="Snow">Household Essentials</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Office, Stationary & Books"><img id="navbaricons" src="assets/images/" alt="Snow">Office, Stationary & Books</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Party Ocassions"><img id="navbaricons" src="assets/images/" alt="Snow">Party Ocassions</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Pets"><img id="navbaricons" src="assets/images/" alt="Snow">Pets</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Liquor"><img id="navbaricons" src="assets/images/" alt="Snow">Liquor</a></li>
							<li class="departmentsactive" id="departmentsnavlist"><a href="products.php?fldproductdepartment=Sweets & Snacks"><img id="navbaricons" src="assets/images/" alt="Snow">Sweets & Snacks</a></li>
						</ul>
					</nav>
				</div>

				<!---- Voice Recognition AI Search --->
				<div class="voicerecognitioncontainer">
          <img src="assets/images/voicerecognitionicon_pic.png" class="btn" id="voicerecognitionbtn"/>
					<p id="result"></p>
					<p id="voicerecognitionhelplink">Need Help?<a href="voicerecognitionhelp.php">Voice Command List</a><p>
        </div>

				<!------ Js for Voice Recognition Output ----->
				<script src="js/getvoicerecognitionoutput.js"></script>

				<!------ Js for Toggle Menu ----->
				<script src="js/getheadertogglemenu.js"></script>
			</div>
		</div>
<script type="text/javascript">
	//Billing Same As Shipping Clicked
	$(document).ready(function(){ 
	$('#check-address').click(function(){ 
	if ($('#check-address').is(":checked"))
	{
		$('#shippingfirstname').val($('#billingfirstname').val());
		$('#shippinglastname').val($('#billinglastname').val());
		$('#shippingaddressline1').val($('#billingaddressline1').val());
		$('#shippingaddressline2').val($('#billingaddressline2').val());
		$('#shippingpostalcode').val($('#billingpostalcode').val());
		$('#shippingcity').val($('#billingcity').val());
		$('#shippingemail').val($('#billingemail').val());
		$('#shippingphonenumber').val($('#billingphonenumber').val());
		$('#shippingidnumber').val($('#billingidnumber').val());
		var country = $('#billingcountry option:selected').val();
		$('#shippingcountry option[value=' + country + ']').attr('selected','selected');
	}
	else
	{ 
		//Clear on uncheck
		$('#shippingfirstname').val("");
		$('#shippinglastname').val("");
		$('#shippingaddressline1').val("");
		$('#shippingaddressline2').val("");
		$('#shippingpostalcode').val("");
		$('#shippingcity').val("");
		$('#shippingemail').val("");
		$('#shippingphonenumber').val("");
		$('#shippingidnumber').val("");
		$('#shippingcountry option[value=""]').attr('selected','selected');
		};
	});
	});

	//Standard Courier Type Checked
	$(document).ready(function(){ 
	$('#checked-standardcourier').click(function(){ 
	if ($('#checked-standardcourier').is(":checked")){
		//Check Standard Courier
		$('#fldcouriercost').val($('#standardcourierchecked').val());
	}
	else{//Clear on uncheck
		$('#fldcouriercost').val("");
	};});});

	//Over Night Courier Type Checked
	$(document).ready(function(){ 
	$('#checked-overnightcourier').click(function(){ 
	if ($('#checked-overnightcourier').is(":checked")){
		//Check Over Night Courier
		$('#fldcouriercost').val($('#overnightcourierchecked').val());
	}
	else{//Clear on uncheck
		$('#fldcouriercost').val("");
	};});});
</script>

<!--------- cart items details ------------>
<section class="cart container my-5 py-5">
  <form name="checkoutform" method="POST" action="cart.php">
		<div class="container mt-5">
			<h2 class="fontweightbold">Your Cart</h2>
			<hr>
		</div>
		<!------------- Website Messages----------->
		<p style="color: red; font-weight: bold; text-align: center" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
		<p style="color: green" class="text-center"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>

		<div class="shippingandbillinginfo">
			<header class="bg-dark" style="height: 60px; padding: 5px;">
				<h3 class="text-light" style="text-align: center;">Shipping & Billing Address</h3>
			</header>
			<section class="cartcustomerinfocontainer">
				<div class="form-group">
					<label>First Name
					  <input type="text" class="form-control" id="billingfirstname" name="fldbillingfirstname" placeholder="Billing First Name" value="<?php if(isset($_SESSION['flduserfirstname'])){ echo $_SESSION['flduserfirstname']; } ?>" required/>
					  <span class="error">* <?php //echo $billing_first_nameErr;?></span>
				  </label>
				</div>
				<div class="form-group">
					<label>Lastname
					  <input type="text" class="form-control" id="billinglastname" name="fldbillinglastname" placeholder="Billing Last Name" value="<?php if(isset($_SESSION['flduserlastname'])){ echo $_SESSION['flduserlastname']; } ?>" required/>
					  <span class="error">* <?php //echo $billing_last_nameErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Address line 1
						<input type="text" class="form-control" id="billingaddressline1" name="fldbillingaddressline1" value="<?php if(isset($_SESSION['flduseraddressline1'])){ echo $_SESSION['flduseraddressline1']; } ?>" placeholder="Billing Address line 1" required/>
						<span class="error">* <?php //echo $billing_address_line1Err;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Address line 2
						<input type="text" class="form-control" id="billingaddressline2" name="fldbillingaddressline2" value="<?php if(isset($_SESSION['flduseraddressline2'])){ echo $_SESSION['flduseraddressline2']; } ?>" placeholder="Billing Address line 2"/>
						<span class="error"></span>
					</label>
				</div>
				<div class="form-group">
					<label>Postal Code
						<input type="text" class="form-control" id="billingpostalcode" name="fldbillingpostalcode" value="<?php if(isset($_SESSION['flduserpostalcode'])){ echo $_SESSION['flduserpostalcode']; } ?>" placeholder="Billing Postal Code"  required/>
						<span class="error">* <?php //echo $billing_postal_codeErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>City
						<input type="text" class="form-control" id="billingcity" name="fldbillingcity" value="<?php if(isset($_SESSION['fldusercity'])){ echo $_SESSION['fldusercity']; } ?>" placeholder="Billing City"  required/>
						<span class="error">* <?php //echo $billing_cityErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Country
						<select class="form-control" id="billingcountry" name="fldbillingcountry" size="1" value="" required>
							<option value="<?php if(isset($_SESSION['fldusercountry'])){ echo $_SESSION['fldusercountry']; }else{ echo "Select Country..."; } ?>"><?php if(isset($_SESSION['fldusercountry'])){ echo $_SESSION['fldusercountry']; }else{ echo "Select Country..."; } ?></option>
							<option value="Australia">Australia</option>
							<option value="Britain">Britain</option>
							<option value="China">China</option>
							<option value="Egypt">Egypt</option>
							<option value="England">England</option>
							<option value="France">France</option>
							<option value="Germany">Germany</option>
							<option value="Italy">Italy</option>
							<option value="Mauritius">Mauritius</option>
							<option value="Mexico">Mexico</option>
							<option value="Nigeria">Nigeria</option>
							<option value="Portugal">Portugal</option>
							<option value="Russia">Russia</option>  
							<option value="South_Africa">South Africa</option>
							<option value="Thailand">Thailand</option>
							<option value="USA">USA</option>
						</select><span class="error">* <?php //echo $billing_countryErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Email
						<input type="text" class="form-control" id="billingemail" name="fldbillingemail" value="<?php if(isset($_SESSION['flduseremail'])){ echo $_SESSION['flduseremail']; } ?>" placeholder="Billing Email" required/>
						<span class="error">* <?php //echo $billing_emailErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Phone Number
						<input type="text" class="form-control" id="billingphonenumber" name="fldbillingphonenumber" value="<?php if(isset($_SESSION['flduserphonenumber'])){ echo $_SESSION['flduserphonenumber']; } ?>" placeholder="Billing Phone Number" required/>
						<span class="error">* <?php //echo $billing_phone_numberErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>ID Number
						<input type="text" class="form-control" id="billingidnumber" name="fldbillingidnumber" value="<?php if(isset($_SESSION['flduseridnumber'])){ echo $_SESSION['flduseridnumber']; } ?>" placeholder="Billing ID Number" required/>
						<span class="error">* <?php //echo $billing_idErr;?></span>
					</label>
				</div><br><br>
				<p><b>Shipping Information, same as Billing Information?<label><input name="check_address" type="checkbox" value="" id="check-address" value="<?php echo $check_address;?>"></label></b></p><br><br>
				<div class="form-group">
					<label>First Name
						<input type="text" class="form-control" id="shippingfirstname" name="fldshippingfirstname" placeholder="Shipping First Name" required/>
						<span class="error">* <?php //echo $shipping_first_nameErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Lastname
						<input type="text" class="form-control" id="shippinglastname" name="fldshippinglastname" placeholder="Shipping Last Name" required/>
						<span class="error">* <?php //echo $shipping_last_nameErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Address line 1
						<input type="text" class="form-control" id="shippingaddressline1" name="fldshippingaddressline1" placeholder="Shipping Address line 1" required/>
						<span class="error">* <?php //echo $shipping_address_line1Err;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Address line 2
						<input type="text" class="form-control" id="shippingaddressline2" name="fldshippingaddressline2" placeholder="Shipping Address line 2"/>
						<span class="error"></span>
					</label>
				</div>
				<div class="form-group">
					<label>Postal Code
						<input type="text" class="form-control" id="shippingpostalcode" name="fldshippingpostalcode" placeholder="Shipping Postal Code"  required/>
						<span class="error">* <?php //echo $shipping_postal_codeErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>City
						<input type="text" class="form-control" id="shippingcity" name="fldshippingcity" placeholder="Shipping City"  required/>
						<span class="error">* <?php //echo $shipping_cityErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Country
						<select class="form-control" id="shippingcountry" size="1" name="fldshippingcountry" value="">
							<option value="">Select Country..</option>
							<option value="Australia">Australia</option>
							<option value="Britain">Britain</option>
							<option value="China">China</option>
							<option value="Egypt">Egypt</option>
							<option value="England">England</option>
							<option value="France">France</option>
							<option value="Germany">Germany</option>
							<option value="Italy">Italy</option>
							<option value="Mauritius">Mauritius</option>
							<option value="Mexico">Mexico</option>
							<option value="Nigeria">Nigeria</option>
							<option value="Portugal">Portugal</option>
							<option value="Russia">Russia</option>  
							<option value="South_Africa">South Africa</option>
							<option value="Thailand">Thailand</option>
							<option value="USA">USA</option>
						</select><span class="error">* <?php //echo $shipping_countryErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Email
						<input type="text" class="form-control" id="shippingemail" name="fldshippingemail" placeholder="Shipping Email" required/>
						<span class="error">* <?php //echo $shipping_emailErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Phone Number
						<input type="text" class="form-control" id="shippingphonenumber" name="fldshippingphonenumber" placeholder="Shipping Phone Number" required/>
						<span class="error">* <?php //echo $shipping_phone_numberErr;?></span>
					</label>
				</div>
				<div class="form-group">
					<label>Delivery Comment
					  <input type="text" class="form-control" id="shippingdeliverycomment" name="fldshippingdeliverycomment" placeholder="Delivery Comment"/>
					</label>
				</div><br><br>
			</section>
		</div>
		<div class="discountinfo">
			<header>
				<h3 style="text-align: center; font-size: large; font-family: Georgia">Discount Information</h3>
			</header><br><br>
			<div class="form-group">
				<label>Promo Code
				  <input type="text" class="form-control" id="discountcode" name="flddiscountcode" placeholder="Enter Promo Code"/>
				</label>
			</div><br><br>
		</div>
		<div class="courierinfo">
			<header>
				<h3 style="text-align: center; font-size: large; font-family: Georgia">Courier Information</h3>
			</header><br><br>
			<div class="row">
				<p>Delivery Date: <?php $date=date_create(date("d-m-Y"));
				date_add($date,date_interval_create_from_date_string("14 days"));
				echo date_format($date,"l jS \of F Y"); ?></p><br>
				<div class="form-check">
				  <label class="form-check-label">Standard Courier R100
					  <input class="form-check-input" type="radio" name="couriertype" id="checked-standardcourier" value="100" checked required>
					</label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">Over Night Courier R180
					  <input class="form-check-input" type="radio" name="couriertype" id="checked-overnightcourier" value="180" <?php if(isset($type) && $type == 180){ echo 'checked'; } ?>>
					</label>
				</div>
			</div><br><br>
		</div><br><br>
		<div class="cartbtncontainer">
		  <input type="hidden" name="protectpaymentpage" value="unlockpage"/>
		  <input type="hidden" name="flduserimage" value="unknownimage.png"/>
			<input type="hidden" name="checkoutbtn">
			<input class="cartbtn" name="cartbtn" type="submit" id="submit" value="Proceed To Checkout"/>
		</div><br>
	</form>
	<div class="cartinfo">
		<div class="container mt-5">
			<h2 class="fontweightbold">Cart Information</h2>
			<hr>
		</div>
		<table class="mt-5 pt-5">
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
			</tr> 

			<?php if(isset($_SESSION['cart'])) { ?>
			<?php foreach($_SESSION['cart'] as $key => $value) { ?>
			
			<tr>
				<td>
					<div class="productinfo">
						<img id="wine-pic1" src="assets/images/<?php echo $value['fldproductimage']; ?>" alt="Snow">
						<div>
							<p class="productname"><?php echo $value['fldproductname']; ?></p>
							<small class="productprice"><?php echo $value['fldproductprice']; ?></small>
							<br>
							<form method="POST" action="cart.php">
								<input type="hidden" name="fldproductid" class="removebutton" value="<?php echo $value['fldproductid']; ?>"/>
								<input type="submit" name="removeproductbtn" class="removebutton" value="remove"/>
							</form>
						</div>
					</div>
				</td>
				<td>
					<form method="POST" action="cart.php">
						<input type="hidden" name="fldproductid" value="<?php echo $value['fldproductid']; ?>"/>
						<input type="number" name="fldproductquantity" class="productquantity" value="<?php echo $value['fldproductquantity']; ?>" min="1" max="<?php echo $value['fldproductstock']; ?>"/>
						<input type="submit" name="editquantitybtn" class="editbtn" value="edit"/>
					</form>
				</td>
				<td>
					<span class="productsubtotal">R<?php echo $value['fldproductquantity'] * $value['fldproductprice']; ?></span>
				</td>
			</tr>
			<?php } ?>
			<?php } ?>
		</table>

		<div class="carttotal">
			<table>
				<tr>
					<td class="productssubtotal">Subtotal</td>
					<td>R <?php if(isset($_SESSION['total'])){echo $_SESSION['total']-($_SESSION['total']*0.15); }else{echo "0";} ?></td>
				</tr>
				<tr>
					<td class="productstax">Tax</td>
					<td>R <?php if(isset($_SESSION['total'])){echo $_SESSION['total']*0.15; }else{echo "0";} ?></td>
				</tr>
				<tr>
					<td class="productstotal">Total</td>
					<td>R <?php if(isset($_SESSION['total'])){echo $_SESSION['total']; }else{echo "0";} ?></td>
				</tr>
				<tr>
					<form form="checkoutform" method="POST" action="cart.php">
						<td class="productsshipping">Shipping</td>
						<td style="color: rgb(46, 131, 187)">+ R
							<input type="hidden" id="standardcourierchecked" value="100"/>
							<input type="hidden" id="overnightcourierchecked" value="180"/>
							<input id="fldcouriercost" value="100" style="color: rgb(46, 131, 187); font-size: medium"/>
						</td>
					</form>
				</tr>
			</table>
		</div>
	</div>
</section>

<?php

include('layouts/footer.php');
	
?>