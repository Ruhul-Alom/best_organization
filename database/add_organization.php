<?php 

include("../database/connection.php");          

if(isset($_REQUEST['organization_category']) || isset($_REQUEST['organization_name']) || isset($_REQUEST['organization_description']) || isset($_REQUEST['organization_image'])){
$organization_category=$_REQUEST['organization_category'];
$organization_name=$_REQUEST['organization_name'];
$organization_description=$_REQUEST['organization_description'];
$org_img=$_FILES['organization_image']['name'];
$tempname=$_FILES['organization_image']['tmp_name'];
$foldername="blog_img/".$org_img;
/*echo $foldername;*/
move_uploaded_file($tempname,$foldername );

$Query="INSERT INTO organization (Org_category,Org_name,Org_description,Org_image) VALUES('$organization_category','$organization_name','$organization_description','$foldername')";
$runQuery=mysqli_query($connection,$Query);
if($runQuery){

	header("location:../index.php");
}
}
	
 ?>