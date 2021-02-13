
<?php 
session_start();
error_reporting(0);

if(!empty($_SESSION['email'])){ 
include("../database/connection.php"); 

$query="SELECT * FROM category";
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
             <th>Category Id</th> 
            <th>Catagory</th>
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
    <td><?php echo $data['Category_id']?></td>
    <td><?php echo $data['Category_name']?></td>
    <td><?php echo $data['Date']?></td>
    <td>
       <a  class="btn btn-info" href="../database/edit_category.php?categoryId=<?php echo $data['Category_id']; ?>">Edit</a>
      <a  class="btn btn-info" href="../database/delete_category.php?categoryId=<?php echo $data['Category_id']; ?>">Delete</a>
    </td>

  </tr>
 <?php }
  ?> 
    </tbody>
   </table> 
   <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Add catagory</button> 
      
    </div>
  </div>
</div>







<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="../database/add_category.php" method="POST">
          <label for="  ">Category Name</label><br> 
      <input type="text" name="category_name" value="">
         <input type="submit" value="add category" name="add_category">
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



 
       









