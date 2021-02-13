
<?php 
session_start();
// error_reporting(0);

if($_REQUEST['userId']){
include("../database/connection.php");
 /* for making connection with database */ 
$id=$_REQUEST ["userId"];
$query="SELECT * FROM sign_up WHERE User_id ='$id'";
$runQuery=mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($runQuery);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
  <link rel="stylesheet" href="user.css">
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
<div class="col-md-7 bg-info ml-3">
        <form action="../database/edit_user_information.php?id=<?php  echo $id?>" method="POST">
      <label for="  ">User name:</label><br>  
      <input type="text" class="form-control" name="User_name" value="<?php echo $data['User_name'];?>"><br> 
       <label for="  ">User Email:</label><br> 
      <input type="email" class="form-control" name="User_email" value="<?php echo $data['User_email']; ?>"><br> 
       <label for="  ">User Password:</label><br> 
      <input type="password"class="form-control" name="User_password" value="<?php echo $data['User_password']; ?>"><br> 
      <label for="  ">User Information:</label><br> 
      <input type="text"class="form-control" name="User_information" value="<?php echo $data['User_information']; ?>"><br> 
       <label for="  ">Organization Name:</label><br> 
      <input type="text"class="form-control" name="Current_organization_name" value="<?php echo $data['Current_organization_name']; ?>"><br> 
       <label for="  ">User Designation:</label><br> 
      <input type="text" class="form-control" name="User_designation" value="<?php echo $data['user_designation']; ?>"><br> 
        <label for="  ">Working period:</label><br> 
      <input type="text"class="form-control" name="working_period" value="<?php echo $data['working_period']; ?>"><br> 
       <label for="  ">Worked Organiziation Name(if any):</label><br> 
      <input type="text"class="form-control" name="Previous_organization_name" value="<?php echo $data['Previous_organization_name'];?>"><br> 
    
      <input type="submit" value="Edit Profile" name="edit_info" class="btn btn-primary">
      </form>
      </div>


    
</body>
<?php   } ?>