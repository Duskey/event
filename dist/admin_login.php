<?php
$t1=" ";
$msg="";
$css="";
session_start();
if(isset($_POST['submit'])  )
{
    $email=$_POST['email'];
    $password=$_POST['pass'];



    $con = mysqli_connect("localhost","root","event","event");
    $sql = "select * from admin where email = '$email' and password = '$password'";
	  $status = mysqli_query($con, $sql);
	  if(mysqli_num_rows($status)>0)
	  {
      $_SESSION['email']=$email;
      $t1="y";
      $msg="done";
      $css="alert-success";
      header('Location:data_display.php');

	  }
	  else
	  {
      $t1="n";
      $msg="Invalid Email or Password. Please re-enter.";
      $css="alert-danger";
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


</head>
<body>




<nav class="navbar sticky-top navbar-expand-sm navbar-light">
          <a  href="index.html">
        <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
 </nav>


<div class="login">
  <h1>Admin login</h1> 
  <img src="img/avatar.jpg" class="avatar" />
  <form  action="admin_login.php" method="POST" enctype="multipart/form-data">
  <input type="text" placeholder="email" name="email"> 
  <input type="password" placeholder="password" name="pass">  

<?php
    if($t='n'):?>
    
      <div class="alert <?php   echo $css;?>">
        <?php echo $msg;?>
    </div>
    <?php endif;?>

  <input type="submit" name="submit" value="Log In">
  </form>
</div>


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
       <a href="#" target="blank"><span><strong>AboutUs</strong></a></span>&emsp;&emsp;
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
        <a href="#" target="blank"><span><strong>ContactUs</strong></span></a></span>
      </div>

      </div>
    </div>

</div>


  
  <div class="footer-copyright text-center py-3">
    <small style="color:grey" class="copyright">© 2020 Copyright:<a href=""> duskey.me</a></small>
  </div>


</footer>


</body>
</html>
