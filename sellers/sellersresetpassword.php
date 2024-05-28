<?php
session_start();
//if user has already logged in then take user to Seller Dashboard page
if(isset($_SESSION['productsellerslogged_in'])){
  header('location: dashboard.php');
  exit;
}
include('sellersserver/getsellersresetpassword.php');
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NSSA SELLER RESET PASSWORD</title>
			<link rel="stylesheet" type="text/css" href="adminassets/adminstyles/adminstyledefault.css">
			<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
	  <body>
		<!--------- Seller Reset Password Page ------------>
		<section class="my-5 py-5">
			<div class="container text-center mt-3 pt-5">
				<h2 class="form-weight-bold">Reset Password</h2>
				<hr class="max-auto">
			</div>
			<div class="max-auto container">
				<form id="resetpasswordform" method="POST" action="sellersresetpassword.php">
					<p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
					
					<div class="form-group">
						<label>Email
							<input type="text" class="form-control" id="resetemail" name="fldproductsellersemail" placeholder="Email" required/>
						</label>
					</div>
					<div class="form-group">
						<label>Password
							<input type="password" class="form-control" id="resetpasswordpassword" name="fldproductsellerspassword" placeholder="Password" required/>
						</label>
					</div>
					<div class="form-group">
						<label>Confirm Password
							<input type="password" class="form-control" id="resetpasswordconfirmpassword" name="fldproductsellersconfirmpassword" placeholder="Confirm Password" required/>
						</label>
					</div>
					<div class="form-group">
						<button type="submit" name="productsellersresetpasswordbtn" class="btn" id="resetpasswordbtn" required>Reset Password</button>
					</div>
				</form>
			</div>
		</section>
<?php
include('sellerslayouts/adminfooter.php');
?>