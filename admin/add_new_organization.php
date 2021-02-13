<?php 
session_start();
error_reporting(0);

if(!empty($_SESSION['email'])){
include("../database/connection.php"); 
error_reporting(0); 
$query="SELECT * FROM category";
$runQuery=mysqli_query($connection,$query);
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


?>

    
  
      
<div class="container-fluid">
    <div class="row">
      <?php  
include("../database/admin_right_navbar.php");
?>

      <div class="col-md-10 "style="background-color:#63858c;">

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

 
 <form method="post" action="../database/add_organization.php" enctype="multipart/form-data"> 


    <label style="width: 100%">Select Image to upload :</label> <input  type="file" name="organization_image" >
   <br>  <label> Category:</label><select name="organization_category" style="width: 100%" >
    <option value="" disabled selected >Choose option</option> 
     <?php 
     
     while ($data=mysqli_fetch_assoc($runQuery))
     {

 ?>
   <option  class="text-dark" value="<?php echo $data['Category_name'] ?>"> <?php echo $data['Category_name'] ?></option> 

   <?php } ?>
</select> 

 
   <br> <b>Title: </b><input type="text" name="organization_name" style="width: 100%"  required >
    
  
    <textarea name="organization_description" required> </textarea>  
                <script>
                    CKEDITOR.replace( "organization_description" );
                </script>
                <button class="btn"style="width: 100%;background-color:#63858c;color:white"> Post </button>
  </div>

  </div>

</div>
 	
  
</body>
</html>
<?php } ?>