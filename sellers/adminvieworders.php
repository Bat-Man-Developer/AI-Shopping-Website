<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['productsellerslogged_in'])){
  header('location: adminlogin.php');
  exit;
}
?>
  <body>
    <!--------- View Order Items Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <h3>View Order Items</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Product Owner: <span><?php if(isset($_SESSION['fldproductsellersfirstname']) && isset($_SESSION['fldproductsellerslastname'])){ echo $_SESSION['fldproductsellersfirstname']." ".$_SESSION['fldproductsellerslastname']; }?></span> Collection Address Line 1: <span><?php if(isset($_SESSION['fldproductsellersaddressline1'])){ echo $_SESSION['fldproductsellersaddressline1']; }?></span> Collection Address Line 2: <span><?php if(isset($_SESSION['fldproductsellersaddressline2'])){ echo $_SESSION['fldproductsellersaddressline2']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="adminvieworderitemstablecontainer">
              <table class="adminvieworderitemstable">
                <thead>
                  <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Product Id</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Discount</th>
                    <th scope="col">Product Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include('adminserver/getadminvieworderitems.php');
                    foreach($vieworderitems as $orderitems){?>
                  <tr>
                    <td><?php echo $orderitems['fldorderid']; ?></td>
                    <td><?php echo $orderitems['fldproductid']; ?></td>
                    <td><?php echo $orderitems['fldorderdate']; ?></td>
                    <td><img src="<?php echo "../assets/images/". $orderitems['fldproductimage']; ?>"></td>
                    <td><?php echo $orderitems['fldproductname']; ?></td>
                    <td><?php echo $orderitems['fldproductquantity']; ?></td>
                    <td><?php echo $orderitems['fldproductdiscount']*100; ?>%</td>
                    <td><?php echo $orderitems['fldproductprice']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>