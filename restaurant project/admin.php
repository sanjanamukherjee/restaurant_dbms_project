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
                        <a href="adminfeedback.php">FEEDBACK</a>
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
    $aid= $_SESSION['key1'];
    $sql= mysqli_query($con,"SELECT * FROM ADMIN WHERE A_ID='$aid'");
    
    $row=mysqli_fetch_array($sql);

    ?>
    <h1 align='center'>Admin Name : <?php echo $row['ANAME']; ?></h2>
    <h2 align='center'>Admin_id : <?php echo $row['A_ID']; ?></h2>
    <h2 align='center'>Phone : <?php echo $row['PHONE']; ?></h2>
    <h2 align='center'>Email_id : <?php echo $row['EMAIL']; ?></h2>

    <script src="js/jquery.js"></script>

   
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
