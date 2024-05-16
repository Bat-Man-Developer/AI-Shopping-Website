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
    <!--------- Admin-Customers-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Customers</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="adminproductstablecontainer">
              <table class="adminproductstable">
                <thead>
                  <tr>
                    <th scope="col">Customer Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Customer Postal Code</th>
                    <th scope="col">Customer City</th>
                    <th scope="col">Customer Country</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Customer Phone Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include('adminserver/getadmincustomers.php');
                    foreach($customers as $customer){?>
                  <tr>
                    <td><?php echo $customer['flduserid']; ?></td>
                    <td><?php echo $customer['flduserfirstname']." ";  echo $customer['flduserlastname']; ?></td>
                    <td><?php echo $customer['flduseraddressline1']; ?></td>
                    <td><?php echo $customer['flduserpostalcode']; ?></td>
                    <td><?php echo $customer['fldusercity']; ?></td>
                    <td><?php echo $customer['fldusercountry']; ?></td>
                    <td><?php echo $customer['flduseremail']; ?></td>
                    <td><?php echo $customer['flduserphonenumber']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="page-btn">
                <span class="page-item <?php if($pagenumber <= 1){ echo 'disabled';} ?>"><a class="page-link" href="<?php if($pagenumber <= 1){ echo '#';}else{ echo "?pagenumber=".($pagenumber - 1);} ?>">Prev</a></span>

                <span class="page-item"><a class="page-link" href="?pagenumber=1">1</a></span>
                <span class="page-item"><a class="page-link" href="?pagenumber=2">2</a></span>

                <?php if($pagenumber >= 3) { ?>
                  <span class="page-item"><a class="page-link" href="#">...</a></span>
                  <span class="page-item"><a class="page-link" href="<?php echo "?pagenumber=".$pagenumber; ?>"><?php echo $pagenumber; ?></a></span>
                <?php } ?>

                <span class="page-item <?php if($pagenumber >= $totalnumberofpages){ echo 'disabled';} ?>"><a class="page-link" href="<?php if($pagenumber >= $totalnumberofpages){ echo '#';}else{ echo "?pagenumber=".($pagenumber + 1);} ?>">Next</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>