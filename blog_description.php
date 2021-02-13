<?php 


if(isset($_REQUEST['postId'])){
session_start();
include("database/connection.php");  

$post_id= $_REQUEST['postId'];
$query="SELECT * FROM hr_blog_post WHERE Blog_id='$post_id'";
$runQuery=mysqli_query($connection,$query);
$data= mysqli_fetch_assoc($runQuery);
$user_id=($_SESSION["User_id"]);
$user_information="SELECT * FROM sign_up where User_id='$user_id'";
$runQuery2=mysqli_query($connection,$user_information);
$user_data=mysqli_fetch_assoc($runQuery2);
$comment_information="SELECT User_name,Comment_text FROM blog_comment where( Blog_id='$post_id' and status='1')";
$runQuery4=mysqli_query($connection,$comment_information);

  
	?>











<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/blog_description.css">
</head>

<body>
  <div class="container"> 

<?php 
include("database/basic_navbar.php");
 ?>
  <div class="contain">
  	<div class="card card1">
    <img class="card-img-top" src="database/<?php echo $data['Blog_img'] ?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title text-center"><?php echo $data['Blog_title'] ?></h4>
      <p class="card-text"><?php echo $data['Blog_text'] ?> 
      </p>
    
      </div>
     
   
  </div>
  
<div class="c-container">
            <div class="header">
               
                <h4><i class="fa fa-comments"></i>  comment  <button class="navbar-toggler bg-primary  text-white" type="button" data-toggle="collapse" data-target=".comment-form">add comment
          </button></h4>
               
            </div>
            <div class="comment-form collapse">
            <form method="post" action="#" >
                    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-user"></i></span>
    </div>
    <input type="text" name="user_name" class="form-control" value=" <?php  echo $user_data['User_name'] ?>">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
    </div>
    <input type="text" class="form-control" value=" <?php  echo $user_data['User_email'] ?>">
  </div>
  <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea name=" comment_text" class="form-control" id="comment" style="width: 100%; height:50px;"></textarea>
</div>

                <div class="form-footer">
                    <button name="post_comment" 
                    type="submit" class="btn btn-info" id="c-btn">Post Comment</button>
                </div>
            </form>
            </div>
    


   <div class="comment-section ">
    <?php   

while ($comment_data=mysqli_fetch_assoc($runQuery4)) {
     ?>
    <div class="per-comment">
         <div class="review__consumer-information ">
           
 <div class="consumer-information__details" style="margin-left: 10px"><?php   echo $comment_data['User_name'] ; ?></div>
</div>
         <div class="comment" style="font-size: 22px;padding: 10px">
         	<?php   echo $comment_data['Comment_text'] ; ?> 

         </div>
         </div>
       <?php  } ?>
         
        

    </div>
</div>
    </div>
   
  <hr style="margin-top: 10px">  
<?php  

include("database/footer.php");

?>

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

<?php 
  $hr_info_query="SELECT User_id from hr_blog_post WHERE Blog_id='$post_id'";
  $runQuery2=mysqli_query($connection,$hr_info_query);
$hr_info= mysqli_fetch_assoc($runQuery2);
$hr_id=$hr_info['User_id'];
$user_id;
$post_id;
if(isset($_REQUEST['post_comment'])){
$blog_comment_text=$_REQUEST['comment_text'];
$user_name=$_REQUEST['user_name'];

$status_query="update blog_comment set status='0' where Blog_id='$post_id' and User_id='$user_id' ";
$status_query_run=mysqli_query($connection,$status_query);

$comment_insert_query="INSERT INTO blog_comment (Blog_id,User_id,User_name,Comment_text,Hr_id) VALUES('$post_id','$user_id','$user_name','$blog_comment_text','$hr_id')";
$comment_insert_query_run=mysqli_query($connection,$comment_insert_query);


  
}
}

 ?>


</body> 
</html>

