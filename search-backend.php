<?php
   session_start();
   require_once("database/connection.php");

    if(isset($_REQUEST['term'])){
        $sql = "SELECT * FROM hr_blog_post WHERE Blog_title LIKE ?";
        $stmt = mysqli_prepare($connection,$sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"s",$param_term);

            $param_term = $_REQUEST["term"]."%";
            $query = mysqli_stmt_execute($stmt);
            if($query){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                     $a=$row['Blog_id'];
                        echo "<a href='blog_description.php?postId=$a'>".$row['Blog_title']."</a>";
                    }
                }
                else{
                    echo "<p>NO MATCHES FOUND</p>";
                }
            }
        }
         }
    