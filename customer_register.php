 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ecommerce website</title>
<link rel="stylesheet" href="styles/style1.css" media="all" />
</head>

<body> 

		<div class="main_wrapper">
		
		<div class="header_wrapper">
		<a href="index.php"><img  id="logo"src="images1/1.png"/ ></a>
		<img id="banner"src="images1/2.png" />
		

		
		</div>  
		
				<div class="menubar">
				<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Acount</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<div class="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query"placeholder="search a product"/>
				<input type="submit" name="search" value="search" />
			</form>
			</div>
		
		
		</div>
		
		<div class="content_wrapper">
		
		<!--this side bar-->
		<div id="sidebar">
		
		<div id="sidebar_title"><center>categories</center></div>

				<ul id="cats" >

		<?php
		getcats();
		
		
		?>



				
			</ul>
			
			<div id="sidebar_title"><center>brands</center></div>
				<ul id="cats">
				
			<?php getBrands();?>

			
			</ul>
			


		</div>
		<div id="content_area">
		<?php cart(); ?>
		
		<div id="shopping_cart">
		
<span style="float:right; font-size:18px; padding:5px; line-height:40px; 
">welcome guest! <b style="color:#FFFF00;">shopping cart -</b> Total items:  <?php total_items(); ?> Total Price: <?php total_price(); ?>
<a href="cart.php" style="color:#FFFF00"> Go to cart</a>
					
					
					</span>
					 
		</div>

			<form action="customer_register.php" method="post" enctype="multipart/form-data">
			
			<table align="center" width="750">
			
				<tr align="center">
				<td colspan="6"><h2>create an Acount</h2></td>
				
				</tr>
				
				
				<tr>
						<td align="right">Customer Name:</td>
						<td><input type="text" name="c_name" required/></td>
				</tr>
				
				
				<tr>
						<td align="right">Customer Email:</td>
						<td><input type="text" name="c_email" required/></td>
				</tr>
				
				
				<tr>
						<td align="right">Customer Password:</td>
						<td><input type="password" name="c_pass" required /></td>
				</tr>
				
				
				<tr>
						<td align="right">Customer Image:</td>
						<td><input type="file" name="c_image" /></td>
				</tr>
				
				
				
				<tr>
						<td align="right">Customer Country:</td>
						<td>
						<select name="c_country">
							<option>Select a Country</option>
							<option>Afganistan</option>
							<option>India</option>
							<option>japan</option>
							<option>Pakistan</option>
							<option>Israil</option>
							<option>Nepal</option>
							<option>Arab</option>
							<option>United States</option>
							<option>United Kingdome</option>
						</select>
						</td>
				</tr>
				
				
				<tr>
						<td align="right">Customer City:</td>
						<td><input type="text" name="c_city" required/></td>
				</tr>
				
				
				<tr>
						<td align="right">Customer Contact:</td>
						<td><input type="text" name="c_contact" required/></td>
				</tr>
				
				
				<tr>
						<td align="right">Customer Address:</td>
						<td><input type="text" name="c_address" required/></td>
				</tr>
				
				
				<tr align="center">
						
						<td colspan="6"><input type="submit" name="register" value="create Acount" /></td>
				</tr>
			
		
			
			
			</table>
			
			
			</form>		
		 






		
		</div>  
		
		</div>
		
		<div id="footer">
		
		<h1 id="footerh1">&copy; 2016 - by nehal.arshad@gmail.com</h1>
		
		 </div>
		
		
		
		
		</div>
		
</body>
</html>



<?php

if(isset($_POST['register'])){

$ip=getIp();

$c_name=$_POST['c_name'];
$c_email=$_POST['c_email'];
$c_pass=$_POST['c_pass'];
$c_image=$_FILES['c_image']['name'];
$c_image_tmp=$_FILES['c_image']['tmp_name'];
$c_country=$_POST['c_country'];
$c_city=$_POST['c_city'];
$c_contact=$_POST['c_contact'];
$c_address=$_POST['c_address'];

	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	
 $insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
 
 $run_c = mysqli_query($con,$insert_c);
		
		$sel_cart="select * from cart where ip_add='$ip'";
		
		$run_cart= mysqli_query($con,$sel_cart);
		
		$check_cart=mysqli_num_rows($run_cart);
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo"<script> alert('you logged in successfully, thanks!')</script>";
		
		echo"<script> window.open('customer/my_account.php','_self')</script>";
		
		
		
			}
		else{
		
		
		$_SESSION['customer_email']=$c_email;
		
		echo"<script> alert('you logged in successfully, thanks!')</script>";
		
		echo"<script> window.open('checkout.php','_self')</script>";
		
		}
		


}



?>