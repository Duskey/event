<?php
#to delete the recor on the basis of id.
      require 'connect.php';
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


