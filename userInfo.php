 <?php 
 // session_start();

if(!empty($_SESSION['email'])){
include("database/connection.php");
 /* for making connection with database */ 
$id=$_SESSION["User_id"];
$query="SELECT * FROM sign_up WHERE User_id ='$id'";
$runQuery=mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($runQuery);

  ?>

 <div class="card">
 	<div class="p-3">	
     <img class="card-img-top img-fluid" src="database/<?php echo $data['User_image'] ;?>" alt="Card image" style="width:100%;height:200px">
    </div>
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['User_name'] ;?></h4>
      <p class="card-text"><?php echo $data['User_information'] ;?> </p>
      <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#myModal">Edit Profile</a>
      <a href="../database/logout.php" class="btn btn-primary justify-content-right">Log out</a>
    </div>
  </div>
  <?php if($data['Rule']=="HumanResourses"){ ?>

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
        <form action="database/hr_information_update.php" method="POST"  enctype="multipart/form-data">
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
     




  <?php } else if($data['Rule']=="General User"){ ?>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->

<div class="modal-body">
        <form action="database/user_information_update.php" method="POST" enctype="multipart/form-data">
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
        <label for="  ">Working period:</label><br> 
      <input type="date"class="form-control" name="working_period" value="<?php echo $data['working_period']; ?>"><br> 
       <label for="  ">Worked Organiziation Name(if any):</label><br> 
      <input type="text"class="form-control" name="Previous_organization_name" value="<?php echo $data['Previous_organization_name'];?>"><br> 
      <label for="  ">User Image:</label><br> 
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

 <?php }}?>