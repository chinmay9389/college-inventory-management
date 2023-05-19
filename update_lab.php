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
        $lab_name= $_POST['lab'];
        
        $arr =explode(".", $_POST['asst']);
        $lab_asst = $arr[0];

        print_r($_POST);
	   $lab_q = mysqli_query($con,"select * from labs where lab_name='$lab_name'")or die(mysqli_error());
	   $n = mysqli_num_rows($lab_q);
       if($n>0)
       {
            $update_q= mysqli_query($con,"update labs set lab_assistant=$lab_asst where lab_name='$lab_name'") or die(mysqli_error($con));
       }
       elseif ($n==0) 
       {
            $arr =explode(" ", $lab_name);
            //print_r($arr);
            $update_q= mysqli_query($con,"insert into labs values('','$lab_name',$arr[1],$lab_asst)") or die(mysqli_error());   
       }
    }
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>

   <div class="col-sm-4"> 
            <h2 class="alert alert-info text-center">Update Lab</h2>
            <form method="post">
            <?php
                $q = mysqli_query($con,"select * from labs")or die(mysqli_query());
                $n = mysqli_num_rows($q);
                echo "<input list='labs' name='lab' class='form-control' placeholder='Lab Name'>
				<datalist id='labs'>";
                    for($i=0;$i<$n;$i++)
                        {
                        $lab_arr = mysqli_fetch_assoc($q);
                        echo "<option value='$lab_arr[lab_name]'></option>";
                        }

				echo "</datalist> <br>";
            ?>
			<?php
                $q = mysqli_query($con,"select * from users where role='lab assistant'")or die(mysqli_query());
                $n = mysqli_num_rows($q);
				echo "<input list='asst' name='asst' class='form-control' placeholder='Lab Assistant'>
				<datalist id='asst'>";
                    for($i=0;$i<$n;$i++)
                        {
                        $asst_arr = mysqli_fetch_assoc($q);
                        echo "<option value='$asst_arr[user_id].$asst_arr[name]'></option>";
                        }

				echo "</datalist> <br>";
            ?>
            <input type="submit" value="Assign Lab Assistant" name="sub" class="btn btn-lg btn-success center-block">
            </form>
    </div>
<div class="col-sm-4"></div>
    </div>
</div>
            <div style="text-align:center;margin-top:10px;">

             <input  align="center" class="MyButton" type="button" value="Back" onclick="location.href='meu1.php'"/>
         </div>