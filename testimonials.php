<?php
session_start();
//if user is not logged in then take user to login page
if(!isset($_SESSION['logged_in'])){
  header('location: testimonialslogin.php');
  exit;
}
include('server/gettestimonials.php');
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
<!--------- Testimonials-page ------------>
    <section class="my-5 py-5" id="account-page">
    	<div class="container my-5 py-3">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
				  <p class="text-center" style="color: green"><?php if(isset($_GET['testimonialsmessage'])){ echo $_GET['testimonialsmessage']; }?></p>
					<p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
        </div>
			</div>

      <!--------- Display User Comments --------->
      <div id="testimonials" class="testimonials container my-5 py-3">
        <div class="container mt-2">
          <h2 class="font-weight-bold text-center" style="color: grey">Testimonials & Suggestions...</h2>
          <hr class="mx-auto">
        </div>
        <table class="row">
          <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Comments</th>
            <th>Comments Date</th>
          </tr>

          <?php while($row = $testimonials->fetch_assoc()) { ?>

          <tr>
            <td>
              <span><?php echo $row['fldtestimonialsemail']; ?></span>
            </td>
            <td>
              <span>Member</span>
            </td>
            <td>
              <span><?php echo $row['fldtestimonialscomment']; ?></span>
            </td>
            <td>
              <span><?php echo $row['fldtestimonialsdate']; ?></span>
            </td>
          </tr>

          <?php }?>

        </table>
        <div id="testimonialsbottomspace"></div>
      </div>
    </section>

    <div class="row">
      <form id="testimonialsform" method="POST" action="testimonials.php">
        <div class="form-group">
          <label>Comments
            <input type="text" class="form-control" id="testimonialscomment" name="fldtestimonialscomment" placeholder="write comment here..." required/>
          </label>
        </div>
        <div class="form-group">
          <button type="submit" name="testimonialscommentbtn" class="btn" style="background-color: grey" required>Submit Comment..</button>
        </div>
      </form>
    </div>
  </body>
</html>