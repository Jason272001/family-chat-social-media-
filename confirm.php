<?php 
session_start();
include('connect.php');
$ruid=$_REQUEST['id'];
$uid=$_SESSION['uid'];

if(isset($_GET['frid'])){

$frid=$_GET['frid'];

    $update="UPDATE friend_request
    
                SET status='confirm'
                WHERE id='$frid'";
                $query=mysqli_query($connect,$update);


        $insert="INSERT INTO friend(user_one,user_two)
                                VALUES('$uid','$ruid')";     
                                
                                $runinsert=mysqli_query($connect,$insert);	



                                if($runinsert || $query)
                                {
                                         
                                         echo "<script>window.location='friend.php'</script>";
                                }
                            else
                            {
                                echo "<script>window.location='friend.php'</script>";
                                  
                            } 
                             
}


?>