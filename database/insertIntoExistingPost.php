<?php 
   include("../database/connection.php"); 
    $id= $_GET['postId'];
    $sq = "SELECT * from blog_pending_post where Blog_id= '$id'";
    $details= mysqli_query($connection, $sq);
    $res= mysqli_fetch_assoc($details);

$userid= $res['User_id'];
$HR_name= $res['HR_name'];
$HR_Org_name='square';
$blog_catagory=$_res['Blog_category'];
$blog_title=$_res['Blog_title'];
$blog_text=$_res['Blog_text'];
$fileName=$res['Blog_img'];

$Query="INSERT INTO hr_blog_post (User_id,HR_name,HR_Org_name,Blog_category,Blog_title,Blog_text,Blog_img) VALUES('$userid','$HR_name','$HR_Org_name','$blog_catagory','$blog_title','$blog_text','$fileName')";
$runQuery=mysqli_query($connection,$Query);
if($runQuery){

	header("location:../admin/existing_post.php");
}


$sql="DELETE FROM blog_pending_post WHERE Blog_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$$connection->error;
}

    header("location:../admin/pending_post.php");
  
?>







 