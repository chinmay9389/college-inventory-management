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
    //echo $lab_nos;
    
    $products_query = mysqli_query($con,"select * from product");
    $product_nos = mysqli_num_rows($products_query);
    //echo $product_nos;
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
                <h3>Select Lab:</h3>
                <select name="lab" class="form-control">
                    <?php
                        for($i=0;$i<$lab_nos;$i++)
                        {
                            $lab_arr = mysqli_fetch_assoc($lab_query);
                            echo "<option value='$lab_arr[lab_id]'>$lab_arr[lab_name]</option>";
                        }
                    ?>
                </select> <br>
                <h3>Select Product: </h3>
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
                <h3>Enter Quantity: </h3>
                <input type="text" name="quantity" placeholder="Number of products to be Assigned" class="form-control"> <br>
                
                <input type="submit" name="sub" value="Assign Products" class="btn btn-success btn-lg" style="width:100%"
                > 
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<?php
    if(isset($_POST['sub']))
    {
        //print_r($_POST);
        $lab_id = $_POST['lab'];
        $arr = explode(".",$_POST['product']);
        $product_id = $arr[0];
        $qt = $_POST['quantity'];

		$product_count_query = mysqli_query($con,"select remaining from product where product_id=$product_id")or die(mysqli_error());

		$product_count_arr = mysqli_fetch_assoc($product_count_query);
        //echo $product_count_arr['quantity'];

		if($qt>$product_count_arr['remaining'])
		{
			echo "<h2 class='text-center alert alert-danger'>You can assign max : $product_count_arr[remaining] products</h2>";
			return;
		}

        for($i=0;$i<$qt;$i++)
        {
            $product_code = "KIT_IT_".$lab_id."_".$product_id."_".($i+1);
			echo $product_code."<br>";
            $product_assign_query = mysqli_query($con,"insert into product_assigned values('',$lab_id,'$product_code',$product_id)")or die(mysqli_error());
        }
		$remaining = $product_count_arr['remaining'] - $qt;
		$update_product = mysqli_query($con,"update product set remaining = $remaining where product_id=$product_id") or die(mysqli_query($con));
    }
?>
</div>
<div style="text-align:center;mergin-top:10px;">

<input align="center" class="MyButton" type="button" value="Back" onclick="location.href='meu.php'"/>
</div>