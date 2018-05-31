<!DOCTYPE html>
<html lang="en">

<head>

    <link href="css2/bootstrap.min.css" rel="stylesheet">

   
    <link href="css2/1-col-portfolio.css" rel="stylesheet">

    
</head>
<style>
 body{
    background: url('./img/allback.jpg') no-repeat;
    margin-top: 10%;
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
                        <a href="orders.html">ORDERS</a>
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

    <?php session_start();
    require('db.php');
    $email= $_SESSION['key'];
    $sql= mysqli_query($con,"SELECT * FROM CUSTOMER WHERE EMAIL_ID='$email'");
    
    $row=mysqli_fetch_array($sql);
    ?>
    <h1 align='center'>Customer Name : <?php echo $row['CUST_NAME']; ?></h2>
    <h2 align='center'>Customer_id : <?php echo $row['C_ID']; ?></h2>
    <h2 align='center'>Phone : <?php echo $row['PH_NO']; ?></h2>
    <h2 align='center'>Email_id : <?php echo $row['EMAIL_ID']; ?></h2>
    <script src="js/jquery.js"></script>

   
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
