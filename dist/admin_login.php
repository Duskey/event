<?php
$t1=" ";
$msg="";
$css="";
session_start();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['pass'];

    require 'connect.php';

    $sql = "select * from admin where email = '$email' and password = '$password'";
    $status = mysqli_query($con, $sql);
    
    $u1="root@root.com";

    $p1="event";
    
   

	  if(($email==$u1 && $password==$p1) )
	  {
      $_SESSION['email']=$email;

      header('Location:data_display.php');

	  }
	  else
	  {
      header('Location:admin_login.php');

    }
    if(isset($_GET['logout']))
    {
      session_unregister('email');
    }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="img/logo.png">

<!---bootstrap--->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!---bootstrap--->  
 

<!---table--->
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Lobster&display=swap" rel="stylesheet"> 
  
  <!---button--->
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Fondamento:ital@1&family=Lobster&display=swap" rel="stylesheet"> 

 <!--footer-->
 <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Oleo+Script+Swash+Caps&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 

<link rel="stylesheet" href="css/admin.css">






</head>
<body>




<nav class="navbar sticky-top navbar-expand-sm navbar-light">
          <a  href="index.html">
        	&nbsp;	&nbsp;	&nbsp;<img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
 </nav>


<div class="login">
  <h1>Admin login</h1> 
  <img src="img/avatar.jpg" class="avatar" />
  <form  action="admin_login.php" method="POST" enctype="multipart/form-data">


  <span class="cl"><strong>User Id:</strong></span><br>
  <input class="email"type="text" placeholder="email" name="email"> <br>
  <span class="cl"><strong>Password:</strong></span><br>
  <input class=" pass"type="password" placeholder="password" name="pass">  


  <input type="submit" name="submit" class="btn" value="Log In">
  </form>
</div>
<br><br><br><br><br>
<!---button--->
<footer>
  <hr>

<div class="text-center">
    <div class="row">
      <div class="col-md-6">
        <a href="https://www.facebook.com" target="blank" class="fa fa-facebook"></a>
        <a href="https://twitter.com" target="blank"class="fa fa-twitter"></a>
        <a href="https://www.instagram.com" target="blank" class="fa fa-instagram"></a>
      </div>
      <div class="col-md-6">
        <div class="list_st">
       <a  class="text-decoration-none" href="aboutus.html" target="blank"><span class="myfoot as"><strong>AboutUs</strong></a></span>

        <a class="text-decoration-none" href="#" target="blank"><span class="myfoot cs"><strong>ContactUs</strong></span></a></span>
      </div>

      </div>
    </div>

</div>


  
  <div class="footer-copyright text-center py-3">
    <small style="color:grey" class="copyright">© 2020 Copyright: Duskey</small>
  </div>


</footer>

</body>
</html>
