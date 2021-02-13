<?php 
 session_start();
error_reporting(0);

if(!empty($_SESSION['email'])){
include("../database/connection.php");   /* for making connection with database */
error_reporting(0); 
$query="SELECT * FROM hr_blog_post";
$runQuery=mysqli_query($connection,$query);
/* how many data are in database table */
$numberOfRaws=mysqli_num_rows($runQuery);
	?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Existing Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
      <table class="table table-hover table-responsive">
    <thead>
    <tr> 
            <th>UserId</th>
            <th>Genre</th>
            <th>Title</th>
            <th>  Writer</th>
            <th>Date</th>
            <th>  Operation</th>
    </tr>
   </thead>
    <tbody>
      <?php 
     
      while ($data=mysqli_fetch_assoc($runQuery))
    
       {
        ?>

<tr >
<td><?php echo $data['Blog_id']; ?></td>
<td><?php echo $data['Blog_category']; ?></td>
<td><?php echo $data['Blog_title']; ?></td>
<td><?php echo $data['HR_name']; ?></td>
<td><?php echo $data['Date']; ?></td>
<td><a  class="btn btn-info" href="update_process.php?postId=<?php echo $data['Blog_id']; ?>">Update</a>
<a  class="btn btn-info" href="../database/existing_post_delete.php?postId=<?php echo $data['Blog_id']; ?>">Delete</a></td>
</tr>
    <?php 
      
      }
      
       ?>  
    </tbody>
   </table>
      
    </div>
  </div>
</div>


<?php   

if(isset($_POST['edit_post'])){
  echo data['Blog_id'];
}


 ?>

</body>
</html>
<?php } ?>







































































  <!--admin navbar start
  <nav class="admin_nav navbar-dark">
    <div class="togoole-button">  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".admin-dashboard">
            <span class="navbar-toggler-icon"></span>
          </button>
          </div>
    <div class="admin-logout">
        <button >Admin</button>
    <button >logout</button>
  </nav>
  <div class="admin-dashboard collapse">
    <ul>
      <h3 >Dashboard</h3>
    <li><a href="admin.html">Pending post</a></li>
    <li><a class="existing_post" href="javascript:void(0);">Existing post</a></li>
    <li><a  class="current_user"href="javascript:void(0);">Current user</a></li>
    <li><a  class="user_request"href="javascript:void(0);">User application</a></li>
    <li><a  class="Existing_company"href="">Existing_company</a></li>
    <li><a href="index.html">View Page</a></li>

    </ul>
    </div>

  <div class="show-div col-md-9 offset-3">
     Admin navbar close
<table class="table table-hover">
    <thead>
    <tr><th>Serial_no</th> 
            <th>UserId</th>
            <th>Genre</th>
            <th>Title</th>
            <th>  Writer</th>
            <th>Date</th>
            <th>  Operation</th>
    </tr>
   </thead>
    <tbody>
      <tr>
        <td>01</td>
        <td>01</td>
        <td>  Business</td>
        <td> A comulitive development of Business</td>
        <td> abu abdullah</td>
        <td>20.5.2020</td>
        <td>  Approve|Reject</td>
      </tr>
      <tr>
        <td>02</td>
         <td>02</td>
         <td> Medicine</td>
        <td>Improvement of medicine</td>
        <td> Md Jayad </td>
        <td>21.05.2020</td>
          <td>  Approve|Reject</td>
      </tr>
      <tr>
        <td>03</td>
         <td>03</td>
         <td> Automobile</td>
        <td>The upgrade technology of automobile</td>
           <td> Md Tahmid </td>
        <td>22.05.2020</td>
          <td>  Approve|Reject</td>
      </tr>
      <tr>
        <td>05</td>
        <td>05</td>
        <td>Other</td>
        <td>The feature of bio technology</td>
           <td> Dr monruzzaman </td>
        <td>23.05.2020</td>
          <td>  Approve|Reject</td>
      </tr>
    </tbody>
   </table>
</div>
 -->

</body>
</html>