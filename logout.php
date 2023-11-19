<?php  
session_start();
session_destroy();
session_regenerate_id();
echo "<script>alert('Successfull Logout')</script>";
echo "<script>location='index.php'</script>";
?>