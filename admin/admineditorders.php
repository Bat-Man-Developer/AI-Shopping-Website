<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
  header('location: adminlogin.php');
  exit;
}
else{
  //Check For Order Id
  if(isset($_GET['fldorderid'])){
    $productid = $_GET['fldorderid'];
  }
  else{
    header('location: dashboard.php');
  }
}
include('adminserver/getadmineditorders.php');
?>
  <body>
    <!--------- Admin-Edit Product-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Edit Orders</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="admineditorderstablecontainer">
              <!--------- edit product form ------------>
              <div class="max-auto container">
                <div class="admineditorderstable">
                  <?php foreach($editorders as $order){?>
                  <p><?php echo $order['fldorderid']; ?></p>
                  <p>R<?php echo $order['fldordercost']; ?></p>
                  <p><?php echo $order['fldorderstatus']; ?></p>
                  <p><?php echo $order['fldshippingaddressline1']; ?></p>
                </div>
                <form id="admineditordersform" method="POST" action="admineditorders.php" style="text-align: center;">
                  <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                  <div class="form-group">
                    <label>Order Status
                      <select class="form-select" required name="fldorderstatus">
                        <option value="Not Paid" <?php if($order['fldorderstatus'] == "Not Paid"){ echo "selected";}?>>Not Paid</option>
                        <option value="Paid" <?php if($order['fldorderstatus'] == "Paid"){ echo "selected";}?>>Paid</option>
                        <option value="Shipped" <?php if($order['fldorderstatus'] == "Shipped"){ echo "selected";}?>>Shipped</option>
                        <option value="Delivered" <?php if($order['fldorderstatus'] == "Delivered"){ echo "selected";}?>>Delivered</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Shipping Address
                      <input type="text" class="form-control" name="fldshippingaddressline1" value="<?php echo $order['fldshippingaddressline1']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Shipping City
                      <input type="text" class="form-control" name="fldshippingcity" value="<?php echo $order['fldshippingcity']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Shipping Country
                      <input type="text" class="form-control" name="fldshippingcountry" value="<?php echo $order['fldshippingcountry']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="fldorderid" value="<?php echo $order['fldorderid']; ?>"/>
                    <input class="btn" id="admineditbtn" name="admineditordersbtn" type="submit" value="Edit" style="width: 270px;" required/>
                    <a id="helpurl" href="Help.php"><br>Need Help?</a>
                  </div>
                  <?php }?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>