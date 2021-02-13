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
    echo "<script>alert('registration complete')</script>";
    header("Location:../index.php"); 
	
}
}
	
 ?>












 
<!-- ---------------------------------------------------------------------------------------------------------

 <?php 

 if($_GET['submit'])                                               /*is click on submit button*/
 {
$rollno=$_GET['rollno'];
$studentname=$_GET['studentname'];
$classname=$_GET['classname'];
if(rollno!=""&& $studentname!=""&& $classname!="")                    /* For chcking not empty any field*/
{      

$insertQuery="INSERT INTO STUDENT VALUES('$rollno','$studentname','$classname')";
$runQuery=mysqli_query($connection,$insertQuery);
if($runQuery){

	echo"one row effected";
}	

}
else
{
echo"All field are required";	
}

 }
 
  ?> 
  -->
  

