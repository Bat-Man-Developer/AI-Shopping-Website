<?php
session_start();
//if user has already logged in then take user to Sellers Dashboard page
if(isset($_SESSION['productsellerslogged_in'])){
  header('location: dashboard.php');
  exit;
}
include('sellersserver/getsellerslogin.php');
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NSSA SELLER LOGIN</title>
			<link rel="stylesheet" type="text/css" href="sellersassets/sellersstyles/sellersstyledefault.css">
			<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
	  <body>

			<!--------- Sellers-login-page ------------>
			<section class="logincontainer">
				<div><br><br><br>
					<h2 class="form-weight-bold" style="text-align: center; font-family: verdana">Welcome NSSA Seller Login</h2>
				</div>
				
				<div>
					<div class="loginformcontainer">
							<h1 style="color: red">No Unauthorized Personnel.<br>Trespassers Will Be Tracked.</h1>
						
						<form id="loginform" method="POST" action="sellerslogin.php">
							<p style="color: red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
							<p style="color: green" class="text-center"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
							<div class="form-group">
								<label>Email</label><br>
								<input type="text" class="form-control" id="loginemail" name="fldproductsellersemail" placeholder="Email" required/>
							</div>
							<div class="form-group">
							<label>Password</label><br>
								<input type="password" class="form-control" id="loginpassword" name="fldproductsellerspassword" placeholder="Password" required/>
							</div>
							<div class="form-group">
								<button type="submit" name="productsellersloginbtn" class="btn" id="loginbtn" required>Login</button><br>
								<p style="font-size: small">Can't sign in?<a id="forgotpasswordurl" href="sellersresetpassword.php">Forgot Password</a></p><br>
								<p style="font-size: small">Don't have account?<a id="registerurl" href="sellersregistration.php">Register</a></p>
								<a id="helpurl" href="sellersloginhelp.php">Help?</a>
							</div>
						</form>
					</div>
				</div>
			</section>

<?php
include('sellerslayouts/sellersfooter.php');
?>

