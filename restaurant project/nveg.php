<?php
require('db.php');
$error="";

$query= mysqli_query($con, "SELECT * FROM MENU WHERE TYPE= 'NV'");
$rows= mysqli_fetch_array($query);
?>
<br>
<br>
<br>
<br>
<style>
 
 td{
    text-align: center;
    font-size: 20px;
    height: 20px;
 }
 th{
    text-align: center;
     border: 3px solid black;
    height: 30px;
 }
</style>

<body style="background: url('./img/allback.jpg') no-repeat;">
<table style="width: 50%; margin-top: 5%"; align="center" border="1">
	<tr>
		<th>ITEM_ID</th>
		<th>ITEM NAME</th>
		<th>PRICE</th>
	</tr>
	<?php
	while(($rows= mysqli_fetch_array($query)) > 0)
	{
		echo"<tr>";
		echo"<td>".$rows['ITEM_ID']."</td>";
		echo"<td>".$rows['ITEM_NAME']."</td>";
		echo"<td>".$rows['PRICE']."</td>";
		echo"</tr>";
	}

	?>
</body>