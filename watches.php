<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Project</title>
<?php include 'header.php';
?>
 <!--start-content-->
<!--products-->
	<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-8 products-grid-left">
					<div class="products-grid-lft">
					<?php
					include 'connection.php';
					if(isset($_GET['filter_price']))
					{
						$price = $_GET['filter_price'];
						if($price == 0)
						$sql = " SELECT * FROM products WHERE p_type LIKE 'Watches'";					
						if($price == 1)
						$sql = " SELECT * FROM products WHERE p_price < 500 AND p_type LIKE 'Watches'";
						if($price == 2)
						$sql = " SELECT * FROM products WHERE p_price BETWEEN 500 AND 1000 AND p_type LIKE 'Watches'";
						if($price == 3)
						$sql = " SELECT * FROM products WHERE p_price BETWEEN 1000 AND 2000 AND p_type LIKE 'Watches'";
						if($price == 4)
						$sql = " SELECT * FROM products WHERE p_price > 2000 AND p_type LIKE 'Watches'";
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) 
						{
							while($row = mysqli_fetch_assoc($result)) 
							{
								echo '
								<div class="products-grd">
									<div class="p-one simpleCart_shelfItem prd">
										<a href="single.php">
												<img src="'.$row["p_image"].'" alt="" class="img-responsive" />
										</a>
										<h4>'.$row["p_name"].'</h4>
										<p><a class="item_add" href="addcart.php?mycart='.$row['p_id'].'&userid='.$id.'"><span class=" item_price valsa">Rs. '.$row["p_price"].' .</span><img src="images/cartadd.png"></img> </a></p>
										<div class="pro-grd">
											<a href="single.php?p='.$row['p_id'].'">Quick View</a>
										</div>
									</div>	
								</div>';
							}
						} 
						else
						{
							echo "No Data";
						}						
					}					
					else
					{
						$sql = " SELECT * FROM products WHERE p_type = 'Watches'";
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) 
						{
							while($row = mysqli_fetch_assoc($result)) 
							{
								echo '						
								<div class="products-grd">
									<div class="p-one simpleCart_shelfItem prd">
										<a href="single.php">
												<img src="'.$row["p_image"].'" alt="" class="img-responsive" />
										</a>
										<h4>'.$row["p_name"].'</h4>
										<p><a class="item_add" href="addcart.php?mycart='.$row['p_id'].'&userid='.$id.'"><span class=" item_price valsa">Rs. '.$row["p_price"].' .</span><img src="images/cartadd.png"></img> </a></p>
										<div class="pro-grd">
											<a href="single.php?p='.$row['p_id'].'">Quick View</a>
										</div>
									</div>	
								</div>';
							}
						} 
					}				
					?>	
					<div class="clearfix"> </div>
				</div>
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
							<h4>Price</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
								<form action="#" method="get" name="filter_price">
									<label class="radio"><input type="radio" name="filter_price" value="0"><i></i>All</label>
									<label class="radio"><input type="radio" name="filter_price" value="1"><i></i>Below 500</label>
									<label class="radio"><input type="radio" name="filter_price" value="2"><i></i>500 - 1000</label>
									<label class="radio"><input type="radio" name="filter_price" value="3"><i></i>1000 - 2000</label>
									<label class="radio"><input type="radio" name="filter_price" value="4"><i></i>Above 2000</label>
									<input type="submit" name="submit" value="Submit"/>
								</form>
								</div>
							</div>
						</section>				
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- //products -->
<?php include 'footer.php';
?>
</body>
</html>