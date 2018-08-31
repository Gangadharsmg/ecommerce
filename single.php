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
									</div>
									';
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
										<h3>Fashion Latest</h3>
										<p class="availability">Availability: <span class="color">In stock</span></p>
										<div class="price_single">
											<span class="actual item_price">'.$row['p_name'].'--    Rs. '.$row['p_price'].'</span>
										</div>
										
										</ul>
											<div class="quantity_box">
												<span>Quantity:</span>
												<div class="product-qty">
													<select enabled>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
													<option>6</option>
													</select>
												</div>
											</div>
											<div class="clearfix"> </div>
											<div class="single-but item_add">
												<a class="item_add" href="addcart.php?mycart='.$row['p_id'].'&userid='.$id.'"><img height="42" width="100" src="images/cartaddbutn.png"></img> </a>	
												<a href="order.php?p='.$row['p_id'].'"><img height="46" width="100" src="images/cbuynw.png"></img></a>				
											</div>
										</div>
									</div>
									';
									$_SESSION['p_id'] = $row['p_id'];
									}
								} 
								?>								
		<div class="clearfix"></div>
	</div>
	<div class="col-md-4 products-grid-right">
					<div class="w_sidebar">
						<div class="w_nav1">
							<h4><a href="index.php">All</a></h4>
							<ul>
								<li><a href="headphone.php">HEADPHONE</a></li>
								<li><a href="tshirt.php">T-shirt</a></li>
								<li><a href="watches.php">Watches</a></li>
							</ul>	
						</div>
						<section  class="sky-form">
							<h4></h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
								</div>
								<div class="col col-4">									
								</div>
							</div>
						</section>
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

 <!--/start-latest-->
			<div class="collection-section">
		     <h3 class="tittle">Related Products</h3>
		   <div class="fashion-info">
				<div class="col-md-4 fashion-grids">
					<figure class="effect-bubba">
						<img src="images/f1.jpg" alt=""/>
						<figcaption>
							<h4>Ecomm Shop</h4>
							<p class="cart"><a href="headphone.php">Shop</a></p>				
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 fashion-grids">
					<figure class="effect-bubba">
						<img src="images/f5.jpg" alt=""/>
						<figcaption>
							<h4>Ecomm Shop</h4>
								<p class="cart"><a href="tshirt.php">Shop</a></p>				
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 fashion-grids">
					<figure class="effect-bubba">
						<img src="images/f9.jpg" alt=""/>
						<figcaption>
							<h4>Ecomm Shop</h4>
							<p class="cart"><a href="watches.php">Shop</a></p>							
						</figcaption>			
					</figure>		
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
       <!--//latest-->
			</div>
	</div>
<!-- //products -->
<?php include 'footer.php';
?>
</body>
</html>