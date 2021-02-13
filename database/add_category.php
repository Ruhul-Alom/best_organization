<?php 

include("../database/connection.php");   /* for making connection with database */
error_reporting(0); 
if (isset($_REQUEST['add_category'])) {
	$category_name=$_REQUEST['category_name'];
	$Query="INSERT INTO category (Category_name) VALUES('$category_name')";
	$runQuery=mysqli_query($connection,$Query);
if($runQuery){

	header("location:../admin/current_category.php");
}

}
	?>