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
    <!--------- Admin-Orders-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Orders</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Product Owner: <span><?php if(isset($_SESSION['fldproductsellersfirstname']) && isset($_SESSION['fldproductsellerslastname'])){ echo $_SESSION['fldproductsellersfirstname']." ".$_SESSION['fldproductsellerslastname']; }?></span> Collection Address Line 1: <span><?php if(isset($_SESSION['fldproductsellersaddressline1'])){ echo $_SESSION['fldproductsellersaddressline1']; }?></span> Collection Address Line 2: <span><?php if(isset($_SESSION['fldproductsellersaddressline2'])){ echo $_SESSION['fldproductsellersaddressline2']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="adminorderstablecontainer">
              <table class="adminorderstable">
                <thead>
                  <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Order Price</th>
                    <th scope="col">Courier Price</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">View Order Items</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include('adminserver/getadminorders.php');
                    foreach($orders as $order){?>
                  <tr>
                    <td><?php echo $order['fldorderid']; ?></td>
                    <td><?php echo $order['fldordercost']; ?></td>
                    <td><?php echo $order['fldcouriercost']; ?></td>
                    <td><?php echo $order['fldorderstatus']; ?></td>
                    <td><?php echo $order['fldorderdate']; ?></td>

                    <td id="btn"><a class="btn btn-primary" href="adminvieworders.php?fldorderid=<?php echo $order['fldorderid']; ?>&fldproductsellersid=<?php echo $_SESSION['fldproductsellersid']; ?>">View Order</a></td>
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
    </section>	
  </body>
</html>