<?php 

session_start();
include("connection.php");  
if (isset($_REQUEST['id'])) {
	$id=$_REQUEST['id'];

 if(isset($_REQUEST['edit_info']))                                              /*is click on submit button*/
 {
$user_id=$id;

$user_name=$_POST['User_name'];
$user_email=$_POST['User_email'];
$user_password=$_POST['User_password'];
$current_organization_name=$_POST['Current_organization_name'];
$previous_organization_name=$_POST['Previous_organization_name'];
$working_period=$_POST['working_period'];
$user_designation=$_POST['User_designation'];
  

$updateQuery="UPDATE sign_up SET User_name='$user_name',User_email='$user_email',User_password='$user_password',Current_organization_name='$current_organization_name',Previous_organization_name='$previous_organization_name',user_designation='$user_designation' WHERE User_id='$user_id'";

$runQuery=mysqli_query($connection,$updateQuery);
if($runQuery){

	echo"Record update Successfully";
}	

}
else
{
echo"Record not updated";	
}
}
?>