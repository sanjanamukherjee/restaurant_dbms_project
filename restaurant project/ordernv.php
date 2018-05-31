<?php
session_start();
require('db.php');
$error="";
$email= $_SESSION['key'];
$sql= mysqli_query($con,"SELECT * FROM CUSTOMER WHERE EMAIL_ID='$email'");
    
$row=mysqli_fetch_array($sql);

$query1= mysqli_query($con, "SELECT * FROM MENU WHERE TYPE= 'NV'");
$row1= mysqli_fetch_array($query1);

$tot_amt=0;
?>
<head>
  
    <link href="css2/bootstrap.min.css" rel="stylesheet">

   
    <link href="css2/1-col-portfolio.css" rel="stylesheet">

    
</head>
<style>
 
 th{
    text-align: center;
 }

 .modal {
	padding-top: 250px;
	align-content: center;
	width: 75%;
	padding-left: 250px;
 }
</style>


<br>
<br>
<br>
<br>
<body style="background: url('./img/allback.jpg') no-repeat;">
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
                        <a href="orders.html">ORDERS</a>
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

<h2 style="font-family: cursive; margin-left: 27%"><font color="brown">SELECT THE ITEMS YOU WISH TO ORDER</font></style></h2>

<form action="ordernv.php" method="post">
<table style="width: 50%; margin-top: 5%"; align="center" border="1">
	<tr>
		<th>ITEM_ID</th>
		<th>ITEM NAME</th>
		<th>PRICE</th>
	</tr>
<?php
	while(($row1= mysqli_fetch_array($query1))>0)
	{		
		echo"<tr>";$id=$row1['ITEM_ID'];
		echo"<td><input type='checkbox' name= 'select[]' value= '$id'>".$row1['ITEM_ID'].'</input></td>';
		echo"<td>".$row1['ITEM_NAME']."</td>";
		echo"<td>".$row1['PRICE']."</td>";
		echo"</tr>";
	}
?>
</table>
	<br>
	<h3 style="font-family: cursive; margin-left: 27%"><font color="brown">Would you like to </font></h3>
	<input type="radio" name="type1" value="have" style="margin-left: 30%;width: 5%;height: 2em;border: 1px solid black; border-radius: 50%"/><label><B>have at my restaurant?</B></label>
	<input type="radio" id="btn" name="type1" value="delivery" style="margin-left: 10%;width: 5%;height: 2em"><label><B>get it delivered?</B></label>
	<B><input type="submit" name="done" value="place order" style="margin-left: 50%; margin-top: 5%;"></B>
	</form>
	<div id="myModal" class="modal">
		<div class="modal-content">
    		<span class="close">&times;</span>
    		<form action="ordernv.php" method="post">
    			<h3>enter your address</h3>
    			<textarea name="address" class="form-control" placeholder="your address" required></textarea>
    			<h3>enter your contact :</h3>
    			<input type="text" maxlength="10" name="phone" class="form-control" placeholder="Phone Number" pattern="[1-9]{1}[0-9]{9}" title="only 10 digits" required>
				<B><input type="submit" name="okay" value="okay" style="margin-left: 50%; margin-top: 5%;"></B>
			</form>
  	</div>
	</div>
	<script>

		
		var modal = document.getElementById('myModal');
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		// When the user clicks the button, open the modal 
		btn.onclick = function() {
    		modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>
	<?php

	

	

	if(isset($_POST['type1']) && ($_POST['type1']) == "have"){
		$query3= mysqli_query($con,"INSERT INTO ORDERS (CUST_ID) VALUES ($row[C_ID])");
		$id= mysqli_insert_id($con);
		$_SESSION['oid']=$id;
	}
	
	
	if(isset($_POST['okay'])){
					$query3= mysqli_query($con,"INSERT INTO ORDERS (CUST_ID) VALUES ($row[C_ID])");
					$id= mysqli_insert_id($con);
					$_SESSION['oid']=$id;
					$ADD=$_POST['address'];
					$PH=$_POST['phone'];
					$s3="UPDATE ORDERS SET ADDRESS= '$ADD', PH_NO= $PH WHERE ORDER_ID= $id";
					//echo $s3;
					$query7= mysqli_query($con,$s3);
					
				}

	if(isset($_POST['done']))
	
			{
				
				if(!empty($_POST['select']))
				{
				global $tot_amt;
				foreach($_POST['select'] as $selected)
				{
					//echo $selected;
					$s="SELECT * FROM MENU WHERE ITEM_ID= $selected";
					//echo $s;
					$query4= mysqli_query($con,$s);
					$row4= mysqli_fetch_array($query4);
					$id= $_SESSION['oid'];
					$s1="INSERT INTO ORDER_ITEMS (ORDER_ID, ITEMS, ITEM_PRICE) VALUES ($id,'$row4[ITEM_NAME]',$row4[PRICE])";
					//echo $s1;
					$query5= mysqli_query($con,$s1);
					$tot_amt= $tot_amt + $row4['PRICE'];

				}
				$id= $_SESSION['oid'];
				$query6= mysqli_query($con,"UPDATE ORDERS SET TOT_AMT = $tot_amt WHERE ORDER_ID= $id");
				}

				if(isset($_POST['type1']) && ($_POST['type1']) == "have"){
					echo "<script>window.location.assign('myorders1.php')</script>";
				}
				else{
					echo "<script>window.location.assign('myorders2.php')</script>";
				}

				
				
			}
?>
</body>