
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" type="text/css" href="textEditorStyling.css">
<link rel="stylesheet" href="HR.css">
  
</head>
<style> 
.post-info{
  margin-top: 120px;
}

</style>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Best Organization</a>
        
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="../index.php">Home</a></li>
        <li><a href="../textEditor/post.html">Blog Post</a></li>
        <li><a href="../blog.html">Blog</a></li>
        <li><a href=""data-toggle="modal" data-target="#contactUs-Modal">Contact Us</a></li>
      </ul>
    </div>
  </nav>
  
      
<div class="container">
    <div class="row">

      <div class="col-md-12  bg-dark">

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

 
 <form method="post" action="../database/blog_post_insert.php" enctype="multipart/form-data"> 


    <label style="width: 100%">Select Image to upload :</label> <input  type="file" name="blog_img" >
   <br>  <label> genre:</label><select name="blog_category" style="width: 100%" >
   <option value="" disabled selected >Choose option</option> 
   <option value="Accounting"  >Accounting</option> 
   <option value="Education"  >Education</option> 
   <option value="Commercial"  >Commercial</option> 
   <option value="Germent"  >Germent</option> 
    <option value="Telicuminication"  >Telicuminication</option> 
    <option value="Medical/Pharma"  >Medical/Pharma</option> 
    <option value="Media"  >Media</option> 
    <option value="Travel"  >Travel</option> 
   
</select> 
 <!--genre !-->
    <b>Title: </b><input type="text" name="blog_title" style="width: 100%"  required >
    
  
    <textarea name="blog_text" required> </textarea>  
                <script>
                    CKEDITOR.replace( "blog_text" );
                </script>
                <button class="btn btn-info"style="width: 100%" value="submit"> Post </button>
 </form>
  </div>

  </div>

</div>
 	
  
</body>
</html>