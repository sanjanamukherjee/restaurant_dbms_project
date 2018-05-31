<?php
	$tot_amt= 0;
	$id;
	$cnt;

	if(isset($_POST['done']))
		{
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
  		}
		}

?>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<?php
if(isset($_POST['done']))
{
	$tot_amt=0;
	if(isset($_POST['boxes']))
	{
		$id=implode(',', $_POST['boxes']);
		$query2= mysqli_query($con, "SELECT * FROM MENU WHERE ITEM_ID='$id'");
		$row2= mysqli_fetch_assoc($query2);
		$amt= $row2['PRICE'];
		$tot_amt= $tot_amt + $amt;
		$cid=$row['C_ID'];
		$query3= mysqli_query($con, "INSERT INTO ORDERS(CUST_ID, TOT_AMT) VALUES ($cid, $tot_amt)");
		$oid= mysqli_insert_id($con);
		$name= $row2['ITEM_NAME'];
		$query4= mysqli_query($con, "INSERT INTO ORDER_ITEMS(ORDER_ID, ITEMS) VALUES ($oid, '$name')");

	}
	

}
?>


	if(isset($_POST['add[]']))
		
		{	$add= $_POST['add'];
			$cnt=array();
 			$id= implode(',',$add);
 			$cnt=count($_POST['add']);
 			for($i=0;$i<$cnt;$i++)
  			{
     		$id= $add[$i];
			echo $id;
			$query2= mysqli_query($con, "SELECT * FROM MENU WHERE ITEM_ID='$id'");
			
			$row2= mysqli_fetch_assoc($query2);
			$amt= $row2['PRICE'];
			$tot_amt= $amt + $tot_amt;
			$cid=$row['C_ID'];
			$query3= mysqli_query($con, "INSERT INTO ORDERS(CUST_ID, TOT_AMT) VALUES ($cid, $tot_amt)");
			$oid= mysqli_insert_id($con);
			$name= $row2['ITEM_NAME'];
			
			$query4= mysqli_query($con, "INSERT INTO ORDER_ITEMS(ORDER_ID, ITEMS, ITEM_PRICE) VALUES ($oid, '$name', $amt )");
		}


		<?php
        if(isset($_POST['add']))
        {
        $id=$_POST['add'];
        for($i=0;$i<count($id);$i++)
        {
        $exp=explode(',',$id[$i]);//Explode id and name
        echo 'id='.$exp[0];
        echo $query="INSERT INTO tbl_student (id,name) values ('$exp[0]','$exp[1]')";echo "<br><br>";
        }
        }
        ?>


        $query2= mysqli_query($con, "SELECT * FROM MENU WHERE ITEM_ID='$id'");
			
			$row2= mysqli_fetch_assoc($query2);
			$amt= $row2['PRICE'];
			$tot_amt= $amt + $tot_amt;
			$cid=$row['C_ID'];
			$query3= mysqli_query($con, "INSERT INTO ORDERS(CUST_ID, TOT_AMT) VALUES ($cid, $tot_amt)");
			$oid= mysqli_insert_id($con);
			$name= $row2['ITEM_NAME'];
			
			$query4= mysqli_query($con, "INSERT INTO ORDER_ITEMS(ORDER_ID, ITEMS, ITEM_PRICE) VALUES ($oid, '$name', $amt )");

