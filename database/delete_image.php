<?php
    include("../database/connection.php"); 
    $id= $_GET['imageId'];

 $sql="DELETE FROM first_img_slider WHERE img_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/slider_image.php");
?>
