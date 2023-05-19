<html>
    <head>
<style>
     body {
  background-image: url("images/addbackground.jpg");
    background-size:cover;
    
  
  background-color: #333;
}
    
input.MyButton {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: Navy;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}

        input.MyButton1 {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: Navy;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}

        input.MyButton2 {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: Navy;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}

            input.MyButton3 {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: Navy;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}
 input.MyButton4 {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: Navy;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}
input.MyButton5 {
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: Navy;
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
  
<form>
    <center>
    <h1>ASSISTANT's PORTAL</h1>
    <h1>TO DO.....</h1>
<input  style='width:300px;margin:01% 50%;position:center;margin-bottom:20px;' class="MyButton" type="button" value="Add Items" onclick="location.href='add_product.php'" />
    <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton1" type="button" value="Assign To Lab" onclick="location.href='assign_product.php'" />
    <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton2" type="button" value="Search Item" onclick="location.href='search_product_namewise.php'"/>
    <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton3" type="button" value="Display Item" onclick="location.href='show_all_products.php'" />
    <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton4" type="button" value="Update and view" onclick="location.href='view_all_products_purchased.php'" />
    <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton5" type="button" value="Log out" onclick="location.href='index.php'" />
    </center>
</form>
