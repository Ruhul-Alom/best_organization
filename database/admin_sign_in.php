<?php 
    
    include ("connection.php");
    
    if(isset($_POST["signin"])){
      session_start();
    	
    	$email= $_POST["email"];
      $pwd= $_POST["password"];
      
    	$sql= "SELECT * FROM admin_signup where admin_email= '$email'"; 	
      $runQuery=mysqli_query($connection, $sql);
   if($runQuery){
   $result=mysqli_fetch_array($runQuery);
   if($_POST["password"]==$result["admin_pssword"]){
     $_SESSION["email"]=$result["admin_email"];
   	 $_SESSION["admin_id"]=$result["admin_id"];
   	 $_SESSION["admin_name"]= $result["admin_name"];
   
         header("Location:../admin/admin_panel.php");
   }
   else{
    echo "wrong password, try again";
  }
}
  else{
    // echo '<script> 
    // alert("email/password doesnt maths or Not regeistere");
    // </script> ';
echo "not registered ";
  }
   }  
   
 ?>