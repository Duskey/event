<?php
##Script to fetch no. of tickets goup wise.
session_start();
$_SESSION['email'];

try{
  require 'connect.php';


  mysqli_select_db($con, "event");

  $sql="SELECT SUM(no), type FROM test1 GROUP BY type";
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
  <title>Chart</title>
  <link rel="shortcut icon" type="image/png" href="img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!---Google chart--->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!---chart footer--->
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Oleo+Script+Swash+Caps&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 


    
<!---Script to pass fetched value to display in chart format--->
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





<!---nav bar--->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!---nav bar font-->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 

      <!--footer-->
      <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Oleo+Script+Swash+Caps&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 



  </head>
  <body>



<!---nav bar--->

    <nav class="navbar navbar-light  sticky-top">
<a  href="index.html">
        <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
  <form class="form-inline">
  <a class="text-decoration-none nav-item nav-link sty" href="data_display.php"><strong><span class="glyphicon glyphicon-log-in "></span>&nbsp;&nbsp;Back</strong></a> 
 
  <a class="text-decoration-none nav-item nav-link sty" href="admin_login.php?action=logout"><strong><span class="glyphicon glyphicon-log-in "></span>&nbsp;&nbsp;Log Out</strong></a> 
   </form>
</nav>







<div class="container con-size">
    <div class="row  justify-content-center">
        <div class="col-lg-10 bg light rounded my-2 py-2">
              <div id="piechart_3d" class="pie"></div>
              <div class="pie_lable">Total number of Tickets sold :- <?php echo $sum;?></div>
        </div>
    </div>
</div>




   


<!--- footer--->
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

<!--- footer--->
  </body>
</html>

