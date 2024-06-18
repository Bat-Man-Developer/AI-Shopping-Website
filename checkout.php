<?php

session_start();

//if cart is empty then take user to home page
if(empty($_SESSION['cart'])){
  header('location: index.php');
  exit;
}

include('server/getcheckout.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mary Rose Address & Billing</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" href="assets/styles/stylecheckout.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
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
        var country = $('#billingcountry option:selected').val();
        $('#shippingcountry option[value=' + country + ']').attr('selected','selected');
        $('#shippingemail').val($('#billingemail').val());
        $('#shippingphonenumber').val($('#billingphonenumber').val());
        $('#shippingidnumber').val($('#billingidnumber').val());
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
        $('#shippingcountry option[value=""]').attr('selected','selected');
        $('#shippingemail').val("");
        $('#shippingphonenumber').val("");
        $('#shippingidnumber').val("");
        };
      });
      });
    </script>
  </head>
  <body>
    <header class="bg-dark" style="height: 60px; padding: 5px;">
      <h3 class="text-light" style="text-align: center;">Shipping & Billing Address</h3>
    </header>
    <div class="container bg-dark">
    <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-2"></div>  
    <div class="col-sm-6 bg-light boxStyle">
      <section>

        <form name="checkoutaddressform" id="checkoutform" method="POST" action="checkout.php">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" id="billingfirstname" name="fldbillingfirstname" placeholder="Billing First Name" required/>
            <span class="error">* <?php //echo $billing_first_nameErr;?></span>
          </div>
          <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" id="billinglastname" name="fldbillinglastname" placeholder="Billing Last Name" required/>
            <span class="error">* <?php //echo $billing_last_nameErr;?></span>
          </div>
          <div class="form-group">
            <label>Address line 1</label>
            <input type="text" class="form-control" id="billingaddressline1" name="fldbillingaddressline1" placeholder="Billing Address line 1" required/>
            <span class="error">* <?php //echo $billing_address_line1Err;?></span>
          </div>
          <div class="form-group">
            <label>Address line 2</label>
            <input type="text" class="form-control" id="billingaddressline2" name="fldbillingaddressline2" placeholder="Billing Address line 2"/>
            <span class="error"></span>
          </div>
          <div class="form-group">
            <label>Postal Code</label>
            <input type="text" class="form-control" id="billingpostalcode" name="fldbillingpostalcode" placeholder="Billing Postal Code"  required/>
            <span class="error">* <?php //echo $billing_postal_codeErr;?></span>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" id="billingcity" name="fldbillingcity" placeholder="Billing City"  required/>
            <span class="error">* <?php //echo $billing_cityErr;?></span>
          </div>
          <div class="form-group">
            <label>Country</label>
            <select class="form-control" id="billingcountry" name="fldbillingcountry" size="1" value="">
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
            </select><span class="error">* <?php //echo $billing_countryErr;?></span>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="billingemail" name="fldbillingemail" placeholder="Billing Email" required/>
            <span class="error">* <?php //echo $billing_emailErr;?></span>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" id="billingphonenumber" name="fldbillingphonenumber" placeholder="Billing Phone Number" required/><span class="error">* <?php //echo $billing_phone_numberErr;?></span>
          </div>
          <div class="form-group">
            <label>ID Number</label>
            <input type="text" class="form-control" id="billingidnumber" name="fldbillingidnumber" placeholder="Billing ID Number" required/>
            <span class="error">* <?php //echo $billing_idErr;?></span>
          </div><br><br>
          <p><b>Shipping Information<label><input name="check_address" type="checkbox" value="" id="check-address" value="<?php echo $check_address;?>"> Same as Billing Information?</label></b></p> 
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" id="shippingfirstname" name="fldshippingfirstname" placeholder="Shipping First Name" required/>
            <span class="error">* <?php //echo $shipping_first_nameErr;?></span>
          </div>
          <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" id="shippinglastname" name="fldshippinglastname" placeholder="Shipping Last Name" required/>
            <span class="error">* <?php //echo $shipping_last_nameErr;?></span>
          </div>
          <div class="form-group">
            <label>Address line 1</label>
            <input type="text" class="form-control" id="shippingaddressline1" name="fldshippingaddressline1" placeholder="Shipping Address line 1" required/>
            <span class="error">* <?php //echo $shipping_address_line1Err;?></span>
          </div>
          <div class="form-group">
            <label>Address line 2</label>
            <input type="text" class="form-control" id="shippingaddressline2" name="fldshippingaddressline2" placeholder="Shipping Address line 2"/>
            <span class="error"></span>
          </div>
          <div class="form-group">
            <label>Postal Code</label>
            <input type="text" class="form-control" id="shippingpostalcode" name="fldshippingpostalcode" placeholder="Shipping Postal Code"  required/>
            <span class="error">* <?php //echo $shipping_postal_codeErr;?></span>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" id="shippingcity" name="fldshippingcity" placeholder="Shipping City"  required/>
            <span class="error">* <?php //echo $shipping_cityErr;?></span>
          </div>
          <div class="form-group">
            <label>Country</label>
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
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="shippingemail" name="fldshippingemail" placeholder="Shipping Email" required/>
            <span class="error">* <?php //echo $shipping_emailErr;?></span>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" id="shippingphonenumber" name="fldshippingphonenumber" placeholder="Shipping Phone Number" required/><span class="error">* <?php //echo $shipping_phone_numberErr;?></span>
          </div>
          <div class="form-group">
            <label>Delivery Comment</label>
            <input type="text" class="form-control" id="shippingdeliverycomment" name="fldshippingdeliverycomment" placeholder="Delivery Comment"/>
          </div>  
          <div class="form-group">
            <div class="row">
              <div class="floatR"><br/>
              <p style="font-size: 18px; font-family: verdana; font-weight: 100px">Total Amount: R <?php echo $_SESSION['total']; ?></p>
              <input name="checkoutbtn" id="submit" class="AddressSubmit" type="submit" value="Proceed to Payment"></div> 
            </div>
          </div>
        </form> 
    </section>     
    </div>
  </body>
</html>