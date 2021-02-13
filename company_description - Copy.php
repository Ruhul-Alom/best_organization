<?php 
session_start();
include("database/connection.php");  
error_reporting(0); 
$org_id= $_REQUEST['orgId'];
$query="SELECT * FROM organization WHERE Org_id='$org_id'";
$runQuery=mysqli_query($connection,$query);
$data= mysqli_fetch_assoc($runQuery);
$user_id=($_SESSION["User_id"]);
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

	 

</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-cream"style="background-color: #E3E2DD">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <a class="navbar-brand" href="#">BEST COMPANY</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.html">HR Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="btn btn-primary"data-toggle="modal" data-target="#category-Modal">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
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
                       <div class="star-rating">
              <form method="post" action="#" >
            <span class="fa fa-star-o" title="1" id="star-1"></span>
            <span class="fa fa-star-o" title="2" id="star-2"></span>
            <span class="fa fa-star-o" title="3" id="star-3"></span>
            <span class="fa fa-star-o" title="4" id="star-4"></span>
            <span class="fa fa-star-o" title="5" id="star-5"></span>
        </div>

                            
                        </div>
                        <div class="col-4"> <button class="navbar-toggler bg-primary  text-white" type="button" data-toggle="collapse" data-target=".comment-form"><span class="fa fa-comment" title="comment"></span>comment
                        </button></div>
                    </div>

                    <div class="comment-form collapse">
                     
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
            <textarea class="form-control" id="comment" style="width: 100%; height:50px;"></textarea>
          </div>
          
                          <div class="form-footer">
                              <button type="submit" class="btn btn-info" id="c-btn">Post Comment</button>
                          </div>
                      </form>
                      </div>









              
        <h3 class="heading">Reviews</h3>
        <div class="review-rating">
            <div class="left-review">
                <div class="review-title">3.5</div>
                <div class="review-star">
                    <span class="fa fa-star " ></span>
                    <span class="fa fa-star" id="start-1"></span>
                    <span class="fa fa-star" id="start-1"></span>
                    <span class="fa fa-star-half-o"id="start-1"></span>
                    <span class="fa fa-star-o"id="start-1"></span>
                </div>
                <div class="review-people"><i class="fa fa-user"></i>600 total</div>
            </div>
            <div class="right-review">
                <div class="row-bar">
                    <div class="left-bar">5</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-5" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">4</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-4" style="width: 40%"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">3</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-3" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">2</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-2" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">1</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-1" style="width: 35%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-section card1">
         <div class="per-comment">
        <div class="rating" style="height: 16px">
             <span class="fa fa-star comment-fa"></span>
                    <span class="fa fa-star comment-fa"></span>
                    <span class="fa fa-star comment-fa"></span>
                    <span class="fa fa-star-half-o comment-fa"></span>
                    <span class="fa fa-star-o comment-fa"></span>
            </div>
         
         <div class="review__consumer-information ">
            <div class="consumer-information__picture"><img src="https://cdn.pixabay.com/photo/2020/10/19/09/44/woman-5667299__340.jpg" alt=""></div>
 <div class="consumer-information__details">Fateha</div>
</div>

         <div class="comment" style="font-size: 22px;padding: 10px">
            It is a very good oraganazation the service is very good.    

         </div>

    </div>
    <div class="per-comment">
        <div class="rating" style="height: 16px">
             <span class="fa fa-star comment-fa"></span>
                    <span class="fa fa-star comment-fa"></span>
                    <span class="fa fa-star comment-fa"></span>
                    <span class="fa fa-star-half-o comment-fa"></span>
                    <span class="fa fa-star-o comment-fa"></span>
            </div>
         
         <div class="review__consumer-information ">
            <div class="consumer-information__picture"><img src="https://cdn.pixabay.com/photo/2020/10/19/09/44/woman-5667299__340.jpg" alt=""></div>
 <div class="consumer-information__details">Fateha</div>
</div>
         <div class="comment" style="font-size: 22px;padding: 10px">
            It is a very good oraganazation the service is very good.    

         </div>

    </div>

</div>

</div>
</div>
<div class="container-fluid footer-color">
  <div class=" footer my-3 p-3">
    <div class="footer-item">
      <h5>COMPANY</h5>
      <ul>
        <li>About us</li>
        <li>Term</li>
        <li>Privacy</li>
        <li>Help</li>
      </ul>
    </div>
    <div class="footer-item">
      <h5>WORK WITH US</h5>
      <ul>
        <li>Author </li>
        <li>advertise</li>
        <li>HR Blog</li>
      </ul>
    </div>
    <div class="footer-item">
      <h5>CONNECT</h5>
      <div class="social-link">
        <div class="facebook">
          <img alt="Best company on Facebook" src="https://s.gr-assets.com/assets/site_footer/footer_facebook-ea4ab848f8e86c5f5c98311bc9495a1b.svg">
        </div>
        <div class="twiter">
          <img alt="Best company on Twitter" src="https://s.gr-assets.com/assets/site_footer/footer_twitter-126b3ee80481a763f7fccb06ca03053c.svg">
        </div>
        <div class="facebook">
          <img alt="Best company on Facebook" src="https://s.gr-assets.com/assets/site_footer/footer_facebook-ea4ab848f8e86c5f5c98311bc9495a1b.svg">
        </div>
        <div class="twiter">
          <img alt="Best company on Twitter" src="https://s.gr-assets.com/assets/site_footer/footer_twitter-126b3ee80481a763f7fccb06ca03053c.svg">
        </div>
      </div>
    </div>
  </div>

</div>


<div class="modal" id="category-Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container pb-3"> 
          <div class="row"> 
            <div class="col-12 bg-info  mr-1 mb-1"> 
              <a href=" "class="text-white">Accounting/Finance</a>
            </div>
            <div class="col-12  bg-info mr-1 mb-1"> 
              <a href=" "class="text-white">Education/Traning</a>
            </div>
            <div class="col-12  bg-info mr-1 mb-1"> 
              <a href=" "class="text-white">Commercial/suply chain</a>
            </div>
            <div class="col-12  bg-info mb-1 "> 
              <a href=" "class="text-white">Germant/textile</a>
            </div>
  
          </div>
  
           <div class="row"> 
            <div class="col-12  bg-info  mr-1 mb-1"> 
              <a href=" "class="text-white">IT and Telecuminication</a>
            </div>
            <div class="col-12  bg-info mr-1 mb-1"> 
              <a href=" "class="text-white">Medical/Pharma</a>
            </div>
            <div class="col-12  bg-info mr-1 mb-1"> 
              <a href=" "class="text-white">Media/Event Managment.</a>
            </div>
            <div class="col-12  bg-info mb-1 "> 
              <a href=" " class="text-white">Travel/Torisum</a>
            </div>
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
 
$user_id;
$org_id;
if(isset($_REQUEST['post_comment'])){
$comment_text=$_REQUEST['comment_text'];
$user_name=$_REQUEST['user_name'];

$comment_insert_query="INSERT INTO organization_comment (Org_id,User_id,User_name,Comment_text,) VALUES('$org_id','$user_id','$user_name','$comment_text')";
$comment_insert_query_run=mysqli_query($connection,$comment_insert_query);
if($comment_insert_query){

  header("location:../organization_description.php");
}

  
}

 ?>

</body>
</html>










<script>

  var i;
  var ratinHelpTest="Clik on a star to add a rating";
  
  
  
  //Load the previous rating of the user and feed it to the highlight function. Here it is shown statically.
  var pastRatingOfUser=1;
  //Use any function to change the user rating here.
    
  //Load currently stored ratings input is number of stars from 1 to 5 serially. Use PHP or AJX to load the requisite star data and feed it to the function.
  ratingLoad(15,50,10,50,500)

  
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
  var avgRating=(one*1+two*2+three*3+four*4+five*5)/total;
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
  for (i=1;i<avgRating;i++)
  {
    //document.getElementById("star-"+i).className+=" checked";
    document.getElementById("star-"+i).classList.add("checked");
  }
  var partial=avgRating%1;
  if (partial>0.5)
  {
    document.getElementById("star-"+i).className="star fa fa-star-half-full  checked";
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
  var cid=1000;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('post-rating-help').innerHTML = this.responseText;
        }
    };
    
  xmlhttp.open("POST", "ratingFeedback.php" , true);
  //xmlhttp.send();
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("comp="+cid+"&rat="+starNumber);   
  
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