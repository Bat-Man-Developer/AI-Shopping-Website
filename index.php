<?php
include('layouts/header.php');
?>
<!------------- Website Messages----------->
<p class="text-center" id="webmessage_red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
<p class="text-center" id="webmessage_green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
<!------------- offer0 ----------->
<div class="offer0">
	<div class="container">
		<div class="row">
		<!-- Below Header Intro or Banner --> 
			<div class="col-2">
				<h2>New Gen AI Shopping!</h2>
				<p>Shop with us and find everything you need.</p>
				<a href="products.php" class="btn">Explore Now &#8594;</a>
			</div>
			<div class="col-2">
				<!------ Welcome Image -------->
			</div>
	  </div>
	</div>
</div>
<!------- Promotions Slide Show ----------->
<div id="slideshow">
	<div class="slide-container">
		<p class="myslides">1st Launch Up To 50% OFF<br>
			<img class="picture" src="assets/images/slideshow/newstuffsa_advert_pic.png" alt="snow">
		</p>
		<p class="myslides">NEWSTUFF For Everyone SALE<br>
			<img class="picture" src="assets/images/slideshow/newstuffsa_advert_pic1.png" alt="now">
		</p>
		<p class="myslides">WINTER SALE UP TO 30% OFF<br>
			<img class="picture" src="assets/images/slideshow/newstuffsa_advert_pic2.png" alt="snow">
		</p>
		<p class="myslides">EVERY WEEK DEALS<br>
			<img class="picture" src="assets/images/slideshow/newstuffsa_advert_pic3.png" alt="snow">
		</p>
		<p class="myslides">10 STEPS AHEAD DEALS<br>
			<img class="picture" src="assets/images/slideshow/newstuffsa_advert_pic4.png" alt="snow">
		</p>
	</div>
	<button class="slide-button prev-button" onclick="plusDivs(-1)">&#10094;</button>
	<button class="slide-button next-button" onclick="plusDivs(1)">&#10095;</button>
</div>
<script src="js/slideshow_promotions.js"></script>

<!------- Most Sold Products ----------->
<div class="small-container">
	<h2 class="title">Most Sold Products</h2>
	<div class="row"> 
		<!---import the files--->
		<?php include('server/getmostsoldproducts.php'); ?>
		<?php while($row = $mostsoldproducts->fetch_assoc()) { ?>
		<div class="col-4">
			<div class="image-container">
				<p class="image-text"><?php $discount = $row['fldproductdiscount']*100; if(isset($row['fldproductdiscount']) && $discount != 0){ echo $discount."% OFF"; } ?><p>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><img class="shop-item-image" src="assets/images/<?php echo $row['fldproductimage']; ?>" alt="Snow">
				<h4><?php echo $row['fldproductname']; ?></h4>
				<?php if($row['fldproductmostrated'] == 0) { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 1) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 2) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 3) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 4) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 5) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
				<?php }else { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php } ?>
				<p><?php if(isset($row['fldproductprice']) && $row['fldproductdiscount'] != 0){ $discount = $row['fldproductprice']-($row['fldproductdiscount']*$row['fldproductprice']); echo "<del>WAS R".$row['fldproductprice']."</del> / "." NOW R".$discount; }else{ echo "R".$row['fldproductprice']; } ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<!------- Promotions Slide Show 1 ----------->
<div id="slideshow1">
	<div class="slide-container1">
		<p class="myslides1">WINTER SALE UP TO 30% OFF<br>
			<img class="picture1" src="assets/images/slideshow/newstuffsa_advert_pic2.png" alt="snow">
		</p>
	</div>
</div>

<!------- Most Viewed Products ----------->
<div class="small-container">
	<h2 class="title">Most Viewed Products</h2>
	<div class="row"> 
		<!---import the files--->
		<?php include('server/getmostviewedproducts.php'); ?>
		<?php while($row = $mostviewedproducts->fetch_assoc()) { ?>
		<div class="col-4">
			<div class="image-container">
				<p class="image-text"><?php $discount = $row['fldproductdiscount']*100; if(isset($row['fldproductdiscount']) && $discount != 0){ echo $discount."% OFF"; } ?><p>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><img class="shop-item-image" src="assets/images/<?php echo $row['fldproductimage']; ?>" alt="Snow">
				<h4><?php echo $row['fldproductname']; ?></h4>
				<?php if($row['fldproductmostrated'] == 0) { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 1) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 2) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 3) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 4) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 5) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
				<?php }else { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php } ?>
				<p><?php if(isset($row['fldproductprice']) && $row['fldproductdiscount'] != 0){ $discount = $row['fldproductprice']-($row['fldproductdiscount']*$row['fldproductprice']); echo "<del>WAS R".$row['fldproductprice']."</del> / "." NOW R".$discount; }else{ echo "R".$row['fldproductprice']; } ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<!------- Promotions Slide Show 2 ----------->
<div id="slideshow2">
	<div class="slide-container2">
		<p class="myslides2">EVERY WEEK DEALS<br>
			<img class="picture2" src="assets/images/slideshow/newstuffsa_advert_pic3.png" alt="snow">
		</p>
	</div>
</div>

<!------- Most Rated Products ----------->
<div class="small-container">
	<h2 class="title">Most Rated Products</h2>
	<div class="row"> 
		<!---import the files--->
		<?php include('server/getmostratedproducts.php'); ?>
		<?php while($row = $mostratedproducts->fetch_assoc()) { ?>
		<div class="col-4">
			<div class="image-container">
				<p class="image-text"><?php $discount = $row['fldproductdiscount']*100; if(isset($row['fldproductdiscount']) && $discount != 0){ echo $discount."% OFF"; } ?><p>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><img class="shop-item-image" src="assets/images/<?php echo $row['fldproductimage']; ?>" alt="Snow">
				<h4><?php echo $row['fldproductname']; ?></h4>
				<?php if($row['fldproductmostrated'] == 0) { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 1) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 2) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 3) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 4) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 5) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
				<?php }else { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php } ?>
				<p><?php if(isset($row['fldproductprice']) && $row['fldproductdiscount'] != 0){ $discount = $row['fldproductprice']-($row['fldproductdiscount']*$row['fldproductprice']); echo "<del>WAS R".$row['fldproductprice']."</del> / "." NOW R".$discount; }else{ echo "R".$row['fldproductprice']; } ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<!------- Promotions Slide Show 3 ----------->
<div id="slideshow3">
	<div class="slide-container3">
		<p class="myslides3">NEWSTUFF For Everyone SALE<br>
			<img class="picture3" src="assets/images/slideshow/newstuffsa_advert_pic1.png" alt="now">
		</p>
	</div>
</div>

<!------------- Latest products ----------->
<div class="small-container">
	<h2 class="title">Latest Products</h2>
	<div class="row"> 
		<!---import the files--->
		<?php include('server/getlatestproducts.php'); ?>
		<?php while($row = $latestproducts->fetch_assoc()) { ?>
		<div class="col-4">
			<div class="image-container">
				<p class="image-text"><?php $discount = $row['fldproductdiscount']*100; if(isset($row['fldproductdiscount']) && $discount != 0){ echo $discount."% OFF"; } ?><p>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><img class="shop-item-image" src="assets/images/<?php echo $row['fldproductimage']; ?>" alt="Snow">
				<h4><?php echo $row['fldproductname']; ?></h4>
				<?php if($row['fldproductmostrated'] == 0) { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 1) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 2) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 3) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 4) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php }else if($row['fldproductmostrated'] == 5) { ?>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
				<?php }else { ?>
					<div class="rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
				<?php } ?>
				<p><?php if(isset($row['fldproductprice']) && $row['fldproductdiscount'] != 0){ $discount = $row['fldproductprice']-($row['fldproductdiscount']*$row['fldproductprice']); echo "<del>WAS R".$row['fldproductprice']."</del> / "." NOW R".$discount; }else{ echo "R".$row['fldproductprice']; } ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<!------------- offer ----------->
<div class="offer">
	<div class="small-container">
		<div class="row">
			<!---import the files--->
			<?php include('server/getofferproducts.php'); ?>
			<?php while($row = $offerproducts->fetch_assoc()) { ?>
			<div class="col-2">
				<div class="image-container">
					<p class="image-text"><?php $discount = $row['fldproductdiscount']*100; if(isset($row['fldproductdiscount']) && $discount != 0){ echo $discount."% OFF"; } ?></p>
					<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><img class="shop-item-image" src="assets/images/<?php echo $row['fldproductimage']; ?>" class="offer-img" alt="Snow"></a>
					<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><h4><?php echo $row['fldproductname']; ?></h4></a>
				</div>
			</div>
			<div class="col-3">
				<p>Exclusively Available on our Website</p>
				<h1><?php echo $row['fldproductname']; ?></h1>
				<small>Only The Best Require The Best Available. Limited Offer.<br>
				</small>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" class="btn">Buy Now &#8594;</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<!---------- testimonials --------->
<div class="testimonials">
	<div class="small-container">
		<h2 class="title">Testimonials & Suggestions</h2>
		<h3 class="titledescription">help us improve by mentioning problems & challenges experienced in our online store.</h3><br><br><br><br><br>
		<div class="row">
			<!---import the files--->
			<?php include('server/gettestimonials.php'); ?>
			<?php while($row = $testimonials->fetch_assoc()) { ?>
			<div class="col-3">
				<i class="fa fa-quote-left"></i>
				<p><?php echo $row['fldtestimonialscomment']; ?></p>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<img src="<?php if(isset($row['fldtestimonialsimage'])){ echo "assets/images/".$row['fldtestimonialsimage']; }else{ echo "assets/images/unknownimage.png"; } ?>" alt="Snow">
				<h3><?php echo $row['fldtestimonialsemail']; ?></h3>
			</div>
			<?php } ?>
		</div>
		<div class="row">
			<a href="testimonialslogin.php" class="btn">Suggestions...</a>
	  </div>
	</div>
</div>

<!----------- brands ---------->
<div class="brands">
	<div class="small-container">
		<div class="row">
			<div class="col-5">
				<img src="assets/images/paypalpic.png" alt="Snow">
			</div>
		</div>
	</div>
</div>
<?php
include('layouts/footer.php');
?>