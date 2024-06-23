<?php
session_start();
include('server/getcontact.php');
?>
<style>	
	.center-heading{
		text-align: center;
		color: skyblue	;
		font-weight: bold;
		border-radius: 50%;
		border: 10px solid lightblue;
		padding: 10px;
		display: inline-block;
		margin: 0 auto;
		margin-top: 20px;
		margin-bottom: 20px;
		display: table;
		font-size: 40px;
	}

	/* CSS styles for the sections */
	.section-container {
		display: flex; /* Use flexbox */
	}

	.section {
		flex: 1; /* Each section takes equal space */
		border: 5px solid white; /* Light brown border color */
		border-radius: 15px;
		padding: 5px; /* Add some padding inside the sections */
		background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.75), rgba(255, 255, 255, 0.75)), url("assets/images/SellersMarket.jpg"); /*path to your image file */
		background-size: contain;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
		width: 450px;
		height: 450px;
		box-shadow: 0 0 50px rgba(0, 0, 0, 0.05);
	}
	.section2 {
		flex: 1; /* Each section takes equal space */
		border: 5px solid skyblue; /* Light brown border color */
		border-radius: 15px;
		padding: 5px; /* Add some padding inside the sections */
		background: linear-gradient(to right,#add8e6, #b3e5fc, #add8e6);
		background-size: contain;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
		width: 50svw;
		height: 30svw;
	}
	.section h2 {
		font-size: 24px; /* Set the font size to 12 pixels */
		font-family: Georgia, serif; /* Set the font family to Georgia */
		color: gray;
		text-align: center;
		background: linear-gradient(to right,#add8e6, #b3e5fc, #add8e6);
		border-width: 50px;
		border-radius: 40px;
	}
	.section h4 {
		font-size: 14px; /* Set the font size to 12 pixels */
		font-family: Georgia, serif; /* Set the font family to Georgia */
		color: gray;
		text-align: center;
		background-color: lightblue;
	}

	.section p {
		font-size: 13px; /* Set the font size to 11 pixels */
		font-family: Georgia, serif; /* Set the font family to Georgia */
		color: gray;
		margin-bottom: 10px;	
		text-align: center;
		margin-top: 10px;	
	}

	.section p1 {
		font-size: 14px; /* Set the font size to 11 pixels */
		font-family: Georgia, serif; /* Set the font family to Georgia */
		color: gray;
		margin-bottom: 10px;	
		text-align: center;
		margin-top: 10px;	
	}

	/* CSS styles for hyperlinks */
	a {
		color: darkblue; /* Dark red color for hyperlinks */
		text-decoration: none; /* Underline the hyperlinks */
		border: 1px;
	}

	.contactform {
		height: 32svw;
		width: 32svw;
		margin: 0 auto;
		padding: 20px;
		border: 30px solid gray;
		border-image: linear-gradient(to right, rgba(179, 179, 179, 272.5), rgba(144, 144, 144, 366.5), rgba(179, 179, 179, -397.5)) 1;
		border-radius: 10%;
		padding: 5px; /* Add some padding inside the sections */
		background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.75), rgba(255, 255, 255, 0.75)), url("assets/images/QuestionMark.jpeg"); /*path to your image file */
		background-size: 100%;
		background-repeat: repeat; /* Ensure the image is repeated */
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
		box-shadow: 0 0 50px rgba(0, 0, 0, 0.45);
	}
	.contactform input{
		width: 30svw;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top: 6px;
		margin-bottom: 16px;
		resize: vertical;
		font-size: 18px; /* Set the font size to 12 pixels */
		font-family: Georgia, serif; /* Set the font family to Georgia */
		font-weight:bold;
		color:red;
		background-color:brown;
	}
	.contactform textarea{
		height: 14.5svw;
		width: 24svw;
		border: 1px solid lightblue;
		border-radius: 30px;
		padding: 15px;
		background-color: rgba(240,248,255,0.8);
		color:gray;
		font-weight:bold;
		font-size:14px;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
	}
	.contactform label{
		font-family: Georgia, serif; /* Set the font family to Georgia */
		font-size: 20px;
		border: 5px;
		font-weight:bold;
		color:gray;
	}
	.contactform input[type=text]{
		margin-top: 3px;
		background-color: rgba(240,248,255,0.8);
		font-family: Georgia, serif; /* Set the font family to Georgia */
		border: 1px solid lightblue;
		border-radius: 5px;
		font-weight:bold;
		font-size: 12px;
		color:gray;
		width:20svw;
		height: 1svw;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
	}
	.contactform input[type=email]{
		text-align: center;
		background-color: rgba(240,248,255,0.8);
		font-family: Georgia, serif; /* Set the font family to Georgia */
		font-size: 12px;
		border: 1px solid lightblue;
		border-radius: 5px;
		font-weight:bold;
		color:gray;
		width:22svw;
		height: 1.5svw;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
	}
	.contactform input[type=submit] {
		background-color: #f2f2f2;
		color: gray;
		width: 200px;	
		padding: 12px 20px;
		border: 5px;
		border-radius: 4px;
		text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
		cursor: pointer;
	}

	.contactform input[type=submit]:hover {
		background-color: white;
	}
</style>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NSSA STORE</title>
			<link rel="stylesheet" type="text/css" href="assets/styles/styledefault.css">
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
		<!------------- Website Messages----------->
		<p style="color: red; font-weight: bold; text-align: center" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
		<p style="color: green" class="text-center"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>

			<!---------Contact-Page--------->
			<section>
				<br><h3 class="center-heading">Contact Us</h3>	
				<div class="section-container">
					<div id="section1" class="section">
						<h2>Sellers Market</h2>
						<p>This is our market plartform wherein you get to submit the products you want to sell. We basically screen it and value it for others to purchase.
						We might take some time to respond on your uploaded goods as we get a lot of products from sellers daily. 
						A well as a lot of reviews and comment on the values permitted on each product by out marketiong Experts.</p>
						<p><a href="https://poe.com/">Market</a>.</p>
					</div>

					<div id="section1" class="section">
						<h2>Collections and returns</h2>
						<p> We grace you with points of pickups and returns at any specified working hours depending on the point of reference. 
						Our Points are located in the Sandton Region which is the main offices for our organization.
						We can refer your pickup or collection accoreding to your current location and we can base them from the following points which are our storage locations :</p>
						
						<p></p>
						<h4>SOWETO</h4>
							<p1> <li>Weekdays (Working Hours) - 08h00-17h00</li>
							<li>Weekends (Working Hours) - 07h45-14h00</li>
							<li>Holidays (Working Hours) - Closed</li></p1>
							
						<p></p>
						<h4>KRUGERSDORP</h4>
							<p1> <li>Weekdays (Working Hours) - 08h00-17h00</li>
							<li>Weekends (Working Hours) - 07h45-14h00</li>
							<li>Holidays (Working Hours) - Closed</li></p1>
							
						<p></p>
						<h4>HATFIELD</h4>
							<p1> <li>Weekdays (Working Hours) - 08h00-17h00</li>
							<li>Weekends (Working Hours) - 07h45-14h00</li>
							<li>Holidays (Working Hours) - Closed</li></p1>
							
							<p><a href="https://poe.com/">More info.</a>.</p>
					</div>

					<div id="section2" class="section">
						<h2>Offices</h2>
							<p>For face to face queries and site visit we have two main offices which operate in prescribed business hours.</p>
							<p>They are situated in the following parts of the country: </p>
						
						<p></p>
						<h4>SOWETO</h4>
							<p1> <li>Weekdays (Working Hours) - 08h00-16h00</li>
							<li>Weekends (Working Hours) - 08h00-13h00</li>
							<li>Holidays (Working Hours) - 09h00-14h00</li></p1>
						
						<p></p>
						<h4>KRUGERSDORP</h4>
							<p1> <li>Weekdays (Working Hours) - 24/7</li>
							<li>Weekends (Working Hours) - 08h00-16h00</li>
							<li>Holidays (Working Hours) - 08h00-16h00</li></p1>

							<p><a href="https://poe.com/">Active Teams</a>.</p>
					</div>
				</div>
			</section>
			
			<section>

				<div class="contactpagecontainer">
					<div class="googlemapscontainer">
						<a href='https://www.easybooking.eu/'>Find Us</a><br>
						<iframe class="googlemaps" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=4708%20Mhunti%20Street%20Johannesburg+(MR)&amp;t=p&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"> </iframe> 
						<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=5c8a8dd1d18f664e1a4704f0a64fff04109a8dd8'> </script>
					</div>

					<div id="section2" class="section">
						<h2>OverSights</h2>
						<p>For face to face queries and site visit we have two main offices which operate in prescribed business hours.</p>
						<p>They are situated in the following parts of the country: </p>
					
						<p><a href="https://poe.com/">Active Teams</a>.</p>
					</div>

					<div class="contactform">
						<br>
						<form action="contact.php" method="post">
							<br>
							<label for="name">Name</label>
							<input type="text" id="name" name="name" required>
								<br>
							<label for="email">e-mail</label>
							<input type="email" id="email" name="email" required>
								<br>
							<label for="message">Opinion/Feedback</label>
								<br>
							<textarea id="message" name="message" required></textarea>
								<br>
							<input type="submit" value="Submit">
								<br><br>	
						</form><br><br>
					</div>
				</div>
			</section>
<?php
include('layouts/footer.php');
?>