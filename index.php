<html>
<head>
<style> 
body {
  background-image: url("images/background1.jpg");
    background-size:cover;
    
  
  background-color: #333;
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
    if(isset($_POST['sub']))
	{
		$email = $_POST['email'];
        $pass  = md5($_POST['pass']);
        
        $q = mysqli_query($con,"select * from users where email = '$email' and pass = '$pass'") or die(mysqli_error());
        
        $n = mysqli_num_rows($q);
        
        if($n==0)
        {
            echo "Invalid User";   
        }
        else
        {
            $arr = mysqli_fetch_assoc($q);
            echo "Logged in Success";
            if($arr['role']=='lab assistant')
            {
                $_SESSION['user_id'] = $arr['user_id'];
				$_SESSION['role'] = "asst";
				header("location:meu.php");
            }
            else 
            {
                $_SESSION['user_id'] = $arr['user_id'];
				$_SESSION['role'] = "hod";
				header("location:meu1.php");
            }
        }
	}
?>


<div class="container">
    <div class="row">
		<h1 class='text-center' style="margin-top:100px;padding:20px;" <font color="Navy">IT LAB INVENTORY</font></h1>
        
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1 class="alert alert-danger text-center">Login</h1>
            <form method="post">
               <font color="black"><font size = 4>Enter Email:</font>
  <input type="email" name="email" class="form-control"><br>
  <font color="black"><font size = 4>Enter Password:</font>

             <input type = "password" name="pass" class="form-control"><br>
               <div class='row'>
				<div class='col-sm-6'>
					<input type="submit" name="sub" value="Login" class="btn btn-lg btn-success" style="width:100%">
				</div>	
				<div class='col-sm-6'>
					<input type="reset" name = "reset" value="Reset" class="btn btn-danger btn-lg"
					style="width:100%"><br>
				</div>
			   </div>
			</form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>