<?php 
session_start();
if(!empty($_SESSION['email'])){
include("../database/connection.php");   /* for making connection with database */
error_reporting(0);

$user_query="SELECT * FROM contact_form";
$user_runQuery=mysqli_query($connection,$user_query);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Query</title>
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
            <th>Query_Id</th>
            <th>User_name</th>
            <th> User email</th>
            <th>Query</th>
            <th>Date</th>
            <th>decision </th>
    </tr>
    </thead>
    <tbody>

    <?php 
     
     while ($data=mysqli_fetch_assoc($user_runQuery))
   
      {

 ?>
  <tr>
    <td><?php echo $data['Con_id']?></td>
    <td><?php echo $data['User_name']?></td>
    <td><?php echo $data['User_email']?></td>
    <td><?php echo $data['Query_text']?></td>
    <td><?php echo $data['Date']?></td>
    <td><a href="delete_user_query.php?QueryId=<?php echo $data['Con_id']?>" class="btn btn-primary">Delete</a>
    </td>

  </tr>
 <?php }
  ?> 

    </tbody>
  </table>
      
    </div>
  </div>
</div>


</body>
</html>

<?php } ?>

























