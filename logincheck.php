<?php 
function CheckLogin() 
{
    if(!isset($_SESSION['uid'])) 
	{
		echo "<script>window.alert('Please Login first to continue')</script>";
		echo "<script>window.location='index.php'</script>";
		exit();
	}


}

?>