
<?php 
session_start();
// error_reporting(0);

if(!empty($_SESSION['email'])){
include("../database/connection.php");   /* for making connection with database */
error_reporting(0); 
$query="SELECT org.Org_id as Org_id, rat.Avg_rat as Avg_rat, org.Org_image as Org_image, org.Org_name as Org_name, org.Org_description as Org_description,org.Date as Date FROM organization as org left join avg_rating as rat on org.Org_id=rat.Org_id ";
$runQuery=mysqli_query($connection,$query);
/* how many data are in database table */
$numberOfRaws=mysqli_num_rows($runQuery);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Existing company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
  <link rel="stylesheet" href="admin.css">
  <style>
    .org-ratting{
    color: rgb(253, 180, 42);
    margin: 12px;
  }
  </style>
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
        <th>ID</th>
        <th>Comany name</th>
        <th>Entry date</th>
        <th>Ratiing</th>
        <th>Oparetion</th>
      </tr>
    </thead>
    <tbody>
       <?php 
     
      while ($data=mysqli_fetch_assoc($runQuery))
    
       {
        ?>
      <tr>
        <td><?php echo $data['Org_id']?></td>
    <td><?php echo $data['Org_name']?></td>
    <td><?php echo $data['Date']?>
        <td class="org-ratting">
          <?php 
          $Rating_no=$data['Avg_rat'];
           //print_r($Rating_no);
          if ($Rating_no==1) {?>
           <span class="fa fa-star comment-fa"></span>
         <?php  }?>
         <?php    
           if ($Rating_no==2) {?>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
         <?php }  ?> 
         <?php  
          if ($Rating_no==3) {?>
           <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <?php  }?> 
          <?php  
          if ($Rating_no==4) {?>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
         <?php  }  ?>
         <?php
            if ($Rating_no==5) {  ?>
           <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
        <?php  }    ?>
            </td>
    <td><a  class="btn btn-info" href="update_org_info.php?orgId=<?php echo $data['Org_id']; ?>">Edit</a>
      <a  class="btn btn-info" href="../database/delete_organization.php?orgId=<?php echo $data['Org_id'];?>">Delete</a>
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