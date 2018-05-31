<?php
session_start();
require('db.php');
$error="";

if(isset($_POST['LOGIN'])){
	
	{
		$user=$_POST['CUST_NAME'];
		
		$pass=$_POST['PASSWORD'];

		$email=$_POST['EMAIL_ID'];

		$_SESSION['key']=$email;
		 
		//$db= mysqli_select_db($conn, "");
		$query= mysqli_query($con, "SELECT * FROM CUSTOMER WHERE PASSWORD= '$pass' AND CUST_NAME='$user'");
		$rows= mysqli_fetch_array($query);
		if($rows['CUST_NAME']==$user && $rows['PASSWORD']==$pass){

			header("Location: customer.php");

		}
		else{
			$error= "Username or pass is invalid";
			echo $error;
		}
		mysqli_close($con);
	}
}
?>