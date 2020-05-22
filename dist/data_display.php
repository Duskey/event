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

    
<div class="tab">
    <table class="table table-bordered table-dark">
    <thead>
      <tr>
      <th>S No.</th>
      <th>Uid</th>
      <th>Name</th>
      <th>mobile</th>
      <th>Email</th>
      <th>Type & no</th>
      <th>date & time</th>
      <th>mobile</th>
      </tr>
    </thead>
    <tbody>
      
<?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['sno']; ?></td>
        <td><?php echo $user['uid']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['mobile']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['type']; ?> - <?php echo $user['no']; ?></td>
        <td><?php echo $user['date']; ?></td>
        <td><img src="id_img/<?php echo $user['file']; ?>" width="200" height="200"/></td>
        </tr>
<?php endforeach; ?>

    
      <tr>
        <td>1</td>
        <td>Y789856789</td>
        <td>rohit</td>
        <td>10101010110</td>
        <td>john@example.com</td>
        <td>Self 3</td>
        <td>122-12-2020 05:15</td>
        <td><img src="" width="200" height="200"/></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Y789856789</td>
        <td>rohit Kumar</td>
        <td>10101010110</td>
        <td>john@example.com</td>
        <td>Self 3</td>
        <td>122-12-2020 05:15</td>
        <td><img src="" width="200" height="200"/></td>
      </tr>
    </tbody>
  </table>

<div>








</body>
</html>
