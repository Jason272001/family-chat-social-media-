


<?php 


session_start();
include('connect.php');


if (isset($_POST['btnreg']))
{
    $name=$_POST['rname'];
    $email=$_POST['remail'];
    $password=$_POST['rpassword'];
    $phone=$_POST['rphone'];
    $age=$_POST['rage'];
  
    $gender=$_POST['radio'];
 $profiel='img/2.png';
 $cover='images/resources/timeline-1.jpg';
     


    $select="SELECT * FROM user where email='$email'";
	$query=mysqli_query($connect,$select);
	$count=mysqli_num_rows($query);
    if($count>0)
	{
		echo "<script>alert('This Email has already registered.')</script>";
	}

    else{
        
        $insert="INSERT INTO user (email,name,password,gender,age,phone,picture,cover_photo)
                  Values ('$email','$name','$password','$gender','$age','$phone','$profiel','$cover')" ;
          
          $runinsert=mysqli_query($connect,$insert);
          
          if($runinsert)
          {
              echo"<script>alert('user Registration Successful!')</script>";
              echo"<script>location='index.php'</script>";
          }
      
          else
          { 
              echo"<script>alert(' Please Try again!')</script>";
              echo"<script>location='index.php'</script>";
          }
      }

}



elseif(isset($_POST['btnlogin']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $select="SELECT * FROM user WHERE
                                    Email='$email'
                                     AND Password='$password'";
                 $run=mysqli_query($connect,$select);
                 $count=mysqli_num_rows($run);                   



if($count==1)
{ $ret=mysqli_fetch_array($run);
    $_SESSION['uid']=$ret['id'];
    $_SESSION['email']=$ret['email'];
    $_SESSION['name']=$ret['name'];
 
 
        echo "<script>alert('Login Successful!')</script>";
        echo "<script>location='home.php'</script>";


}
else
{
echo "<script>alert('Email or Password uncorrect! Try again!')</script>";
echo "<script>location='index.php'</script>";


}
}

?>


























<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Family Chat</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

    
<script type="text/javascript">

function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";

    }
}

	</script>

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Family Chat</h1>
						<p>
							Family chat is free to use for as long as you want safe communication zone with your Family.
						</p>
						<div class="friend-logo">
							<span><img src="images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Login</h2>
							
	
						<form method="post" action="index.php">
							<div class="form-group">	
							  <input type="email" id="input" required="required" name="email"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password"  id="myInput" required="required" name="password" />
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox"  onclick="myFunction()"/><i class="check-box"></i>Show Password.
							  </label>
							</div>
							
							<div class="submit-btns">
								<input class="mtr-btn signin"  type="submit" name="btnlogin" value="Login" style="color:white; background-color:#002bb9">
								<button class="mtr-btn signup" type="button"><span>Register</span></button>
							</div>
						</form>
					</div>



					<div class="log-reg-area reg">
						<h2 class="log-title">Register</h2>
						<script type="text/javascript">

function myFunctions() {
    var x = document.getElementById("myInputs");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";

    }
}

	</script>
	
						<form method="post" action="index.php">
							<div class="form-group">	
							  <input type="text" required="required" name="remail"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
                            <div class="form-group">	
							  <input type="password"   id="myInputs" required="required" name="rpassword"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name="rname"/>
							  <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
							</div>
                            <div class="form-group">	
							  <input type="text" required="required"name="rphone"/>
							  <label class="control-label" for="input">Phone</label><i class="mtrl-select"></i>
							</div>
						
                            <div class="form-group">	
							  <input type="date" required="required" name="rage" />
							  <label class="control-label" for="input">Age</label><i class="mtrl-select"></i>
							</div>
						
						
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" value="Male" checked="checked"/><i class="check-box"></i>Male
								</label> 
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" value="Female" name="radio"/><i class="check-box"></i>Female
								</label>
							  </div>
							</div>
						
							<div class="checkbox">
							  <label>
								<input type="checkbox" onclick="myFunctions()"/><i class="check-box"></i>Show Password
							  </label>
							</div>
							<a href="#" title="" class="already-have">Already have an account</a>
							<div class="submit-btns">
								<input class="mtr-btn signup"  type="submit" name="btnreg" value="Register" style="color:white; background-color:#002bb9">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

</body>	

</html>