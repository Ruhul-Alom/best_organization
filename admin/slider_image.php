
<?php 
session_start();
error_reporting(0);

if(!empty($_SESSION['email'])){ 
include("../database/connection.php"); 

$query="SELECT * FROM first_img_slider";
$runQuery=mysqli_query($connection,$query);

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Current category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin.css">
</head>
<body>

 <?php  
include("../database/admin_navbar.php");
?>
  
<div class="container-fluid">
  <div class="row">
    
       <?php  
include("../database/admin_right_navbar.php");
?>
    <div class="col-md-10" id="content-holder">
    <table class="table table-hover">
    <thead>
    <tr>
             <th>Image Id</th> 
            <th>Image Path</th>
            <th>Date</th>
            <th>  Operation</th>
    </tr>
   </thead>
    <tbody>

        <?php 
     
     while ($data=mysqli_fetch_assoc($runQuery))
     {

 ?>
  <tr>
    <td><?php echo $data['img_id']?></td>
    <td><?php echo $data['folder_name']?></td>
    <td><?php echo $data['Date']?></td>
    <td>
      
      <a  class="btn btn-info" href="../database/delete_image.php?imageId=<?php echo $data['img_id']; ?>">Delete</a>
    </td>

  </tr>
 <?php }
  ?> 
    </tbody>
   </table> 
   <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Image</button> 
      
    </div>
  </div>
</div>







<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="../database/add_image.php" method="POST" enctype="multipart/form-data">
          <label for="  ">Image Path</label><br> 
      <input type="file" name="image_name" value="">
         <input type="submit" value="add image" name="add_image">
      </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


</body>
</html>

<?php } ?>



 
       









