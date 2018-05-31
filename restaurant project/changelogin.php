<?php
session_start();
require('db.php');
$error="";

if(isset($_POST['LOGIN'])){
	
	{
		$aid=$_POST['A_ID'];
		
		$pass=$_POST['PASSWORD'];

		

		$_SESSION['key1']=$aid;
		 
		//$db= mysqli_select_db($conn, "");
		$query= mysqli_query($con, "SELECT * FROM ADMIN WHERE PASSWORD= '$pass' AND A_ID='$aid'");
		$rows= mysqli_fetch_array($query);
		if($rows['A_ID']==$aid && $rows['PASSWORD']==$pass){

			header("Location: addadmin.html");

		}
		else{
			$error= "admin id or pass is invalid";
			echo $error;
		}
		mysqli_close($con);
	}
}
?>