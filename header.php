<?php 


session_start();
include('connect.php');
include('logincheck.php');
CheckLogin();
$id=$_SESSION['uid'];
$lname=$_SESSION['name'];
   
$select="SELECT * from user
WHERE id='$id'";

$query=mysqli_query($connect, $select);
    $data=mysqli_fetch_array($query);


    $image=$data['picture'];










?>

<?php
$id=$_SESSION['uid'];
$selectfr="SELECT fr.*,u.*, fr.id AS rid, fr.created_at AS createat   From friend_request fr,user u
WHERE fr.recive_user='$id' 
AND fr.send_user=u.id AND fr.status='pending'";
  $queryfr=mysqli_query($connect,$selectfr);
  $countfr=mysqli_num_rows($queryfr);
  

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

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
			<span class="mh-text">
				
			</span>
			
		</div>
		<div class="mh-head second">
			<form class="mh-form">
				<input placeholder="search" />
				<a href="#/" class="fa fa-search"></a>
			</form>
		</div>
		<nav id="menu" class="res-menu">
			<ul>
				<li><span>Home</span>
					<ul>
                    <li><a href="logout.php" title="">Logout Page</a></li>
						<li><a href="home.php" title="">news feed</a></li>
					</ul>
				</li>
				<li><span>Time Line</span>
					<ul>
					<li><a href="profile.php" title="">timeline</a></li>
						<li><a href="friend.php" title="">timeline friends</a></li>
					
						<li><a href="profile_photos.php" title="">timeline photos</a></li>
						
						
					</ul>
				</li>
				<li><span>Account Setting</span>
					<ul>
						<li><a href="edit_password.php" title="">edit-password</a></li>
						<li><a href="edit_profile.php" title="">edit profile basics</a></li>
						
						<li><a href="message.php" title="">message box</a></li>
						
					</ul>
				</li>
				
				
		</nav>
		
	</div><!-- responsive header -->
	
	<div class="topbar stick">
		<div class="logo">
			
		</div>
		
		<div class="top-area">
			<ul class="main-menu">
				<li>
					<a href="#" title="">Home</a>
					<ul>
						
						
						<li><a href="logout.php" title="">Logout Page</a></li>
						<li><a href="home.php" title="">news feed</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">timeline</a>
					<ul>
						<li><a href="profile.php" title="">My Profile</a></li>
						<li><a href="friend.php" title="">Friends List</a></li>
					
						<li><a href="profile_photo.php" title="">timeline photos</a></li>
						
					</ul>
				</li>
				<li>
					<a href="#" title="">account settings</a>
					<ul>
					
						<li><a href="edit_password.php" title="">edit-password</a></li>
						<li><a href="edit_profile.php" title="">edit profile basics</a></li>
						
						<li><a href="message.php" title="">message box</a></li>
						
					</ul>
				</li>
				
			</ul>
			<ul class="setting-area">
				<li>
					<a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" placeholder="Search Friend" name='txtsearch' id="searchname">
							<input type='submit' value="Search" onclick="searchuser(document.getElementById('searchname').value)">
						</form>
					</div>
				</li>
				<li><a href="home.php" onclick="home();" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
                <li>
					<a href="#" title="Notification" data-ripple="">
						<i class="ti-user"></i><span><?php echo $countfr ?></span>
					</a>
					<div class="dropdowns">
						<span><?php echo $countfr?> New Friend Request</span>
						<ul class="drops-menu">
							
						<?php
if ($countfr>0) {
    for ($i=0; $i <$countfr ; $i++) {
        $datafr=mysqli_fetch_array($queryfr);

        $imagefr=$datafr['picture'];
        $namefr=$datafr['name'];['picture'];
		$frid=$datafr['rid'];
		$idu=$datafr['id'];
		$cat=$datafr['createat'];
        ?>

						
						
						
						<li>
								<a href="profile_view.php?id=<?php echo $idu ?>" title="">
									<img src="<?php echo $imagefr;?>" alt="" style="width:40px;height:40px">
									<div class="mesg-meta">
										<h6><?php echo $namefr;?></h6>
										
										<i><?PHP echo $cat; ?></i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
						
							<?php
    }
}
else{
	echo"<p>There is no Friends Request</p>";
}
?>				
						
						</ul>
						<a href="friend.php" onclick='friend();' title="" class="more-mesg">view more</a>
					</div>
				</li>



<?PHP 

$msel="SELECT m.*,u.*,u.id AS muid FROM message m,user u 
WHERE m.to_id='$id' 
AND m.from_id=u.id 
AND m.status='unseen' 
ORDER BY m.created_at ASC
	   ";

	   $runm=mysqli_query($connect,$msel);
	   $mcount=mysqli_num_rows($runm);

?>



				<li>
					<a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span><?php echo $mcount ?></span></a>
					<div class="dropdowns">
						<span><?php echo $mcount ?> New Messages</span>
						<ul class="drops-menu">

<?php  if($mcount>0){ 
	
	for ($i=0; $i <$mcount; $i++) 
	
	{ 
		$mdate=mysqli_fetch_array($runm);

		$muid=$mdate['muid'];
		$mupic=$mdate['picture'];
		$msg=$mdate['message'];
		$mcat=$mdate['created_at'];
		$mname=$mdate['name'];
	

	?>

							<li>
								<a href="notifications.html" title="">
									<img src="<?php echo$mupic ?>" style="width:40px; height:40px" alt="">
									<div class="mesg-meta">
										<h6><?php echo$mname?></h6>
										<span><?php echo$msg?></span>
										<i><?php echo $mcat?></i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
						<?php }
						} 
						
						else{echo"<p>There is no New Message</p>";}
						?>
							

						
						</ul>
						<a href="message.php"  onclick='message();' title="" class="more-mesg">view more</a>
					</div>
				</li>
			
			</ul>
			<div class="user-img">
				<img src="<?php echo $image;?>" style="width:45px; height: 45px;" alt="">
				<span class="status f-online"></span>
				<div class="user-setting">
					
					<a href="" onclick="vp();"><i class="ti-user"></i> view profile</a>
					<a href="" onclick="ep();" ><i class="ti-pencil-alt"></i>edit profile</a>
			
					<a href="logout.php" onclick="logout();" ><i class="ti-power-off"></i>log out</a>
				</div>
			</div>
		
		</div>
	</div><!-- topbar -->
		
    <script>
function logout() {
    location='logout.php'
}
function ep() {
    location='edit_profile.php'
}
function vp() {
    location='profile.php'
}
function home() {
    location='home.php'
}


function searchuser(searchname)
{

	location='search_list.php?data='+searchname;

}
function friend() {
    location='friend.php'
}
function message() {
    location='message.php'
}
    </script>