
<br>

<h2 style="text-align:center;">Do yo really want to DELETE your account</h2>
<form action=" " method="post">
<br>
<input type="submit" name="yes" value="yes i want">
<input type="submit" name="no" value="no,i was joking"> 


</form>

<?php
include("includes/db.php");
$user=$_SESSION['customer_email'];

if(isset($_POST['yes'])){

$delete_customer="delete from customers where customer_email='$user'";
$run_customer=mysqli_query($con,$delete_customer);
echo"<script>alert('we are really sorry,your account has been deleted!')</script>";
echo"<script>window.open('../index.php','_self')</script>";
	
}

if(isset($_POST['no'])){

echo"<script>alert('no joke again')</script>";
echo"<script>window.open('my_account.php','_self')</script>";

}

?>