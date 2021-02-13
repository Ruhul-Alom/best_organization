
<?php  
session_start();

include("../database/connection.php"); 

if(isset($_GET['postId'])){
$id=$_GET['postId'];

$query="SELECT * FROM category";
$runQuery=mysqli_query($connection,$query);
$post_query="SELECT * FROM hr_blog_post where Blog_id='$id'";
$post_query_run=mysqli_query($connection,$post_query);
$post_query_data=mysqli_fetch_assoc($post_query_run);

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Organization</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" type="text/css" href="textEditorStyling.css">
  <link rel="stylesheet" href="HR.css">
</head>
<style> 
.post-info{
  margin-top: 120px;
}
input[type="submit"]{
  width: 100%;
  display: block;
}

</style>
<body>

<?php  

include("../database/admin_navbar.php");

?>
    
    
  
      
<div class="container-fluid">
    <div class="row">

         <?php  
include("../database/admin_right_navbar.php");
?>


      <div class="col-md-10 "style="background-color:#63858c;">

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

 
 <form method="post" action="update_process.php" enctype="multipart/form-data"> 


    <label style="width: 100%">Select Image to upload :</label> <input  type="file" name="blog_image" value="<?php echo $post_query_data['Blog_img'] ?>">
   <br>  <label> Category:</label><select name="blog_category" style="width: 100%" >
    
     <?php 
     
     while ($data=mysqli_fetch_assoc($runQuery))
     {


 ?>
   <option  class="text-dark"value="<?php echo $post_query_data['Blog_category'] ?>"> <?php echo $data['Category_name'] ?></option> 

   <?php } ?>
</select> 

 
   <br> <b>Title: </b>
   <input type="text" name="blog_title" style="width: 100%" value="<?php echo $post_query_data['Blog_title'] ;?>" >
    
  
    <textarea  name="blog_text" value="<?php echo $post_query_data['Blog_text'] ?>"><?php echo $post_query_data['Blog_text'] ?> </textarea>  
                <script>
                    CKEDITOR.replace( "blog_text" );
                </script>
                <input type="text" name="postId"  value="<?php echo $id ;?> "  hidden="">
               <input type="submit" name="edit_data" value="Post">

              </form>
  </div>

  </div>

</div>
 	
  
</body>
</html>
<?php   }   
 ?>

<?php 

if (isset($_REQUEST['edit_data'])) {

  #if(isset($_REQUEST['blog_category'])&& isset($_REQUEST['blog_title'])&& isset($_REQUEST['blog_text'])&& isset($_REQUEST['blog_image'])){
$blog_post_category=$_REQUEST['blog_category'];
$blog_post_title=$_REQUEST['blog_title'];
$blog_text=$_REQUEST['blog_text'];
$blog_img=$_FILES['blog_image']['name'];
$tempname=$_FILES['blog_image']['tmp_name'];
$foldername="../database/blog_img/".$blog_img;
/*echo $foldername;*/
#move_uploaded_file($tempname,$foldername );
$id=$_REQUEST['postId'];
$update="UPDATE hr_blog_post SET Blog_title='$blog_post_title', Blog_category='$blog_post_category', Blog_text='$blog_text',Blog_img='$foldername' WHERE Blog_id='$id'";
$Query_run=mysqli_query($connection,$update);
if($Query_run){

 # header("location:../index.php");
}
#}
else{
echo " hellow";
}
}



 ?>