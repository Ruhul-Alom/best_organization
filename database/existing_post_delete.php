<?php
    include("../database/connection.php"); 
    $id= $_GET['postId'];

 $sql="DELETE FROM hr_blog_post WHERE Blog_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$conn->error;
}

    header("location:../admin/existing_post.php");
?>
