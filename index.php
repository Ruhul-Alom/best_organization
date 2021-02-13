<?php 
session_start();
error_reporting(0);
require_once('database/connection.php');
$catagory_query1="SELECT*FROM category";
$catagory_query_run1=mysqli_query($connection,$catagory_query1);
$slider_img_query="SELECT folder_name FROM first_img_slider";
$slider_img_query_run=mysqli_query($connection,$slider_img_query);
// $row=mysqli_fetch_assoc($slider_img_query_run)
// print_r($slider_img_query_run);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BEST COMPANY</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
  <link rel="stylesheet" href="css/index.css">
</head>

<style> 
.card-footer{
  border:none;
}
.custom-input{
    display: block;
    width: 100%;
    height: 40px;
    padding: 6px 12px;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
    margin-bottom: 10px;
}
.bg-cream{
background-color:#EFEDE1;
}
#c-btn{
    display: block;
    width: 100%;
    margin-bottom: 10px;
}
.my-card{
  width:17rem;
}

@media only screen and (max-width: 576px) {
  .my-card {
width: 350px;
margin:0 auto;
  }
}



</style>
<body>
<?php 
if(!empty($_SESSION['email'])){
include("database/advance_navbar .php");
}
else{
include("database/basic_navbar.php");  
}
 ?>

  <div class="container-fluid mb-3 bg-cream">
   <div class="container">
    <div class="row row1">
          

      <div  class="col-sm-7" id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">

<?php
        $i=0;
        foreach($slider_img_query_run as $row){
          $actives='';
          if($i==0){
            $actives='active';
          }
        
        
        
        ?>
  <li data-target="#demo" data-slide-to="<?php echo $i; ?>" class="<?php echo $actives; ?>" ></li>
  <?php $i++; } ?>
 
  
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
<?php
        $i=0;
        foreach($slider_img_query_run as $row){
          $actives='';
          if($i==0){
            $actives='active';
          }
        
        ?>
  <div class="carousel-item <?php echo $actives ;?> " >
  <a href="blog.php"><img  src="database/<?php echo $row['folder_name']?>" alt="First slide" ></a>
  </div>
  <?php $i++; } ?>
  
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>



 <!--Registration form stat-->
 <?php 
if(!empty($_SESSION['email'])){?>
   <div class="col-sm-4 mt-3  " style="margin-left: 95px">
    <?php include("userInfo.php"); ?>
  </div>
</div>
</div>
</div>
<?php  } else{ ?>
 <div class="col-sm-4 ml-5 mt-3 " id="signup">
  <h5>New here? Create a free account!</h5>
  <form action="database/sign_up.php" class="from-gourp" method="Post" enctype="multipart/form-data">
    <input type="text" placeholder="Enter your name" class="form-control mb-2" name="name" required>
    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
    <input type="password" placeholder="Password"class="form-control mb-2" name="password" required>
     <div class=" custom-input" >   <input type="radio" name="type" id="HumanResourses"class="p-5" value="HumanResourses" >HumanResourses &nbsp;&nbsp;&nbsp;
     <input type="radio" name="type" id="General User" value="General User">General User
     </div>
    <input type="submit" value="Sign Up" class="btn btn-primary from-control  my-btn" name="register" >
<input type="button" id="login-box" class="btn btn-primary from-control  my-btn"  name="login-box" value="Sign In" onclick="changeForm(this)">
  </form>
</div>  


                         <!--Registration form end-->

                         <!-- sign in start -->
<div class="col-sm-4 ml-5 mt-3" id="signin" hidden>
  <h5 class="text-center"> Sign In Here!</h5>
  <form action="database/sign_in.php" class="from-gourp" method="Post" enctype="multipart/form-data">

    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
    <input type="password" placeholder="Password"class="form-control mb-2" name="password">
    <input type="submit" value="Sign In" class="btn btn-info from-control my-btn" name="signin" >
<input type="button" id="login-box" class="btn btn-primary from-control  my-btn"  name="login-box" value="Sign Up" onclick="changeForm(this)">
  </form>
</div> 
</div> 
</div>
</div>
</div>

<script>
function changeForm(x)
{
console.log(x.value);
if(x.value=='Sign Up')
{
document.getElementById("signup").removeAttribute("hidden");
document.getElementById("signin").setAttribute("hidden","")
}
if(x.value=='Sign In')
{
document.getElementById("signin").removeAttribute("hidden");
document.getElementById("signup").setAttribute("hidden","")
}
}
</script>


    </div> 
  </div>
</div>
<?php } ?>
                                    <!-- sign in end -->


                                   <!-- slider for category start -->

      <div class="container-fluid my-3">
        <h2 class="text-center">Category</h2>
      
        <div class="container pb-3"> 
        <div class="row"> 
            <?php 
       while ($category_query_data1=mysqli_fetch_assoc($catagory_query_run1))
     {

 ?>
          <div class="col-md-4 "> 
            <div class="bg-info mb-1">
            <a  href="organization_category.php?org_cat=<?php echo $category_query_data1['Category_name']?>"><?php echo $category_query_data1['Category_name']?></a>
          </div>
           </div>
            <?php } ?>
          </div>
        

        </div>

        
      </div>
        </div>
      </div>
</div>


                             <!-- slider for catagory end -->





                               <!-- slider for Most rated Organaization start -->

                              <?php 
$org_query="SELECT org.Org_id as Org_id, rat.Avg_rat as Avg_rat, org.Org_image as Org_image, org.Org_name as Org_name, org.Org_description as Org_description FROM organization as org left join avg_rating as rat on org.Org_id=rat.Org_id ORDER BY Avg_rat DESC";
$org_runQuery=mysqli_query($connection,$org_query);
/* how many data are in database table */

  ?>

<div id="carouselIndicators1" class="carousel slide mt-3 pb-4" data-ride="carousel" style="background-color:#F4F2E9">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators1" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container">
        <h2 class="title text-center my-5 ">Most Rated organization</h2>
        <div class="row">
<?php 
     $i=0;
     while ($org_data=mysqli_fetch_assoc($org_runQuery))
   
      {

 ?>
           <div class="col-lg-3   col-sm-6 mb-4">  
          <div class="card my-card" style="height: 550px">
            <img  style="height:200px" class="card-img-top" src="database/<?php echo $org_data['Org_image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $org_data['Org_name'] ?></h5>
                <p class="card-text"><?php  
      echo substr($org_data['Org_description'],0,170);
     ?>...
      </div>
     <div class="card-footer ">
              <a href="company_description.php?org_Id=<?php echo $org_data['Org_id']?>" class="btn btn-primary">Show more</a>
           
            <div class="rating" style="height:16px">
            <?php 
          $Rating_no=$org_data['Avg_rat'];
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
        <?php  }  ?>
            </div>
          </div>
          </div>
          </div>
        <?php $i++;if($i==4) break;} ?>
          
        </div>
      </div> 
    </div>
  </div>
  <a class="carousel-control-prev " href="#carouselIndicators1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon bg-info mr-5" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next " href="#carouselIndicators1" role="button" data-slide="next">
    <span class="carousel-control-next-icon bg-info ml-5" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                  <!-- slider for Most rated Organaization end -->



 <?php 
$org_query1="SELECT org.Org_id as Org_id, rat.Avg_rat as Avg_rat, org.Org_image as Org_image, org.Org_name as Org_name, org.Org_description as Org_description FROM organization as org left join avg_rating as rat on org.Org_id=rat.Org_id ";
$org_runQuery2=mysqli_query($connection,$org_query1);
/* how many data are in database table */

  ?>

<div id="carouselIndicators1" class="carousel slide mt-3 pb-4" data-ride="carousel" style="background-color:#F4F2E9">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators1" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container">
        <h2 class="title text-center my-5 ">Recent Added organization</h2>
        <div class="row">
<?php 
     $i=0;
        $items = array();  
  while($data= mysqli_fetch_assoc($org_runQuery2)){
               array_unshift($items,$data);
    } 

  

    foreach($items as $item){      
 ?>
   
           <div class="col-lg-3   col-sm-6 mb-4">  
          <div class="card my-card" style="height: 520px">
            <img  style="height:200px" class="card-img-top" src="database/<?php echo $item['Org_image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item['Org_name'] ?></h5>
                <p class="card-text"><?php  
      echo substr($item['Org_description'],0,180);
     ?>...
      </div>
     <div class="card-footer ">
              <a href="company_description.php?org_Id=<?php echo $item['Org_id']?>" class="btn btn-primary">Show more</a>
           
            <div class="rating" style="height:16px">
            <?php 
          $Rating_no=$item['Avg_rat'];
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
            </div>
          </div>
          </div>
          </div>
        <?php $i++;if($i==4) break;} ?>
          
        </div>
      </div> 
    </div>
  </div>
  <a class="carousel-control-prev " href="#carouselIndicators1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon bg-info mr-5" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next " href="#carouselIndicators1" role="button" data-slide="next">
    <span class="carousel-control-next-icon bg-info ml-5" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid footer-color">
  <div class=" container row my-3 p-3">
    <div class="col-4">
      <h5>COMPANY</h5>
      <ul class="list-unstyled">
        <li>About us</li>
        <li>Term</li>
        <li>Privacy</li>
        <li>Help</li>
      </ul>
    </div>
    <div class="col-4">
      <h5>WORK WITH US</h5>
      <ul class="list-unstyled">
        <li>Author </li>
        <li>advertise</li>
        <li>HR Blog</li>
      </ul>
    </div>
    <div class="col-3">
      <h5 class="text-center">CONNECT</h5>
      <div class="row">
        <div class="col-4">
        <a href="https://www.linkedin.com/"><img alt="Best company on Facebook" src="img/linkedin.png" style="width:200%"></a>
        </div>
        <div class="col-4">
        <a href="https://www.facebook.com/"><img alt="Best company on Twitter" src="img/facebook.png" style="width:170%"></a>
        </div>
        <div class="col-4">
         <a href="https://www.instagam.com/" > <img alt="Best company on Facebook" src="img/instragram.jpg" style="width:150%"></a>
        </div>
    
      </div>
    </div>
  </div>

</div>
                                      
                                        

                                  <div class="modal" id="contactUs-Modal">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header bg-primary">
                                                  <h4 class="modal-title "> Contact Us</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                          
                                                <!-- Modal body -->
                                                <div class="modal-body bg-dark">
                                                  <form action="database/contactForm.php" class="from-gourp" method="Post" enctype="multipart/form-data">
                                                     <input type="text"placeholder="Enter your name"class="form-control mb-2" name="name" required>
                                                    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
                                                    <textarea placeholder="Enter your query" type="text"class="form-control mb-2" name="textarea"width="100%" height="25px" required></textarea>
                                                    
                                                    <input type="submit" value="Post" class="btn btn-info from-control my-btn" name="submit1">
                                            
                                                  </form>
                                                  </div>
                                            
                                          
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                          
                                              </div>
                                            </div>
                                          </div>




                                        <div class="modal" id="sugOrg-Modal">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header bg-primary">
                                                  <h4 class="modal-title "> Suggest Organization</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                          
                                                <!-- Modal body -->
                                                <div class="modal-body bg-info">
                                                  <form action="database/suggest_org.php" class="from-gourp" method="Post" enctype="multipart/form-data">
                                                     <input type="text"placeholder="Enter your name"class="form-control mb-2" name="name" required>
                                                    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>

                                                   <input type="text" placeholder="Organization Name "class="form-control mb-2" name="Org_name" required>
                                                    <input type="text" placeholder="please provide link"class="form-control mb-2" name="link" >

                                                    <textarea placeholder="Enter some description" type="text"class="form-control mb-2" name="textarea"width="100%" height="25px"></textarea>
                                                    
                                                    <input type="submit" value="Post" class="btn btn-dark from-control my-btn" name="submit2">
                                            
                                                  </form>
                                                  </div>
                                            
                                          
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                </div>
                                          
                                              </div>
                                            </div>
                                          </div>









                                         




                                          

</body> 
</html>


