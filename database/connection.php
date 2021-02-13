<?php
$servername="localhost";
$username="root";
$password="";
$databasename="best_organization";
$connection=mysqli_connect($servername,$username,$password,$databasename);
if($connection){
}
else{
/*echo"connection failed";*/
die("connection failed because".mysqli_connect_error);
}
?>