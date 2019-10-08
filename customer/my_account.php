 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include("functions/functions.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ecommerce website</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>

<body> 

		<div class="main_wrapper">
		
		<div class="header_wrapper">
		<a href="../index.php"><img  id="logo"src="images1/1.png"/ ></a>
		<img id="banner"src="images1/2.png" />
		

		
		</div>  
		
				<div class="menubar">
				<ul id="menu">
				<li><a href="ecommerce/index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
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
		
		<div id="sidebar_title"><center>My Account</center></div>

				<ul id="cats" >
				
				<?php
				//customer images
				
					$user=$_SESSION['customer_email'];
					
					$get_img="select * from customers where customer_email='$user'";

					$run_img=mysqli_query($con,$get_img);
					
					$row_img=mysqli_fetch_array($run_img);
					
					$c_image=$row_img['customer_image'];
					
					$c_name=$row_img['customer_name'];
					
					echo"<p style='text-align:center'><img src='customer_images/$c_image' width='150' height='150'/></p>";
						
						?>
				
			
			<li><a href="my_account.php?my_orders">My Orders</a></li>
			<li><a href="my_account.php?edit_account">Edit Account</a></li>
			<li><a href="my_account.php?change_pass">Change Password</a></li>
			<li><a href="my_account.php?delete_account">Delete Account</a></li>
			<li><a href="logout.php">Logout</a></li>


				
			</ul>
			</div>
			
			
		<div id="content_area">
		<?php cart(); ?>
		
		<div id="shopping_cart">
		
			<span style="float:right; font-size:15px; padding:5px; line-height:40px;">
	
	<?php
	
	if(isset($_SESSION['customer_email'])){
	
	echo"<b>Welcome:</b>".$_SESSION['customer_email'];
	
	}
	
	
	
	?>
					
					
					<?php
					
					if(!isset($_SESSION['customer_email'])){
					
						echo"<a href='checkout.php' style='color:orange'>Login</a>";
					
					}
					
						else{
						
						echo"<a href='logout.php' style='color:orange'>Logout</a>";
						
						}
					?>
					
					
					
					
					
					</span>
					 
		</div>

		
		 
			<div id="products_box">
			
				
				
				<?php
				//Edit account
				if (!isset($_GET['my_orders'])){
				
					if (!isset($_GET['edit_account'])){
					
						if (!isset($_GET['change_pass'])){
						
							if (!isset($_GET['delete_account'])){
							
							
				
				
				echo"
				<h2 style='padding:20px;'>Welcome: $c_name</h2>
				
				 <b>you can see your progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				
				}
					}
						}
							}
				
				?>
				
				
				<?php
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				
				}
				
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				
				}
				
				
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				
				}
				
				
				?>
				
				
				
				
				
				

		
			</div>
		
		</div>  
		
		</div>
		
		<div id="footer">
		
		<h1 id="footerh1">&copy; 2019 - by mohitverma6161@gmail.com</h1>
		
		 </div>
		
		
		
		
		</div>
		
</body>
</html>
