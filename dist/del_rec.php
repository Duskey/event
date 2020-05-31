<?php

    $con = mysqli_connect("localhost","root","event");
    mysqli_select_db($con, "event");
    if(isset($_POST['deletedata']))
    {
            $name=$_POST['name_id'];
            echo $name;
            $sql1="SELECT file  FROM test1 WHERE uid=? ";
            $stmt=$con->prepare($sql1);
            $stmt->bind_param("i",$name);
            $stmt->execute();
            $res=$stmt->get_result();
            $row=$res->fetch_assoc();
            $path='id_img/'.$row['file'];
            echo $name;
            #$path1='id_img/1590404988id1.png';
            #unlink($path1);
         
            unlink($path);

            $sql="DELETE FROM test1 WHERE uid='$name'";
            $status = mysqli_query($con, $sql);
            #echo $name;
            if($status)
            {   
                echo '<script> alert ("Data Deleted"); </script>';
                header('Location:data_display.php');
            }
            else
            {
                echo '<script> alert ("Data Not Deleted"); </script>';
                
            }
    }
 
?>



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
