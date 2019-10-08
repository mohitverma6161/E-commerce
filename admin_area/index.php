  
  <?php 
  
  session_start();
  
  if(!isset($_SESSION['user_email'])){
  
 
  echo"<script>window.open('login.php?not_admin=you are not Admin!','_self')</script>";
  }
  
  else{
  
  
  ?>
  
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>This is admin pannel</title>
<link rel="stylesheet" href="styles/style.css" media="all"  />
</head>

<body>
	
	<div class="main_wrapper">
	
	<div id="header"></div>
	
	
		<div id="right">
		<h2 style="text-align:center">ManageContent</h2>
		
			<a href="index.php?insert_product">Insert Product</a>
			<a href="index.php?view_products">Vew All Product</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats">Vew All category</a>
			<a href="index.php?insert_brand">Insert New Brands</a>
			<a href="index.php?view_brands">Veiw All Brands</a>
			<a href="index.php?view_customers">Vew Customers</a>
			<a href="index.php?view_orders">Vew orders</a>
			<a href="index.php?view_payment">Vew payments</a>
			<a href="logout.php">Admin Logout</a>
		
		</div>
		<div id="left">
		
		<h2 style="color:#CC0000; text-align:center;"><?php  echo@$_GET['logged_in']; ?></h2>
		
		<?php
		
			if(isset($_GET['insert_product'])){
			
			include("insert_product.php");
			}
			if(isset($_GET['view_products'])){
			
			include("view_products.php");
			}
			
			if(isset($_GET['edit_pro'])){
			
			include('edit_pro.php');
			}
			
			if(isset($_GET['insert_cat'])){
			
			include("insert_cat.php");
			}
			
			if(isset($_GET['view_cats'])){
			
			include("view_cats.php");
			}
			
			if(isset($_GET['edit_cat'])){
			
			include("edit_cat.php");
			}
			
			if(isset($_GET['insert_brand'])){
			
			include("insert_brand.php");
			}
			
			if(isset($_GET['view_brands'])){
			
			include("view_brands.php");
			}
			
			if(isset($_GET['edit_brand'])){
			
			include("edit_brand.php");
			}
			
			if(isset($_GET['view_customers'])){
			
			include("view_customers.php");
			}
		?>
	
			</div> 
	
	
	</div>


</body>
</html>
<?php } ?>