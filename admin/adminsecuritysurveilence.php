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
          <h3>Security Surveilence</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo" id="dashboardinfo">
            <div class="admindashboardcontainer">
              
              <div class="securitysurveilencecontainer">
                <h1>Threat Detection Dashboard</h1>
                <div class="chartcontainer">
                    <canvas id="site-visitors-chart"></canvas>
                </div>
                <div class="chartcontainer">
                    <canvas id="logs-chart"></canvas>
                </div>
                <div class="chartcontainer">
                    <canvas id="network-traffic-chart"></canvas>
                </div>
                <div class="chartcontainer">
                    <canvas id="user-behavior-chart"></canvas>
                </div>
              </div>
              <script>
                // Sample data for the charts
                const siteVisitorsData = [100, 150, 200, 250, 300, 350];
                const logsData = [50, 75, 100, 125, 150, 175];
                const networkTrafficData = [200, 250, 300, 350, 400, 450];
                const userBehaviorData = [75, 100, 125, 150, 175, 200];

                // Site Visitors Chart
                new Chart(document.getElementById("site-visitors-chart"), {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Site Visitors',
                            data: siteVisitorsData,
                            fill: false,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            tension: 0.1
                        }]
                    }
                });

                // Logs Chart
                new Chart(document.getElementById("logs-chart"), {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Logs',
                            data: logsData,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)'
                        }]
                    }
                });

                // Network Traffic Chart
                new Chart(document.getElementById("network-traffic-chart"), {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Network Traffic',
                            data: networkTrafficData,
                            fill: false,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            tension: 0.1
                        }]
                    }
                });

                // User Behavior Chart
                new Chart(document.getElementById("user-behavior-chart"), {
                    type: 'pie',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'User Behavior',
                            data: userBehaviorData,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)'
                        }]
                    }
                });
              </script>
              
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>