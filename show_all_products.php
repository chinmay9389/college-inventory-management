<html>
<head>
<style> 
body {
  background-image: url("images/download2.jpg");
    background-size:cover;
    
  
  background-color: #333;
}
input.MyButton {
width: 100px;
            height: 60px;        
padding: 10px;
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
	
	$id = $_SESSION['user_id'];
	//echo $id;

	$product_find_query = mysqli_query($con,"SELECT
										labs.*,
								  product_assigned.*,
								  users.*
								FROM product_assigned
								  INNER JOIN labs
									ON product_assigned.lab_id = labs.lab_id
								  INNER JOIN users
									ON labs.lab_assistant = users.user_id
								WHERE users.user_id = $id AND users.user_id = labs.lab_assistant AND product_assigned.lab_id = labs.lab_id");

		
		
		$n = mysqli_num_rows($product_find_query);

?>
<body>
	<div class="container">
		<div class ="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<?php
				echo "<table class='table table-bordered'><th>Sr. No</th><th>Lab Name</th>
				<th>Product Name</th>
				<th>Product Code (LAB_PRODUCT_MACHINE)</th><th>Product ID</th>";
				for($i=0;$i<$n;$i++)
				{
					$arr = mysqli_fetch_assoc($product_find_query);

					$product_info_q = mysqli_query($con,"select * from product where product_id=$arr[product_id]")or die(mysqli_error());
					
					$product_info = mysqli_fetch_assoc($product_info_q);

					echo "<tr>";
					echo "<td>".($i+1)."</td>";
					echo "<td>$arr[lab_name]</td>";
					echo "<td>$product_info[product_name]</td>";
					echo "<td>$arr[product_code]</td>";
					echo "<td>$arr[product_id]</td>";
					echo "</tr>";
					//print_r($arr);
					
				}
				echo "</table>";
			?>
		</div>
		<div class="col-sm-3"></div>
		</div>
	</div>
</body>
</div>
<div style="text-align:center;mergin-top:10px;">
<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='meu.php'"
    />
</div>