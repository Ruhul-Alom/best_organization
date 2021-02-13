<?php 
session_start();
error_reporting(0);

if(isset($_REQUEST['postId'])){
include("../database/connection.php"); 
$postId=$_REQUEST['postId'];
error_reporting(0); 
$query="SELECT * FROM category";
$runQuery=mysqli_query($connection,$query);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>edit post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" type="text/css" href="textEditorStyling.css">
  <link rel="stylesheet" href="HR.css">
</head>
<style> 
.post-info{
  margin-top: 120px;
}

</style>
<body>
<?php  
include("../database/admin_navbar.php");
$s="select*from hr_blog_post where Blog_id='$postId'";
$rq=mysqli_query($connection,$s);
$fd=mysqli_fetch_assoc($rq);


?>

    
  
      
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2"style="background-color: #222222;height:100vh;">
       <h3 class="text-center text-info" ><i class="fas fa-columns"></i>
Dashboard</h3>
<ul class=" nav flex-column">
  <li><a  class="font-size" href="admin_panel.php">Admin</a></li>  
  <li><a  class="font-size" href="pending_post.php">Pending Post</a></li>
  <li><a class="existing_post nav-link font-size" href="existing_post.php">Existing Post</a></li>
  <li><a  class="current_user nav-link font-size" href="current_user.php">Current User</a></li>
  <li><a  class="user_request nav-link font-size" href="user_request.php">User Aplication</a></li>
  <li><a  class="Existing_company nav-link font-size"href="Existing_company.php">Existing Company</a></li>
  <li><a  class="current_category nav-link font-size"href="current_category.php">Current Category</a></li>
  <li><a  class="organization_request nav-link font-size"href="Organization_request.php">Organization Request</a></li>
  <li><a  class="add_organization nav-link font-size"href="add_new_organization.php">Add new Organization</a></li>
  </ul>
    </div>

      <div class="col-md-10 "style="background-color:#63858c;">

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

 
 <form method="post" action="../database/edit_blog_post.php" enctype="multipart/form-data"> 


    <label style="width: 100%">Select Image to upload :</label> <input  type="file" name="blog_image" >
   <br>  <label> Category:</label><select name="blog_category" style="width: 100%" >
    <option name="blog_category" value=" <?php   echo $fd['Blog_category']; ?>"   >Choose option</option> 
     <?php 
     
     while ($data=mysqli_fetch_assoc($runQuery))
     {

 ?>
   <option  name="blog_category"  class="text-dark" value="<?php echo $fd['Category_name']; ?>"> <?php echo $data['Category_name'] ?></option> 

   <?php } ?>
</select> 

 
   <br> <b>Title: </b><input type="text" name="blog_title" style="width: 100%" value=" value=" <?php   echo $fd['Blog_title']; ?>"">
    
  
    <textarea name="blog_text" required> <?php   echo $fd['Blog_text']; ?> </textarea>  
                <script>
                    CKEDITOR.replace( "blog_text" );
                </script>
                <button class="btn"style="width: 100%;background-color:#63858c;color:white" name="edit_post"> Post </button>
  </div>

  </div>

</div>
 	
  
</body>
</html>
<?php 
<?php 
       
if (isset($_REQUEST['edit_blog'])) {
  echo "hi";
} 
/*if(isset($_REQUEST['organization_category']) || isset($_REQUEST['organization_name']) || isset($_REQUEST['organization_description']) || isset($_REQUEST['organization_image'])){*/
$blog_post_category=$_REQUEST['blog_category'];
$blog_post_title=$_REQUEST['blog_title'];
$blog_description=$_REQUEST['blog_text'];
$blog_img=$_FILES['blog_image']['name'];
$tempname=$_FILES['blog_img']['tmp_name'];
$foldername="blog_img/".$blog_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );


$updateQuery="UPDATE hr_blog_post SET Blog_title='$blog_post_title',Blog_category='$blog_post_category', Blog_text='$blog_post_title',Blog_img='$foldername' WHERE Blog_id='$postId'";
$runQuery=mysqli_query($connection,$updateQuery);
if($runQuery){

  header("location:../index.php");
}

echo "  hi";  
 ?>


} ?>