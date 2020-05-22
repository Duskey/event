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
    #sesson variables
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
  <title>New Year Eve</title>
  <link rel="stylesheet" href="css/display.css">
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">  
<script>src="js/display_js.js"</script>
</head>
<body>

    <div class="container">
    <form class="horizontal" action="insert.php" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered table-dark">
    
  <thead>
    <tr>
      <th scope="col">Name:</th>
      <th scope="col"><?php echo $name; ?></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Mobile </th>
      <td><?php echo $mobile; ?></td>

    </tr>
    <tr>
      <th scope="row">e-mail</th>
      <td><?php echo $email; ?></td>

    </tr>
    <tr>
      <th scope="row">Type</th>
      <td><?php echo $type; ?></td>

    </tr>
    <tr>
      <th scope="row">Number</th>
      <td><?php echo $ticket; ?></td>

    </tr>

    <tr>
      <th scope="row">Id card </th>
      <td>
      <?php
    $imageData = file_get_contents($_FILES['upload']['tmp_name']);
echo sprintf('<img src="data:image/png;base64,%s" class="set"/>', base64_encode($imageData));?>
    
    
    </td>

    </tr>
    
    
  </tbody>
</table>
<p><input type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
<button class="btn btn-primary"  href ="insert.php" type="submit">Button</button>


</form>

    </div>




</body>
</html>
<?php

$dest='id_img/' .time().$_FILES['upload']['name'];

move_uploaded_file($_FILES['upload']['tmp_name'],$dest);
?>