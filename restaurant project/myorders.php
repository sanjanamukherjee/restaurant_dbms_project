<?php
error_reporting(0);
session_start();

require('db.php');
$id= $_SESSION['oid'];
$query= mysqli_query($con,"SELECT * FROM ORDER_ITEMS WHERE ORDER_ID= $id");
//$row= mysqli_fetch_array($query);

?>

<head>
	
<link href="css2/bootstrap.min.css" rel="stylesheet">

</head>

<style>

 body{
    background: url('./img/allback.jpg') no-repeat;
    margin-top: 10%;
 }

h1{
	font-style: italic;
	font-family: cursive;
}

h2{
	margin-left: 35%;
}

</style>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
         
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                 
                </button>
                
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                <ul class="nav navbar-nav">
                   
                    <li>
                        <a href="customer.php">WELCOME</a>
                    </li>
                    <li>
                        <a href="myorders.php">YOUR ORDER</a>
                    </li>
                    <li>
                        <a href="feedback.html">FEEDBACK</a>
                    </li>
                    <li>
                        <a href="logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
           
        </div>
       
    </nav>

<h1 align="center">YOUR ORDER :</h1>
<h2> ORDER ID: <?php echo $id; ?> </h2>
<h2> ORDERED ITEMS: </h2>
<table align="center" border="1" style="width: 25%">
	<tr>
		<th>ITEMS</th>
		<th>ITEM PRICE</th>
	</tr>
	<?php
	while(($row=mysqli_fetch_array($query))>0){
		echo "<tr>";
		echo "<td>".$row['ITEMS']."</td>";
		echo "<td>".$row['ITEM_PRICE']."</td>";
		echo "</tr>";
	}
	?>
</table>
<?php
$query1= mysqli_query($con,"SELECT * FROM ORDERS WHERE ORDER_ID= $id");
	$row1= mysqli_fetch_array($query1);
	echo "<h2> TOTAL AMOUNT: Rs".$row1['TOT_AMT']."</h2>";
?>

<form action="orders.html">
<input type="submit" value="change order" style="margin-left: 45%;" />
</form>

</body>

