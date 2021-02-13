<?php 
    
    include ("connection.php");
    
    if(isset($_POST["signin"])){
      session_start();
    	
    	$email= $_POST["email"];
      $pwd= $_POST["password"];
      
       
      if($email=="admin@gmail.com" && $pwd=="admin"){
        $_SESSION["email"]="admin@gmail.com";
          header("Location:../admin/admin_panel.php"); 
        }
    	$sql= "SELECT * FROM sign_up where User_email= '$email'";

    	
   $runQuery=mysqli_query($connection, $sql);
   if($runQuery){
   $result=mysqli_fetch_array($runQuery);
   if($_POST["password"]==$result["User_password"]){
   	 $_SESSION["User_id"]=$result["User_id"];
   	 $_SESSION["User_name"]= $result["User_name"];
     $_SESSION["Rule"]= $result["Rule"];
     if($result["Rule"]=="HumanResourses"){
      $_SESSION["email"]=$email;
       $_SESSION["User_id"]=$result["User_id"];
      header("Location:../HR/HR.php"); 
     }
     else if($result["Rule"]=="General User"){
       $_SESSION["email"] =$email;
         $_SESSION["User_id"]=$result["User_id"];
      header("Location:../user/user.php"); 
     }
   

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