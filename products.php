<?php
include('layouts/header.php');
?>
<section>
	<div class="filterdropdown">
		<label for="filtersort">Filter</label>
		<select name="type" id="filtersort" onchange="redirectToPage(this.value)">
			<option value="">Sort...</option>
			<option value="products.php?filter=Highest - Lowest Price">Highest - Lowest Price</option>
			<option value="products.php?filter=Lowest - Highest Price">Lowest - Highest Price</option>
			<option value="products.php?filter=Highest - Lowest Rating">Highest - Lowest Rating</option>
			<option value="products.php?filter=Lowest - Highest Rating">Lowest - Highest Rating</option>
			<option value="products.php?filter=Relevance">Relevance</option>
		</select>
	</div>
	<script>
		function redirectToPage(url) {
			if (url) {
				window.location.href = url;
			}
		}
	</script>

	<hr>
	<div class="row"> 
		<?php include('server/getallproducts.php'); ?>
		<?php while($row = $allproducts->fetch_assoc()) { ?>

		<div class="displayallproducts">
			<div class="image-container">
				<p class="image-text"><?php $discount = $row['fldproductdiscount']*100; if(isset($row['fldproductdiscount']) && $discount != 0){ echo $discount."% OFF"; } ?><p>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><img class="shop-item-image" src="assets/images/<?php echo $row['fldproductimage']; ?>" alt="Snow"></a>
				<a href="<?php echo "productdetails.php?fldproductid=".$row['fldproductid']."&fldproductmostviewed=1"; ?>" title="<?php echo $row['fldproductname']; ?>"><h4><?php echo $row['fldproductname']; ?></h4></a>
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
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="page-btn">
		<span class="page-item <?php if($pagenumber <= 1){ echo 'disabled';} ?>"><a class="page-link" href="<?php if($pagenumber <= 1){ echo '#';}else{ if(isset($_SESSION['fldproductdepartment'])){ echo "?pagenumber=".($pagenumber - 1)."&fldproductdepartment=".$_SESSION['fldproductdepartment']; } if(isset($_SESSION['searchproductstring'])){ echo "?pagenumber=".($pagenumber - 1)."&searchproductstring=".$_SESSION['searchproductstring']; } }?>">Prev</a></span>

		<span class="page-item"><a class="page-link" href="<?php if($pagenumber == 1){ if(isset($_SESSION['fldproductdepartment'])){ echo "?pagenumber=".$pagenumber."&fldproductdepartment=".$_SESSION['fldproductdepartment']; } if(isset($_SESSION['searchproductstring'])){ echo "?pagenumber=".$pagenumber."&searchproductstring=".$_SESSION['searchproductstring']; } }?>">1</a></span>
		<span class="page-item"><a class="page-link" href="<?php if($pagenumber == 2){ if(isset($_SESSION['fldproductdepartment'])){ echo "?pagenumber=".$pagenumber."&fldproductdepartment=".$_SESSION['fldproductdepartment']; } if(isset($_SESSION['searchproductstring'])){ echo "?pagenumber=".$pagenumber."&searchproductstring=".$_SESSION['searchproductstring']; } }?>">2</a></span>

		<?php if($pagenumber >= 3) { ?>
			<span class="page-item"><a class="page-link" href="#">...</a></span>
		  <span class="page-item"><a class="page-link" href="<?php if($pagenumber){ if(isset($_SESSION['fldproductdepartment'])){ echo "?pagenumber=".$pagenumber."&fldproductdepartment=".$_SESSION['fldproductdepartment']; } if(isset($_SESSION['searchproductstring'])){ echo "?pagenumber=".$pagenumber."&searchproductstring=".$_SESSION['searchproductstring']; } }?>"><?php echo $pagenumber; ?></a></span>
		<?php } ?>

		<span class="page-item <?php if($pagenumber >= $totalnumberofpages){ echo 'disabled';} ?>"><a class="page-link" href="<?php if($pagenumber >= $totalnumberofpages){ echo '#';}else{ if(isset($_SESSION['fldproductdepartment'])){ echo "?pagenumber=".($pagenumber + 1)."&fldproductdepartment=".$_SESSION['fldproductdepartment']; } if(isset($_SESSION['searchproductstring'])){ echo "?pagenumber=".($pagenumber + 1)."&searchproductstring=".$_SESSION['searchproductstring']; } }?>">Next</a></span>
	</div>
</section> 
<?php
include('layouts/footer.php');
?>