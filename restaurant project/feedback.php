
<?php

require('db.php');



if (isset($_POST['rating'])){
    $rating = ($_POST['rating']);
     
    $feedback = ($_POST['feedback']);

    session_start();
    $email= $_SESSION['key'];
    $sql= mysqli_query($con,"SELECT * FROM CUSTOMER WHERE EMAIL_ID='$email'");
    
    $row=mysqli_fetch_array($sql);

    $c_id=$row['C_ID'];


    
    
        $query = "INSERT INTO FEEDBACK (C_ID, RATING, FEEDBACK) VALUES ('$c_id', '$rating', '$feedback')";

        $result = mysqli_query($con,$query);

        if($result){
            echo"<script type='text/javascript'>
      alert('Thank you for your feedback');
      window.location.replace('customer.php');
      </script>";

    }
        else{
          echo "unsuccessful";
        }
    
    }

?>