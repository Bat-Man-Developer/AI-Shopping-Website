<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
  header('location: adminlogin.php');
  exit;
}
include('adminserver/getadmindeleteorders.php');
?>
  <body>
    <!--------- Admin-Edit Product-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <div class="dashboardinfo">
            <div class="admindeleteorderstablecontainer">
              <!--------- delete orders page ------------>
              <div class="max-auto container">
                <?php foreach($deleteorders as $order){?>
                <p><?php echo $order['fldorderid']; ?></p>
                <p>R<?php echo $order['fldordercost']; ?></p>
                <p><?php echo $order['fldorderstatus']; ?></p>
                <p><?php echo $order['fldorderdate']; ?></p>
                <div class="admindeleteorderstable">
                  <p>Are You Sure You Want To Delete The Order. Changes Made Cannot Be Undone.</p>
                    <div class="adminbtn">
                      <form method="POST" action="admindeleteorders.php">
                        <input class="btn" id="cancelbtn" name="admincancelordersbtn" type="submit" value="Cancel" style="width: 270px;"/>
                        <input type="hidden" name="fldorderid" value="<?php echo $order['fldorderid']; ?>"/>
                        <input class="btn" id="deletebtn" name="admindeleteordersbtn" type="submit" value="Delete" style="width: 270px;"/>
                      </form>
                    </div>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>