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
          <h3>Local Network Traffic</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              <div class="adminlocalnetworktraffictablecontainer">
                <h1 class="adminlocalnetworktraffictitle">Local Area Network (LAN) Traffic</h1>
                <h2 class="adminlocalnetworktraffictitle"><p id="localnetworktraffictime"></p></h2>
                <table class="adminlocalnetworktraffictable">
                  <thead>
                    <tr>
                      <th scope="col">Source IP</th>
                      <th scope="col">Destination IP</th>
                      <th scope="col">Protocol</th>
                      <th scope="col">Source Port</th>
                      <th scope="col">Destination Port</th>
                      <th scope="col">Length</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td id="sourceIPs"></td>
                      <td id="destinationIPs"></td>
                      <td id="protocols"></td>
                      <td id="sourcePorts"></td>
                      <td id="destinationPorts"></td>
                      <td id="lengths"></td>
                    </tr>
                  </tbody>
                </table>
                <script src="adminjs/adminlocalnetworktraffic.js"></script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>