
<?php 
   include("../database/connection.php"); 
    $id= $_GET['userId'];
    $sq = "SELECT * from user_application where User_id= '$id'";
    $details= mysqli_query($connection, $sq);
    $res= mysqli_fetch_assoc($details);

$name=$res['User_name'];
$email=$res['User_email'];
$password=$res['User_password'];
$type=$res['Rule'];
if($type=='admin'){

  $insertQuery="INSERT INTO admin_signup (admin_name,admin_email,admin_pssword) VALUES('$name','$email','$password')";
$runQuery=mysqli_query($connection,$insertQuery);
if($runQuery){
  
    header("Location:../admin/user_request.php"); 
}
else{
  echo"An Error occured";
}
}
else{
 $insertQuery="INSERT INTO sign_up (User_name,User_email,User_password,Rule) VALUES('$name','$email','$password','$type')";
$runQuery=mysqli_query($connection,$insertQuery);
if($runQuery){
  
    header("Location:../admin/user_request.php"); 
  
} 
}

$sql="DELETE FROM user_application WHERE User_id='$id'";
       if (mysqli_query($connection, $sql)) {
          echo "deleted";
       }
else{
    echo "Error: " .$$connection->error;
}

    header("location:../admin/user_request.php");
  
?>
	
 