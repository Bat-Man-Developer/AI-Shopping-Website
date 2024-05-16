<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
  header('location: adminlogin.php');
  exit;
}
include('adminserver/getadmindeletesellersproducts.php');
?>
  <body>
    <!--------- Admin-Delete-Sellers-Product-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <div class="dashboardinfo">
            <div class="admindeleteproductstablecontainer">
              <!--------- delete products page ------------>
              <div class="max-auto container">
                <?php foreach($deleteproducts as $product){?>
                <img src="<?php echo "../../assets/images/". $product['fldproductimage']; ?>">
                <p><?php echo $product['fldproductname']; ?></p>
                <p>R<?php echo $product['fldproductprice']; ?></p>
                <p><?php echo $product['fldproductdepartment']; ?></p>
                <p><?php echo $product['fldproductcategory']; ?></p>
                <p><?php echo $product['fldproducttype']; ?></p>
                <div class="admindeleteproductstable">
                  <p>Are You Sure You Want To Delete The Product. Changes Made Cannot Be Undone.</p>
                    <div class="adminbtn">
                      <form method="POST" action="admindeletesellersproducts.php">
                        <input class="btn" id="cancelbtn" name="admincancelsellersproductsbtn" type="submit" value="Cancel" style="width: 270px;"/>
                        <input type="hidden" name="fldproductid" value="<?php echo $product['fldproductid']; ?>"/>
                        <input type="hidden" name="fldproductsellersid" value="<?php echo $product['fldproductsellersid']; ?>"/>
                        <input class="btn" id="deletebtn" name="admindeletesellersproductsbtn" type="submit" value="Delete" style="width: 270px;"/>
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