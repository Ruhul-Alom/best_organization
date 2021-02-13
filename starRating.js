

  var i;
  var avgRating;
  var ratinHelpTest="Clik on a star to add a rating";
  
 
 
  //Load the previous rating of the user and feed it to the highlight function. Here it is shown statically.
  var pastRatingOfUser=1;
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

