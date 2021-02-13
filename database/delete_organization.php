<?php
    include("../database/connection.php"); 
    $id= $_GET['orgId'];

 $sql="DELETE FROM organization WHERE Org_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/existing_company.php");
?>