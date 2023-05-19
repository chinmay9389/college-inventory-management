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
<?php
    include "config.php";
       if(!isset($_SESSION['user_id']))
    {
        echo "Please Login";
        die();
    }

    $lab_query = mysqli_query($con,"select * from labs");
    $lab_nos = mysqli_num_rows($lab_query);
    
    $products_query = mysqli_query($con,"select * from product");
    $product_nos = mysqli_num_rows($products_query);
   
?>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="" method="post">
                <h3>Enter Name of Product: </h3>
                <input list="products" name="product" class="form-control">
                <datalist id="products">
                  <?php
                        for($i=0;$i<$product_nos;$i++)
                        {
                        $product_arr = mysqli_fetch_assoc($products_query);
                        echo "<option value='$product_arr[product_id]. $product_arr[product_name]'></option>";
                        }
                    ?>
                </datalist> <br>  
                
                <input type="submit" name="sub" value="Search" class="btn btn-lg btn-success" style="width:100%">
                
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<?php
    if(isset($_POST['sub']))
    {
        //print_r($_POST);
        $arr = explode(".",$_POST['product']);
        $product_id = $arr[0];

		$product_info_query = mysqli_query($con,"select * from product where product_id=$product_id")or die(mysql_error());
	
		$product_info = mysqli_fetch_assoc($product_info_query);

		//print_r($product_info);
		
		echo "<div class='container'>
				<div class='row'>
				<div class='col-sm-6'>
					<h3 class='alert alert-info text-center'>Product Details</h3>;
				<table class='table table-bordered table-striped'>
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
				</table>
				</div>";
		
		$labs_products_q = mysqli_query($con,"SELECT product_assigned.lab_id,
										COUNT(product_assigned.product_id) AS expr1
										FROM product_assigned
										WHERE product_assigned.product_id = $product_id
										GROUP BY product_assigned.lab_id")or die(mysqli_error());
		
		$n = mysqli_num_rows($labs_products_q);

		echo  "<div class='col-sm-6'>
					<h3 class='alert alert-info text-center'>Lab Assignment Status</h3>;
				<table class='table table-bordered table-hover'>
				<th class='text-center bg-danger'>Lab Name / Number</th>
				<th class='text-center bg-danger'>No. Assigned</th>";
		for($i=0;$i<$n;$i++)
		{
			$arr = mysqli_fetch_assoc($labs_products_q);
			echo "<tr class='text-center'>
					<td>$arr[lab_id]</td>
					<td>$arr[expr1]</td>
				 </tr>";
		}
		echo  "</table>
				</div>
				</div></div>";
	}	
?>
</div>
<div style="text-align:center;mergin-top:10px;">
<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='meu.php'"/>
</div>