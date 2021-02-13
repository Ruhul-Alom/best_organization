<?php 
session_start();
include("connection.php");    
 if($_REQUEST['edit_profile'])                                               /*is click on submit button*/
 {
$hr_id=$_SESSION['User_id'];
$Hr_name=$_POST['Hr_name'];
$Hr_email=$_POST['Hr_email'];
$Hr_password=$_POST['Hr_password'];
$Hr_information=$_POST['Hr_information'];
$Previous_organization_name=$_POST['Previous_organization_name'];
$Current_organization_name=$_POST['Current_organization_name'];
//$Hr_designation=$_POST['Hr_designation'];
 $user_img=$_FILES['user_image']['name'];
$tempname=$_FILES['user_image']['tmp_name'];
$foldername="profile_img/".$user_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );

$updateQuery="UPDATE sign_up SET User_name='$Hr_name',User_email='$Hr_email',User_password='$Hr_password',Current_organization_name='$Current_organization_name',Previous_organization_name='$Previous_organization_name', User_information='$Hr_information',User_image='$foldername' WHERE User_id='$hr_id'";

$runQuery=mysqli_query($connection,$updateQuery);
if($runQuery){

	echo"Record update Successfully";
}	

}
else
{
echo"Record not updated";	
}

 
 