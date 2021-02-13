
<nav class="navbar navbar-expand-lg navbar-light bg-cream">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <a class="navbar-brand" href="index.php">BEST COMPANY</a>
    <ul class="navbar-nav  mr-auto my-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php">HR Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="organization.php">Organizaion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="btn btn-primary"data-toggle="modal" data-target="#category-Modal">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="btn btn-primary"data-toggle="modal" data-target="#sugOrg-Modal">Suggest Organization</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" class="btn btn-primary"data-toggle="modal" data-target="#contactUs-Modal">Contact Us</a>
      </li>
      
    </ul>
    
  </div>
</nav>
   <div class="modal" id="category-Modal">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                          
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title"> Organization Category</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                          
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                  <div class="container pb-3"> 
                                                    <div class="row"> 
                                                      <?php 
                                                      $catagory_query="SELECT*FROM category";
                                             $catagory_query_run=mysqli_query($connection,$catagory_query);
       while ($category_query_data=mysqli_fetch_assoc($catagory_query_run))
     {

 ?>
                                                      <div class="col-12 bg-info  mr-1 mb-1"> 
                                                      <a class="text-white" href="organization_category.php?org_cat=<?php echo $category_query_data['Category_name']?>"><?php echo $category_query_data['Category_name']?></a>
                                                   </div>
            <?php } ?>
                                                      
                                            
                                                    </div>
                                            
                                                     
                                                  </div>
                                                </div>
                                          
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                          
                                              </div>
                                            </div>
                                          </div>