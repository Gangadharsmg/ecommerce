<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Project</title>
<?php include 'header.php';
?>
<style>
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  text-align: center;
  padding: 0 0 20px 0;
}

input[type="text"],
input[type="tel"],
input[type="email"],
input[type="password"],
textarea,
select{
  background: rgba(255,255,255,0.1);
  background-color: #e8eeef;
  border-radius: 3px;
  font-size: 16px;
  height: auto;
  width: 100%;
  padding: 5px;
  margin: 0;
  margin-bottom: 30px;
  outline: 0;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0, .03) inset;
  /* - border transition around a text field on focus - */
  border: 2px solid;
  border-color: #ccc;
  transition: border-color, .6s;  
}
input[type="text"]:focus,
input[type="tel"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
textarea:focus,
select:focus {
  border-color: #5fcf80;  
}

label {
  display: block;
  margin-bottom: 8px; 
}
input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;  
}
select {
  height: 32px;
  padding: 6px;
}
label.light {
  display: inline;
  font-weight: 300;
}

button {
  width: 100%;
  background-color: #18C9D2;
  color: #fff;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border: 1px solid #18C9D2;
  border-radius: 5px;
  border-width: 1px 1px 3px;
  padding: 19px 39px 18px 39px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
fieldset {
  border: none;
  margin-bottom: 30px;
}

.number {
  display: inline-block;
  height: 30px;
  width: 30px;
  color: #fff;
  font-size: .8em;
  text-align: center;
  line-height: 30px;
  margin-right: 4px;
  border-radius: 100%;
  background-color: #18C9D2;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
}
legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

@media screen and (min-width: 480px) {
  form {
    max-width: 480px;
  }
}
</style>
<!--start-content-->
<!--products-->
	<div class="products">
	<?php
	include 'connection.php';
	if (isset($_POST['user_name']) && isset($_POST['user_password']))
	{
		$username = $_POST['user_name'];
		$email = $_POST['user_email'];
		$password = $_POST['user_password'];
		$mobile = $_POST['user_mobile'];
		$address = $_POST['user_address'];
		$result = mysqli_query($conn,"SELECT username,mobile,email FROM users WHERE (username='$username' OR mobile='$mobile' OR email='$email')");
		if ($result && mysqli_num_rows($result) > 0)
		{
				echo '<center><strong> SORRY!!!! Username OR Email OR Mobile Number already present</strong></center><br>'; 
				echo '<center><h1><a href="signup1.php">Click here to Register again</a></h1></center>'; 
				?>
				<script type="text/javascript">
					alert("Login is compulsary. If NEW user REGISTER first. If EXISTING user LOGIN first. Unautorised user will not be able to Shop.");
				</script>
				<?php
				}
				else
				{
						$sql = "Insert into users (username,password,mobile,email,address) values  ('$username','$password','$mobile','$email','$address')";
						$result = mysqli_query($conn,$sql) or mysqli_error($conn);
						echo '<center><strong>User successfully created</strong></center><br>'; 
						echo '<center><h1><a href="login1.php">Click here to Login</a></h1></center>'; 
				}					
				}
				?>	
	</div>
<?php include 'relatedproduct.php';
?>
<?php include 'footer.php';
?>
</body>
</html>	