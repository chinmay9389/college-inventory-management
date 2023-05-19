<html>
<head>
<style>
body {
  background-image: url("images/addbackground.jpg");
    background-size:cover;
    
  
  background-color: #333;
}
  

        input.MyButton {
width: 100px;
            height: 60px;        
padding: 20px;
cursor:auto;
font-size: 100%;
background: #419641;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}
</style>
</head>
</html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<?php
	include "config.php";
	if(!isset($_SESSION['user_id']))
	{
		echo "Please Login";
		die();
	}
	if(!isset($_GET['product_id']))
	{
		echo "<h2 class='text-center'>Please provide Product ID<h2>";
	}
	else
	{
		$id = $_SESSION['user_id'];
		$product_id = $_GET['product_id'];
		$product_detail_q = mysqli_query($con,"select * from product where product_id=$product_id")or die(mysql_error());
		
		$product_info = mysqli_fetch_assoc($product_detail_q);
	
		echo "<table class='table table-bordered table-striped'>
				<th class='bg-primary text-cnter'>Heading</th>
				<th class='bg-primary text-cnter'>Product Info</th>	
				<tr>
					<td><b>Product Id:</b></td>
					<td>$product_info[product_id]</td>
				</tr>
				<tr>
					<td><b>Product Name:</b></td>
					<td>$product_info[product_name]</td>
				</tr>
				<tr>
					<td><b>Product Specification:</td>
					<td>$product_info[specification]</td>
				</tr>
				<tr>
					<td><b>Price Details:</b></td>
					<td><b>Unit Price: </b>$product_info[product_price]
					<br><b>Total Price:</b>$product_info[total_price]
					</td>
				</tr>
				<tr>
					<td><b>Product Stats:</b></td>
					<td>
						<b>Purchased Number: </b>$product_info[quantity]
						<br>
						<b>Assigned Number: </b>"
						.($product_info['quantity']-$product_info['remaining'])
						."
						<br>
						<b>Unasigned Number: </b>$product_info[remaining]
						<br>
					</td>
				</tr>
				<tr>
					<td><b>Purchase Date:</b></td>
					<td>$product_info[purchase_date]
					</td>
				</tr>
				</table>";
	
	}
?>
</div>
<div style="text-align:center;mergin-top:10px;">
<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='view_all_products_purchasedhod.php'"
    />
</div>s-
	