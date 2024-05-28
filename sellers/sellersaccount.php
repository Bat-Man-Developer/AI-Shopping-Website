<?php
include('sellerslayouts/sellersheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['productsellerslogged_in'])){
  header('location: sellerslogin.php');
  exit;
}
include('sellersserver/getsellerslogout.php');
?>
  <body>
    <!--------- Admin-Dashboard-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['registermessage'])){ echo $_GET['registermessage']; }?></p>
          <p class="text-center" style="color: green"><?php if(isset($_GET['loginmessage'])){ echo $_GET['loginmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Account</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Product Owner: <span><?php if(isset($_SESSION['fldproductsellersfirstname']) && isset($_SESSION['fldproductsellerslastname'])){ echo $_SESSION['fldproductsellersfirstname']." ".$_SESSION['fldproductsellerslastname']; }?></span> Collection Address Line 1: <span><?php if(isset($_SESSION['fldproductsellersaddressline1'])){ echo $_SESSION['fldproductsellersaddressline1']; }?></span> Collection Address Line 2: <span><?php if(isset($_SESSION['fldproductsellersaddressline2'])){ echo $_SESSION['fldproductsellersaddressline2']; }?></span></p>
          </div>
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>