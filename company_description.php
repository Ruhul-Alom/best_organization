<?php 
session_start();
 if(!empty($_SESSION['User_id'])){
if(!empty($_REQUEST['org_Id'])){
  include("database/connection.php");
$org_id= $_REQUEST['org_Id'];
$query="SELECT * FROM organization WHERE Org_id='$org_id'";
$runQuery=mysqli_query($connection,$query);
$data= mysqli_fetch_assoc($runQuery);
$user_id=$_SESSION["User_id"];
$user_information="SELECT * FROM sign_up where User_id='$user_id'";
$runQuery2=mysqli_query($connection,$user_information);
$user_data=mysqli_fetch_assoc($runQuery2);
$comment_information="SELECT * FROM organization_comment where Org_id='$org_id'";
$runQuery4=mysqli_query($connection,$comment_information);

  ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Company Description Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/company_description.css">
</head>
<style>

  .fa {
  font-size: 25px;
}
.fa-edit{
  font-size:10px;
  
}

.rated{
 color: green !important;
 text-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.starHover{
 color: blue !important;
 text-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

 .checked {
  color: red;
} 

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
} 

</style>
<body>

<?php 
include("database/basic_navbar.php");
 ?>

<div class="container-fluid"> 
	 <div class="row"> 
        <div class="col-lg-6 col-sm-12 mt-3"> 
  <div class="card">
    <img class="card-img-top" src="database/<?php echo $data['Org_image'] ?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title text-center"><?php echo $data['Org_name'] ?></h4>
      <p class="card-text"><?php echo $data['Org_description'] ?> 
      </p>
    </div>
   
  </div>
</div>
<div class="col-lg-6 col-sm-12 mt-4 card" style="background-color: #E3E2DD"> 

 <div class=" my-3" style="border-bottom: 2px solid #eee;">
        <!-- <h3 class="heading">User Rating</h3> -->
        <div class="row">
                    <div class="col-3"><h3 > Rating</h3></div>
                    <div class="col-5">
                       <div class="star-rating review-star">
              <form method="post" action="#" >
<span class="star fa fa-star " id="star-1" ></span>
<span class="star fa fa-star " id="star-2" ></span>
<span class="star fa fa-star " id="star-3" ></span>
<span class="star fa fa-star " id="star-4" ></span>
<span class="star fa fa-star " id="star-5" ></span>
<p><span id="post-rating-help" >..</span></p>

        </div>

                            
                        </div>
                        <div class="col-4"> <button class="navbar-toggler bg-primary  text-white" type="button" data-toggle="collapse" data-target=".comment-form"><span class="fa fa-comment" title="comment"></span>comment
                        </button></div>
                    </div>

                    <div class="comment-form collapse">
                     <form method="post" action="#" >
                              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" value=" <?php  echo $user_data['User_name'] ?>">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
              </div>
              <input type="text" class="form-control" value=" <?php  echo $user_data['User_email'] ?>">
            </div>
            <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea name="comment_text" class="form-control" id="comment" style="width: 100%; height:50px;"></textarea>
          </div>
          
          <div class="form-footer">
                    <button name="post_comment" 
                    type="submit" class="btn btn-info" id="c-btn">Post Comment</button>
                </div>
                      </form>
                      </div>
                     
                     
                      <?php

                      if(isset($_REQUEST['post_comment'])){
$userid=$user_id ;
$user_name= $user_data['User_name'];
$org_id=$org_id;

$comment_text=$_REQUEST['comment_text'];

$status_query="update organization_comment set status='0' where Org_id='$org_id' and User_id='$userid' ";
$status_query_run=mysqli_query($connection,$status_query);

$Query="INSERT INTO organization_comment (Org_id,User_id,User_name,Comment_text) VALUES('$org_id','$userid','$user_name','$comment_text')";
$runQuery=mysqli_query($connection,$Query);
if($runQuery){

	//header("location:company_description.php");

}

}

?>










              
        <h3 class="heading">Reviews</h3>
        <div class="review-rating">
            <div class="left-review">
                <div class="review-title" id="average-rating"></div>
                <div class="review-star">
                    <span class="fa fa-star "id="starr-1" ></span>
                    <span class="fa fa-star"id="starr-2" ></span>
                    <span class="fa fa-star" id="starr-3"></span>
                    <span class="fa fa-star" id="starr-4"></span>
                    <span class="fa fa-star" id="starr-5"></span>
                </div>
                <div class="review-people"><i class="fa fa-user" id="total-reviews"></i> total</div>
            </div>
            <div class="right-review">


               <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5" id="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div id="5-stars">..</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4" id="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div id="4-stars">..</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3" id="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div id="3-stars">..</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2" id="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div id="2-stars">..</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1" id="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div id="1-stars">..</div>
  </div>
</div>
               
        </div>
    </div>




    <?php 
$user_id=$_SESSION["User_id"];
$sq="SELECT r.User_name as User_name,r.Rating_no as Rating_no,oc.Comment_text as Comment_text, oc.User_name as User_name from organization_comment as oc left join rating as r on oc.Org_id=r.Org_id AND oc.User_id=r.User_id where (r.Org_id='$org_id' or oc.Org_id='$org_id')and oc.status='1'";
$sr=mysqli_query($connection,$sq);




     ?>
    <div class="comment-section card1">
    <div class="per-comment"style="padding-left: 15px">
         <?php while($fd=mysqli_fetch_assoc($sr)){  ?>
         
 
        <div class="rating" style="height: 16px">
          <?php 
          $Rating_no=$fd['Rating_no'];
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
         
         <div class="review__consumer-information ">
          
 <div class="consumer-information__details" style="padding-left: 15px;">by <?php echo $fd['User_name']; ?></div>
</div>
         <div class="comment" style="font-size: 22px;padding: 10px;">
            <?php echo $fd['Comment_text']; ?>.    
         </div>
       <?php } ?>
  <!--
         <div class="row">
         
            <div class="col-4" ><a  type="button" style="font-size: 22px;" data-toggle="collapse" data-target=".reply_comment-form"><span style="font-size: 22px;" class="fa fa-reply fa-edit">reply</span>
                        </a></div>
         </div>   
<div class="input-group mb-3 collapse reply_comment-form mt-3 ">
  <input type="text" class="form-control" placeholder="write here" aria-label="" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" ><a  href="#" class="fa fa-paper-plane"></a></span>
  </div>
</div>

-->

    </div>

</div>

</div>
</div>


<?php 
include("database/footer.php");
 ?>



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

function NumberOfRater( int $rating ,int $org_id) {
  
  include("database/connection.php");
  $Query="select * from rating where Org_id='$org_id' AND Rating_no='$rating' ";
  $result=mysqli_query($connection,$Query);
  $rowcount=mysqli_num_rows($result); 
 
  return $rowcount;
}
$a=NumberOfRater(5,$org_id);
$b=NumberOfRater(4,$org_id);
$c=NumberOfRater(3,$org_id);
$d=NumberOfRater(2,$org_id);
$e=NumberOfRater(1,$org_id);




?>
<script>

  var i;
  var avgRating;
  var ratinHelpTest="Clik on a star to add a rating";
  
 
 
  //Load the previous rating of the user and feed it to the highlight function. Here it is shown statically.
  var pastRatingOfUser=0;
  //Use any function to change the user rating here.
    
  //Load currently stored ratings input is number of stars from 1 to 5 serially. Use PHP or AJX to load the requisite star data and feed it to the function.
 
  ratingLoad(<?php echo $e ?>,<?php echo $d ?>,<?php echo $c ?>,<?php echo $b ?>,<?php echo $a ?>);
  
  //Load the rating help text
  document.getElementById("post-rating-help").innerText=ratinHelpTest;
  
  //Adding Event Listener to all the stars for proper User Interaction for mouse events
  document.getElementById("star-1").addEventListener("mouseover", function(){focusRating(1);});
  document.getElementById("star-1").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-1").addEventListener("click", function(){saveRating(1);});
  
  document.getElementById("star-2").addEventListener("mouseover", function(){focusRating(2);});
  document.getElementById("star-2").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-2").addEventListener("click", function(){saveRating(2);});

  document.getElementById("star-3").addEventListener("mouseover", function(){focusRating(3);});
  document.getElementById("star-3").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-3").addEventListener("click", function(){saveRating(3);});
  
  document.getElementById("star-4").addEventListener("mouseover", function(){focusRating(4);});
  document.getElementById("star-4").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-4").addEventListener("click", function(){saveRating(4);});
  
  document.getElementById("star-5").addEventListener("mouseover", function(){focusRating(5);});
  document.getElementById("star-5").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-5").addEventListener("click", function(){saveRating(5);});



//Function to change the rating based on currently votes
function ratingLoad(one, two, three, four, five)
{
  var i;
  for (i=1;i<=5;i++)
  {
    document.getElementById("star-"+i).className="star fa fa-star"
  }
  var total=one+two+three+four+five;
  avgRating=(one*1+two*2+three*3+four*4+five*5)/total;
  if (isNaN(avgRating)){
    avgRating=0;
  }

  var per1=(one/total)*100;
  var per2=(two/total)*100;
  var per3=(three/total)*100;
  var per4=(four/total)*100;
  var per5=(five/total)*100;
  
  console.log(per1+"% "+per2+"% "+per3+"% "+per4+"% "+per5+"%");
  
  document.getElementById("bar-1").style.width=per1+"%";
  document.getElementById("bar-2").style.width=per2+"%";
  document.getElementById("bar-3").style.width=per3+"%";
  document.getElementById("bar-4").style.width=per4+"%";
  document.getElementById("bar-5").style.width=per5+"%";
  
  document.getElementById("1-stars").innerText=one;
  document.getElementById("2-stars").innerText=two;
  document.getElementById("3-stars").innerText=three;
  document.getElementById("4-stars").innerText=four;
  document.getElementById("5-stars").innerText=five;  
  
  document.getElementById("average-rating").innerText=avgRating.toFixed(1);

  document.getElementById("total-reviews").innerText=total;
  
  //lighting star
  for (i=1;i<=avgRating;i++)
  {
    //document.getElementById("star-"+i).className+=" checked";
    document.getElementById("starr-"+i).classList.add("checked");
  }
  var partial=avgRating%1;
  if (partial>0.5)
  {
    document.getElementById("starr-"+i).className="star fa fa-star-half-full  checked";
  }
  
  if(pastRatingOfUser>0)
  {
    highlightPreviousUserRating(pastRatingOfUser);  
  }
}

//ratingLoad(5,5,5,5,5);
//ratingLoad(15,50,10,50,50)


//Function for activity when an user hovers a star
function focusRating(starNumber)
{
  //var i;
  //console.log(starNumber);
  removeRatingFocus();
  for(i=1;i<=starNumber;i++)
  {
    //console.log(i);
    document.getElementById("star-"+i).classList.add("starHover");
  }
  document.getElementById("post-rating-help").innerText="Click to add a "+starNumber+" star rating";
  
}

//Function to remove highlight when user removes mouse from a star
function removeRatingFocus()
{
  var i;
  for(i=1;i<=5;i++)
  {
    document.getElementById("star-"+i).classList.remove("starHover");
  }
  document.getElementById("post-rating-help").innerText=ratinHelpTest;
}

//Function for activity when an user clicks on a star. It saves the star by triggering an external php page to store to database and gives a visible feedback on the page.
function saveRating(starNumber)
{   
  var cid=<?php echo $org_id; ?>;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('post-rating-help').innerHTML = this.responseText;
        }
    };
    
  xmlhttp.open("POST", "rating.php" , true);
  //xmlhttp.send();
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("comp="+cid+"&rat="+starNumber+"&avg="+avgRating);   
  
  pastRatingOfUser=starNumber;
  highlightPreviousUserRating(pastRatingOfUser);
  
}

//Function to show past rating of the user
function highlightPreviousUserRating(starNumber)
{
  for(i=1;i<=5;i++)
  {
    document.getElementById("star-"+i).classList.remove("rated");
  }
  for(i=1;i<=starNumber;i++)
  {
    document.getElementById("star-"+i).classList.add("rated");

  }
  
  ratinHelpTest="Click on a star to change your "+starNumber+" star rating";
}

function test()
{
  console.log("Function triggered");
}

</script>
<?php  
}

}

else{
//  echo" if you are not register please Sign in or login ";
?>
<?php 
if(!empty($_REQUEST['org_Id'])){
  include("database/connection.php");
$org_id= $_REQUEST['org_Id'];
$query="SELECT * FROM organization WHERE Org_id='$org_id'";
$runQuery=mysqli_query($connection,$query);
$data= mysqli_fetch_assoc($runQuery);
//$user_id=$_SESSION["User_id"];
$user_id=0;
$user_information="SELECT * FROM sign_up where User_id='$user_id'";
$runQuery2=mysqli_query($connection,$user_information);
$user_data=mysqli_fetch_assoc($runQuery2);
$comment_information="SELECT * FROM organization_comment where Org_id='$org_id'";
$runQuery4=mysqli_query($connection,$comment_information);

  ?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Company Description Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/company_description.css">
</head>
<style>

  .fa {
  font-size: 25px;
}
.fa-edit{
  font-size:10px;
  
}

.rated{
 color: green !important;
 text-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.starHover{
 color: blue !important;
 text-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

 .checked {
  color: red;
} 

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
} 
.my-btn{

  width:100%;
  margin-bottom: 10px
}


</style>
<body>

<?php 
include("database/basic_navbar.php");
 ?>

<div class="container-fluid"> 
   <div class="row"> 
        <div class="col-lg-6 col-sm-12 mt-3"> 
  <div class="card">
    <img class="card-img-top" src="database/<?php echo $data['Org_image'] ?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title text-center"><?php echo $data['Org_name'] ?></h4>
      <p class="card-text"><?php echo $data['Org_description'] ?> 
      </p>
    </div>
   
  </div>
</div>
<div class="col-lg-6 col-sm-12 mt-4 card" style="background-color: #E3E2DD"> 

 <div class=" my-3" style="border-bottom: 2px solid #eee;">
        <!-- <h3 class="heading">User Rating</h3> -->
        <div class="row"id ="signup">
                     <div class="col-12"><h4 class="text-center" >For Rating and comment  please sign in</h4></div>
                   <!-- <div class="col-5">
                       <div class="star-rating review-star">
              <form method="post" action="#" >
<span class="star fa fa-star " id="star-1" ></span>
<span class="star fa fa-star " id="star-2" ></span>
<span class="star fa fa-star " id="star-3" ></span>
<span class="star fa fa-star " id="star-4" ></span>
<span class="star fa fa-star " id="star-5" ></span>
<p><span id="post-rating-help" >..</span></p>

        </div> -->

                            
                      
                       <!--  <div class="col-4"> <button class="navbar-toggler bg-primary  text-white" type="button" data-toggle="collapse" data-target=".comment-form"><span class="fa fa-signin" title="comment"></span>sign up 
                        </button></div> -->
                    </div>

                <!--     <div class="comment-form collapse">
                         sign in start 
<div class="col-sm-8 ml-5 mt-3" id="signin">
  <h5 class="text-center"> Sign In Here!</h5>
  <form action="database/sign_in.php" class="from-gourp" method="Post" enctype="multipart/form-data">

    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
    <input type="password" placeholder="Password"class="form-control mb-2" name="password">
    <input type="submit" value="Sign In" class="btn btn-info from-control my-btn " name="signin" >
  </form>
</div> 


                      </div> -->
                     
              
        <h3 class="heading">Reviews</h3>
        <div class="review-rating">
            <div class="left-review">
                <div class="review-title" id="average-rating"></div>
                <div class="review-star">
                    <span class="fa fa-star "id="starr-1" ></span>
                    <span class="fa fa-star"id="starr-2" ></span>
                    <span class="fa fa-star" id="starr-3"></span>
                    <span class="fa fa-star" id="starr-4"></span>
                    <span class="fa fa-star" id="starr-5"></span>
                </div>
                <div class="review-people"><i class="fa fa-user" id="total-reviews"></i> total</div>
            </div>
            <div class="right-review">


               <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5" id="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div id="5-stars">..</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4" id="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div id="4-stars">..</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3" id="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div id="3-stars">..</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2" id="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div id="2-stars">..</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1" id="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div id="1-stars">..</div>
  </div>
</div>
               
        </div>
    </div>




    <?php 
//$user_id=$_SESSION["User_id"];
    $user_id=0;
$sq="SELECT r.User_name as User_name,r.Rating_no as Rating_no,oc.Comment_text as Comment_text, oc.User_name as User_name from organization_comment as oc left join rating as r on oc.Org_id=r.Org_id AND oc.User_id=r.User_id where (r.Org_id='$org_id' or oc.Org_id='$org_id')and oc.status='1'";
$sr=mysqli_query($connection,$sq);




     ?>
    <div class="comment-section card1">
    <div class="per-comment"style="padding-left: 15px">
         <?php while($fd=mysqli_fetch_assoc($sr)){  ?>
         
 
        <div class="rating" style="height: 16px">
          <?php 
          $Rating_no=$fd['Rating_no'];
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
         
         <div class="review__consumer-information ">
          
 <div class="consumer-information__details" style="padding-left: 15px;">by<?php echo $fd['User_name']; ?></div>
</div>
         <div class="comment" style="font-size: 22px;padding: 10px;">
            <?php echo $fd['Comment_text']; ?>.    
         </div>
       <?php } ?>
  <!--
         <div class="row">
         
            <div class="col-4" ><a  type="button" style="font-size: 22px;" data-toggle="collapse" data-target=".reply_comment-form"><span style="font-size: 22px;" class="fa fa-reply fa-edit">reply</span>
                        </a></div>
         </div>   
<div class="input-group mb-3 collapse reply_comment-form mt-3 ">
  <input type="text" class="form-control" placeholder="write here" aria-label="" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" ><a  href="#" class="fa fa-paper-plane"></a></span>
  </div>
</div>

-->

    </div>

</div>

</div>
</div>


<?php 
include("database/footer.php");
 ?>



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

function NumberOfRater( int $rating ,int $org_id) {
  
  include("database/connection.php");
  $Query="select * from rating where Org_id='$org_id' AND Rating_no='$rating' ";
  $result=mysqli_query($connection,$Query);
  $rowcount=mysqli_num_rows($result); 
 
  return $rowcount;
}
$a=NumberOfRater(5,$org_id);
$b=NumberOfRater(4,$org_id);
$c=NumberOfRater(3,$org_id);
$d=NumberOfRater(2,$org_id);
$e=NumberOfRater(1,$org_id);




?>
<script>

  var i;
  var avgRating;
  var ratinHelpTest="Clik on a star to add a rating";
  
 
 
  //Load the previous rating of the user and feed it to the highlight function. Here it is shown statically.
  var pastRatingOfUser=0;
  //Use any function to change the user rating here.
    
  //Load currently stored ratings input is number of stars from 1 to 5 serially. Use PHP or AJX to load the requisite star data and feed it to the function.
 
  ratingLoad(<?php echo $e ?>,<?php echo $d ?>,<?php echo $c ?>,<?php echo $b ?>,<?php echo $a ?>);
  
  //Load the rating help text
  document.getElementById("post-rating-help").innerText=ratinHelpTest;
  
  
  /*//Adding Event Listener to all the stars for proper User Interaction for mouse events
  document.getElementById("star-1").addEventListener("mouseover", function(){focusRating(1);});
  document.getElementById("star-1").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-1").addEventListener("click", function(){saveRating(1);});
  
  document.getElementById("star-2").addEventListener("mouseover", function(){focusRating(2);});
  document.getElementById("star-2").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-2").addEventListener("click", function(){saveRating(2);});

  document.getElementById("star-3").addEventListener("mouseover", function(){focusRating(3);});
  document.getElementById("star-3").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-3").addEventListener("click", function(){saveRating(3);});
  
  document.getElementById("star-4").addEventListener("mouseover", function(){focusRating(4);});
  document.getElementById("star-4").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-4").addEventListener("click", function(){saveRating(4);});
  
  document.getElementById("star-5").addEventListener("mouseover", function(){focusRating(5);});
  document.getElementById("star-5").addEventListener("mouseout", function(){removeRatingFocus();});
  document.getElementById("star-5").addEventListener("click", function(){saveRating(5);});
*/


//Function to change the rating based on currently votes
function ratingLoad(one, two, three, four, five)
{
  var i;
  for (i=1;i<=5;i++)
  {
    document.getElementById("starr-"+i).className="star fa fa-star"
  }
  var total=one+two+three+four+five;
  avgRating=(one*1+two*2+three*3+four*4+five*5)/total;
  if (isNaN(avgRating)){
    avgRating=0;
  }

  var per1=(one/total)*100;
  var per2=(two/total)*100;
  var per3=(three/total)*100;
  var per4=(four/total)*100;
  var per5=(five/total)*100;
  
  console.log(per1+"% "+per2+"% "+per3+"% "+per4+"% "+per5+"%");
  
  document.getElementById("bar-1").style.width=per1+"%";
  document.getElementById("bar-2").style.width=per2+"%";
  document.getElementById("bar-3").style.width=per3+"%";
  document.getElementById("bar-4").style.width=per4+"%";
  document.getElementById("bar-5").style.width=per5+"%";
  
  document.getElementById("1-stars").innerText=one;
  document.getElementById("2-stars").innerText=two;
  document.getElementById("3-stars").innerText=three;
  document.getElementById("4-stars").innerText=four;
  document.getElementById("5-stars").innerText=five;  
  
  document.getElementById("average-rating").innerText=avgRating.toFixed(1);

  document.getElementById("total-reviews").innerText=total;
  
  //lighting star
  for (i=1;i<=avgRating;i++)
  {
    //document.getElementById("star-"+i).className+=" checked";
    document.getElementById("starr-"+i).classList.add("checked");
  }
  var partial=avgRating%1;
  if (partial>0.5)
  {
    document.getElementById("starr-"+i).className="star fa fa-star-half-full  checked";
  }
  
  if(pastRatingOfUser>0)
  {
    highlightPreviousUserRating(pastRatingOfUser);  
  }
}

//ratingLoad(5,5,5,5,5);
ratingLoad(15,50,10,50,50)

/*
//Function for activity when an user hovers a star
function focusRating(starNumber)
{
  //var i;
  //console.log(starNumber);
  removeRatingFocus();
  for(i=1;i<=starNumber;i++)
  {
    //console.log(i);
    document.getElementById("star-"+i).classList.add("starHover");
  }
  document.getElementById("post-rating-help").innerText="Click to add a "+starNumber+" star rating";
  
}

//Function to remove highlight when user removes mouse from a star
function removeRatingFocus()
{
  var i;
  for(i=1;i<=5;i++)
  {
    document.getElementById("star-"+i).classList.remove("starHover");
  }
  document.getElementById("post-rating-help").innerText=ratinHelpTest;
}


//Function for activity when an user clicks on a star. It saves the star by triggering an external php page to store to database and gives a visible feedback on the page.
function saveRating(starNumber)
{   
  var cid=<?php echo $org_id; ?>;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('post-rating-help').innerHTML = this.responseText;
        }
    };
    
  xmlhttp.open("POST", "rating.php" , true);
  //xmlhttp.send();
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("comp="+cid+"&rat="+starNumber+"&avg="+avgRating);   
  
  pastRatingOfUser=starNumber;
  highlightPreviousUserRating(pastRatingOfUser);
  
}

//Function to show past rating of the user

function highlightPreviousUserRating(starNumber)
{
  for(i=1;i<=5;i++)
  {
    document.getElementById("star-"+i).classList.remove("rated");
  }
  for(i=1;i<=starNumber;i++)
  {
    document.getElementById("star-"+i).classList.add("rated");

  }
  
  ratinHelpTest="Click on a star to change your "+starNumber+" star rating";
}

function test()
{
  console.log("Function triggered");
}
*/
</script>
<?php }
}

?>
