<?php
    include("../database/connection.php"); 
    $id= $_GET['sugg_org_Id'];

 $sql="DELETE FROM suggested_org WHERE Sugg_org_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/Organization_request.php");
?>