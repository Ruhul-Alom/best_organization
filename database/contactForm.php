
                                          <?php   
if(isset($_REQUEST['submit1'])){
  include ('connection.php');
$queryText=$_REQUEST['textarea'];
$user_name=$_REQUEST['name'];
$user_email=$_REQUEST['email'];
$insert_query="INSERT INTO contact_form(User_email,User_name,Query_text) VALUES('$user_email','$user_name','$queryText')";
$insert_query_run=mysqli_query($connection,$insert_query);
}
else{
  echo"nothing";
}

                                           ?>