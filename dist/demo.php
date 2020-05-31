
      <?php
            try{
             
                  $con = mysqli_connect("localhost","root","event");
                  if ($con->connect_error) 
                  die("Connection failed: " . $con->connect_error);
                  mysqli_select_db($con, "event");
      
                 
                      $uid=$_GET['edit'];                
                  $sql1 = "select * from test1 where uid='$uid'";
         
           $stat= mysqli_query($con, $sql1);
          $ul=mysqli_fetch_all($stat,MYSQLI_ASSOC);
      }
        catch(PDOException $e)
        {
          echo $e;
        }
      ?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>New Year Eve</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">  

    <link rel="stylesheet" href="css/demo.css">
  <script>src="js/display_js.js"</script>
</head>
<body>

<nav class="navbar navbar-light  sticky-top">
<a  href="index.html">
        <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
  <form class="form-inline">
  <a class="text-decoration-none nav-item nav-link" href="chart.php"><strong><span class="glyphicon glyphicon-log-in sty"></span>&nbsp;&nbsp;Chart</strong></a> 
 
  <a class="text-decoration-none nav-item nav-link" href="admin_login.php?action=logout"><strong><span class="glyphicon glyphicon-log-in sty"></span>&nbsp;&nbsp;Log Out</strong></a> 
   </form>
</nav>








        

<div class="container">
    <div class="row  justify-content-center">
        <div class="col-lg-10 bg light rounded my-2 py-2">
          <h4 class="text-center text-dark">
          <a href="data_display.php">
          <span class="glyphicon glyphicon-backward set"></span>
        </a>   
          
          Member details</h4>
          <hr>


          <table class="table table-bordered ">
          
          <thead>      
          <?php foreach($ul as $u): ?>
          <tr>
                <td>Uid </td>
                <td><?php echo $u['uid']; ?></td>
          </tr>
          <tr>
              <td>name </td>
              <td><?php echo $u['name']; ?></td>
          </tr>
          <tr>
              <td>email </td>
              <td><?php echo $u['email']; ?></td>
          </tr>
          <tr>
              <td>mobile </td>
              <td><?php echo $u['mobile']; ?></td>
          </tr>
          <tr>
              <td>Type</td>
              <td><?php echo $u['type']; ?></td>
          </tr>
          <tr>
              <td>Number</td>
              <td> <?php echo $u['no']; ?></td>
          </tr>
          <tr>
              <td>Date</td>
              <td><?php 
               $date = $u['date'];
               $sp = explode(" ", $date);
               $sp1 = $sp[0];
               $sp2 = $sp[1]; 
              
              
              echo $sp1; ?></td>
          </tr>
          <tr>
              <td>Time</td>
              <td><?php 
               $date = $u['date'];
               $sp = explode(" ", $date);
               $sp1 = $sp[0];
               $sp2 = $sp[1]; 
              
              
              echo $sp2; ?></td>
          </tr>
          <tr>
              <td>Id Card </td>
              <td><img src="<?php echo 'id_img/'.$u['file']; ?>" class="set"/></td>
          </tr>
      
      <?php endforeach; ?>
            
            
            
          </tbody>
        </table>



        </div>
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
       <a href="#" target="blank"><span><strong>AboutUs</strong></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" target="blank"><span><strong>ContactUs</strong></span></a></span>
      </div>

      </div>
    </div>

</div>


  
  <div class="footer-copyright text-center py-3">
    <small style="color:grey" class="copyright">© 2020 Copyright:<a  href=""> duskey.me</a></small>
  </div>


</footer>







</body>
</html>
