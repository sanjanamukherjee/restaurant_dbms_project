
<?php
require('db.php');

if (isset($_POST['A_ID'])){
    $aname = ($_POST['ANAME']);
     
    $aid = ($_POST['A_ID']);

    $phone = ($_POST['PHONE']);

    $email = ($_POST['EMAIL']);

    $pass = ($_POST['PASSWORD']);
    

    
    
        $query = "INSERT INTO ADMIN (ANAME, A_ID, PHONE, EMAIL, PASSWORD) VALUES ('$aname', '$aid', '$phone', '$email', '$pass')";

        $result = mysqli_query($con,$query);

        if($result){
            echo"<script type='text/javascript'>
      alert('new admin added');
      window.location.replace('alogin.html');
      </script>";

    }
        else{
          echo "unsuccessful";
        }
    
    }



