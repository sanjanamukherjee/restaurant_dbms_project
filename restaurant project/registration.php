
<?php
require('db.php');

if (isset($_POST['CUST_NAME'])){
		$username = ($_POST['CUST_NAME']);
		 //escapes special characters in a string
		$ph_no = $_POST['PH_NO'];
		
		$email = $_POST['EMAIL_ID'];
		
		$password = $_POST['PASSWORD'];
		

		$repeat = mysqli_query($con, "SELECT * FROM CUSTOMER WHERE EMAIL_ID='$email'");
		$rows= mysqli_fetch_array($repeat);

		if($rows!=null)
		{
			echo"<script type='text/javascript'>
			alert('already registered');
			window.location.replace('restaurant.html');
			</script>";
		}
		

		else{
		
        $query = "INSERT INTO CUSTOMER (CUST_NAME, PH_NO, EMAIL_ID, PASSWORD) VALUES ('$username', $ph_no, '$email', '$password')";

        $result = mysqli_query($con,$query);

        if($result){
            echo"<script type='text/javascript'>
			alert('you are registered successfully');
			window.location.replace('clogin.html');
			</script>";

}
        else{
        	echo "unsuccessful";
        }
    }
    }



?>


