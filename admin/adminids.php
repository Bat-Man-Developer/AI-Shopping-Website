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
          <h3>Admin IDS</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              <div class="adminidstablecontainer">
                <div class="adminidstable">
                  <h1 class="adminlocalnetworktraffictitle">Adversarial Attack Intrusion Detection System</h1>
                  <h2 class="adminlocalnetworktraffictitle"><p id="localnetworktraffictime"></p></h2>
                  <div class="chartcontainer">
                      <canvas id="feature1Chart"></canvas>
                  </div>
                  <div class="chartcontainer">
                      <canvas id="feature2Chart"></canvas>
                  </div>
                  <div class="chartcontainer">
                      <canvas id="feature3Chart"></canvas>
                  </div>
                  <div class="chartcontainer">
                      <canvas id="feature4Chart"></canvas>
                  </div>
                  <div class="chartcontainer">
                      <canvas id="feature5Chart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>
    <script src="adminjs/adminids.js"></script>
  </body>
</html>