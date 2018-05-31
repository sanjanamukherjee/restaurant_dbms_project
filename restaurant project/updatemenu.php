
<?php
require('db.php');

if (isset($_POST['ITEM_NAME'])){
    $itemname = ($_POST['ITEM_NAME']);
     //escapes special characters in a string
    $price = ($_POST['PRICE']);

    $type = ($_POST['TYPE']);
    

    
    
        $query = "INSERT INTO MENU (ITEM_NAME, PRICE, TYPE) VALUES ('$itemname', '$price', '$type')";

        $result = mysqli_query($con,$query);

        if($result){
            echo"<script type='text/javascript'>
      alert('updation successful');
      window.location.replace('updatemenu.html');
      </script>";

    }
        else{
          echo "unsuccessful";
        }
    
    }

if (isset($_POST['ITEM_ID'])){
    $itemname = ($_POST['I_NAME']);
     //escapes special characters in a string
    $id = ($_POST['ITEM_ID']);

    
    

    
    
        $query2 = "DELETE FROM MENU WHERE ITEM_ID='$id'";

        $delete = mysqli_query($con,$query2);

        if($delete){
            echo"<script type='text/javascript'>
      alert('deletion successful');
      window.location.replace('updatemenu.html');
      </script>";

    }
        else{
          echo "unsuccessful";
        }
    
    }





?>


