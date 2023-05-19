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
<?php
      include "config.php";
      
      
    if(!isset($_SESSION['user_id']))
    {
        echo "Please Login";
        die();
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
</html>
<?php
	if(isset($_GET['product_id']))
	{
		$id = $_GET['product_id'];
		$q = mysqli_query($con,"select * from product where product_id = $id")or die(mysqli_error());

		$product = mysqli_fetch_assoc($q);
		//print_r($product);
	}
?>
<?php
  	if(isset($_POST['sub']))
	{
		$id = $_GET['product_id'];
//		$product_sub_type=$_POST['product_sub_type'];
		$product_name = $_POST['pr_name'];
        $specification = $_POST['specification'];
//		$price = $_POST['price'];
		$quantity= $_POST['quantity'];
		$purchase_date = $_POST['purchase_date'];
		$bill_number = $_POST['bill_number'];
		$vendor = $_POST['vendor'];
	//	$total_price = $price*$quantity;

		//print_r($_POST);
		$q = mysqli_query($con,"update product set product_name = '$product_name', specification='$specification',quantity=$quantity,purchase_date='$purchase_date',bill_number=$bill_number,product_vendor='$vendor' where product_id=$id");
        
        echo "<script>alert('Product Added successfully');</script>";
		header('location:view_all_products_purchased.php');
	}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>

   <div class="col-sm-4"> 
            <h2 class="alert alert-info text-center">Update Product</h2>
            <form method="post">
            <?php
              /*  $q = mysqli_query($con,"select * from product_sub_type")or die(mysqli_query($con));
                $n = mysqli_num_rows($q);
                echo "<select name='product_sub_type' class='form-control' required>";
                echo "<option value=''>Please Select</option>";
				for($i=0;$i<$n;$i++)
                {
                    $arr = mysqli_fetch_assoc($q);
                    echo "<br>";
                    print_r($arr);
                    echo "<option value='$arr[product_sub_type_id]'>$arr[sub_type_name]</option>";
                }
                echo "</select><br>";*/
            ?>
            <input type="text" name="pr_name" placeholder="Enter Product Name" value="<?php echo $product['product_name'];?>" required class="form-control" readonly><br>
            <textarea type="text" name="specification" placeholder="Product Specifications(If any)" class="form-control"><?php echo $product['specification'];?>
            </textarea>
            <br>
            <input type="text" name="quantity" value="<?php echo $product['quantity'];?>" placeholder="Enter Product quntity" required pattern="^[1-9]{1,6}$" class="form-control"><br>
            <h3>Select Purchase Date:</h3> <input type="date" name="purchase_date" value="<?php echo $product['purchase_date'];?>" required class="form-control"><br>
            <input type="text" name="bill_number" value="<?php echo $product['bill_number'];?>" placeholder="Enter Bill Number" required pattern="^[1-9]{1,6}$" class="form-control"><br>
            <input type="text" name="vendor" placeholder="Enter Vendor Name" value="<?php echo $product['product_vendor'];?>" class="form-control"><br>
            <input type="submit" value="Update Product" name="sub" class="btn btn-lg btn-success center-block">
            </form>
    </div>
<div class="col-sm-4"></div>
    </div>
</div>

</div>
<div style="text-align:center;mergin-top:10px;">
<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='view_all_products_purchasedhod.php'"
    />
</div>s-