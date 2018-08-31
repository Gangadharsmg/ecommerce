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
						</div>
					</div>
					<div class="col-md-7 single-text">
					<div class="details-left-info simpleCart_shelfItem">
						<?php						
						echo "<h1> Feedbacks</h1><br>";
						include 'connection.php';						
						if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
						}
						$result = mysqli_query($conn,"SELECT * FROM feedbacktbl");
						echo "<table>";
						while($row = mysqli_fetch_array($result))
								  {
								  echo "<tr><td><b>" . $row['fullname'] . "</b><br>" . $row['feedback'] . "<br><br>";
								  }
						echo "</table>";
						mysqli_close($conn);
						?>
					<div class="clearfix"> </div>
					<div class="single-but item_add">
					
					<a href="feedbackupdate.php?"><h1>Update feedback</h1></a><br>
					
					<a href="index.php?"><h1>Go Back Shopping</h1></a>				
				</div>
					<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //products -->
<?php include 'footer.php';
?>
</body>
</html>