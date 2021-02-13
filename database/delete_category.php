<?php
    include("../database/connection.php"); 
    $id= $_GET['categoryId'];

 $sql="DELETE FROM category WHERE Category_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/current_category.php");
?>
