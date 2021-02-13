<?php 

session_start();
require_once("database/connection.php");   /* for making connection with database */


?>
<?php  
      
      // Import the file where we defined the connection to Database.     
      require_once("database/connection.php"); 
      
          $per_page_record = 3;  // Number of entries to show in a page.   
          // Look for a GET variable page if not found default is 1.        
          if (isset($_GET["page"])) {    
              $page  = $_GET["page"];    
          }    
          else {    
            $page=1;    
          }    
      
          $start_from = ($page-1) * $per_page_record;     
      
          $query = "SELECT org.Org_id as Org_id, rat.Avg_rat as Avg_rat, org.Org_image as Org_image, org.Org_name as Org_name, org.Org_description as Org_description FROM organization as org left join avg_rating as rat on org.Org_id=rat.Org_id ORDER BY Avg_rat DESC LIMIT $start_from, $per_page_record";     
          $rs_result = mysqli_query ($connection, $query);    
      ?>    
 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Organization</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
 <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
	<link rel="stylesheet" href="css/blog.css">
	<style>	

body{
        font-family: Arail, sans-serif;
    }
    .fa {
      color:red;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #0083D0;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }

    .pagination { 
        display: inline-block; 
        
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;    
        float: left;   
        padding: 5px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }  
    
     

	</style>


<script>
    $(document).ready(function(){
        $('#name').on('keyup input',function(){

            var value = $(this).val();
            var result = $(this).siblings(".result");
            if(value.length){
                $.post("org_search.php", {term:value}).done(function(data){
                   result.html(data); 
                });
            }
            else{
                result.empty();
            }
        });
        $(document).on('click','.result p', function(){
            $(this).parents(".search-box").find("#name").val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>
</head>
<body>
  <div class="row">
    <div class="col-md-9">
	<?php 
include("database/basic_navbar.php");
 ?>
</div>

<div class="search-box col-md-3 pt-2">

      <input class="form-control mr-sm-2" id="name"   name="search"   type="search" placeholder="Search  Name..." aria-label="Search">
    
     <div class="result"></div>
    </div>
    </div>

  <div class="contain">

	<!-- <div class="left-div">
		<ul >
      <?php  /* while ($hr_data=mysqli_fetch_assoc($runQuery3)) {?>
     
			<li> <a class="text-info" href="hr_blog_post_common.php?userId=<?php echo $hr_data['User_id']; ?> "><?php  echo $hr_data['User_name']; ?></a><br>
			</li>
		<?php    } */?> 
			
		</ul>
	</div> -->
	<div class="right-div" style="margin:0 auto">
    <!-- <div class="option-bar"style=" width:120px;margin:0 auto">  
    <select name="  " id="selection" class=" text-center">
      <option type="button" value=" Highest " id="highest">Highest To lowest Rating</option>
      <option  type="button"value=" Lowesst"id="lowest">Lowest To Highest Rating</option>
    </select>
    </div> -->
   
  <?php 

 
  $items = array();  
  while($data= mysqli_fetch_assoc($rs_result)){
               array_unshift($items,$data);
    } 

  

    foreach($items as $item){      
 ?>



	 <div class="card card1">
	 	<div class="row">
      <div class="col-md-3" style="margin-top:5%;margin-left: 10px;"> 
    <img class="card-img-top " src="database/<?php echo $item['Org_image'] ?>" alt="Card image" style="width:100%">
     </div>
    <div class="card-body col-md-7">
      <h4 class="card-title text-center"><?php echo $item['Org_name'] ?></h4>
      <p class="card-text"><?php  
      echo substr($item['Org_description'],0,100);
     ?>......
      </p>

      <?php 
          $Rating_no=$item['Avg_rat'];
           //print_r($Rating_no);
          if ($Rating_no==1) {?>
           <span class="fa fa-star comment-fa"></span>
         <?php  }?>
         <?php    
           if ($Rating_no==2) {?>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
         <?php }  ?> 
         <?php  
          if ($Rating_no==3) {?>
           <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <?php  }?> 
          <?php  
          if ($Rating_no==4) {?>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
         <?php  }  ?>
         <?php
            if ($Rating_no==5) {  ?>
           <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
          <span class="fa fa-star comment-fa"></span>
        <?php  }    ?>



      <div class=" btn-sm btn-info" style=" margin-bottom: 10px;"><a class="text-white"  href="company_description.php?org_Id=<?php echo $item['Org_id']?>" >Read more</a>
      </div>
      </div>
      
      </div>
    </div>

      <?php 
    }
    

?>

<center>


      <div class="pagination" style="padding-bottom:15px;margin-top:0px">    
      <?php  
        $query = "SELECT COUNT(*) FROM organization";     
        $rs_result = mysqli_query($connection, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='organization.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='organization.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='organization.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='organization.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>     
    </div>   
  </div>  
</center>   
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'organization.php?page='+page;   
    }   
  </script>  
     
 
      	</div>
      </div>
  </div>
</div>

<?php  

include("database/footer.php");

?>







<div class="modal" id="contactUs-Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-center"> Contact Us</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
     
      <div class="modal-body bg-dark">
        <form action="database/contactForm.php" class="from-gourp" method="Post" enctype="multipart/form-data">
           <input type="text" value="Enter name" class="form-control mb-2" name="name" required>
          <input type="email" value="email"class="form-control mb-2" name="email" required>
          <textarea placeholder="Enter your query" type="text"class="form-control mb-2" name="textarea"width="100%" height="25px" required></textarea>
          
          <input type="submit" value="Post" class="btn btn-info from-control my-btn" name="submit">
  
        </form>
        </div>
  

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


      
</body>
</html>


