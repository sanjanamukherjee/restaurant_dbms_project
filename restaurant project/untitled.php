global $tot_amt;
 		$cnt=array();
 		
 		$cnt=count($_POST['select']);
 		for($i=0;$i<$cnt;$i++)
  		{
     	$id=$_POST['select'][$i];

     	$query= mysqli_query($con, "SELECT * FROM MENU WHERE ITEM_ID='$id'");
     	$row= mysqli_fetch_array($query);
     	$amt= $row['PRICE'];
     	$tot_amt =$tot_amt + $amt; 

	<?php
	$email= $_SESSION['key'];
    $sql= mysqli_query($con,"SELECT * FROM CUSTOMER WHERE EMAIL_ID='$email'");
    
    $row=mysqli_fetch_array($sql);

	$query = "INSERT INTO ORDERS (CUST_ID, TOT_AMT) VALUES ('$row['C_ID']','$tot_amt')";

    $result = mysqli_query($con,$query);

	?>

