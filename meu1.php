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
background: #3366cc;
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
background: #3366cc;
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
background: #3366cc;
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
background: #3366cc;
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
    <h1>HEAD OF DEPT's PORTAL</h1>
    <h1>TO DO....</h1>
<input  style='width:300px;margin:01% 50%;position:center;margin-bottom:20px;' class="MyButton" type="button" value="Assign Assistant" onclick="location.href='update_lab.php'" />

    <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton1" type="button" value="Search item" onclick="location.href='HOD.php'" />
    
     <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton2" type="button" value="Update and view" onclick="location.href='view_all_products_purchasedhod.php'" />
     <input  style='width:300px;margin:0 50%;position:relative;margin-bottom:20px;' class="MyButton3" type="button" value="Log out" onclick="location.href='index.php'" />

    </center>
</form>
