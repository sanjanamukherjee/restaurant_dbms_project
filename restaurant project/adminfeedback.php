<!DOCTYPE html>
<html lang="en">

<head>

    

   

   
    <link href="css2/bootstrap.min.css" rel="stylesheet">

   
    <link href="css2/1-col-portfolio.css" rel="stylesheet">

    
</head>
<style>
 body{
    background: url('./img/allback.jpg') no-repeat;
 }
 table{
    border: 3px solid black;
   
 }
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

<body>

   
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
         
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                <ul class="nav navbar-nav">
                   
                    <li>
                        <a href="admin.php">WELCOME</a>
                    </li>
                    <li>
                        <a href="updatemenu.html">MENU UPDATION</a>
                    </li>
                    <li>
                        <a href="log.php">LOG</a>
                    </li>
                    <li>
                        <a href="#">FEEDBACK</a>
                    </li>
                    <li>
                        <a href="logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
           
        </div>
       
    </nav>
    
    <?php
    require('db.php');
   
    $query= mysqli_query($con, "SELECT * FROM FEEDBACK");
    $rows= mysqli_fetch_array($query);

    ?>
    <table style="width: 50%; margin-top: 5%" border="1" align= "center">
    <tr>
       
        <th><B>CUST_ID</th>
        <th><B>RATING</th>
        <th><B>FEEDBACK</th>
    </tr>
    <?php
    while(($rows= mysqli_fetch_array($query))!=null)
    {
        echo"<tr>";
        echo"<td>".$rows['C_ID']."</td>";
        echo"<td>".$rows['RATING']."</td>";
        echo"<td>".$rows['FEEDBACK']."</td>";
        echo"</tr>";
    }

?>
    <script src="js/jquery.js"></script>

   
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
