<?php
session_start();
//Protect Payment Page
if(isset($_SESSION['protectpaymentpage'])){
  if($_SESSION['protectpaymentpage'] == "unlockpage"){
    //Unset Other Important Info
    unset($_SESSION['protectpaymentpage']);
  }
  else{
    header('location: cart.php');    
  }
}
else{
  header('location: cart.php');
}
//if user did not fill in checkout address details take them to home page
if(!isset($_SESSION['checkoutbtn'])){
  if(!isset($_POST['orderdetailsbtn'])){
    header('location: index.php');
    exit;
  }
  else{
    $_SESSION['fldcouriercost'] = $couriercost = $_POST['fldcouriercost'];
    $ordercost = $_POST['fldordercost'];
    $orderstatus = $_POST['fldorderstatus'];
  }
}

if(isset($_POST['fldorderid'])){
  $_SESSION['fldorderid'] = $_POST['fldorderid'];
}
else if(isset($_GET['fldorderid'])){
  $_SESSION['fldorderid'] = $_GET['fldorderid'];
}
else{
  header('location: ../cart.php?error=Something Went Wrong!! Contact Support Team. No Order Id Detected 404');
}

include('server/getpayment.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSSA Payment</title>
    <link rel="stylesheet" href="assets/styles/stylepayment.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  </head>
  <body>
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment</h2>
        <hr class="mx-auto">
      </div>
      <div class="billinginfo">
        <p style="text-align: center; font-size: large; font-family: Georgia">Billing Information</p><br>
        <p>Billing Full Name: <span><?php if(isset($_SESSION['fldbillingfirstname'])){ echo $_SESSION['fldbillingfirstname']; echo " "; if(isset($_SESSION['fldbillinglastname'])){ echo $_SESSION['fldbillinglastname']; }}?></span></p>
        <p>Billing Address Line 1: <span><?php if(isset($_SESSION['fldbillingaddressline1'])){ echo $_SESSION['fldbillingaddressline1']; }?></span></p>
        <p>Billing Address Line 2: <span><?php if(isset($_SESSION['fldbillingaddressline2'])){ echo $_SESSION['fldbillingaddressline2']; }?></span></p>
        <p>Billing Postal Code: <span><?php if(isset($_SESSION['fldbillingpostalcode'])){ echo $_SESSION['fldbillingpostalcode']; }?></span></p>
        <p>Billing City: <span><?php if(isset($_SESSION['fldbillingcity'])){ echo $_SESSION['fldbillingcity']; }?></span></p>
        <p>Billing Country: <span><?php if(isset($_SESSION['fldbillingcountry'])){ echo $_SESSION['fldbillingcountry']; }?></span></p>
        <p>Billing Email: <span><?php if(isset($_SESSION['fldbillingemail'])){ echo $_SESSION['fldbillingemail']; }?></span></p>
        <p>Billing Phone Number: <span><?php if(isset($_SESSION['fldbillingphonenumber'])){ echo $_SESSION['fldbillingphonenumber']; }?></span></p>
      </div>
      <div class="shippinginfo">
      <p style="text-align: center; font-size: large; font-family: Georgia">Shipping Information</p><br>
        <p>Shipping Full Name: <span><?php if(isset($_SESSION['fldshippingfirstname'])){ echo $_SESSION['fldshippingfirstname']; echo " "; if(isset($_SESSION['fldshippinglastname'])){ echo $_SESSION['fldshippinglastname']; }}?></span></p>
        <p>Shipping Address Line 1: <span><?php if(isset($_SESSION['fldshippingaddressline1'])){ echo $_SESSION['fldshippingaddressline1']; }?></span></p>
        <p>Shipping Address Line 2: <span><?php if(isset($_SESSION['fldshippingaddressline2'])){ echo $_SESSION['fldshippingaddressline2']; }?></span></p>
        <p>Shipping Postal Code: <span><?php if(isset($_SESSION['fldshippingpostalcode'])){ echo $_SESSION['fldshippingpostalcode']; }?></span></p>
        <p>Shipping City: <span><?php if(isset($_SESSION['fldshippingcity'])){ echo $_SESSION['fldshippingcity']; }?></span></p>
        <p>Shipping Country: <span><?php if(isset($_SESSION['fldshippingcountry'])){ echo $_SESSION['fldshippingcountry']; }?></span></p>
        <p>Shipping Email: <span><?php if(isset($_SESSION['fldshippingemail'])){ echo $_SESSION['fldshippingemail']; }?></span></p>
        <p>Shipping Phone Number: <span><?php if(isset($_SESSION['fldshippingphonenumber'])){ echo $_SESSION['fldshippingphonenumber']; }?></span></p>
        <p>Delivery Comment: <span><?php if(isset($_SESSION['fldshippingdeliverycomment'])){ echo $_SESSION['fldshippingdeliverycomment']; }?></span></p>
      </div>
      <div class="orderinfo">
        <div class="row">
          <p style="text-align: center; font-size: large; font-family: Georgia">Order Information</p><br>
          <?php include('server/getuserorders.php'); ?>
          <?php while($row = $userorders->fetch_assoc()) { ?>
          <span><img src="assets/images/<?php if(isset($row['fldproductimage'])){ echo $row['fldproductimage']; }?>" alt="snow"></span>
          <p><span><?php if(isset($row['fldproductname'])){ echo $row['fldproductname']; }?></span></p>
          <p><span><?php if(isset($row['fldproductprice'])){ echo $row['fldproductprice']; }?></span></p>
          <p><span><?php if(isset($row['fldproductquantity'])){ echo $row['fldproductquantity']; }?></span>x</p>
        <?php } ?>
        </div>
      </div>

      <form method="POST" action="payment.php">
        <div class="courierinfo">
          <div class="row">
            <p style="text-align: center; font-size: large; font-family: Georgia">Courier Information</p>
            <p>Delivery Date: <?php $date=date_create(date("d-m-Y"));
            date_add($date,date_interval_create_from_date_string("14 days"));
            echo date_format($date,"l jS \of F Y"); ?></p>
            <div class="form-check">
              <label class="form-check-label" style="color: red"> <?php if($_SESSION['fldcouriercost']=="100"){echo "Standard Courier R100";}else{echo "Over Night Courier R180";}?>....✔</label>
            </div><br>
          </div>
        </div>
        <div class="mx-auto container text-center" style="width: 100%; margin-top: 20px">

          <p class="totalpayment">Total Payment: R
          
          <!-- Coming from Checkout / Order Details ---->
          <?php if(isset($_POST['orderdetailsbtn']) && isset($_POST['fldordercost']) && $_POST['fldordercost'] != "0"){ echo $_POST['fldordercost'];}else if(isset($_SESSION['checkoutbtn'])){echo $_SESSION['fldordercost'];}else{echo "<p>You Dont Have An Order</p>";} ?></p>
          
          <!-- Coming from Account in Order Details ---->
          <?php if(isset($_POST['orderdetailsbtn']) && isset($_POST['fldorderstatus']) && $_POST['fldorderstatus'] == "Not Paid"){ ?>
            <?php $amount = strval($_POST['fldordercost']); ?>
            <?php $orderid = $_POST['fldorderid']; ?>
            <?php $userid = $_POST['flduserid']; ?> 

          <!-- PayPal Payment Button API Integration -->
          <div class="btn btn-primary" id="paypal-button-container" name="paymentbtn"></div>
          <?php } ?>

          <!-- Coming from Checkout ---->
          <?php if(isset($_SESSION['checkoutbtn'])){ ?>
            <?php $amount = strval($_SESSION['fldordercost']); ?>
            <?php $orderid = $_GET['fldorderid']; ?>
            <?php $userid = $_SESSION['flduserid']; ?> 

          <!-- PayPal Payment Button API Integration -->
          <div class="btn btn-primary" id="paypal-button-container" name="paymentbtn"></div>
          <?php } ?>

        </div>
      </form>
    </section><br><br><br><br><br><br><br><br><br>

    <!---------Paypal Integration ------------->

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AeHShfpEcgWNOzciJis1xLUpYa33ccwpy1pGM6F10JTJUYtfqs-VZk892swwoMTWvqrgCCY8eH2DnnqV&currency=USD"></script>
    
    <script>
      paypal.Buttons({

        // Sets up transaction when the payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $amount; ?>' //Can refrence variables or functions
              }
            }]
          });
        },

        // Finalize the transaction on the server after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            const transaction = orderData.purchase_units[0].payments.captures[0];

            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            window.location.href = "server/getpayment.php?fldtransactionid="+transaction.id+"&fldorderid="+<?php echo $orderid; ?>+"&flduserid="+<?php echo $userid; ?>;

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container');

    </script>
  </body>
</html>