<?php
include('header.php');


if(isset($_POST['sub'])){

$cp=$_POST['txtop'];
$np=$_POST['txtnp'];
$id=$_SESSION['uid'];

$sel="SELECT * FROM user WHERE id = '$id' AND password = '$cp'";

$run=mysqli_query($connect,$sel);
$count=mysqli_num_rows($run);
if ($count>0){


$up="UPDATE user SET 
password = '$np'
 WHERE id = '$id'";

$ru=mysqli_query($connect,$up);

if($ru){

    echo"<script>alert(' Password Updated') </script>";
    echo"<script>location='profile.php'</script>";
}

else{
    echo"<script>alert(' Try Again!') </script>";
    echo"<script>location='edit_password.php'</script>";
}

}

else{

    echo"<script>alert('Current Password Wrong') </script>";
    echo"<script>location='edit_password.php'</script>";
}





}





?>



<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  



</head>
<body>
	
<script src="js/ajax.js"></script>

    <section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">


									<div class="widget">  

										<h4 class="widget-title">Shortcuts</h4>
										<ul class="naves">
											<li>
												<i class="ti-clipboard"></i>
												<a href="home.php" title="">News feed</a>
											</li>
											
											<li>
												<i class="ti-user"></i>
												<a href="friend.php" title="">friends</a>
											</li>
											<li>
												<i class="ti-image"></i>
												<a href="profile_photos.php" title="">images</a>
											</li>
											
												<i class="ti-comments-smiley"></i>
												<a href="message.php" title="">Messages</a>
											</li>
											<br><br>
											<li>
												<i class="ti-power-off"></i>
												<a href="logout.php" title="">Logout</a>
											</li>
										</ul>
									</div><!-- Shortcuts -->
							
								</aside>
							</div><!-- sidebar -->



                            <div class="col-lg-6">
									<div class="central-meta">
										<div class="editing-info">
											<h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>
											
											<form method="post" action="edit_password.php">
												<div class="form-group">	
												  <input type="password" id="input" name="txtnp" required="required"/>
												  <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
												</div>
												
												<div class="form-group">	
												  <input type="password" name="txtop" required="required"/>
												  <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
												</div>
												
												<div class="submit-btns">
												
													<button type="submit" name="sub" class="mtr-btn"><span>Update</span></button>
												</div>
											</form>
										</div>
									</div>	
								</div>




</body>
</html>


    <?php              
     include('footer.php');
    ?>