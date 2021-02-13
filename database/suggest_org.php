                                      <?php   
if(isset($_REQUEST['submit2'])){
  include ('connection.php');
$descripText=$_REQUEST['textarea'];
$user_name=$_REQUEST['name'];
$user_email=$_REQUEST['email'];
$org_name=$_REQUEST['Org_name'];
$org_link=$_REQUEST['link'];

$insert_query="INSERT INTO suggested_org (User_email,User_name,Org_name,Org_link,Descrip_text) VALUES('$user_email','$user_name','$org_name','$org_link','$descripText')";
$insert_query_run=mysqli_query($connection,$insert_query);
}
else{
  echo"nothing";
}