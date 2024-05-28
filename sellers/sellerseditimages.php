<?php
include('sellerslayouts/sellersheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['productsellerslogged_in'])){
  header('location: sellerslogin.php');
  exit;
}
else{
  //Check For Product Id
  if(isset($_GET['fldproductid'])){
    $productid = $_GET['fldproductid'];
  }
  else{
    header('location: dashboard.php');
  }
}
include('sellersserver/getsellerseditimages.php');
?>
  <body>
    <!--------- Seller-Edit-Images-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Update Images</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Product Owner: <span><?php if(isset($_SESSION['fldproductsellersfirstname']) && isset($_SESSION['fldproductsellerslastname'])){ echo $_SESSION['fldproductsellersfirstname']." ".$_SESSION['fldproductsellerslastname']; }?></span> Collection Address Line 1: <span><?php if(isset($_SESSION['fldproductsellersaddressline1'])){ echo $_SESSION['fldproductsellersaddressline1']; }?></span> Collection Address Line 2: <span><?php if(isset($_SESSION['fldproductsellersaddressline2'])){ echo $_SESSION['fldproductsellersaddressline2']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="admineditimagestablecontainer">
              <!--------- edit images form ------------>
              <div class="admineditimagestable">
                <form id="admineditimagesform" enctype="multipart/form-data" method="POST" action="sellerseditimages.php?fldproductid=<?php echo $productid; ?>" style="text-align: center;">
                  <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                  <div class="form-group">
                    <label>Product Image
                      <input type="file" class="form-control" name="fldproductimage" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Image 1
                      <input type="file" class="form-control" name="fldproductimage1" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Image 2
                      <input type="file" class="form-control" name="fldproductimage2" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Image 3
                      <input type="file" class="form-control" name="fldproductimage3" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Image 4
                      <input type="file" class="form-control" name="fldproductimage4" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Image 5
                      <input type="file" class="form-control" name="fldproductimage5" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Image 6
                      <input type="file" class="form-control" name="fldproductimage6" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <?php while($row = $product->fetch_assoc()) { ?>
                      <input type="hidden" name="fldproductname" value="<?php if(isset($row['fldproductname'])){ echo $row['fldproductname']; }else{ header('location: ../sellers/sellersproducts.php?errormessage=Error Occured, Try Again.'); }?>"/>
                      <input type="hidden" name="fldproductid" value="<?php if(isset($row['fldproductid'])){ echo $row['fldproductid']; }else{ header('location: ../sellers/sellersproducts.php?errormessage=Error Occured, Try Again.'); }?>"/>
                      <input class="btn" id="admineditbtn" name="productsellerseditimagesbtn" type="submit" value="Update" style="width: 270px;" required/>
                      <a id="helpurl" href="Help.php"><br>Need Help?</a>
                    <?php } ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br><br><br><br><br><br><br>	
  </body>
</html>