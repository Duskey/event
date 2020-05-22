<?php
session_start();


   $name=$_SESSION['name'];
   $mobile=$_SESSION['mobile'];
   $email=$_SESSION['email'];
   $file_name=$_SESSION['varname1'];
   $type=$_SESSION['type'];
   $ticket=$_SESSION['ticket'];

  $a=substr($name,0,1);
  $a=strtoupper($a);
  $t=time();
  
  $id=$a.$t;
  #echo $id;

   try{
    $con = mysqli_connect("localhost","root","event");
    if ($con->connect_error) 
        die("Connection failed: " . $con->connect_error);

    mysqli_select_db($con, "event");

    $sql = "insert into test1(uid,name,mobile,email,type,no,file) values('$id','$name',$mobile,'$email','$type','$ticket','$file_name')";
   
   # $sql = "insert into attendee(uid,name,mobile,email,img) values('$id','$name',$mobile,'$email','$file_name')";
    $status = mysqli_query($con, $sql);
  
  #   if($status)
   #  echo "RECORD INSERTED";
    #  else
     # echo "TRY AGAIN";
  }
  catch(PDOException $e)
  {
    echo $e;
  }
    
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
  <div class="alert alert-success">
    <strong>Success!</strong> Your registration ID is <?php echo $id?>. Please bring the ID Cadr with you 
    which you have uploaded.  
  </div>
</div>

</body>
</html>
