<?php
session_start();
//if user has already registered then take user to account page
if(isset($_SESSION['productsellerslogged_in'])){
  header('location: account.php');
  exit;
}
include('adminserver/getadminregistration.php');
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NSSA SELLERS REGISTRATION</title>
			<link rel="stylesheet" type="text/css" href="adminassets/adminstyles/adminstyledefault.css">
			<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
	  <body>
			<!--------- registration-page ------------>
			<section class="my-5 py-5">
				<div class="registrationcontainer text-center mt-3 pt-5">
					<h2 class="form-weight-bold">Registration</h2>
					<hr class="max-auto">
				</div>
				<div class="registrationformcontainer">
					<form id="registrationform" method="POST" action="adminregistration.php">
						<p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
						<div class="form-group">
							<label>First Name
								<input type="text" class="form-control" id="registrationfirstname" name="fldproductsellersfirstname" placeholder="First Name" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Last Name
								<input type="text" class="form-control" id="registrationlastname" name="fldproductsellerslastname" placeholder="Last Name" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Address line 1
								<input type="text" class="form-control" id="registrationaddressline1" name="fldproductsellersaddressline1" placeholder="Address Line 1" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Address line 2
								<input type="text" class="form-control" id="registrationaddressline2" name="fldproductsellersaddressline2" placeholder="Address Line 2"/>
							</label>
						</div>
						<div class="form-group">
							<label>Postal Code
								<input type="text" class="form-control" id="registrationpostalcode" name="fldproductsellerspostalcode" placeholder="Postalcode" required/>
							</label>
						</div>
						<div class="form-group">
							<label>City
								<input type="text" class="form-control" id="registrationcity" name="fldproductsellerscity" placeholder="City" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Country
								<select class="form-control" id="registrationcountry" name="fldproductsellerscountry" size="1" value="" required>
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
								</select>
							</label>
						</div>
						<div class="form-group">
							<label>Phone Number
								<input type="text" class="form-control" id="registrationphonenumber" name="fldproductsellersphonenumber" placeholder="Phone Number" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Email
								<input type="text" class="form-control" id="registrationemail" name="fldproductsellersemail" placeholder="Email" required/>
							</label>
						</div>
						<div class="form-group">
							<label>ID Number
								<input type="text" class="form-control" id="registrationidnumber" name="fldproductsellersidnumber" placeholder="ID Number" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Password
								<input type="password" class="form-control" id="registrationpassword" name="fldproductsellerspassword" placeholder="Password" required/>
							</label>
						</div>
						<div class="form-group">
							<label>Confirm Password
								<input type="password" class="form-control" id="registrationconfirmpassword" name="fldproductsellersconfirmpassword" placeholder="Confirm Password" required/>
							</label>
						</div>
						<div class="form-group">
							<input type="hidden" name="fldproductsellersimage" value="unknownimage.png" required/>
							<button type="submit" name="productsellersregistrationbtn" class="btn" required>Register</button>
							<p style="font-size: small">Do you have an account?<a id="loginurl" href="adminlogin.php">Login Here</a></p>
						</div>
					</form>
				</div>
			</section>
<?php
include('adminlayouts/adminfooter.php');
?>