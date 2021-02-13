<?php 
session_start();
// error_reporting(0);

if(!empty($_SESSION['email'])){
include("../database/connection.php");
 /* for making connection with database */ 
$id=$_SESSION["User_id"];
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
  <style> 
  .org-ratting{
    color: rgb(253, 180, 42);
    margin: 12px;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">Best Organization</a>
    </div>
    <ul class="nav navbar-nav">
    <li ><a href="../index.php">Home</a></li>
      <li><a href="../blog.php">HR Blog</a></li>
      <li><a href=""data-toggle="modal" data-target="#contactUs-Modal">Contact Us</a></li>
      <li><a href="../about_us.html">About Us</a></li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="btn btn-primary"data-toggle="modal" data-target="#suggest-org-Modal">Suggest Organization</a>
      </li>
    </ul>
  </div>
</nav>
 
<?php  
include("../database/connection.php");
$query="SELECT * FROM sign_up where User_name='arif'";
$runQuery=mysqli_query($connection,$query);

?>

<div class="container-fluid">
 <!-- <div class="row">
    
    <div class="col-md-8">
      <h2 class="bg-info text-center">User Activity:Rating</h2>
      <table class="table table-hover">
    <thead>
    <tr><th>Serial_no</th> 
            <th>Organization Name</th>
            <th>Rating</th>
            <th>Date</th>
            <th>  operation</th>
            
   </thead>
    <tbody>
      <tr>
        <td>01</td>
        <td>  Bosundhara Group</td>
        <td class="org-ratting"><i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </td>
        <td>20.5.2020</td>
         <td>  <button class="btn btn-danger">Delete</button>&nbsp;<button class="btn btn-info">Edit</button></td>
       
      </tr>
      <tr>
        <td>02</td>
        <td>  Meghna Group</td>
        <td class="org-ratting"><i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </td>
        <td>20.5.2020</td>
         <td>  <button class="btn btn-danger">Delete</button>&nbsp;<button class="btn btn-info">Edit</button></td>
       
      </tr>
      <tr>
         <td>03</td>
        <td>  Acmi Bangladesh </td>
        <td class="org-ratting"><i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </td>
        <td>20.5.2020</td>
         <td>  <button class="btn btn-danger">Delete</button>&nbsp;<button class="btn btn-info">Edit</button></td>
        
      </tr>
      <tr>
         <td>04</td>
        <td>  Square Group</td>
        <td class="org-ratting"><i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half"></i>
            </td>
        <td>20.5.2020</td>
         <td>  <button class="btn btn-danger">Delete</button>&nbsp;<button class="btn btn-info">Edit</button></td>
      </tr>
    </tbody>
   </table>
      
    </div>
   
        <div class="col-md-3 user-profile">  
<h2 class="text-center">User Info</h2>
  <div class="card" style="width:250px">
    <img class="card-img-top img-fluid" src="user.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">. John Doe is a Computer Engineer engineer.Lorem ipsum dolor sit amet,lorem ipsam some text it is a </p>
      <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#myModal">Edit Profile</a>
      <a href="../database/logout.php" class="btn btn-primary justify-content-right">Log out</a>
    </div>
  </div>
</div>
      </div>-->
    



   <?php 

$sq="SELECT p.Blog_id as Blog_id ,p.Blog_category as Blog_category ,p.Blog_title as Blog_title,p.Hr_name as Hr_name ,b.Comment_text as Comment_text ,b.Date as dates from blog_comment as b left join hr_blog_post as p on b.Blog_id=p.Blog_id where b.User_id ='$id'";
$sr=mysqli_query($connection,$sq);
// $fd=mysqli_fetch_assoc($sr);
// echo $sq;


 ?>
  
 <div class="row">
  <div class="col-md-8">
   <h2 class="bg-info text-center">User Activity:Blog Comment</h2>
      <table class="table table-hover">
    <thead>
    <tr><th>Post Id</th> 
            <th>Genre</th>
            <th>Title</th>
            <th>  Writer</th>
            <th>Comment</th>
            <th>Date</th>
             <th>Operation</th>
           
    </tr>
   </thead>
    <tbody>


 <?php 
     
     while ($fd=mysqli_fetch_assoc($sr))
   
      { 

 ?>
  <tr>
    <td><?php echo $fd ['Blog_id'];?></td>
    <td><?php echo $fd ['Blog_category'] ; ?></td>
     <td><?php echo $fd['Blog_title'] ; ?></td>
      <td><?php echo $fd['Hr_name'] ; ?></td>
    <td><?php  
      echo substr($fd['Comment_text'],0,12)  ?>..;</td>
    <td><?php echo $fd['dates'];?></td>
    <td>
      <a  class="btn btn-info" href="../database/user_delete.php?userId=<?php echo $data['User_id']; ?>">Delete</a>
    </td>

  </tr>
 <?php }
  ?> 
    </tbody>
   </table> 
  </div> 

        <div class="col-md-3 user-profile">  
<h2 class="text-center">User Info</h2>
  <div class="card" style="width:250px">
    <img class="card-img-top img-fluid" src="../database/<?php echo $data['User_image'] ;?>" alt="Card image" style="width:100%;height:200px">
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['User_name'] ;?></h4>
      <p class="card-text"><?php echo $data['User_information'] ;?> </p>
      <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#myModal">Edit Profile</a>
      <a href="../database/logout.php" class="btn btn-primary justify-content-right">Log out</a>
    </div>
  </div>
</div>
      </div>



<?php 
/*
$org_query="SELECT * FROM organization_comment WHERE User_id ='$id'";
$org_runQuery=mysqli_query($connection,$org_query);
$org_data=mysqli_fetch_assoc($org_runQuery);
$p=$org_data['Org_id'];
$for_org_query=mysqli_query($connection,"SELECT * FROM organization WHERE Org_id ='$p'");
$for_org_data=mysqli_fetch_assoc($for_org_query);
 */


$sq1="SELECT o.Org_id as Org_id, o.Org_name as Org_name,oc.Comment_text as Comment_text, oc.Date as dates  from organization_comment as oc left join organization as o on oc.Org_id=o.Org_id where oc.User_id ='$id' and oc.status='1'";
$sr1=mysqli_query($connection,$sq1);

 ?>




   <div class="row">
   
  <div class="col-md-12">
   <h2 class="bg-info text-center">User Activity:Organization Comment</h2>
      <table class="table table-hover">
    <thead>
    <tr><th>Organization id</th> 
            <th>Organization Name</th>
            <th>Comment</th>
            <th>Date</th>
             <th>Operation</th>
           
    </tr>
   </thead>
    <tbody>

   <?php 
     
     while ($fd1=mysqli_fetch_assoc($sr1))
   
      { 

 ?>
  <tr>
    <td><?php echo $fd1 ['Org_id'];?></td>
    <td><?php echo $fd1['Org_name'] ; ?></td>
    <td><?php  
      echo substr($fd1['Comment_text'],0,12)  ?>..;</td>
    <td><?php echo $fd1['dates'];?></td>
    <td><a  class="btn btn-info" href="fullpostadminView.php?userId=<?php echo $data['User_id']; ?>">Edit</a>
      <a  class="btn btn-info" href="../database/user_delete.php?userId=<?php echo $data['User_id']; ?>">Delete</a>
    </td>

  </tr>
 <?php }
  ?> 
      </tr>
    </tbody>
   </table> 
</div>
  </div>
 </div>







<!-- The Modal -->
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
        <form action="../database/user_information_update.php" method="POST" enctype="multipart/form-data">
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
        <form action="" class="from-gourp" method="Post" enctype="multipart/form-data">
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




                                        <div class="modal" id="suggest-org-Modal">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header bg-primary">
                                                  <h4 class="modal-title "> Suggest Organization</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                          
                                                <!-- Modal body -->
                                                <div class="modal-body bg-dark">
                                                  <form action="database/login.php" class="from-gourp" method="Post" enctype="multipart/form-data">
                                                     <input type="text"placeholder="Organization name"class="form-control mb-2" name="name" required>
                                                    <input type="text" placeholder="Organization link"class="form-control mb-2" name="email" required>
                                                    <textarea placeholder="write some about tis organization" type="text"class="form-control mb-2" name="textarea"width="100%" height="25px" required></textarea>
                                                    
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


<?php   } ?>





































































	