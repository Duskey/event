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
  
   # if($status)
   # echo "RECORD INSERTED";
    
    #else
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
  <title>Success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" href="css/insert.css">
</head>
<body>

<div class="container">
  
  <div class="alert alert-success">
    <strong>Success!</strong> Your registration ID is <?php echo $id?>. Please bring the ID Cadr with you 
    which you have uploaded.  
  </div>
  <div class="setm">

  <a class="btn btn-primary" href="index.html" role="button">Back to Registration form</a>
  </div>

</div>





<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>


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
