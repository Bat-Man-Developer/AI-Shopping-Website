<?php
include('sellerslayouts/sellersheader.php');
//if user is not logged in then take user to login page
if(!isset($_SESSION['productsellerslogged_in'])){
  header('location: sellerslogin.php');
  exit;
}
include('sellersserver/getsellersaddproducts.php');
?>
  <body>
    <!--------- Admin-Add-Products-Page ------------>
    <section class="dashboard">
      <div class="dashboardcontainer" id="dashboardcontainer">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style="color: green"><?php if(isset($_GET['editmessage'])){ echo $_GET['editmessage']; }?></p>
          <p class="text-center" style="color: red"><?php if(isset($_GET['errormessage'])){ echo $_GET['errormessage']; }?></p>
          <h3>Add Products</h3>
          <hr class="mx-auto">
          <div class="dashboardadmininfo" id="dashboardadmininfo">
            <p>Product Owner: <span><?php if(isset($_SESSION['fldproductsellersfirstname']) && isset($_SESSION['fldproductsellerslastname'])){ echo $_SESSION['fldproductsellersfirstname']." ".$_SESSION['fldproductsellerslastname']; }?></span> Collection Address Line 1: <span><?php if(isset($_SESSION['fldproductsellersaddressline1'])){ echo $_SESSION['fldproductsellersaddressline1']; }?></span> Collection Address Line 2: <span><?php if(isset($_SESSION['fldproductsellersaddressline2'])){ echo $_SESSION['fldproductsellersaddressline2']; }?></span></p>
          </div>
          <div class="dashboardinfo">
            <div class="adminaddproductstablecontainer">
              <!--------- add product form ------------>
              <div class="adminaddproductstable">
                <form id="adminaddproductsform" enctype="multipart/form-data" method="POST" action="sellersaddproducts.php" style="text-align: center;">
                  <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                  <h1 class="admintitle" id="admintitle">Product Details</h1><br>
                  <div class="form-group">
                    <label>Product Owner
                      <input type="text" class="form-control" name="fldproductowner" placeholder="Product Owner" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Name
                      <input type="text" class="form-control" name="fldproductname" placeholder="Product Name" required/>
                    </label>
                  </div>
                  <div>
                  </div>
                  <div class="form-group">
                    <label>Product Department
                      <select class="form-select" required name="fldproductdepartment">
                        <option value="">no selction...</option>
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
                      <input type="text" class="form-control" name="fldproductcategory" placeholder="Product Category" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Type
                      <input type="text" class="form-control" name="fldproducttype" placeholder="Product Type"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Color
                      <input type="text" class="form-control" name="fldproductcolor" placeholder="Product Color"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Gender
                      <select class="form-select" name="fldproductgender">
                        <option value="">no selction...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Unisex">Unisex</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Size
                      <select class="form-select" name="fldproductsize">
                        <option value="">no selection...</option>
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
                      <select class="form-select" required name="fldproductstock">
                        <option value="">no selction...</option>
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
                      <input type="text" class="form-control" name="fldproductdescription" placeholder="Product Description" required/>
                    </label>
                  </div>
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
                    <label>Product Price
                      <input type="number" class="form-control" name="fldproductprice" placeholder="Product Price" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Discount
                      <input type="number" class="form-control" name="fldproductdiscount" placeholder="Product Discount (50%)" min="0" max="100"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Discount Code
                      <input type="text" class="form-control" name="fldproductdiscountcode" placeholder="Product Discount Code"/>
                    </label>
                  </div><br><br>
                  <h1 class="admintitle" id="admintitle">Product Specifications</h1><br>
                  <div class="form-group">
                    <label>Product Length
                      <input type="number" class="form-control" name="fldproductlength" placeholder="Product Length (mm)" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Width
                      <input type="number" class="form-control" name="fldproductwidth" placeholder="Product Width (mm)" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Height
                      <input type="number" class="form-control" name="fldproductheight" placeholder="Product Height (mm)" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Weight
                      <input type="number" class="form-control" name="fldproductweight" placeholder="Product Weight (kg)" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Fragile
                      <select class="form-select" required name="fldproductfragile">
                        <option value="">no selction...</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Special Handling Requirements
                      <input type="text" class="form-control" name="fldproductspecialhandlingreq" placeholder="Temp control for perishable goods, hazardous materials, or sensitive electronic components, etc."/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Insurance Requirements
                      <input type="text" class="form-control" name="fldproductinsurancereq" placeholder="Product being shipped is valuable or requires insurance coverage"/>
                    </label>
                  </div><br><br>
                  <h1 class="admintitle" id="admintitle">Product Collect-Deliver Details</h1><br>
                  <div class="form-group">
                    <label>Product Address Line 1
                      <input type="text" class="form-control" name="fldproductaddressline1" placeholder="Product Address Line 1" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <p id="form-optional">[optional]</p>
                    <label>Product Address Line 2
                      <input type="text" class="form-control" name="fldproductaddressline2" placeholder="Product Address Line 2"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Postal Code
                      <input type="number" class="form-control" name="fldproductpostalcode" placeholder="Product Postal Code" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product City
                      <input type="text" class="form-control" name="fldproductcity" placeholder="Product City" required/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Product Country
                      <select class="form-select" name="fldproductcountry" required>
                        <option value="">no selection...</option>
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
                    <input class="btn" id="admineditbtn" name="productsellersaddproductsbtn" type="submit" value="Add" style="width: 270px;" required/>
                    <a id="helpurl" href="Help.php"><br>Need Help?</a>
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