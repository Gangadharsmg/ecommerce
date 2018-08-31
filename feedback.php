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
				<div class="col-md-7 single-text">
					<form action="feedbackstore.php" method="post">
						<h1>Feedback for Ecommerce Shop</h1>
						<fieldset><br>
						<label for="name">Full Name:</label><br>
						<input type="text" id="name" name="fullname" >
						<br><br>
						<label for="fdback">Feedback:</label><br>
						<textarea rows="4" cols="30" id="fdback" name="feedback"></textarea>
						<br><br>
						<button type="submit">Submit Feedback</button>
						<br><br>					
					</form>
				</div>	
			</div>
		</div>
	</div>
<?php include 'relatedproduct.php';
?>	 
<?php include 'footer.php';
?>
</body>
</html>	