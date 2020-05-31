let particles = [];
let microparticles = [];

const c1 = createCanvas({ width: $(window).width(), height: $(window).height() });

const tela = c1.canvas;
const canvas = c1.context;

// $("body").append(tela);
$("body").append(c1.canvas);


class Particle {
  constructor(canvas) {
    this.random = Math.random();
    this.random1 = Math.random();
    this.random2 = Math.random();
    this.progress = 0;
    this.canvas = canvas;
    this.life = 1000 + Math.random() * 3000;

    this.x = $(window).width() / 2 + (Math.random() * 20 - Math.random() * 20);
    this.y = $(window).height();
    this.s = 2 + Math.random();
    this.w = $(window).width();
    this.h = $(window).height();
    this.direction = this.random > .5 ? -1 : 1;
    this.radius = 1 + 3 * this.random;
    this.color = "#ff417d";

    this.ID = setInterval(function () {
      microparticles.push(new microParticle(c1.context, {
        x: this.x,
        y: this.y }));

    }.bind(this), this.random * 20);

    setTimeout(function () {
      clearInterval(this.ID);
    }.bind(this), this.life);
  }

  render() {
    this.canvas.beginPath();
    this.canvas.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
    // this.canvas.lineWidth = 2;
    this.canvas.shadowOffsetX = 0;
    this.canvas.shadowOffsetY = 0;
    // this.canvas.shadowBlur = 6;
    this.canvas.shadowColor = "#000000";
    this.canvas.fillStyle = this.color;
    this.canvas.fill();
    this.canvas.closePath();
  }

  move() {
    this.x -= this.direction * Math.sin(this.progress / (this.random1 * 430)) * this.s;
    this.y -= Math.cos(this.progress / this.h) * this.s;

    if (this.x < 0 || this.x > this.w - this.radius) {
      clearInterval(this.ID);
      return false;
    }

    if (this.y < 0) {
      clearInterval(this.ID);
      return false;
    }
    this.render();
    this.progress++;
    return true;
  }}


class microParticle {
  constructor(canvas, options) {
    this.random = Math.random();
    this.random1 = Math.random();
    this.random2 = Math.random();
    this.progress = 0;
    this.canvas = canvas;

    this.x = options.x;
    this.y = options.y;
    this.s = 2 + Math.random() * 3;
    this.w = $(window).width();
    this.h = $(window).height();
    this.radius = 1 + this.random * 0.5;
    this.color = "#4EFCFE"; //this.random > .5 ? "#a9722c" : "#FFFED7"
  }

  render() {
    this.canvas.beginPath();
    this.canvas.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
    this.canvas.lineWidth = 2;
    this.canvas.fillStyle = this.color;
    this.canvas.fill();
    this.canvas.closePath();
  }

  move() {
    this.x -= Math.sin(this.progress / (100 / (this.random1 - this.random2 * 10))) * this.s;
    this.y += Math.cos(this.progress / this.h) * this.s;

    if (this.x < 0 || this.x > this.w - this.radius) {
      return false;
    }

    if (this.y > this.h) {
      return false;
    }
    this.render();
    this.progress++;
    return true;
  }}


var random_life = 1000;


setInterval(
function () {
  particles.push(new Particle(canvas));
  random_life = 2000 * Math.random();
}.bind(this),
random_life);

function clear() {
  let grd = canvas.createRadialGradient(tela.width / 2, tela.height / 2, 0, tela.width / 2, tela.height / 2, tela.width);
  grd.addColorStop(0, "rgba(82,42,114,1)");
  grd.addColorStop(1, "rgba(26,14,4,0)");
  // Fill with gradient
  canvas.globalAlpha = 0.16;
  canvas.fillStyle = grd;
  canvas.fillRect(0, 0, tela.width, tela.height);
}

function blur(ctx, canvas, amt) {
  // ctx.filter = `blur(${amt}px)`
  // ctx.drawImage(canvas, 0, 0)
  // ctx.filter = 'none'
}

function update() {
  clear();
  particles = particles.filter(function (p) {
    return p.move();
  });
  microparticles = microparticles.filter(function (mp) {
    return mp.move();
  });
  requestAnimationFrame(update.bind(this));
}


function createCanvas(properties) {
  let canvas = document.createElement('canvas');
  canvas.width = properties.width;
  canvas.height = properties.height;
  let context = canvas.getContext('2d');
  return {
    canvas: canvas,
    context: context };

}
update();









<?php

try{
    $con = mysqli_connect("localhost","root","event");
    if ($con->connect_error) 
        die("Connection failed: " . $con->connect_error);

    mysqli_select_db($con, "event");

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
  <title>New Year Eve</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/data_dis.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">  
<script>src="js/display_js.js"</script>
</head>
<body>


<div class="container">

<div class="tab" >
<h3 class="head">Candidate detailas</h3 > 
<a class="linka" href="chart.php"><h6 class="rig">report</h ></a>
    <table class="table table-bordered table-dark">
    <thead>
      <tr>
      <th>S No.</th>
      <th>Uid</th>
      <th>Name</th>
      <th>date & time</th>

      </tr>
    </thead>
    <tbody>
      
<?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['sno']; ?></td>
        <td><div type="sub" data-toggle="modal"  data-target="#bring"><?php echo $user['uid']; ?></div></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['date']; ?></td>
        <td><button type="btn"  class="btn btn-success hell">hello</button></td>

    </tr>
<?php endforeach; ?>

    
      
    </tbody>

  </table>


<!-- Modal -->
<div class="modal fade" id="bring" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php
       
 #if(isset($_POST['sub'])  )
 #{
      try{
       
            $con = mysqli_connect("localhost","root","event");
            if ($con->connect_error) 
            die("Connection failed: " . $con->connect_error);
            mysqli_select_db($con, "event");

            $uid='R1590228987';
            $sql1 = "select * from test1 where uid='$uid'";
   
     $stat= mysqli_query($con, $sql1);
    $ul=mysqli_fetch_all($stat,MYSQLI_ASSOC);

    
}
  catch(PDOException $e)
  {
    echo $e;
  }
#}
?>

      <table class="table table-bordered table-dark">
    
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
        <td>Type & Number</td>
        <td><?php echo $u['type']; ?> - <?php echo $u['no']; ?></td>
    </tr>
    <tr>
        <td>Date Time </td>
        <td><?php echo $u['date']; ?></td>
    </tr>
    <tr>
        <td>Id Card </td>
        <td><img src="<?php echo 'id_img/'.$u['file']; ?>" class="set"/></td>
    </tr>

<?php endforeach; ?>
      
      
      
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div>
</div>




<script>
      $(document).ready(function(){
        $('.hell').on('click',funtion(){
          $('#bring').model('show');

        });
      });


    </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
