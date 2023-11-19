<?php 
$connect=mysqli_connect('localhost','root','','fc');

if ($connect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connect -> connect_error;
    exit();
  }

?>