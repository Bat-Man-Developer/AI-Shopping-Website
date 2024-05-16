<?php
include('connection.php');
if(isset($_POST['checkoutbtn'])){
	//1.get user info and store in database
	//1.1 get the post records for billing
	$_SESSION['fldbillingfirstname'] = $billingfirstname = $_POST['fldbillingfirstname'];
	$_SESSION['fldbillinglastname'] = $billinglastname = $_POST['fldbillinglastname'];
	$_SESSION['fldbillingaddressline1'] = $billingaddressline1 = $_POST['fldbillingaddressline1'];
	$_SESSION['fldbillingaddressline2'] = $billingaddressline2 = $_POST['fldbillingaddressline2'];
	$_SESSION['fldbillingpostalcode'] = $billingpostalcode = $_POST['fldbillingpostalcode'];
	$_SESSION['fldbillingcity'] = $billingcity = $_POST['fldbillingcity'];
	$_SESSION['fldbillingcountry'] = $billingcountry = $_POST['fldbillingcountry'];
	$_SESSION['fldbillingemail'] = $billingemail = $_POST['fldbillingemail'];
	$_SESSION['fldbillingphonenumber'] = $billingphonenumber = $_POST['fldbillingphonenumber'];
	$_SESSION['fldbillingidnumber'] = $billingidnumber = $_POST['fldbillingidnumber'];

	//1.2 get the post records for user
	$_SESSION['flduserfirstname'] = $userfirstname = $_POST['fldbillingfirstname'];
	$_SESSION['flduserlastname'] = $userlastname = $_POST['fldbillinglastname'];
	$_SESSION['flduseraddressline1'] = $useraddressline1 = $_POST['fldbillingaddressline1'];
	$_SESSION['flduseraddressline2'] = $useraddressline2 = $_POST['fldbillingaddressline2'];
	$_SESSION['flduserpostalcode'] = $userpostalcode = $_POST['fldbillingpostalcode'];
	$_SESSION['fldusercity'] = $usercity = $_POST['fldbillingcity'];
	$_SESSION['fldusercountry'] = $usercountry = $_POST['fldbillingcountry'];
	$_SESSION['flduseremail'] = $useremail = $_POST['fldbillingemail'];
	$_SESSION['flduserphonenumber'] = $userphonenumber = $_POST['fldbillingphonenumber'];
	$_SESSION['flduseridnumber'] = $useridnumber = $_POST['fldbillingidnumber'];

	//1.3 get the post records for shipping
	$_SESSION['fldshippingfirstname'] = $shippingfirstname = $_POST['fldshippingfirstname'];
	$_SESSION['fldshippinglastname'] = $shippinglastname = $_POST['fldshippinglastname'];
	$_SESSION['fldshippingaddressline1'] = $shippingaddressline1 = $_POST['fldshippingaddressline1'];
	$_SESSION['fldshippingaddressline2'] = $shippingaddressline2 = $_POST['fldshippingaddressline2'];
	$_SESSION['fldshippingpostalcode'] = $shippingpostalcode = $_POST['fldshippingpostalcode'];
	$_SESSION['fldshippingcity'] = $shippingcity = $_POST['fldshippingcity'];
	$_SESSION['fldshippingcountry'] = $shippingcountry = $_POST['fldshippingcountry'];
	$_SESSION['fldshippingemail'] = $shippingemail = $_POST['fldshippingemail'];
	$_SESSION['fldshippingphonenumber'] = $shippingphonenumber = $_POST['fldshippingphonenumber'];
	$_SESSION['fldshippingdeliverycomment'] = $shippingdeliverycomment = $_POST['fldshippingdeliverycomment'];

	//1.4 get Order Info & Store In Orders
	$orderid = -1;
	$_SESSION['fldorderstatus'] = $orderstatus = "Not Paid";
	$_SESSION['fldorderdate'] = $orderdate = date('Y-m-d H:i:s');
	$_SESSION['checkoutbtn'] = $_POST['checkoutbtn'];
	$_SESSION['flddiscountcode'] = $discountcode = $_POST['flddiscountcode'];
	
	if(isset($_POST['couriertype'])){
		$_SESSION['fldcouriercost'] = $couriercost = $_POST['couriertype'];
	}
	else{
		header('location: cart.php?error=Could Not Process Courier Selection!');
	}
	$total = $_SESSION['total'];
	$temp = 0;
	$_SESSION['fldordercost'] = $ordercost = $total = $total + $couriercost;
	$_SESSION['fldordercost'] = $ordercost = $ordercost - $temp;
	$temp = $couriercost;

	//1.6 get the post records for testimonials
	$_SESSION['fldtestimonialsimage'] = $testimonialsimage = $_POST['flduserimage'];
	$_SESSION['fldtestimonialsfirstname'] = $testimonialsfirstname = $_POST['fldbillingfirstname'];
	$_SESSION['fldtestimonialslastname'] = $testimonialslastname = $_POST['fldbillinglastname'];
	$_SESSION['fldtestimonialsemail'] = $testimonialsemail = $_POST['fldbillingemail'];

	//1.7 check if user exists already
	$stmt = $conn->prepare("SELECT * FROM users WHERE flduseremail = ? LIMIT 1");
  $stmt->bind_param('s',$useremail);
  if($stmt->execute()){
    $stmt->bind_result($userid,$userimage,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber,$userpassword);
    $stmt->store_result();

		//if User Is Found In Users Table
		if($stmt->num_rows() == 1){
			$stmt->fetch();
			$_SESSION['flduserid'] = $userid;
			$_SESSION['flduserimage'] = $userimage;
			$_SESSION['flduserfirstname'] = $userfirstname;
			$_SESSION['flduserlastname'] = $userlastname;
			$_SESSION['flduseraddressline1'] = $useraddressline1;
			$_SESSION['flduseraddressline2'] = $useraddressline2;
			$_SESSION['flduserpostalcode'] = $userpostalcode;
			$_SESSION['fldusercity'] = $usercity;
			$_SESSION['fldusercountry'] = $usercountry;
			$_SESSION['flduserphonenumber'] = $userphonenumber;
			$_SESSION['flduseremail'] = $useremail;
			$_SESSION['flduseridnumber'] = $useridnumber;

			//1.1.1 Update Customer Billing Address Table
			$stmt1 = $conn->prepare("UPDATE customerbillingaddress SET fldorderid=?,fldbillingfirstname=?,fldbillinglastname=?,fldbillingaddressline1=?,fldbillingaddressline2=?,fldbillingpostalcode=?,fldbillingcity=?,fldbillingcountry=?,fldbillingemail=?,fldbillingphonenumber=?,fldbillingidnumber=? WHERE fldbillingemail=?");
			$stmt1->bind_param('isssssssssss',$orderid,$billingfirstname,$billinglastname,$billingaddressline1,$billingaddressline2,$billingpostalcode,$billingcity,$billingcountry,$billingemail,$billingphonenumber,$billingidnumber,$billingemail);

			//1.2.1 Update Users Table
			$stmt2 = $conn->prepare("UPDATE users SET flduserfirstname=?,flduserlastname=?,flduseraddressline1=?,flduseraddressline2=?,flduserpostalcode=?,fldusercity=?,fldusercountry=?,flduseremail=?,flduserphonenumber=?,flduseridnumber=? WHERE flduseremail=?");
			$stmt2->bind_param('sssssssssss',$billingfirstname,$billinglastname,$billingaddressline1,$billingaddressline2,$billingpostalcode,$billingcity,$billingcountry,$billingemail,$billingphonenumber,$billingidnumber,$billingemail);

			//1.3.1 Insert in Customer Shipping Table
			$stmt3 = $conn->prepare("INSERT INTO customershippingaddress (fldorderid,fldshippingfirstname,fldshippinglastname,fldshippingaddressline1,fldshippingaddressline2,fldshippingpostalcode,fldshippingcity,fldshippingcountry,fldshippingemail,fldshippingphonenumber,fldshippingdeliverycomment)
			VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt3->bind_param('issssssssss',$orderid,$shippingfirstname,$shippinglastname,$shippingaddressline1,$shippingaddressline2,$shippingpostalcode,$shippingcity,$shippingcountry,$shippingemail,$shippingphonenumber,$shippingdeliverycomment); 

			// Get Product Sellers Id in Session Cart Array
			$productsellersid = 0;
			foreach($_SESSION['cart'] as $key => $value){
				$product = $_SESSION['cart'][$key];
				$productsellersid = $productsellersid.",".$product['fldproductsellersid'];
			}
			//1.4.1 Insert in Orders Table
			$stmt4 = $conn->prepare("INSERT INTO orders (fldproductsellersid,fldordercost,fldcouriercost,fldproductdiscountcode,fldorderstatus,flduserid,fldshippingid,fldbillingidnumber,fldbillingphonenumber,fldshippingphonenumber,fldshippingcity,fldshippingcountry,fldshippingaddressline1,fldshippingaddressline2,fldorderdate,fldshippingdeliverycomment)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt4->bind_param('siissiisssssssss',$productsellersid,$ordercost,$couriercost,$discountcode,$orderstatus,$userid,$shippingid,$billingidnumber,$billingphonenumber,$shippingphonenumber,$shippingcity,$shippingcountry,$shippingaddressline1,$shippingaddressline2,$orderdate,$shippingdeliverycomment);

			//1.8 Update Billing & Shipping Address Table With Order Id Syncronization
			$stmt5 = $conn->prepare("UPDATE customerbillingaddress SET fldorderid = ? WHERE fldorderid = -1 AND fldbillingemail = ?");
			$stmt5->bind_param('is',$orderid,$billingemail);

			$stmt6 = $conn->prepare("UPDATE customershippingaddress SET fldorderid = ? WHERE fldorderid = -1 AND fldshippingemail = ?");
			$stmt6->bind_param('is',$orderid,$shippingemail);

			if($stmt1->execute()){
				if($stmt2->execute()){
					if($stmt3->execute()){
						//1.3.2Issue New Shipping and store Shipping info in database
						$_SESSION['fldshippingid'] = $shippingid = $stmt3->insert_id;
						if($stmt4->execute()){
							//1.4.2 Issue New Order and store Order info in database
							$_SESSION['fldorderid'] = $orderid = $stmt4->insert_id;
							if($stmt5->execute()){
								if($stmt6->execute()){

								}
								else{
									header('location: ../cart.php?error=Something Went Wrong, Try Again.');
								}
							}
							else{
								header('location: ../cart.php?error=Something Went Wrong, Try Again.');
							}
						}
						else{
							header('location: ../cart.php?error=Something Went Wrong, Try Again.');
						}
					}
					else{
						header('location: ../cart.php?error=Something Went Wrong, Try Again.');
					}
				}
				else{
					header('location: ../cart.php?error=Something Went Wrong, Try Again.');
				}
			}
			else{
				header('location: ../cart.php?error=Something Went Wrong, Try Again.');
			}

			//1.9 Get products from cart (from session)
			foreach($_SESSION['cart'] as $key => $value){
				$product = $_SESSION['cart'][$key];
				$productid = $product['fldproductid'];
				$productsellersid = $product['fldproductsellersid'];
				$_SESSION['fldproductname'] = $productname = $product['fldproductname'];
				$_SESSION['fldproductimage'] = $productimage = $product['fldproductimage'];
				$_SESSION['fldproductprice'] = $productprice = $product['fldproductprice'];
				$_SESSION['fldproductquantity'] = $productquantity = $product['fldproductquantity'];
				$productdiscount = $product['fldproductdiscount'];

				//1.9.1 insert each single item in Orders Items Table
				$stmt7 = $conn->prepare("INSERT INTO orderitems (fldorderid,fldproductid,fldproductsellersid,fldproductname,fldproductdiscount,fldproductimage,fldproductprice,fldproductquantity,fldshippingid,fldbillingidnumber,fldorderdate)
				VALUES (?,?,?,?,?,?,?,?,?,?,?)");
				$stmt7->bind_param('iiisssiiiss',$orderid,$productid,$productsellersid,$productname,$productdiscount,$productimage,$productprice,$productquantity,$shippingid,$billingidnumber,$orderdate);
				if($stmt7->execute()){

				}
				else{
					header('location: ../cart.php?error=Something Went Wrong, Try Again.');
				}
			}
		}
		else{//Email is Wrong Or not in Database
			//1.1.1 insert in User Table
			$_SESSION['flduserimage'] = $userimage = $_POST['flduserimage'];
			$stmt = $conn->prepare("INSERT INTO users (flduserimage,flduserfirstname,flduserlastname,flduseraddressline1,flduseraddressline2,flduserpostalcode,fldusercity,fldusercountry,flduseremail,flduserphonenumber,flduseridnumber)
			VALUES(?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param('sssssssssss',$userimage,$userfirstname,$userlastname,$useraddressline1,$useraddressline2,$userpostalcode,$usercity,$usercountry,$useremail,$userphonenumber,$useridnumber);

			//1.2.1 insert in Billing Table
			$stmt1 = $conn->prepare("INSERT INTO customerbillingaddress (fldorderid,fldbillingfirstname,fldbillinglastname,fldbillingaddressline1,fldbillingaddressline2,fldbillingpostalcode,fldbillingcity,fldbillingcountry,fldbillingemail,fldbillingphonenumber,fldbillingidnumber)
			VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt1->bind_param('issssssssss',$orderid,$billingfirstname,$billinglastname,$billingaddressline1,$billingaddressline2,$billingpostalcode,$billingcity,$billingcountry,$billingemail,$billingphonenumber,$billingidnumber);

			//1.3.1 insert in Customer Shipping Table
			$stmt2 = $conn->prepare("INSERT INTO customershippingaddress (fldorderid,fldshippingfirstname,fldshippinglastname,fldshippingaddressline1,fldshippingaddressline2,fldshippingpostalcode,fldshippingcity,fldshippingcountry,fldshippingemail,fldshippingphonenumber,fldshippingdeliverycomment)
			VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt2->bind_param('issssssssss',$orderid,$shippingfirstname,$shippinglastname,$shippingaddressline1,$shippingaddressline2,$shippingpostalcode,$shippingcity,$shippingcountry,$shippingemail,$shippingphonenumber,$shippingdeliverycomment);

			//1.4.1 Insert In Testimonials Table
			$stmt3 = $conn->prepare("INSERT INTO testimonials (fldtestimonialsimage,fldtestimonialsfirstname,fldtestimonialslastname,fldtestimonialsemail)
			VALUES(?,?,?,?)");
			$stmt3->bind_param('ssss',$testimonialsimage,$testimonialsfirstname,$testimonialslastname,$testimonialsemail);

			// Get Product Sellers Id in Session Cart Array
			$productsellersid = 0;
			foreach($_SESSION['cart'] as $key => $value){
				$product = $_SESSION['cart'][$key];
				$productsellersid = $productsellersid.",".$product['fldproductsellersid'];
			}
			
			//1.5.1 Insert In Orders Table
			$stmt4 = $conn->prepare("INSERT INTO orders (fldproductsellersid,fldordercost,fldcouriercost,fldproductdiscountcode,fldorderstatus,flduserid,fldshippingid,fldbillingidnumber,fldbillingphonenumber,fldshippingphonenumber,fldshippingcity,fldshippingcountry,fldshippingaddressline1,fldshippingaddressline2,fldorderdate,fldshippingdeliverycomment)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt4->bind_param('siissiisssssssss',$productsellersid,$ordercost,$couriercost,$discountcode,$orderstatus,$userid,$shippingid,$billingidnumber,$billingphonenumber,$shippingphonenumber,$shippingcity,$shippingcountry,$shippingaddressline1,$shippingaddressline2,$orderdate,$shippingdeliverycomment);

			//1.8 Update Billing & Shipping Address Table With Order Id Syncronization
			$stmt5 = $conn->prepare("UPDATE customerbillingaddress SET fldorderid = ? WHERE fldorderid = -1 AND fldbillingemail = ?");
			$stmt5->bind_param('is',$orderid,$billingemail);

			$stmt6 = $conn->prepare("UPDATE customershippingaddress SET fldorderid = ? WHERE fldorderid = -1 AND fldshippingemail = ?");
			$stmt6->bind_param('is',$orderid,$shippingemail);

      if($stmt->execute()){
				//1.1.2Issue New User and store User info in database
				$_SESSION['flduserid'] = $userid = $stmt->insert_id;
				if($stmt1->execute()){
					//1.2.2Issue New Billing and store Billing info in database
					$_SESSION['fldbillingid'] = $billingid = $stmt1->insert_id;
					if($stmt2->execute()){
						//1.3.2Issue New Shipping and store Shipping info in database
						$_SESSION['fldshippingid'] = $shippingid = $stmt2->insert_id;
						if($stmt3->execute()){
							//1.4.1Issue New Testimonials Id and store Testimonials info in database
							$_SESSION['fldtestimonialsid'] = $testimonialsid = $stmt3->insert_id;
							if($stmt4->execute()){
								//1.5.1 Issue New Order and store Order info in database
								$_SESSION['fldorderid'] = $orderid = $stmt4->insert_id;
								if($stmt5->execute()){
									if($stmt6->execute()){
										
									}
									else{
										header('location: ../cart.php?error=Something Went Wrong, Try Again.');
									}	
								}
								else{
									header('location: ../cart.php?error=Something Went Wrong, Try Again.');
								}
							}
							else{
								header('location: ../cart.php?error=Something Went Wrong, Try Again.');
							}
						}
						else{
							header('location: ../cart.php?error=Something Went Wrong, Try Again.');
						}
					}
					else{
						header('location: ../cart.php?error=Something Went Wrong, Try Again.');
					}
				}
				else{
					header('location: ../cart.php?error=Something Went Wrong, Try Again.');
				}
      }
			else{
				header('location: ../cart.php?error=Something Went Wrong, Try Again.');
			}

			//1.9 Get products from cart (from session)
			foreach($_SESSION['cart'] as $key => $value){
				$product = $_SESSION['cart'][$key];
				$productid = $product['fldproductid'];
				$productsellersid = $product['fldproductsellersid'];
				$_SESSION['fldproductname'] = $productname = $product['fldproductname'];
				$_SESSION['fldproductimage'] = $productimage = $product['fldproductimage'];
				$_SESSION['fldproductprice'] = $productprice = $product['fldproductprice'];
				$_SESSION['fldproductquantity'] = $productquantity = $product['fldproductquantity'];
				$productdiscount = $product['fldproductdiscount'];
				
				//1.9.1 insert each single item in Orders Items Table
				$stmt7 = $conn->prepare("INSERT INTO orderitems (fldorderid,fldproductid,fldproductsellersid,fldproductname,fldproductdiscount,fldproductimage,fldproductprice,fldproductquantity,fldshippingid,fldbillingidnumber,fldorderdate)
				VALUES (?,?,?,?,?,?,?,?,?,?,?)");
				$stmt7->bind_param('iiisssiiiss',$orderid,$productid,$productname,$productdiscount,$productimage,$productprice,$productquantity,$shippingid,$billingidnumber,$orderdate);
				if($stmt7->execute()){

				}
				else{
					header('location: ../cart.php?error=Something Went Wrong, Try Again.');
				}
			}
		}
		//Store Other Important Info In Session
		$_SESSION['protectpaymentpage'] = $_POST['protectpaymentpage'];
		$_SESSION['checkoutbtn'] = $_POST['checkoutbtn'];
		//go to Payment Page
		header('location: ../payment.php?fldorderid='.$orderid);
  }
	else{
		header('location: ../cart.php?error=Something Went Wrong, Try Again.');
	}
}
