<?php
    include("../database/connection.php"); 
    $id= $_GET['QueryId'];

 $sql="DELETE FROM contact_form WHERE Con_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/User_query.php");
?>
