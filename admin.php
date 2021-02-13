<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BEST COMPANY</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
  <style>
.my-btn{

  width:100%;
  margin-bottom: 10px
}  
</style>
</head>
<body>
<div class="row">

<!-- <div class="col-sm-6 ml-5 mt-3 mx-auto " id="signup">
  <h5 class="text-center">New here? Create account!</h5>
  <form action="database/sign_up.php" class="from-gourp" method="Post" enctype="multipart/form-data">
    <input type="text" placeholder="Enter your name" class="form-control mb-2" name="name" required>
    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
    <input type="password" placeholder="Password"class="form-control mb-2" name="password" required>
      <input type="password" placeholder="designation"class="form-control mb-2" name="type" required>
    <input type="submit" value="Sign Up" class="btn btn-primary from-control  my-btn" name="register" >
<input type="button" id="login-box" class="btn btn-primary from-control  my-btn"  name="login-box" value="Sign In" onclick="changeForm(this)">
  </form>
</div>  --> 


                         <!--Registration form end-->

                         <!-- sign in start -->
<div class="col-sm-6 ml-5 mt-3 mx-auto" id="signin">
  <h5 class="text-center"> Sign In Here!</h5>
  <form action="database/admin_sign_in.php" class="from-gourp" method="Post" enctype="multipart/form-data">

    <input type="email" placeholder="Email address"class="form-control mb-2" name="email" required>
    <input type="password" placeholder="Password"class="form-control mb-2" name="password">
    <input type="submit" value="Sign In" class="btn btn-info from-control my-btn" name="signin" >

  </form>
</div> 
</div>
</body>

<!-- <script>
function changeForm(x)
{
console.log(x.value);
if(x.value=='Sign Up')
{
document.getElementById("signup").removeAttribute("hidden");
document.getElementById("signin").setAttribute("hidden","")
}
if(x.value=='Sign In')
{
document.getElementById("signin").removeAttribute("hidden");
document.getElementById("signup").setAttribute("hidden","")
}
}
</script> -->
</html>