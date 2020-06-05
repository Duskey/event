<?php

session_start();
if(isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_FILES['upload'])&& isset($_POST['type'])&& isset($_POST['ticket'])    )
{
   $name=$_POST['name'];
   $mobile=$_POST['mobile'];
   $email=$_POST['email'];
   $file=$_FILES['upload'];

   $type=$_POST['type'];
   $ticket=$_POST['ticket'];
   # print_r($file);
   $_SESSION['varname1'] =time(). $_FILES['upload']['name'];
    $file_type=$_FILES['upload']['type'];
    $file_size=$_FILES['upload']['size'];
    $_SESSION['name']=$name;
    $_SESSION['mobile']=$mobile;
    $_SESSION['email']=$email;
    $_SESSION['type']=$type;
    $_SESSION['ticket']=$ticket;
}

  
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Confirm</title>
  <link rel="stylesheet" href="css/display.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="img/logo.png">
  <!---bootstrap--->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!---reg detail --->
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Lobster&display=swap" rel="stylesheet"> 
  
  <!---button--->
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Fondamento:ital@1&family=Lobster&display=swap" rel="stylesheet"> 

<!---table--->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Piedra&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 


</head>
<body>
<!---nav bar--->
<nav class="navbar sticky-top navbar-expand-sm navbar-light">
          <a  href="index.html">
        <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
 </nav>

<!---nav bar--->


 <div class="container">
    <div class="row  justify-content-center">
        <div class="col-lg-10 bg light rounded my-2 py-2">
          <h4 class="text-center text-dark reg">Member details</h4>
          <hr>
            <!---form to send data to next page to upload it--->
          <form class="horizontal" action="insert.php" method="POST" enctype="multipart/form-data">

    <!----To display data--->
    <table class="table table-bordered table-striped ">
    
  <thead>
    <tr>
      <th scope="col" class="cl">Name:</th>
      <td  class="cld"><?php echo $name; ?></td>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="cl">Mobile </th>
      <td class="cld"><?php echo $mobile; ?></td>

    </tr>
    <tr>
      <th scope="row" class="cl">e-mail</th>
      <td class="cld"><?php echo $email; ?></td>

    </tr>
    <tr>
      <th scope="row" class="cl">Type</th>
      <td class="cld"><?php echo $type; ?></td>

    </tr>
    <tr>
      <th scope="row" class="cl">Number</th>
      <td class="cld"><?php echo $ticket; ?></td>

    </tr>

    <tr>
      <th scope="row" class="cl">Id card </th>
      <td>
      <?php
    $imageData = file_get_contents($_FILES['upload']['tmp_name']);
echo sprintf('<img src="data:image/png;base64,%s" class="set"/>', base64_encode($imageData));?>
    
    
    </td>

    </tr>
    
    
  </tbody>
</table>
 <!----To display data--->
<p><input type="checkbox" required name="terms" >&nbsp;<span class="cl">The above provided information are correct.</span></p>
<button class="btn btn-primary"  href ="insert.php" type="submit">Confirm Booking</button>&nbsp;
<a class="text-decoration-none" href="index.html" ><span class="btn myButton">Cancel</span></a>


</form>

     <!---form to send data to next page to upload it--->    



        </div>
    </div>
</div>

 <!----Footer--->
<footer>
  <hr>




  
  <div class="footer-copyright text-center py-3">
    <small style="color:grey" class="copyright">© 2020 Copyright:<a href=""> duskey.me</a></small>
  </div>


</footer>


</body>
</html>
<?php

$dest='id_img/' .time().$_FILES['upload']['name'];

move_uploaded_file($_FILES['upload']['tmp_name'],$dest);
?>