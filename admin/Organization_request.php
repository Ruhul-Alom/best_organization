<?php  
session_start();
error_reporting(0);

if(!empty($_SESSION['email'])){
  include("../database/connection.php"); 
  $addOrg="SELECT*FROM suggested_org";
   $addOrgRun=mysqli_query($connection,$addOrg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Organization Request</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="textEditorStyling.css">
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
            <th>User_name</th>
            <th>email</th>
            <th>Organization Name</th>
            <th>Web link</th>
            <th> description</th>
            <th>decision </th>
    </tr>
    </thead>
    <tbody>
       <?php 

while ($data=mysqli_fetch_assoc($addOrgRun)){
     
  ?>
      <tr>
        <td><?php echo $data['User_name'] ?></td>
        <td><?php echo $data['User_email'] ?></td>
        <td><?php echo $data['Org_name'] ?></td>
        <td><?php echo $data['Org_link'] ?></td>
        <td><?php echo $data['DescripText'] ?></td>
      <td><button class="btn btn-primary"data-toggle="modal" data-target="#add-Org">Add</button>&nbsp;
      <a href="../database/delete_org_suggestion.php?sugg_org_Id=<?php echo $data['Sugg_org_id']?>" class="btn btn-primary">Delete</a> </td>
      </tr>
    <?php } ?>
      
    </tbody>
  </table>
      
    </div>
  </div>
</div>







<!-- The Modal -->
<div class="modal" id="add-Org">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Organization</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="row"style="width: 100%;">

      <div class="col-md-12 "style="background-color:#63858c;margin-left: 10px;">

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

 
 <form method="post" action="post.php" enctype="multipart/form-data"> 


    <label style="width: 100%">Select Image to upload :</label> <input  type="file" name="image" >
   <br>  <label> Category:</label><select name="category" style="width: 100%" >
   <option value="" disabled selected >Choose option</option> 
   
</select> 
 <!--genre !-->
 
   <br> <b>Title: </b><input type="text" name="title" style="width: 100%"  required >
    
  
    <textarea name="content" required> </textarea>  
                <script>
                    CKEDITOR.replace( "content" );
                </script>
                <button class="btn"style="width: 100%;background-color:#63858c;color:white"> Post </button>
  </div>

  </div>
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