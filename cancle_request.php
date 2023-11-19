<?php 

include('connect.php');
   $id=$_REQUEST['data'];
	if(isset($_GET['id']))
	{
		$cid=$_GET['id'];
       
		
		$delete="DELETE FROM friend_request Where id='$cid'";
		$query=mysqli_query($connect,$delete);
		if($query)
		{
            echo "<script>window.location='search_list.php?data=$id'</script>";
		}
		
        else{
			
	
            echo "<script>window.location='search_list.php?data=$id'</script>";
			}


					 }
                     


                     elseif(isset($_GET['frid'])){



                        $cid=$_GET['frid'];
       
		
                        $delete="DELETE FROM friend_request Where id='$cid'";
                        $query=mysqli_query($connect,$delete);
                        if($query)
                        {
                            echo "<script>window.location='friend.php'</script>";
                        }
                        
                        else{
                            
                    
                            echo "<script>window.location='friend.php'</script>";
                            }




                        
                     }

		


?>