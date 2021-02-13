<?php
$org_id2=$_GET['$var'];
 $a =ratings($org_id2);
  $d_avg_query="delete from avg_rating where Org_id='$org_id2'";
  $del_query_run=mysqli_query($connection,$d_avg_query);

 $avg_query="insert into avg_rating(Org_id,Avg_rat)values('$org_id2','$a')";
$avg_query_run=mysqli_query($connection,$avg_query);
 print_r($a);
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

   return $avg_rating ;
}


?>