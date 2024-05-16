<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
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
          <h3>New Stuff SA</h3>
          <hr class="mx-auto">
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              <?php include('adminserver/getadmins.php');
              foreach($admins as $row){?>
              <div class="row" id="dashboardwelcome">
                <p>Please Contact Administrator: admin.newstuffsa@gmail.com</p><br>
                <p>Please Call +27 78 005 1495</p>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>