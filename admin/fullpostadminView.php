<?php 
error_reporting(0); 
if ($_REQUEST['postId']){
   include("../database/connection.php"); 
    $id= $_GET['postId'];
    $sq = "SELECT * from blog_pending_post where Blog_id= '$id'";
    $details= mysqli_query($connection, $sq);
    $res= mysqli_fetch_assoc($details);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pending Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin.css">

  <style type="text/css">
    
  .container1{
  width:60%;
  margin: 0 auto;
  background-color: #DBDDE0;
}
    
    #img{
      width: 100%;
      display: block;
    }
    img{
      margin-left: auto;
      margin-right: auto;
      width: 500px;
      height: 200px;
      margin-bottom: 10px;
    }
    #author{
   padding-bottom: 30px;
    }
    h2{
      text-align: center;
      padding-top: 20px;
    }
    #author a{
      width: 45%;
        padding: 10px 40px;
        border-radius: 5px;
        margin-top: 16px;
        margin-left:3%;
        text-transform: uppercase;
        font-size:15px;
        display:inline-block;
        text-align: center;
       

      }
  #post{
      margin-left: 2%;
      margin-right: 2%;
  }


   </style>
</head>
<body>

  <?php  
include("../database/admin_navbar.php")
?>
  
   
<div class="container">
  <div class="row">
    
      <?php  
include("../database/admin_right_navbar.php");
?>


  <div class="col-md-10">
   	<h2><?php echo $res['Blog_title'] ?></h2>
   	  <div id="img" style="text-align: center;">
   	  	  <img style="margin-left: auto;margin-left: auto" src="../database/<?php echo $res['Blog_img'] ?> ">
   	  </div>
   	  <div id="post">
   	  	
        <?php echo $res['Blog_text'] ?> 
   	  </div>
   	  <div id="author">


      <a  class="btn btn-info" href="../database/insertIntoExistingPost.php?postId=<?php echo $res['Blog_id']; ?>">Approve</a>
       <a  class="btn btn-info" href="../database/blog_post_reject.php?postId=<?php echo $res['Blog_id']; ?>">Reject</a>
   	  	
   	  </div>
   	</div>
  </div>
   </div>
 </body>
 </html>
 <?php  } ?>