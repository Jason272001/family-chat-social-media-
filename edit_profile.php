<?php
include('header.php');

$id=$_SESSION['uid'];

$select="SELECT * FROM user WHERE id='$id'";

$runsel=mysqli_query($connect,$select);
$data=mysqli_fetch_array($runsel);

$sn=$data['name'];
$se=$data['email'];

$sgen=$data['gender'];
$sph=$data['phone'];
$sage=$data['age'];


if (isset($_POST['btnsub']))
{
    $name=$_POST['txtname'];
    $email=$_POST['txtemail'];
  
    $phone=$_POST['txtphone'];
    $age=$_POST['txtuage'];
  
    $gender=$_POST['txtgender'];
   
     


    $update="UPDATE user SET 

                     name='$name',
                 
                    email='$email',
                 
                    gender='$gender',
                    phone='$phone',
                    age='$age'
                   
                    WHERE id='$id'";
           $runinsert=mysqli_query($connect,$update) ;        
          
          if($runinsert)
          {
              echo"<script>alert('user Update Successful!')</script>";
              echo"<script>location='profile.php'</script>";
          }
      
          else
          { 
              echo"<script>alert(' Please Try again!')</script>";
              echo"<script>location='edit_profile.php'</script>";
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
										<h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>

										<form method="post" action="edit_profile.php">
											
											<div class="form-group">	
											  <input type="text" name="txtname" required="required" value="<?php echo $sn?>"/>
											  <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <input type="text" name="txtemail" required="required" value="<?php echo $se?>"/>
											  <label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4b0e262a22270b">[email&#160;protected]</a></label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <input type="text" name="txtphone" name="txtname"required="required" value="<?php echo $sph?>"/>
											  <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
											</div>
										
											<div class="form-radio">
											  <div class="radio">
												<label>
												  <input type="radio" checked="checked" name="txtgender"><i class="check-box"></i>Male
												</label>
											  </div>
											  <div class="radio">
												<label>
												  <input type="radio" name="txtgender"><i class="check-box"></i>Female
												</label>
											  </div>
											</div>
										
											<div class="form-group">	
                                            <input type="date" name="txtuage" value="<?php echo $sage?>" required="required"/>
											  <label class="control-label" for="textarea">Date Of Birth</label><i class="mtrl-select"></i>
											</div>
											<div class="submit-btns">
												
												<button type="submit" name='btnsub' class="mtr-btn"><span>Update</span></button>
											</div>
										</form>
									</div>
								</div>	
							</div>
                                             



       <?php              
     include('footer.php');
    ?>