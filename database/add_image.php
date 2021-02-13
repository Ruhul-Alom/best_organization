<?php  
   /* for making connection with database */
// error_reporting(0);
include("../database/connection.php");
if (isset($_REQUEST['add_image'])) {
$filename=$_FILES['image_name']['name'];
$tempname=$_FILES['image_name']['tmp_name'];
$foldername="slider_image/".$filename;
echo $foldername;
move_uploaded_file($tempname,$foldername );
$Query="INSERT INTO first_img_slider (folder_name) VALUES('$foldername')";
$runQuery=mysqli_query($connection,$Query);
if($runQuery){

header("location:../admin/slider_image.php");
}
else{
    echo "Image upload does not success";
}

}
?>

