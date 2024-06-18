<?php
include('layouts/header.php');
?>
  </div>
</div>

<section class="departmentspage">
	<div id="departmentsbiggercontainer" class="my-5 py-5 ms-2">
		<div class="container mt-5 py-5">
			<p>Search Departments</p>
			<hr>
		</div>
		<form method="POST" action="products.php" id="departmentsform">
			<div class="departmentscontainer">
				<div>
					<div class="form-check">
						<label>Automotive
							<select name="fldproducttype" id="type1">
							  <option value="">no selection...</option>
							  <option value="Vehicle Maintanence">Vehicle Maintanence</option>
								<option value="Vehicle Security">Vehicle Security</option>
								<option value="In-Car Entertainment">In-Car Entertainment</option>
								<option value="Accessories">Accessories</option>
								<option value="Baby Travel">Baby Travel</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>DIY
							<select name="department" id="type2">
							  <option value="">no selection...</option>
							  <option value="Hadware">Hadware</option>
								<option value="Tools & Machinery">Tools & Machinery</option>
								<option value="Electrical">Electrical</option>
								<option value="Lighting">Lighting</option>
								<option value="Load-shedding">Load-shedding</option>
								<option value="Paint">Paint</option>
								<option value="Home Security">Home Security</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
					  <label>Baby, Toddler & Kids
							<select name="department" id="type3">
							  <option value="">no selection...</option>
							  <option value="Baby Essentials">Baby Essentials</option>
								<option value="Baby Food & Feeding">Baby Food & Feeding</option>
								<option value="Baby Bathing & Changing">Baby Bathing & Changing</option>
								<option value="Baby Health & Saftey Essentials">Baby Health & Saftey Essentials</option>
								<option value="Baby Travel">Baby Travel</option>
								<option value="Indoor Toys">Baby, Toddler & Kidz Toys</option>
								<option value="Nursery Furniture & Bedding">Nursery Furniture & Bedding</option>
								<option value="Activity & Feeding Chairs">Activity & Feeding Chairs</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
					  <label>Health, Beauty & Personal Care
							<select name="department" id="type4">
							  <option value="">no selection...</option>
							  <option value="Personal Care">Personal Care</option>
								<option value="Bath & Shower">Bath & Shower</option>
								<option value="Dental Care">Dental Care</option>
								<option value="Feminine Care">Feminine Care</option>
								<option value="Men's Grooming">Men's Grooming</option>
								<option value="Hair & Skin Care">Hair & Skin Care</option>
								<option value="Health Care & Vitamins">Health Care & Vitamins</option>
								<option value="Baby Care">Baby Care</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Sports, Outdoors & Healthy Living
							<select name="department" id="type5">
							  <option value="">no selection...</option>
							  <option value="Wheel Sports">Wheel Sports</option>
								<option value="Fitness Equipment & Nutrition">Fitness Equipment & Nutrition</option>
								<option value="Sports">Sports</option>
								<option value="Camping & Braai">Camping & Braai</option>
								<option value="Luggage">Luggage</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
					  <label>Clothing, Shoes & Accessories
							<select name="department" id="type6">
							  <option value="">no selection...</option>
							  <option value="T-Shirt">T-Shirt</option>
								<option value="Pants">Pants</option>
								<option value="Jackets">Jackets</option>
								<option value="Jerseys">Jerseys</option>
								<option value="Underwear">Underwear</option>
								<option value="Socks">Socks</option>
								<option value="Shoes">Shoes</option>
								<option value="Jewellery">Jewellery</option>
								<option value="Caps & Hats">Caps & Hats</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
					<label>Electronics & Devices
							<select name="department" id="type7">
							  <option value="">no selection...</option>
							  <option value="TV">TV</option>
								<option value="Speakers">Speakers</option>
								<option value="Phones">Phones</option>
								<option value="Laptops">Laptops</option>
								<option value="Tablets">Tablets</option>
								<option value="Wearable Tech">Wearable Tech</option>
								<option value="Computers">Computers</option>
								<option value="Gaming">Gaming</option>
								<option value="Headphones">Headphones</option>
								<option value="Data Storage">Data Storage</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Garden, Pool & Patio
							<select name="department" id="type8">
							  <option value="">no selection...</option>
							  <option value="Garden Tools & Machinery">Garden Tools & Machinery</option>
								<option value="Garden Care">Garden Care</option>
								<option value="Braai & Patio">Braai & Patio</option>
								<option value="Pool">Pool</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Home & Appliances
							<select name="department" id="type9">
							  <option value="">no selection...</option>
							  <option value="Kitchen Large Appliances">Kitchen Large Appliances</option>
								<option value="Kitchen Small Appliances">Kitchen Small Appliances</option>
								<option value="Dishwashers">Dishwashers</option>
								<option value="Washers & Dryers">Washers & Dryers</option>
								<option value="Heating, Cooling & Air Care">Heating, Cooling & Air Care</option>
								<option value="Water Purification & Soda Machines">Water Purification & Soda Machines</option>
								<option value="Floor Care">Floor Care</option>
								<option value="Sewing">Sewing</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Home & Furniture
							<select name="department" id="type10">
							  <option value="">no selection...</option>
							  <option value="Furniture">Furniture</option>
								<option value="Home Furnishings & Beddings">Home Furnishings & Beddings</option>
								<option value="Home Decor">Home Decor</option>
								<option value="Bathroom">Bathroom</option>
								<option value="Kitchen & Dining">Kitchen & Dining</option>
								<option value="Storage & Organisers">Storage & Organisers</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Household Essentials
							<select name="department" id="type11">
							  <option value="">no selection...</option>
							  <option value="Laundry">Laundry</option>
								<option value="Cleaning Supplies">Cleaning Supplies</option>
								<option value="Kitchen & Dining">Kitchen & Dining</option>
								<option value="Cookware">Cookware</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Office, Stationery & Books
							<select name="department" id="type12">
							  <option value="">no selection...</option>
							  <option value="Office Supplies">Office Supplies</option>
								<option value="Books">Books</option>
								<option value="Printing">Printing</option>
								<option value="School Supplies">School Supplies</option>
								<option value="Arts Craft & Sewing">Arts Craft & Sewing</option>
								<option value="Heating, Cooling & Air Care">Heating, Cooling & Air Care</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Pets
							<select name="department" id="type13">
							  <option value="">no selection...</option>
							  <option value="Office Supplies">Pet Food</option>
								<option value="Books">Pet Care</option>
								<option value="Printing">Pet Accessories</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Party & Ocassions
							<select name="department" id="type14">
								<option value="">no selection...</option>
								<option value="Party Supplies">Party Supplies</option>
								<option value="Gift Wraps">Gift Wraps</option>
							</select>
						</label>
					</div><br><br>
					<div class="form-check">
						<label>Liquor
							<select name="department" id="type15">
								<option value="">no selection...</option>
								<option value="Wine">Wine</option>
								<option value="Vodka">Vodka</option>
								<option value="Whiskey">Whiskey</option>
								<option value="Gin">Gin</option>
								<option value="Beer">Beer</option>
								<option value="Tequilla">Tequilla</option>
							</select>
						</label>
					</div><br><br>
				</div>
			<!---------Search Products Button--------->
			<div class="row">
				<input type="submit" name="search" value="Search" id="searchbtn" class="btn">
			</div>

		</form>
	</div>
</section> 
<?php
include('layouts/footer.php');
?>