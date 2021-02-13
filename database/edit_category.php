
<?php 
session_start();
include("../database/connection.php");
error_reporting(0);
if(isset($_REQUEST['categoryId'])){
$categoryId=$_REQUEST['categoryId'];
$query="SELECT * FROM category where Category_id ='$categoryId'";
$runQuery=mysqli_query($connection,$query);
$fa=mysqli_fetch_assoc($runQuery);

?>


        <div class="modal-body">
        <form action="../database/edit_category.php" method="POST">
          <label for="  ">Category Name</label><br> 
      <input type="text" name="category_name" value=" <?php echo $fa['Category_name'] ?>">
         <input type="submit" value="edit category" name="edit_category">
       </form>
       </div>



<?php } ?>

<?php 
    
 if(isset($_REQUEST['edit_category']))                                              /*is click on submit button*/
 {
 $t=$_REQUEST['category_name'];

$updateQuery="UPDATE category SET Category_name='$t'";

$run_update_Query=mysqli_query($connection,$updateQuery);
if($run_update_Query){

	echo"Record update Successfully";
}	

}

 ?>