<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
  header('location: adminlogin.php');
  exit;
}
else{
  //Check For Product Id GET or POST request
  if(isset($_GET['fldapproveproductid']) || isset($_POST['fldapproveproductid'])){
    if(isset($_GET['fldapproveproductid'])){
      $productid = $_GET['fldapproveproductid'];
    }
    elseif(isset($_POST['fldapproveproductid'])){
      $productid = $_POST['fldapproveproductid'];
    }
    else{
      header('location: dashboard.php?errormessage=No product id found.');      
    }
  }
  else{
    header('location: dashboard.php?errormessage=No product id found.');
  }
}
include('adminserver/getadminviewproductapproval.php');
?>
  <body>
    <!--------- Admin-View-Product-Approval-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>View Product Approval</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="admineditproductstablecontainer">
              <!--------- view product approval------------>
              <div class="max-auto container">
                <div class="admineditproductstable">
                  <?php foreach($viewproductsapprovals as $product){?>
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