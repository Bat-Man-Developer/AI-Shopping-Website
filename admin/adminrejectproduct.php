<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
  header('location: adminlogin.php');
  exit;
}
include('adminserver/getadminrejectproduct.php');
?>
  <body>
    <!--------- Admin-Reject-Product-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <div class="dashboardinfo">
            <div class="admindeleteproductstablecontainer">
              <!--------- Reject Product page ------------>
              <div class="max-auto container">
                <?php foreach($rejectproduct as $product){?>
                  <img src="<?php echo "../../assets/images/".$product['fldapproveproductimage']; ?>">
                <p><?php echo "Owner: ".$product['fldapproveproductowner']; ?></p>
                <p><?php echo "Name: ".$product['fldapproveproductname']; ?></p>
                <p><?php echo "Department: ".$product['fldapproveproductdepartment']; ?></p>
                <p><?php echo "Category: ".$product['fldapproveproductcategory']; ?></p>
                <p><?php echo "Type: ".$product['fldapproveproducttype']; ?></p>
                <p><?php echo "Brand: ".$product['fldapproveproductbrand']; ?></p>
                <p><?php echo "Stock: ".$product['fldapproveproductstock']." left in stock"; ?></p>
                <p><?php echo "Price: R".$product['fldapproveproductprice']; ?></p>
                <p><?php $discount = $product['fldapproveproductdiscount']*100; echo "Discount: ".$discount."%"; ?></p>
                <p><?php echo "Address: ".$product['fldapproveproductaddressline1'].", ".$product['fldapproveproductpostalcode'].", ".$product['fldapproveproductcity'].", ".$product['fldapproveproductcountry']; ?></p>
                <div class="admindeleteproductstable">
                  <p>Are You Sure You Want To Reject The Product? Changes Made Cannot Be Undone.</p>
                    <div class="adminbtn">
                      <form method="POST" action="adminrejectproduct.php">
                        <input class="btn" id="cancelbtn" name="admincancelproductbtn" type="submit" value="Cancel" style="width: 270px;"/>
                        <input type="hidden" name="fldapproveproductid" value="<?php echo $product['fldapproveproductid']; ?>"/>
                        <input class="btn" id="deletebtn" name="adminrejectproductbtn" type="submit" value="Reject" style="width: 270px;"/>
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