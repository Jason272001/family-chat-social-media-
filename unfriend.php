<?php 
session_start();
include('connect.php');
$uid=$_SESSION['uid'];
  
	if(isset($_GET['id']))
	{ $id=$_REQUEST['data'];
        $unfid=$_REQUEST['unf'];
		$cid=$_GET['id'];
       
		
		$delete="DELETE FROM friend_request Where id='$cid'";
		$query=mysqli_query($connect,$delete);

        $delete2="DELETE FROM friend WHERE id='$unfid' ";

        $query2=mysqli_query($connect,$delete2);

		if($query || $query2)
		{
            echo "<script>window.location='profile_view.php?id=$id'</script>";
		}
		
        else{
			
	echo"<script>window.alert'faill'</script>";
            echo "<script>window.location='profile_view.php?id=$id'</>";
			}


					 }
                     


                     elseif(isset($_GET['frid'])){


                        $cid=$_GET['frid'];
       
		
	$selectc="SELECT f.* From friend_request f
	WHERE CASE WHEN f.send_user='$uid' THEN 
	f.recive_user='$cid' WHEN f.recive_user='$uid' THEN
	f.send_user='$cid' END 
	";

    $queryc=mysqli_query($connect, $selectc);
	$data=mysqli_fetch_array($queryc);
    $id = $data['id'];

    $delete="DELETE FROM friend_request Where id='$id'";
    $query=mysqli_query($connect,$delete);
   
    $flis=$_REQUEST['unf'];
$delete2="DELETE FROM friend WHERE id='$flis' ";

$query2=mysqli_query($connect,$delete2);
	
                        if($query2||$query)
                        {
                            echo "<script>window.location='friend.php'</script>";
                        }
                        
                        else{
                            
                    
                            echo "<script>window.location='friend.php'</script>";
                            }




                        
                     }

		


?>