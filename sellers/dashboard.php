<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['productsellerslogged_in'])){
  header('location: adminlogin.php');
  exit;
}
include('adminserver/getadminlogout.php');
?>
  <body>
    <!--------- Admin-Dashboard-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['registermessage'])){ echo $_GET['registermessage']; }?></p>
          <p class="text-center" style="color: green"><?php if(isset($_GET['loginmessage'])){ echo $_GET['loginmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>New Stuff SA</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Product Owner: <span><?php if(isset($_SESSION['fldproductsellersfirstname']) && isset($_SESSION['fldproductsellerslastname'])){ echo $_SESSION['fldproductsellersfirstname']." ".$_SESSION['fldproductsellerslastname']; }?></span> Collection Address Line 1: <span><?php if(isset($_SESSION['fldproductsellersaddressline1'])){ echo $_SESSION['fldproductsellersaddressline1']; }?></span> Collection Address Line 2: <span><?php if(isset($_SESSION['fldproductsellersaddressline2'])){ echo $_SESSION['fldproductsellersaddressline2']; }?></span></p>
          </div>
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              <?php include('adminserver/getadmins.php');
              foreach($admins as $row){?>
              <div class="row" id="dashboardwelcome">
                <p>SELLER NUMBER: <?php echo $row['fldproductsellersid']; ?></p><br>
                <p>WELCOME <?php echo $row['fldproductsellersfirstname']; ?></p>
                <a href="#" class="btn">Chat</a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>