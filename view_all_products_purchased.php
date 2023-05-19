<html>
<head>
<style> 
	

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
<?php
	include "config.php";
?>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<?php
	
	$all_product_query = mysqli_query($con,"select * from product")or die(mysqli_error());
	
	$n = mysqli_num_rows($all_product_query);
	

	echo "<table class='table table-bordered'><th>Sr. No.</th><th>Product Name</th><th>Specification</th><th>Price</th>
	<th>Quantity</th><th>Reamaining product</th><th>Total Price</th><th>View</th><th>Edit</th>";
	for($i=0;$i<$n;$i++)
	{
		echo "<tr>";
		$arr = mysqli_fetch_array($all_product_query);
		echo "<td>".($i+1)."</td>";
		echo "<td>$arr[1]</td>";
		echo "<td>$arr[2]</td>";
		echo "<td>$arr[3]</td>";
		echo "<td>$arr[5]</td>";
		echo "<td>$arr[6]</td>";
		echo "<td>$arr[7]</td>";
		echo "<td><a href = 'view_detail_product_from_id.php?product_id=$arr[0]'>View</a></td>";
		echo "<td><a href = 'update_product_from_id.php?product_id=$arr[0]'>Update</a></td>";
		//echo "<td><a href = 'delete_product_from_id.php?product_id=$arr[0]'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
?>
<div class="col-sm-4"></div>
    </div>
</div>
<div style="text-align:center;mergin-top:10px;">
<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='meu.php'"
    />
</div>s-