<?php
session_start();
include('connect.php');

if (isset($_REQUEST['id'])) {
    $id=$_REQUEST['id'];
    $sid=$_SESSION['uid'];
    $status='pending';

    $select="SELECT * FROM user WHERE id=$id";
    $query=mysqli_query($connect,$select);
    $data=mysqli_fetch_array($query);
    $name=$data['name'];
    $insert="INSERT INTO friend_request(send_user,recive_user,status)
                                    VALUES('$sid','$id','$status')";
                                    $runinsert=mysqli_query($connect,$insert);	




                                    if($runinsert)
                                    {
                                             echo "<script>window.alert('Firend Request Successful!')</script>";
                                             echo "<script>window.location='search_list.php?data=$name'</script>";
                                    }



}

?>