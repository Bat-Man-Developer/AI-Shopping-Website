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
    <!--------- Seller-Help-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <h3>New Stuff SA</h3>
          <hr class="mx-auto">
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              <div class="row" id="dashboardwelcome">
                <p>Please Contact Administrator: admin.newstuffsa@gmail.com</p><br>
                <p>Please Call +27 78 005 1495</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>