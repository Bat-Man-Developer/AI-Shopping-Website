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
    <!--------- Admin-Products-Approvals-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Products Approvals</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="adminproductstablecontainer">
              <table class="adminproductstable">
                <thead>
                  <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Department</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Product Stock</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Discount</th>
                    <th scope="col">View Product</th>
                    <th scope="col">Approve Product</th>
                    <th scope="col">Reject Product</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include('adminserver/getadminproductsapprovals.php');
                    foreach($products as $product){?>
                  <tr>
                    <td><?php echo $product['fldapproveproductid']; ?></td>
                    <td><img src="<?php echo "../../assets/images/". $product['fldapproveproductimage']; ?>"></td>
                    <td><?php echo $product['fldapproveproductname']; ?></td>
                    <td><?php echo $product['fldapproveproductdepartment']; ?></td>
                    <td><?php echo $product['fldapproveproductcategory']; ?></td>
                    <td><?php echo $product['fldapproveproducttype']; ?></td>
                    <td><?php echo $product['fldapproveproductstock']; ?></td>
                    <td><?php echo $product['fldapproveproductprice']; ?></td>
                    <td><?php echo $product['fldapproveproductdiscount']*100; ?>%</td>
                    <td><a class="btn btn-primary" href="<?php echo "adminviewproductapproval.php?fldapproveproductid=".$product['fldapproveproductid']."&fldapproveproductname=".$product['fldapproveproductname'];?>">View Product</a></td>

                    <td><a class="btn btn-primary" href="adminapproveproduct.php?fldapproveproductid=<?php echo $product['fldapproveproductid']; ?>">Approve</a></td>
                    <td><a class="btn btn-danger" href="adminrejectproduct.php?fldapproveproductid=<?php echo $product['fldapproveproductid']; ?>">Reject</a></td>
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