<?php

session_start();
	
?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NSSA ADMIN</title>
			<link rel="stylesheet" type="text/css" href="adminassets/adminstyles/adminstyledefault.css">
			<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<div>
				<nav class="topnavbar">
					<ul>
						<a class="signout" href="dashboard.php?adminlogout=1" name="adminlogout">Signout</a>
					</ul>
					<ul>
						<a href="notification.php"><img class="notificationpic" src="adminassets/adminimages/notificationpic.png" alt="Snow">
						<?php if(isset($_SESSION['totalnotificationquantity']) && $_SESSION['totalnotificationquantity'] != 0) { ?>
								<span class="notificationquantity">
									<?php echo $_SESSION['totalnotificationquantity']; ?>
								</span>
						<?php }?>
						</a>
					</ul>
					<ul>
						<a id="adminmenuicon" onclick="adminmenutoggle()" alt="Snow">Menu</a>
					</ul>
				</nav>
			</div>

			<div id="sidenav" class="sidenav">
				<div class="logo">
					<a href="dashboard.php"><img src="../assets/images/newstufflogo_pic.png" alt="Snow"></a>
				</div>
				<a href="dashboard.php">Dashboard</a>
				<a href="adminorders.php">Orders</a>
				<a href="adminproducts.php">Products</a>
				<a href="admincustomers.php">Customers</a>
				<a href="adminaddproducts.php">Create Product</a>
				<a href="adminsecuritysurveilence.php">Security Surveilence</a>
				<a href="adminaccount.php">Account</a>
				<a href="adminhelp.php">Help?</a>
			</div>
		</head>

		<!----------js for toggle menu----------->
		<script>
			function adminmenutoggle(){ 
				var sidenav = document.getElementById("sidenav");
				sidenav.style.marginLeft == "-200px";
				if(sidenav.style.marginLeft == "0px")
				{
					sidenav.style.marginLeft = "-200px";
				}
				else
				{
					sidenav.style.marginLeft = "0px";
				}
			}
		</script>
