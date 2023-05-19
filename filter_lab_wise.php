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
?>
	
	<div class="conatiner">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form method="post">
			<select name="lab_id" class="form-control">
				<?php
					$labs_q = mysqli_query($con,"select * from labs where lab_assistant = $id") or die(mysqli_error());
					
					$labs_count = mysqli_num_rows($labs_q);

					for($i=0;$i<$labs_count;$i++)
					{
						$labs_arr = mysqli_fetch_assoc($labs_q);
						echo "<option value='$labs_arr[lab_id]'>$labs_arr[lab_name]</option>";
					}
				?>
			</select>
			<br>
			<input type="submit" value="Filter" name="filter" class="btn btn-lg btn-success">
			</form>
		</div>
		<div class="col-sm-4"></div>
		</div>
	</div>

<?php
	
	//echo $id;
	if(isset($_POST['filter']))
	{
		//print_r($_POST);
		$lab_id = $_POST['lab_id'];
		$product_find_query = mysqli_query($con,"SELECT
											labs.*,
									  product_assigned.*,
									  users.*
									FROM product_assigned
									  INNER JOIN labs
										ON product_assigned.lab_id = labs.lab_id
									  INNER JOIN users
										ON labs.lab_assistant = users.user_id
									WHERE users.user_id = $id AND users.user_id = labs.lab_assistant AND product_assigned.lab_id = $lab_id")or die(mysqli_error());

		
		$n = mysqli_num_rows($product_find_query);
	
?>
<body>
	<div class="container">
		<div class ="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<?php
				echo "<table class='table table-bordered'><th>Sr. No</th><th>Lab Name</th>
				<th>Product Code (LAB_PRODUCT_MACHINE)</th>
				<th>Product Info</th>
				<th>Product ID</th>";
				for($i=0;$i<$n;$i++)
				{
					$arr = mysqli_fetch_assoc($product_find_query);
					
					$product_info_q = mysqli_query($con,"select * from product where product_id=$arr[product_id]")or die(mysqli_error());
					
					$product_info = mysqli_fetch_assoc($product_info_q);

					//print_r($arr);
					echo "<tr>";
					echo "<td>".($i+1)."</td>";
					echo "<td>$arr[lab_name]</td>";
					echo "<td><a href = view_detail_product_from_id.php?product_id=$arr[product_id]>$arr[product_code]</a></td>";
					echo "<td>$product_info[product_name]</td>";
					echo "<td>$arr[product_id]</td>";
					echo "</tr>";
					//print_r($arr);
				}
				echo "</table>";
				}
			?>
		</div>
		<div class="col-sm-3"></div>
		</div>
	</div>
</body>