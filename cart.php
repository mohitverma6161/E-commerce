  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

	session_start();
	
include("functions/functions.php");


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
		
<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

<?php
	
	if(isset($_SESSION['customer_email'])){
	
	echo"<b>Welcome:</b>".$_SESSION['customer_email']. "<b style='color:yellow'>your</b>";
	
	}
	
	else{
	
		echo"<b>Welcome Guest:</b>";
	
	}
	
	?>


 <b style="color:#FFFF00;">shopping cart -</b> Total items:  <?php total_items(); ?>  Total Price:<?php total_price(); ?>
<a href="index.php" style="color:#FFFF00">Back to shop</a>


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


				<form action="cart.php" method="post" enctype="multipart/form-data">
				<table align="center" width="700px" bgcolor="skyblue">
				
				
				<tr align="center">
					<th>Remove</th>
					<th>Products(S)</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th></th>  
				</tr>
					
	 <?php
				
				
	$total=0;
		
	global $con;
	
	$ip=getIp();
	$sel_price="select*from cart where ip_add='$ip'";
	
	$run_price=mysqli_query($con,$sel_price);
	
	while($p_price=mysqli_fetch_array($run_price)){
	
		$pro_id=$p_price['p_id'];
		
		$pro_price="select*from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		
		while($pp_price=mysqli_fetch_array($run_pro_price)){
		
		
			$product_price=array($pp_price['product_price']);
			
			$product_title=$pp_price['product_title'];
			
			$product_image=$pp_price['product_image'];
			
			$single_price=$pp_price['product_price'];
			
			$values=array_sum($product_price);
			$total += $values;
			
			

	
				?>		
							<tr align="center">
				 
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
								<td><?php echo $product_title; ?><br>
								<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
								</td>
								<td><input type="text"size="4"name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>
								
								
								<?php
								
								if(isset($_POST['update_cart'])){
								
								$qty=$_POST['qty'];
								
								$update_qty="update cart set qty='$qty'";
								
								$run_qty=mysqli_query($con,$update_qty);
								
								$_SESSION['qty']=$qty;
								
								$total=$total*$qty;
								
								}
								
								?>
								
								
								
								<td><?php echo "Rs".$single_price;?></td>
				
						</tr>	
						
								
						
						<?php 	} } ?>	
						<tr align="right">
							<td colspan="4"><b>Sub Total:</b></td>
							<td><?php echo"Rs".$total; ?></td>
						</tr>	
								
								<tr align="center">
								
									<td colspan="2"><input type="submit" name="update_cart" value="update cart" /></td>
									<td> <input type="submit" name="continue" value="continue shopping" /></td>
									<td><button><a href="checkout.php" style="text-decoration:none; color:black">checkout</a></button></td>
								
								</tr>
					
					</table>
				</form>
							
			
			<?php
				
				
				global $con;
				
			$ip=getIp();
			
			if(isset($_POST['update_cart'])){
			
			foreach($_POST['remove']as $remove_id){ 
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
			
			$run_delete=mysqli_query($con,$delete_product);
			
			if($run_delete){
					

					echo"<script> window.open('cart.php','_self')</script>";
					
			
				}
				
				}
			}
			if(isset($_POST['continue'])){
			
			
			echo"<script> window.open('index.php','_self')</script>";
			}

				
			
			?>

		
				</div>
		
			</div>  
		
		</div>
		
	   	
</div>
		
</body>
</html>
