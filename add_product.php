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
  	if(isset($_POST['sub']))
	{
		$product_sub_type=$_POST['product_sub_type'];
		$product_name = $_POST['pr_name'];
        $specification = $_POST['specification'];
		$price = $_POST['price'];
		$quantity= $_POST['quantity'];
		$purchase_date = $_POST['purchase_date'];
		$bill_number = $_POST['bill_number'];
		$vendor = $_POST['vendor'];
		$total_price = $price*$quantity;

		//print_r($_POST);
		$q = mysqli_query($con,"insert into product values('','$product_name','$specification',$price,$product_sub_type,$quantity,$quantity,$total_price,'$purchase_date','$bill_number','$vendor')")or die(mysqli_error());
        
        echo "<script>alert('Product Added successfully');</script>";
	}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>

   <div class="col-sm-4"> 
            <h2 class="alert alert-info text-center">Add Product</h2>
            <form method="post">
            <?php
                $q = mysqli_query($con,"select * from product_sub_type")or die(mysql_query($con));
                $n = mysqli_num_rows($q);
                echo "<select name='product_sub_type' class='form-control'>";
                for($i=0;$i<$n;$i++)
                {
                    $arr = mysqli_fetch_assoc($q);
                    echo "<br>";
                    print_r($arr);
                    echo "<option value='$arr[product_sub_type_id]'>$arr[sub_type_name]</option>";
                }
                echo "</select><br>";
            ?>
            <input type="text" name="pr_name" placeholder="Enter Product Name" required pattern="^[a-zA-Z]$" class="form-control"><br>
            <textarea type="text" name="specification" placeholder="Product Specifications(If any)" class="form-control">
            </textarea>
            <br>
            <input type="text" name="price" placeholder="Enter Product Price" required pattern="^[0-9]{2,6}$" class="form-control"><br>
            <input type="text" name="quantity" placeholder="Enter Product quntity" required pattern="^[1-9]{1,6}$" class="form-control"><br>
            <h3>Select Purchase Date:</h3> <input type="date" name="purchase_date" required class="form-control"><br>
            <input type="text" name="bill_number" placeholder="Enter Bill Number" required pattern="^[1-9]{2,6}$" class="form-control"><br>
            <input type="text" name="vendor" placeholder="Enter Vendor Name" class="form-control"><br>
            <input type="submit" value="Add Product" name="sub" class="btn btn-lg btn-success center-block">
            </form>
    </div>
<div class="col-sm-4"></div>
    </div>
</div>
<div style="text-align:center;mergin-top:10px;">
<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='meu.php'"
    />
</div>s-