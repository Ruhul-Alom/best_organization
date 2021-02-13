<?php 
session_start();
include("connection.php");    
 if($_REQUEST['edit_profile'])                                               /*is click on submit button*/
 {
$user_id=$_SESSION['admin_id'];
$user_name=$_POST['admin_name'];
$user_email=$_POST['admin_email'];
$user_password=$_POST['admin_password'];
$user_information=$_POST['admin_information'];
$Previous_organization_name=$_POST['Previous_organization_name'];

 $admin_img=$_FILES['admin_image']['name'];
$tempname=$_FILES['admin_image']['tmp_name'];
$foldername="admin_image/".$admin_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );

$updateQuery="UPDATE admin_signup SET admin_name='$user_name',admin_email='$user_email',admin_pssword='$user_password',admin_prev_org_name='$Previous_organization_name', admin_info='$user_information',admin_img='$foldername' WHERE admin_id='$user_id'";

$runQuery=mysqli_query($connection,$updateQuery);
if($runQuery){

	echo"Record update Successfully";
}	
else{
		echo"Record update  not Successfully";
}

}
else
{
echo"Data has not come";	
}
