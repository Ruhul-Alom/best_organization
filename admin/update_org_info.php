
<?php  
session_start();

include("../database/connection.php"); 

if(isset($_GET['orgId'])){
$id=$_GET['orgId'];

$query="SELECT * FROM category";
$runQuery=mysqli_query($connection,$query);
$org_query="SELECT * FROM organization where Org_id='$id'";
$org_query_run=mysqli_query($connection,$org_query);
$org_query_data=mysqli_fetch_assoc($org_query_run);

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit  Organization</title>
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

 
 <form method="post" action="update_org_info.php" enctype="multipart/form-data"> 


    <label style="width: 100%">Select Image to upload :</label> <input  type="file" name="org-image" value="<?php echo $org_query_data['Org_image'] ?>">
   <br>  <label> Category:</label><select name="org-category" style="width: 100%" >
    
     <?php 
     
     while ($data=mysqli_fetch_assoc($runQuery))
     {


 ?>
   <option  class="text-dark"value="<?php echo $org_query_data['Org_category'] ?>"> <?php echo $data['Category_name'] ?></option> 

   <?php } ?>
</select> 

 
   <br> <b>Title: </b>
   <input type="text" name="org-name" style="width: 100%" value="<?php echo $org_query_data['Org_name'] ;?>" >
    
  
    <textarea  name="Org-description" value="<?php echo $org_query_data['Org_description'] ?>"><?php echo $org_query_data['Org_description'] ?> </textarea>  
                <script>
                    CKEDITOR.replace( "Org-description" );
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
$org_category=$_REQUEST['org-category'];
$org_name=$_REQUEST['org-name'];
$org_description=$_REQUEST['Org-description'];
$org_img=$_FILES['org-image']['name'];
$tempname=$_FILES['org-image']['tmp_name'];
$foldername="../database/blog_img/".$org_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );

$foldername="blog_img/".$org_img;
$id=$_REQUEST['postId'];
$update="UPDATE organization SET Org_name='$org_name', Org_category='$org_category', Org_description='$org_description',Org_image='$foldername' WHERE Org_id='$id'";
$Query_run=mysqli_query($connection,$update);
if($Query_run){

header("location:../index.php");
}
#}
else{
echo " hellow";
}
}



 ?>