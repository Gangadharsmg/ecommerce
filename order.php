<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Project</title>
<?php include 'header.php';
?>   
<!--start-content-->
<!-- products -->
	<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-8 products-single">
				<div class="col-md-5 grid-single">		
						<div class="flexslider">
							  <ul class="slides">							  
								<?php 
								include 'connection.php';
								$product_id = $_GET['p'];
								$sql = " SELECT * FROM products ";
								$sql = " SELECT * FROM products WHERE p_id = $product_id";
								if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
								while($row = mysqli_fetch_assoc($result)) 
								{
								echo '
									<li data-thumb="'.$row['p_image'].'">
										<div class="thumb-image"> <img src="'.$row['p_image'].'" data-imagezoom="true" class="img-responsive" alt=""/> </div>
									</li>
									<li data-thumb="'.$row['p_image'].'">
										<div class="thumb-image"> <img src="'.$row['p_image'].'" data-imagezoom="true" class="img-responsive" alt=""/> </div>
									</li>
									<li data-thumb="'.$row['p_image'].'">
									<div class="thumb-image"> <img src="'.$row['p_image'].'" data-imagezoom="true" class="img-responsive" alt=""/> </div>
									</li> 	
									</ul>
								</div>';
								?>
									<!-- FlexSlider -->
									<script src="js/imagezoom.js"></script>
									<script defer src="js/jquery.flexslider.js"></script>
									<script>
									// Can also be used with $(document).ready()
									$(window).load(function() {
									  $('.flexslider').flexslider({
										animation: "slide",
										controlNav: "thumbnails"
									  });
									});
									</script>
								<?php 
								echo '
								</div>	
								<div class="col-md-7 single-text">
									<div class="details-left-info simpleCart_shelfItem">
									<form action="order_confirm.php" method="post">
									<fieldset>
									<h2>Enter your details:</h2>
									<br>
									<h4>Full Name:-</h4> <input type="text" size="30" name="fullname" pattern="[a-zA-Z]+" title="Only alphabets allowed" required><br><br>
									<h4>Shipping Address:-</h4> <textarea rows="3" cols="30" name="address" required></textarea><br><br>
									<h4>Pin Code:-</h4> <input type="text" size="6" name="pincode" pattern="\d{6}" title="6 digit postal code" required><br><br>
									<h4>City:-</h4> <input type="text" size="15" name="city" pattern="[a-zA-Z]+" title="Only alphabets allowed" required><br><br>
									<h4>State:-</h4> <input type="text" size="30" name="state" pattern="[a-zA-Z]+" title="Only alphabets allowed" required><br><br>
									<h4>Mobile No.:-</h4> <input type="tel" name="mobile" pattern="[\+]\d{12}" require title="Format: +91XXXXXXXXXX" value="+91" required>
									<br><br>
									<h2>Payment Method:</h2> <br>
									
									<label class="radio"><input type="radio" name="payment_type" value="0">Cash on delivery (COD)</label>
									<label class="radio"><input type="radio" name="payment_type" value="1">Card payment </label><br>
									';
									echo ".<input type='text' name='product_id' value='$product_id' hidden>";	
									echo '
									<button type="submit">Order Now</button>
									</form>	
									<div class="clearfix"> </div>
									<div class="single-but item_add">
									<a href="#"></a>				
									</div>
									</div>
								</div>';
								$_SESSION['p_id'] = $row['p_id'];
								}
								} 
								?>	
								<div class="clearfix"></div>
	</div>
	<div class="col-md-4 products-grid-right">
					<div class="w_sidebar">
						<div class="w_nav1">
							<h4><a href="#">Your Product:</a></h4>
							<ul>
								<li>
								<?php 
								include 'connection.php';
								$product_id = $_GET['p'];
								$sql = " SELECT * FROM products ";
								$sql = " SELECT * FROM products WHERE p_id = $product_id";
								if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
								echo '								
								<h1>'.$row['p_name'].'</h1><br><h2><a href="#">Price:</a></h2><h2><span>Rs. '.$row['p_price'].'</span></h1>';
								}
								}
								?></li>
								<li></li>
								<li></li>
							</ul>	
						</div>
						<section  class="sky-form">
							<h4></h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
								</div>
							</div>
						</section>
					</div>
				</div>
				<div class="clearfix"></div>
<?php include 'relatedproduct.php';
?>	 
<?php include 'footer.php';
?>
	 
	 
</body>
</html>	