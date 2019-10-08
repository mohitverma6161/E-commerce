 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
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
		<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px; ">
					
					
					<?php
	
	if(isset($_SESSION['customer_email'])){
	
	echo"<b>Welcome:</b>".$_SESSION['customer_email']. "<b style='color:yellow'>your</b>";
	
	}
	
	else{
	
		echo"<b>Welcome Guest:</b>";
	
	}
	
	?>
					
					
					
					
		<b style="color:#FFFF00;">shopping cart -</b> Total items:Total Price:<a href="cart.php" style="color:#FFFF00">Go to cart</a>
					
					
					</span>
					 
		</div>
		
		 
			<div id="products_box">
			
<?php

			
$get_pro="select*from products"; 
$run_pro=mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){

$pro_id=$row_pro['product_id']; 
$pro_cat=$row_pro['product_cat']; 
$pro_brand=$row_pro['product_brand']; 
$pro_title=$row_pro['product_title']; 
$pro_price=$row_pro['product_price']; 
$pro_image=$row_pro['product_image']; 

echo"
<div id='single_product'>

<h3>$pro_title</h3>

	<img src='admin_area/product_images/$pro_image' width='180' height='180'/> 
	<p><b>Rs $pro_price</b></p>
	<a href='details.php?pro_id=$pro_id' style='float:left'>Detail</a>
	<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button><a>
</div>

";

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
