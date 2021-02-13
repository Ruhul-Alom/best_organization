<?php 
session_start();
error_reporting(0);

if(!empty($_SESSION['email'])){

include("../database/connection.php");
session_start();  /* for making connection with database */
 
$id=$_SESSION["User_id"];
$query="SELECT * FROM sign_up WHERE User_id =$id";
$runQuery=mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($runQuery);


?>
 


<!DOCTYPE html>
<html lang="en">
<head>
  <title>HR Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="HR.css">
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="../index.php">Best Organization</a>
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="../index.php">Home</a></li>
        <li><a href="../textEditor/post.html">Blog Post</a></li>
        <li><a href="../blog.html">Blog</a></li>
        <li><a href=""data-toggle="modal" data-target="#contactUs-Modal">Contact Us</a></li>
      </ul>
    </div>
  </nav>
  <?php 
$query1="SELECT * FROM hr_blog_post WHERE User_id =$id";
$runQuery1=mysqli_query($connection,$query1);


   ?>
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-8">
        <table class="table table-hover">
        <thead>
          <tr><th>POst Id</th> 
            <th>Genre</th>
            <th>Title</th>
            <th>  Writer</th>
            <th>Date</th>
            <th>  Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data1=mysqli_fetch_assoc($runQuery1)) {
           
          ?>
          <tr>
            <td><?php echo $data1['Blog_id'] ;?></td>
            <td>  <?php echo $data1['Blog_category'] ;?>s</td>
            <td> <?php echo $data1['Blog_title'] ;?></td>
            <td><?php echo $data1['HR_name'] ;?> </td>
            <td><?php echo $data1['Date'] ;?></td>
          <td><button class="btn btn-warning"> Edit</button><button class="btn btn-danger">Delete</button> </td>
          </tr>
           <?php }?>
        </tbody>
      </table>
    </div>
     <div class="col-md-3 user-profile bg-danger">  
<h2 class="text-center">HR Info</h2>
  <div class="card" style="width:250px">
    <div style="padding:20px"> 
  <img class="card-img-top img-fluid" src="../database/<?php echo $data['User_image'] ;?>" alt="Card image" style="width:100%;height:200px">
  </div>
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['User_name'] ;?></h4>
      <p class="card-text"><?php echo $data['User_information'] ;?> </p>
      <div class="card-footer">  
      <a  style=" margin-bottom: 20px; " href="#" class="btn btn-primary p-3"data-toggle="modal" data-target="#myModal">Edit Profile</a>
      <a style=" margin-bottom: 20px; " href="../database/logout.php" class="btn btn-primary justify-content-right pb-3">Log out</a>
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
        <h4 class="modal-title">HR Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="../database/hr_information_update.php" method="POST"  enctype="multipart/form-data">
      <label for="  ">HR name:</label><br>  
      <input type="text" class="form-control" name="Hr_name" value="<?php echo $data['User_name'];?>"><br> 
       <label for="  ">HR Email:</label><br> 
      <input type="email" class="form-control" name="Hr_email" value="<?php echo $data['User_email']; ?>"><br> 
       <label for="  ">HR Password:</label><br> 
      <input type="password"class="form-control" name="Hr_password" value="<?php echo $data['User_password']; ?>"><br> 
      <label for="  ">HR Information:</label><br> 
      <input type="text"class="form-control" name="Hr_information" value="<?php echo $data['User_information']; ?>"><br> 
       <label for="  ">Organization Name:</label><br> 
      <input type="text"class="form-control" name="Current_organization_name" value="<?php echo $data['Current_organization_name']; ?>"><br> 
        <label for="  ">Working period:</label><br> 
      <input type="date"class="form-control" name="working_period" value="<?php echo $data['working_period']; ?>"><br> 
       <label for="  ">Worked Organiziation Name(if any):</label><br> 
      <input type="text"class="form-control" name="Previous_organization_name" placeholder="previous organization name" value="<?php echo $data['Previous_organization_name'];?>"><br> 
      <label for="  ">HR Image:</label><br> 
      <input type="file" name="user_image">
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





<div class="modal" id="contactUs-Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-center"> Contact Us</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body bg-dark">
        <form action="database/login.php" class="from-gourp" method="Post" enctype="multipart/form-data">
           <input type="text"placeholder="Enter your name"class="form-control mb-2" name="name" required>
          <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
          <textarea placeholder="Enter your query" type="text"class="form-control mb-2" name="textarea"width="100%" height="25px" required></textarea>
          
          <input type="submit" value="Post" class="btn btn-info from-control my-btn" name="submit">
  
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


<?php 

} ?>
































































