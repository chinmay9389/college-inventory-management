<?php
	$con=mysqli_connect("127.0.0.1","root","admin")or die(mysqli_error($con));
	mysqli_select_db($con,"pbl") or die(mysqli_eror($con));
	session_start();
?>