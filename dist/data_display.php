<?php
#sesson to maintain admin login
session_start();
 $_SESSION['email'];

try{

    #fetching data from database
    require 'connect.php';


    $sql = "select * from test1";
   
   # $sql = "insert into attendee(uid,name,mobile,email,img) values('$id','$name',$mobile,'$email','$file_name')";
    $status = mysqli_query($con, $sql);
    $users=mysqli_fetch_all($status,MYSQLI_ASSOC);
    #SELECT type,sum(sno) FROM test1 GROUP BY type
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
  <title>The New year Masquerade - detail list</title>
 
<link rel="stylesheet" href="css/data_dis.css">
<link rel="shortcut icon" type="image/png" href="img/logo.png">
<!---Bootstrap popup model--->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!---Bootstrap popup model--->

<!---dataTables---->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<!---datatables---->

<!---table fonts--->
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Piedra&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 


  <!---g--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" type="immage/png" href="img/logo.png">
 
    <!--footer-->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Oleo+Script+Swash+Caps&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 



  <!---nav bar-->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script&family=Kelly+Slab&family=Piedra&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet"> 

</head>
<body>

<nav class="navbar navbar-light  sticky-top">
<a  href="index.html">
        <img  class=" navbar-nav ml-auto" src="img/logo.png" alt="logo" width="50" height="50">
      </a>
  <form class="form-inline">
  <a class="text-decoration-none nav-item nav-link sty" href="chart.php"><strong><span class="glyphicon glyphicon-log-in "></span>&nbsp;&nbsp;Chart</strong></a> 
 
  <a class="text-decoration-none nav-item nav-link sty" href="admin_login.php?action=logout"><strong><span class="glyphicon glyphicon-log-in "></span>&nbsp;&nbsp;Log Out</strong></a> 
   </form>
</nav>


<!---pop up delete Modal--->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Sure to delete ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="del_rec.php" method="POST">
        


        <input type="hidden" id="del_id" name="del_id"> 
        <input type="hidden" id="name_id" name="name_id" >
        <span  class="cld">The record of<strong>  <span id="u_name"></span></strong> with id <span id="u_id"></span> will be removed!!</span>
           
            
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="deletedata" class="btn btn-primary">yes</button>
      </div>
    </div>
    </form>
          


      </div>

    </div>
  </div>
</div>
<!---pop up delete Modal--->

    <div class="row  justify-content-center">
        <div class="col-lg-10 bg light rounded my-2 py-2">
          <h4 class="text-center text-dark reg">Registration List</h4>
          <hr>

<table id="example" class="table table-bordered  ">
    <thead>
      <tr class="cl">
      <th >Name</th>
      <th>Uid</th>
      <th>Date of Registration</th>
      <th>Mobile</th>
      <th>Delete</th>
      </tr>
    </thead>
    <tbody class="cld">
      
<!---display data in row format--->
<?php foreach($users as $user): ?>
    <tr>
        <td> <?php echo $user['name']; ?> </td>
        <td><a href="demo.php?edit=<?= $user['uid'];?>"><?php echo $user['uid']; ?></a></td>
        <td><?php 
        $date = $user['date'];
        $sp = explode(" ", $date);
        $sp1 = $sp[0];
        $sp2 = $sp[1]; 
        echo $sp1;?></td>
        <td><?php echo $user['mobile']; ?></td>
        <td><button data-toggle="modal" data-target="#staticBackdrop" type="button" class="btn btn-danger deletebtn">Delete</button></td>
        
    </tr>
<?php endforeach; ?>

    
      
    </tbody>

  </table>
  <br>


<!---Script to pass row id to pop-up window and delete php script--->
  <script>


$(document).ready(function() {
  $('.deletebtn').on('click',function(){
    $('#delmodel').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children("td").map( function(){
        return $(this).text();
    }).get();
    r=data[1];
    n=data[0];
    console.log(data);
    $('#name_id').val(data[1]);
    
    document.getElementById('u_id').innerHTML = r.toString();
    document.getElementById('u_name').innerHTML = n.toString();
  });
});
</script>




<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
</script>





<!---footer--->
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





