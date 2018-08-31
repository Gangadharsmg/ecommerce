<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Project</title>
<?php include 'header.php';
?>
	
<?php 
		include 'connection.php';
		if (isset($_POST['fullname']) && isset($_POST['feedback']))
		{
			$fn = $_POST['fullname'];
			$fd = $_POST['feedback'];
			
			$sql = "Update feedbacktbl set feedback='$fd' where fullname='$fn'";
			$result = mysqli_query($conn,$sql) or mysqli_error($conn);
			echo '<span style="color:#00ccff;text-align:center;"><h1><center> Feedback updated successfully </center></h1></span>'; 
			echo '<br><h1><center><a href="index.php">Go Back Shopping</a>  /  <a href="feedbackshow.php">Go To Feedbacks</a></center></h1>';
		}
		
?>
<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-7 single-text">
					<form action="feedbackupdate.php" method="post">
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