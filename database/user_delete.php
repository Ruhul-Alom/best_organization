<?php
    include("../database/connection.php"); 
    $id= $_GET['userId'];

 $sql="DELETE FROM sign_up WHERE User_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/current_user.php");
?>