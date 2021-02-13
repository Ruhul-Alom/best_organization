<?php 
session_start();
// print_r($_SESSION);
require_once("database/connection.php");
if(!empty($_SESSION["User_id"])){
$user_id=$_SESSION["User_id"];
// echo $user_id ;
$user=mysqli_query($connection,"SELECT User_name from sign_up WHERE User_id ='$user_id'");
$user_data=mysqli_fetch_assoc($user);
$org_id2=$_REQUEST['comp'];
$user_name= $user_data['User_name'];


// if($_REQUEST['c-submit']){
// $userid=$user_id ;
// $user_name= $user_data['User_name'];
// $org_id=$org_id;
// $comment_text=$_REQUEST['comment-text'];


// $Query="INSERT INTO organization_comment (Org_id,User_id,User_name,Comment_text) VALUES('$org_id','$userid','$user_name','$comment_text')";
// $runQuery=mysqli_query($connection,$Query);
// if($runQuery){

// 	header("location:company_description.php");
// }
// else{
// 	echo "noting";
// }	

// }


$rat=$_POST['rat'];
$org_id2=$_POST['comp'];
$user_id=$_SESSION["User_id"];
 $D_Query="DELETE FROM rating WHERE Org_id='$org_id2' AND User_id='$user_id'";
 $D_runQuery=mysqli_query($connection,$D_Query);
$R_Query="INSERT INTO rating (Org_id,User_id,User_name,Rating_no) VALUES('$org_id2','$user_id','$user_name','$rat')";
$R_runQuery=mysqli_query($connection,$R_Query);
if($R_runQuery){
function ratings(int $org_id2) {
  include("database/connection.php");
  $Query="select * from rating where Org_id='$org_id2' ";
  $result=mysqli_query($connection,$Query);
  $rowcount=mysqli_num_rows($result); 
  $allRating=array(0,0,0,0,0,0);
  for ($i=0;$i<$rowcount;$i++)
  {
    $data=mysqli_fetch_assoc($result);
    if($data['Rating_no']==1){
       $allRating[1]=$allRating[1]+1;  
    }
    else if($data['Rating_no']==2){
       $allRating[2]=$allRating[2]+1;  
    }
    else if($data['Rating_no']==3){
       $allRating[3]=$allRating[3]+1;  
    }
     else if($data['Rating_no']==4){
       $allRating[4]=$allRating[4]+1;  
    }
    if($data['Rating_no']==5){
       $allRating[5]=$allRating[5]+1;  
    }
     
  }
 $rat=$allRating[1]*1+$allRating[2]*2+$allRating[3]*3+$allRating[4]*4+$allRating[5]*5;
 $avg_rating= $rat/$rowcount;

   return round($avg_rating) ;
}
$a =ratings($org_id2);
  $d_avg_query="delete from avg_rating where Org_id='$org_id2'";
  $del_query_run=mysqli_query($connection,$d_avg_query);

 $avg_query="insert into avg_rating(Org_id,Avg_rat)values('$org_id2','$a')";
$avg_query_run=mysqli_query($connection,$avg_query);

}	
else{
	echo "noting comment";
}
 
}
 ?>