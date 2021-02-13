<?php 

include("connection.php");          
session_start();

if(isset($_REQUEST['User_name']) || isset($_REQUEST['blog_category']) || isset($_REQUEST['blog_title']) || isset($_REQUEST['blog_text']) || isset($_REQUEST['blog_img'])){
$User_id=$_SESSION["User_id"];
$HR_name=$_SESSION["User_name"];
$HR_Org_name='square';
$blog_catagory=$_REQUEST['blog_category'];
$blog_title=$_REQUEST['blog_title'];
$blog_text=$_REQUEST['blog_text'];
$blog_img=$_FILES['blog_img']['name'];
$tempname=$_FILES['blog_img']['tmp_name'];
$foldername="blog_img/".$blog_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );

$Query="INSERT INTO blog_pending_post (User_id,HR_name,HR_Org_name,Blog_category,Blog_title,Blog_text,Blog_img) VALUES('$User_id','$HR_name','$HR_Org_name','$blog_catagory','$blog_title','$blog_text','$foldername')";
$runQuery=mysqli_query($connection,$Query);
if($runQuery){

	header("location:../blog.php");
}
}
	
 ?>













 
