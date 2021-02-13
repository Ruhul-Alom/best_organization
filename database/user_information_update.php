<?php 
session_start();
include("connection.php");    
 if($_REQUEST['edit_profile'])                                               /*is click on submit button*/
 {
$user_id=$_SESSION['User_id'];
$user_name=$_POST['User_name'];
$user_email=$_POST['User_email'];
$user_password=$_POST['User_password'];
$user_information=$_POST['User_information'];
$Previous_organization_name=$_POST['Previous_organization_name'];
//$Hr_designation=$_POST['Hr_designation'];
$Current_organization_name=$_POST['Current_organization_name'];

#echo $hr_id.$Hr_name.$Hr_email.$Hr_password.$Hr_organization_name;

 $user_img=$_FILES['user_image']['name'];
$tempname=$_FILES['user_image']['tmp_name'];
$foldername="profile_img/".$user_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );

$updateQuery="UPDATE sign_up SET User_name='$user_name',User_email='$user_email',User_password='$user_password',Current_organization_name='$Current_organization_name',Previous_organization_name='$Previous_organization_name', User_information='$user_information',User_image='$foldername' WHERE User_id='$user_id'";

$runQuery=mysqli_query($connection,$updateQuery);
if($runQuery){

	echo"Record update Successfully";
}	

}
else
{
echo"Record not updated";	
}
