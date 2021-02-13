 <?php 

include("connection.php");   /* for making connection with database */
/*error_reporting(0);  */        /* for removing error reporing or showing error*/

if(isset($_REQUEST['register'])){
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$type=$_REQUEST['type'];


$insertQuery="INSERT INTO user_application (User_name,User_email,User_password,Rule) VALUES('$name','$email','$password','$type')";
$runQuery=mysqli_query($connection,$insertQuery);
if($runQuery){
    echo "<script>alert('registration complete please wait for confermation ')</script>";
    header("Location:../admin.php"); 
	
}
}
	
 ?>