<?php
include('adminlayouts/adminheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['adminlogged_in'])){
  header('location: adminlogin.php');
  exit;
}
else{
  //Check For Product Id GET or POST request
  if(isset($_GET['fldproductid']) || isset($_POST['fldproductid'])){
    if(isset($_GET['fldproductid'])){
      $productid = $_GET['fldproductid'];
    }
    elseif(isset($_POST['fldproductid'])){
      $productid = $_POST['fldproductid'];
    }
    else{
      header('location: dashboard.php?errormessage=No product id found.');      
    }
  }
  else{
    header('location: dashboard.php?errormessage=No product id found.');
  }
}
include('adminserver/getadmineditproducts.php');
?>
  <body>
    <!--------- Admin-Edit Product-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Edit Product</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo">
            <p>Name: <span><?php if(isset($_SESSION['fldadminname'])){ echo $_SESSION['fldadminname']; }?></span> Position: <span><?php if(isset($_SESSION['fldadminposition'])){ echo $_SESSION['fldadminposition']; }?></span> Department: <span><?php if(isset($_SESSION['fldadmindepartment'])){ echo $_SESSION['fldadmindepartment']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="admineditproductstablecontainer">
              <!--------- edit product form ------------>
              <div class="max-auto container">
                <div class="admineditproductstable">
                  <?php foreach($editproducts as $product){?>
                  <img src="<?php echo "../../assets/images/".$product['fldproductimage']; ?>">
                  <p><?php echo "Owner: ".$product['fldproductowner']; ?></p>
                  <p><?php echo "Name: ".$product['fldproductname']; ?></p>
                  <p><?php echo "Price: R".$product['fldproductprice']; ?></p>
                  <p><?php echo "Stock: ".$product['fldproductstock']." left in stock"; ?></p>
                  <p><?php echo "Department: ".$product['fldproductdepartment']; ?></p>
                  <p><?php echo "Category: ".$product['fldproductcategory']; ?></p>
                  <p><?php echo "Type: ".$product['fldproducttype']; ?></p>
                  <p><?php $discount = $product['fldproductdiscount']*100; echo "Discount: ".$discount."%"; ?></p>
                  <p><?php echo "Address: ".$product['fldproductaddressline1'].", ".$product['fldproductpostalcode'].", ".$product['fldproductcity'].", ".$product['fldproductcountry']; ?></p>
                </div>
                <form id="admineditproductsform" method="POST" action="admineditproducts.php" style="text-align: center;">
                  <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                  <h1 class="admintitle" id="admintitle">Product Details</h1><br>
                  <div class="form-group">
                    <label>Product Name
                      <input type="text" class="form-control" name="fldproductname" value="<?php echo $product['fldproductname']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Department
                      <select class="form-select" required name="fldproductdepartment">
                        <option value="<?php echo $product['fldproductdepartment']; ?>"><?php echo $product['fldproductdepartment']; ?></option>
                        <option value="Automotive">Automotive</option>
                        <option value="DIY">DIY</option>
                        <option value="Baby, Toddler & Kids">Baby, Toddler & Kids</option>
                        <option value="Health, Beauty & Personal Care">Health, Beauty & Personal Care</option>
                        <option value="Sports" >Sports</option>
                        <option value="Outdoors">Outdoors</option>
                        <option value="Healthy Living">Healthy Living</option>
                        <option value="Clothing, Shoes & Accessories">Clothing, Shoes & Accessories</option>
                        <option value="Electronics & Devices">Electronics & Devices</option>
                        <option value="Garden, Pool & Patio">Garden, Pool & Patio</option>
                        <option value="Home & Appliances">Home & Appliances</option>
                        <option value="Home & Furniture">Home & Furniture</option>
                        <option value="Household Essentials">Household Essentials</option>
                        <option value="Office, Stationary & Books">Office, Stationary & Books</option>
                        <option value="Party Ocassions">Party Ocassions</option>
                        <option value="Pets">Pets</option>
                        <option value="Liquor">Liquor</option>
                        <option value="Sweets & Snacks">Sweets & Snacks</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Category
                      <input type="text" class="form-control" name="fldproductcategory" value="<?php echo $product['fldproductcategory']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Type
                      <input type="text" class="form-control" name="fldproducttype" value="<?php echo $product['fldproducttype']; ?>"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Color
                      <input type="text" class="form-control" name="fldproductcolor" value="<?php echo $product['fldproductcolor']; ?>"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Gender
                      <select class="form-select" name="fldproductgender">
                        <option value="<?php echo $product['fldproductgender']; ?>"><?php echo $product['fldproductgender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Unisex">Unisex</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Size
                      <select class="form-select" name="fldproductsize">
                        <option value="<?php echo $product['fldproductsize']; ?>"><?php echo $product['fldproductsize']; ?></option>
                        <option value="X-Small">X-Small</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="X-Large">X-Large</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Stock
                      <select class="form-select" name="fldproductstock" required>
                        <option value="<?php echo $product['fldproductstock']; ?>"><?php echo $product['fldproductstock']; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Description
                      <input type="text" class="form-control" name="fldproductdescription" value="<?php echo $product['fldproductdescription']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Price
                      <input type="number" class="form-control" name="fldproductprice" value="<?php echo $product['fldproductprice']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Discount
                      <input type="number" class="form-control" name="fldproductdiscount" value="<?php echo $product['fldproductdiscount']*100; ?>" min="0" max="100"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Discount Code
                      <input type="text" class="form-control" name="fldproductdiscountcode" value="<?php echo $product['fldproductdiscountcode']; ?>"/>
                    </label>
                  </div><br><br>
                  <h1 class="admintitle" id="admintitle">Product Specifications</h1><br>
                  <div class="form-group">
                    <label>Product Length
                      <input type="number" class="form-control" name="fldproductlength" value="<?php echo $product['fldproductlength']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Width
                      <input type="number" class="form-control" name="fldproductwidth" value="<?php echo $product['fldproductwidth']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Height
                      <input type="number" class="form-control" name="fldproductheight" value="<?php echo $product['fldproductheight']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Weight
                      <input type="number" class="form-control" name="fldproductweight" value="<?php echo $product['fldproductweight']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Fragile
                      <select class="form-select" name="fldproductfragile" required>
                        <option value="<?php echo $product['fldproductfragile']; ?>"><?php echo $product['fldproductfragile']; ?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Special Handling Requirements
                      <input type="text" class="form-control" name="fldproductspecialhandlingreq" value="<?php echo $product['fldproductspecialhandlingreq']; ?>"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Insurance Requirements
                      <input type="text" class="form-control" name="fldproductinsurancereq" value="<?php echo $product['fldproductinsurancereq']; ?>"/>
                    </label>
                  </div><br><br>
                  <h1 class="admintitle" id="admintitle">Product Collect-Deliver Details</h1><br>
                  <div class="form-group">
                    <label>Product Address Line 1
                      <input type="text" class="form-control" name="fldproductaddressline1" value="<?php echo $product['fldproductaddressline1']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Address Line 2
                      <input type="text" class="form-control" name="fldproductaddressline2" value="<?php echo $product['fldproductaddressline2']; ?>"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Postal Code
                      <input type="number" class="form-control" name="fldproductpostalcode" value="<?php echo $product['fldproductpostalcode']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product City
                      <input type="text" class="form-control" name="fldproductcity" value="<?php echo $product['fldproductcity']; ?>" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Country
                      <select class="form-control" name="fldproductcountry" required>
                        <option value="<?php echo $product['fldproductcountry']; ?>"><?php echo $product['fldproductcountry']; ?></option>
                        <option value="Australia">Australia</option>
                        <option value="Britain">Britain</option>
                        <option value="China">China</option>
                        <option value="Egypt">Egypt</option>
                        <option value="England">England</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="Italy">Italy</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Russia">Russia</option>  
                        <option value="South_Africa">South Africa</option>
                        <option value="Thailand">Thailand</option>
                        <option value="USA">USA</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="fldproductid" value="<?php echo $product['fldproductid']; ?>"/>
                    <input class="btn" id="admineditbtn" name="admineditproductsbtn" type="submit" value="Edit" required/>
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