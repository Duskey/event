<?php

session_start();
$_SESSION['email'];

try{
    $con = mysqli_connect("localhost","root","event");
    if ($con->connect_error) 
        die("Connection failed: " . $con->connect_error);

    mysqli_select_db($con, "event");

    $sql="SELECT SUM(no), type FROM test1 GROUP BY type";
  
  # $sql = "insert into attendee(uid,name,mobile,email,img) values('$id','$name',$mobile,'$email','$file_name')";
  $status = mysqli_query($con, $sql);
  $users=mysqli_fetch_all($status,MYSQLI_ASSOC);
  

$sum=0;
  foreach ($users as $user) {
       $user['type'];
       $user['SUM(no)'];
    $sum=$sum+$user['SUM(no)'];

  }
 


}
  catch(PDOException $e)
  {
    echo $e;
  }

?>

<html>
  <head>
  <link rel="stylesheet" href="css/chart.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Types', 'Ticket Sold'],
            <?php
        $sql="SELECT SUM(no), type FROM test1 GROUP BY type";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['type']."',".$result['SUM(no)']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Tickets Sold ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>





<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<!---nav bar--->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>





  </head>
  <body>


  <nav class="navbar  sticky-top ">
    <a  href="index.html">
      <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>


        <div class="navbar-nav ml-auto">
            
      <a class="text-decoration-none nav-item nav-link" href="admin_login.php?action=logout"><strong><span class="glyphicon glyphicon-log-in sty"></span>&nbsp;&nbsp;Log Out</strong></a> 
 
 

  
        </div>
    </div>
</nav>

<a class="btn btn-primary" href="data_display.php" role="button">Back</a>









      <div class="container">
      <div id="piechart_3d" class="pie"></div>
      <div class="pie_lable">Total number of Tickets sold <?php echo $sum;?></div>
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

