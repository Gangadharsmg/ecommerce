<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Project</title>
 <?php include 'header.php';
   ?>  
<style>
input[type="text"],
select{
  float:right;
  background: rgba(255,255,255,0.1);
  background-color: #e8eeef;
  border-radius: 3px;
  font-size: 13px;
  height: auto;
  width: 30%;
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
select:focus {
  border-color: #5fcf80;  
}
body{width:100%;}
.txt-heading{padding: 5px 10px;font-size:1.1em;font-weight:bold;color:#18C9D2;}
.btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
#btnEmpty{background-color:#D60202;border:0;padding:1px 10px;color:#FFF; font-size:0.8em;font-weight:normal;float:right;text-decoration:none;}
.btnAddAction{background-color:#79b946;border:0;padding:3px 10px;color:#FFF;margin-left:1px;}
#shopping-cart {border-top: #ffffff 2px solid;margin-bottom:30px;}
#shopping-cart .txt-heading{background-color:#dddddd;}
#shopping-cart table{width:85%;background-color:#F0F0F0;border:1}
#shopping-cart table td{background-color:#f2f2f2;}
.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
</style>

 <!--start-content-->
<?php 
    include 'connection.php';								
		if(isset($_GET['remove']))
		{	/*Delete on item from cart*/
		$r_id = $_GET['remove'];
		$sql = "Delete from cart where c_id = $r_id";
		$result = mysqli_query($conn, $sql);									
		}								
		if(isset($_GET['empty']))
		{	/*Empty Cart - All items*/
		$sql = "Truncate cart";
		$result = mysqli_query($conn, $sql);									
		} 
?>						
 
<center>
<div id="shopping-cart" >
<div style="background-color:#18C9D2; width:85%; font-size:25px;">Shopping Cart<a id="btnEmpty" href="cart.php?empty=1"><img src="images/cartempty.png"></img></a></div>
<table style="text-align:center; border-right: 5px solid " border="1">
<tbody style=" font-size:20px; border: 3px solid #18C9D2; ">
				<tr style="border: 3px solid #18C9D2;">
				<th><center><strong>Name</strong></center></th>
				<th><center><strong>Image</strong></center></th>
				<th><center><strong>Price</strong></center></th>
				<th><center><strong>With Tax</strong></center></th>
				<th><center><strong>Action</strong></center></th>
				</tr>	
								<?php 
								include 'connection.php';
								$sql = " SELECT * FROM cart";
								if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
								while($row = mysqli_fetch_assoc($result)) 
								{
								echo '
								<tr>
								<td width=35% style="padding: 4%;"><strong>'.$row["c_name"].'</strong></td>
								<td style= "background-color:#f7f7f7; padding:1%" data-thumb="'.$row['c_image'].'">
									 <div class="thumb-image"> <img src="'.$row['c_image'].'" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</td>
								<td width=10%><strong>Rs. '.$row["c_price"].'</strong></td>
								<td width=10%><strong>Rs. '.$row["tax"].'</strong></td>
								<td width=25%><a href="cart.php?remove='.$row["c_id"].'" class="btnRemoveAction"><img src="images/cartrmv.png" width="100" height="40"></img></a>
								<a href="order.php?p='.$row["c_p_id"].'"><img src="images/cartodrnw.png" width="100" height="40"></img></a>
								</td>
								</tr>';
								}
								}
								else
								{
									echo "<tr><td colspan=4><center><a href='#'><img src='images/cartnoitem.gif'></img></a></center></td></tr>";
								}								
								?>	
				
			<tr>
			<td class="txt-heading" colspan="5" align="right"><strong><br>
			<?php
			 include 'connection.php';
			 $p0=mysqli_query($conn,"call total(@out);");
		     $rs=mysqli_query($conn,'select @out');
	         while($row=mysqli_fetch_row($rs))
		    {
			  echo 'Total amount= Rs. '.$row[0];
		    }
		  mysqli_close($conn);
		 
		?><br>
		</strong></td>
		</tr>
			
			
</tbody>
</table>
<br><br><br>

	
	<font size=6 color="blue"><b>Do you want to add more items into cart???<a href="index.php"><img src="images/update.jpg" width="100" height="100"></img></a></b></font>
	

	
</div>
</div>
</center>		 
 <?php include 'footer.php';
 ?>
</body>
</html>