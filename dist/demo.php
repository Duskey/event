      <?php
            try{
             
              require 'connect.php';
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
  <title>Registration List</title>
  <link rel="shortcut icon" type="image/png" href="img/logo.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">  


<!---glyphicon--->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!---table fonts--->
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Piedra&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 


<!--footer-->
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Oleo+Script+Swash+Caps&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 

<!---sub head--->
<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet"> 
  <!---nav bar-->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="css/demo.css">
  <script>src="js/display_js.js"</script>
</head>
<body>


<nav class="navbar navbar-light  sticky-top">
<a  href="index.html">
        <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
  <form class="form-inline">

  <a class="text-decoration-none nav-item nav-link sty" href="data_display.php"><strong>Back</strong></a> 
 
  <a class="text-decoration-none nav-item nav-link sty" href="chart.php"><strong>Chart</strong></a> 
 
  <a class="text-decoration-none nav-item nav-link sty" href="admin_login.php?action=logout"><strong>Log Out</strong></a> 
   </form>
</nav>






<div class="container">
    <div class="row  justify-content-center">
        <div class="col-lg-10 bg light rounded my-2 py-2">
          <h4 class="text-center text-dark reg">

          
          Member details</h4>
          <hr>


          <table class="table table-bordered ">
          
          <thead >      
          <?php foreach($ul as $u): ?>
          <tr>
                <td class="thead">Uid </td>
                <td class="tdata"><?php echo $u['uid']; ?></td>
          </tr>
          <tr>
              <td class="thead">name </td>
              <td class="tdata"><?php echo $u['name']; ?></td>
          </tr>
          <tr>
              <td class="thead">email </td>
              <td class="tdata"><?php echo $u['email']; ?></td>
          </tr>
          <tr>
              <td class="thead">mobile </td>
              <td class="tdata"><?php echo $u['mobile']; ?></td>
          </tr>
          <tr>
              <td class="thead">Type</td>
              <td class="tdata"><?php echo $u['type']; ?></td>
          </tr>
          <tr>
              <td class="thead">Number</td>
              <td class="tdata"> <?php echo $u['no']; ?></td>
          </tr>
          <tr>
              <td class="thead">Date</td>
              <td class="tdata"><?php 
               $date = $u['date'];
               $sp = explode(" ", $date);
               $sp1 = $sp[0];
               $sp2 = $sp[1]; 
              
              
              echo $sp1; ?></td>
          </tr>
          <tr>
              <td class="thead">Time</td>
              <td class="tdata"><?php 
               $date = $u['date'];
               $sp = explode(" ", $date);
               $sp1 = $sp[0];
               $sp2 = $sp[1]; 
              
              
              echo $sp2; ?></td>
          </tr>
          <tr>
              <td class="thead">Id Card </td>
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
