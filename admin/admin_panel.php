<?php 
session_start();
// error_reporting(0);

if(!empty($_SESSION['email'])){
 
include("../database/connection.php");
$admin_query="SELECT * FROM admin_signup";
$Ad_runQuery=mysqli_query($connection,$admin_query);
$data=mysqli_fetch_assoc($Ad_runQuery);

$panding_post="SELECT * FROM blog_pending_post";
$P_runQuery=mysqli_query($connection,$panding_post);
$numberOfPanding_post=mysqli_num_rows($P_runQuery);

$existing_post="SELECT * FROM ht_blog_post";
$E_runQuery=mysqli_query($connection,$existing_post);
$numberOfExiting_post=mysqli_num_rows($P_runQuery);

$user="SELECT * FROM sign_up";
$U_runQuery=mysqli_query($connection,$user);
$numberOfUser=mysqli_num_rows($U_runQuery);

$panding_user="SELECT * FROM user_application ";
$Pan_runQuery=mysqli_query($connection,$panding_user);
$numberOfPanding_user=mysqli_num_rows($Pan_runQuery);

$category="SELECT * FROM category";
$C_runQuery=mysqli_query($connection,$category);
$numberOfCategory=mysqli_num_rows($C_runQuery);

$organization="SELECT * FROM organization";
$O_runQuery=mysqli_query($connection,$organization);
$numberOfOrgnization=mysqli_num_rows($O_runQuery);

$user_query="SELECT * FROM contact_form";
$user_runQuery=mysqli_query($connection,$user_query);
$numberOfQuery=mysqli_num_rows($user_runQuery);
  ?>












<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin panel</title>
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
include("../database/admin_navbar.php")
?>
  
<div class="container-fluid">
  <div class="row">
    
       <?php  
include("../database/admin_right_navbar.php");
?>
    <div class="col-md-10" id="content-holder">
      <div class="row "> 
        <div class="col-md-8">  
<div class="view-card">
  <div class="card bg-primary my-card">
    <div class="card-body text-center">
 <p class="card-text my-text">Total Pending Post</p>
 <h2><?php echo $numberOfPanding_post?></h2>
    </div>

  </div>
  <div class="card bg-info my-card">
    <div class="card-body text-center">
      <p class="card-text my-text">Total  Post</p>
      <h2><?php echo $numberOfExiting_post ?></h2>
    </div>
  </div>
  <div class="card bg-primary my-card">
    <div class="card-body text-center">
    <p class="card-text my-text">Total User</p>
    <h2><?php echo $numberOfUser?></h2>
    </div>
  </div>
</div>

  <div class="view-card">
  <div class="card bg-danger my-card ">
    <div class="card-body text-center">
     <p class="card-text my-text">User Application </p>
     <h2><?php echo $numberOfPanding_user?></h2>
    </div>
  </div>
  <div class="card bg-primary my-card">
    <div class="card-body text-center">
      <p class="card-text my-text">Total  Company</p>
      <h2><?php echo $numberOfOrgnization ?></h2>
    </div>
  </div>
  <div class="card bg-info my-card">
    <div class="card-body text-center">
    <p class="card-text my-text">Total Category</p>
    <h2><?php echo $numberOfCategory ?></h2>
    </div>
  </div>
</div>
 <div class="view-card">
  <div class="card bg-danger my-card ">
    <div class="card-body text-center">
      <p class="card-text my-text">User Query</p>
      <h2><?php echo $numberOfQuery ?></h2> 
    </div>
  </div>
  <div class="card bg-primary my-card">
    <div class="card-body text-center">
     
    </div>
  </div>
  <div class="card bg-info my-card">
    <div class="card-body text-center">
    
    </div>
  </div>
</div>

        </div>
        <div class="col-md-3 admin-profile">  
<h2 class="text-center"> Admin Info</h2>
  <div class="card" style="width:250px">
    <img class="card-img-top img-fluid" src="../database/<?php echo $data['admin_img'] ;?>" alt="Card image" style="width:100%;height:200px">
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['admin_name'] ;?></h4>
      <p class="card-text"><?php echo $data['admin_info'] ;?> </p>
      <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#myModal">Edit Profile</a>
      <a href="../database/logout.php" class="btn btn-primary justify-content-right">Log out</a>
    </div>
  </div>
</div>
      </div>
      
    </div>
  </div>
</div>







<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admin  Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->






<div class="modal-body">
        <form action="../database/admin_information_update.php" method="POST" enctype="multipart/form-data">
      <label for="  ">Admin name:</label><br>  
      <input type="text" class="form-control" name="admin_name" value="<?php echo $data['admin_name'];?>"><br> 
       <label for="  ">Admin Email:</label><br> 
      <input type="email" class="form-control" name="admin_email" value="<?php echo $data['admin_email']; ?>"><br> 
       <label for="  ">Admin Password:</label><br> 
      <input type="password"class="form-control" name="admin_password" value="<?php echo $data['admin_pssword']; ?>"><br> 
      <label for="  ">Admin Information:</label><br> 
      <input type="text"class="form-control" name="admin_information" value="<?php echo $data['admin_info']; ?>"><br>  
       <label for="  ">Worked Organiziation Name(if any):</label><br> 
      <input type="text"class="form-control" name="Previous_organization_name" value="<?php echo $data['admin_prev_org_name'];?>"><br> 
      <label for="  ">Admin Image:</label><br> 
      <input type="file" name="admin_image">
      <input type="submit" value="Edit Profile" name="edit_profile" class="btn btn-primary">
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
