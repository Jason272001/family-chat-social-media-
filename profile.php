
<?php 

include('header.php');
include('cm.php');
include('postreaction.php');
$id=$_SESSION['uid'];

  
$select="SELECT * from user
WHERE id='$id'";

$query=mysqli_query($connect, $select);
    $data=mysqli_fetch_array($query);
	$image=$data['picture'];
	$cp=$data['cover_photo'];
	$name=$data['name'];







if (isset($_POST['btnpost']))
{
   
    $id=$_SESSION['uid'];

    $cap=$_POST['caption'];


   $StaffImage=$_FILES['StaffImage']['name'];
   $folder="post/";


   if (!empty($StaffImage)) {
    if ($StaffImage) {
        $filename=$folder ."_".$StaffImage;
        $copy=copy($_FILES['StaffImage']['tmp_name'], $filename);

        if (!$copy) {
            exit("Problem occured in Staff Image");
        }
    }



    $insert="INSERT INTO post (user_id,caption,photo)
                  Values ('$id','$cap','$filename')" ;

    $runinsert=mysqli_query($connect, $insert);

    if ($runinsert) {
        echo"<script>alert('Successfully Uploaded!')</script>";
        echo"<script>location='profile.php'</script>";
    } else {
        echo"<script>alert(' Please Try again!')</script>";
        echo"<script>location='profile.php'</script>";
    }
}


elseif(empty($StaffImage)){

	$insert="INSERT INTO post (user_id,caption,photo)
	Values ('$id','$cap','')" ;

$runinsert=mysqli_query($connect, $insert);

if ($runinsert) {
echo"<script>alert('Successfully Uploaded!')</script>";
echo"<script>location='profile.php'</script>";
} else {
echo"<script>alert(' Please Try again!')</script>";
echo"<script>location='profile.php'</script>";
}





}
      }






?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
       
	<script src="js/script.js"></script>

    
<script >

function triggerClick(){
document.querySelector('#StaffImage').click();
}
function displayImage(e) {
if (e.files[0])
{
var reader = new FileReader();
reader.onload =function(e){
document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
}
reader.readAsDataURL(e.files[0]);
}
}

function triggerClickcp(){
document.querySelector('#coverphoto').click();
}
function displaycp(e) {
if (e.files[0])
{
var reader = new FileReader();
reader.onload =function(e){
document.querySelector('#profileDisplaycp').setAttribute('src', e.target.result);
}
reader.readAsDataURL(e.files[0]);
}
}
function triggerClickp(){
document.querySelector('#profile').click();
}
function displayp(e) {
if (e.files[0])
{
var reader = new FileReader();
reader.onload =function(e){
document.querySelector('#profileDisplayp').setAttribute('src', e.target.result);
}
reader.readAsDataURL(e.files[0]);
}
}

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
<style>
.like-btn{
color: rgb(232, 35, 64);;
font-size: 1.5rem; 
} 

.like-btn:hover {
color: rgb(232, 35, 64);
font-size: 2.2rem;
transition-duration: 0.3s;
} 
.lc{
margin-left: 1.2rem;
color:rgb(232,35,64);

}

.com-btn{
color: rgb(0, 33, 245);;
font-size: 1.5rem; 
} 

.com-btn:hover {
color: rgb(0, 33, 245);
font-size: 2.2rem;
transition-duration: 0.3s;
} 
.cc{
margin-left: 1.6rem;
color:rgb(0,33,245);

}
</style>

</head>
    <body>
    <?php
	
	if(isset($_POST['btnphoto'])){

		$id=$_SESSION['uid'];
	
	  
	
	
		$profile=$_FILES['profile']['name'];
		$folder1="profile/";
	
		if( !empty($profile)){
	
				
	
	
	
						
							if ($profile) {
								$filename1=$folder1 ."_".$profile;
								$copy=copy($_FILES['profile']['tmp_name'], $filename1);
						
								if (!$copy) {
									exit("Problem occured in cover photo");
								}
							}
	
	
	
	
	$update="UPDATE user SET 
							picture='$filename1'
							WHERE id='$id'
							";
	
		$runinsert=mysqli_query($connect, $update);
	
					if ($runinsert) {
						echo"<script>alert('Successfully Uploaded!')</script>";
						echo"<script>location='profile.php'</script>";
					} else {
						echo"<script>alert(' Please Try again!')</script>";
						echo"<script>location='profile.php'</script>";
					}
					}
	 else{

	 }
	
	}
	if(isset($_POST['btncphoto'])){

		$id=$_SESSION['uid'];
	
	  
		$coverphoto=$_FILES['coverphoto']['name'];
		$folder="coverphoto/";
	
		
	
		if(!empty($coverphoto) ){
	
					if ($coverphoto) {
						$filename=$folder ."_".$coverphoto;
						$copy=copy($_FILES['coverphoto']['tmp_name'], $filename);
				
						if (!$copy) {
							exit("Problem occured in cover photo");
						}
					}
				
	
						
							
	
	
	
	$update="UPDATE user SET 
							
							cover_photo='$filename'
							WHERE id='$id'
							";
	
		$runinsert=mysqli_query($connect, $update);
	
					if ($runinsert) 
					{
						echo"<script>alert('Successfully Uploaded!')</script>";
						echo"<script>location='profile.php'</script>";
					} 
					else {
						echo"<script>alert(' Please Try again!')</script>";
						echo"<script>location='profile.php'</script>";
					}
					}
	 else{

	 }
	
	}
	?>

 
    <section>
		<div class="feature-photo">
		<figure>
		<?php 
		
		if (empty($cp)) {
   

	echo"<img src='images/resources/timeline-1.jpg' style='width:1366px;height:400px;'alt='' id='profileDisplaycp'>";

}

else{
   echo"<img src='$cp' style='width:1366px;height:400px;'alt='' id='profileDisplaycp'>";
} ?>
			
			</figure>		
			<?php
			    $sid=$_SESSION['uid'];
			$fselect="SELECT f.*,u.*,u.id AS fuid From friend f, user u 
			WHERE CASE WHEN f.user_one='$sid' THEN 
			f.user_two=u.id WHEN f.user_two='$sid' THEN
			f.user_one=u.id END 
			";
			 $fquery=mysqli_query($connect,$fselect);
			 $fcount=mysqli_num_rows($fquery);
			
			?>
			<div class="add-btn" >
			
			<span style="background-color:balck; color: #088dcd;"><?php echo $fcount;?> Friends</span>

				
				
			</div>
			<form class="edit-phto" method="POST" enctype="multipart/form-data">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Edit Cover Photo
				<input type="file" onclick="triggerClickcp()" onchange="displaycp(this)" id="coverphoto" style="display: none;" name="coverphoto"/>
				</label>
				<input type="submit" name="btncphoto" style="background-color:#088dcd; color: white;" value="Save">
			</form>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>

							<?php if (empty($image)) {
    

	echo"<img src='img/2.png' alt=''id='profileDisplayp' style='width:196px;height:156px;'>";

}

else{
   echo"<img src='$image' alt=''id='profileDisplayp' style='width:196px;height:156px;'>";
}?>
								
								<form class="edit-phto" method="POST" enctype="multipart/form-data">
									<i class="fa fa-camera-retro" onclick="triggerClickp()"></i>
									<label class="fileContainer">
										Edit Display Photo
										<input type="file"  name="profile" onchange="displayp(this)" id="profile" style="display: none;"/>
									</label>

									
									<input type="submit" name="btnphoto" style="background-color:#088dcd; color: white;" value="Save">
								</form>
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5><?php echo $name;?></h5>
								  
								</li>
								<li>
									<a class="active" href="profile.php" title="" data-ripple="">time line</a>
									<a class="" href="profile_photo.php" title="" data-ripple="">Photos</a>
									
									<a class="" href="friend.php" title="" data-ripple="">Friends</a>
									
								
									
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">


									<div class="widget">  
                                  <img class="" src="img/cp.jpg" style="width: 100px; height: 100px; margin:6px"  id="profileDisplay">

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
                            <div class="loadMore">
								<div class="central-meta item">
									<div class="new-postbox">
										<figure>
										<?php if (empty($image)) {
    

	echo"<img src='img/2.png' alt=''  style='width:60px; height: 60px;'>";

}

else{
   echo"<img src='$image' alt='' style='width:60px; height: 60px;' >";
}?>
										</figure>
										<div class="newpst-input">
											<form method="post" enctype="multipart/form-data">
												<textarea rows="2" placeholder="write something" name="caption"></textarea>
												<div class="attachments">
													<ul>
														
													
														<li>
															<i class="fa fa-camera" onclick="triggerClick()"></i>
															<label class="fileContainer">
                                                            <input   type="file" name="StaffImage" onchange="displayImage(this)" id="StaffImage" style="display: none;">
                         
															</label>
														</li>
														<li>
															<input type="submit" value="post" name="btnpost" style="border: medium none;color: #fff;font-size: 13px;font-weight: 600;padding: 3px 10px;    background: #088dcd;">
														</li>
													</ul>
												</div>
											</form>
										</div>
									</div>
								</div><!-- add post new box -->
                           
                                <?php
          $id=$_SESSION['uid'];
        
        $result=$connect->query("SELECT p.*,u.*,p.created_at AS utime,p.id AS pid FROM post p , user u 
		WHERE u.id= p.user_id
        AND p.user_id='$id'
        ORDER BY p.created_at DESC");
    
    
    
    $posts=$result->fetch_all(MYSQLI_ASSOC);
    
    
        $result1=$connect->query("SELECT count(id) As id FROM post ");
    
        $usercount=$result1->fetch_all(MYSQLI_ASSOC);
    
        ?>
								

                   
<!-- loop stt --> <?php 
foreach ($posts as $display):


    if (!empty($display['picture'])) {
        $pimage=$display['picture'];
    }
    
    else{
        $pimage="img/2.png";
    }
    
   

?>

                        <div class="central-meta item">
                            				<div class="user-post">
										<div class="friend-info">
											<figure>
                                            <img src="<?php echo $pimage;?>" style="width:60px; height: 60px;" alt="">
											</figure>
											<div class="friend-name">
												<ins><a href="" title=""><?= $display['name'];?></a></ins>
												<span>published: <?= $display['utime'];?></span>
											</div>
											<div class="post-meta">

											<div class="description">
													
													<p>
                                                    <?= $display['caption'];?>
													</p>
												</div>
                                        <?php 
                                        
                                        if(!empty($display['photo'])){?>

                                            <img src='<?= $display['photo'];?>' style='width:870px; height:470px' alt=''>

                                      <?php  }
                                        else{}
                                        ?>

												
												

                                                <div class="we-video-info">
													<ul>
													
													
														<li>
															<span class="like" data-toggle="tooltip" title="like">
															<i  <?php if(userLiked($display['pid'])):?>
                        class="fa-solid fa-heart fa-beat like-btn" 
                     <?php else: ?>
                        class="fa-regular fa-heart fa-beat like-btn" 
                     <?php endif; ?>
                     data-id="<?php echo $display['pid'] ?>" ></i>
															
																<ins class="lc"><?php echo getLikes($display['pid']); ?></ins>
																
															</span>
														</li>
													

														<li>
															<span class="comment" data-toggle="tooltip" title="Comments">
															<i class="fa-regular fa-comments fa-bounce com-btn"></i>				
																<ins class="cc"></ins>
															</span>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="coment-area">
											<ul class="we-comet">
											
											<li>
												 
														
												
													<div class="comet-avatar">
														<img src="images/resources/comet-1.jpg" alt="">
													</div>
													<div class="we-comment">
														<div class="coment-head">
															<h5><a href="time-line.html" title="">Jason borne</a></h5>
															<span>1 year ago</span>
															<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
														</div>
														<p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
													</div>
													
												</li>
											
													
												<li>
													<a href="#" title="" class="showmore underline">more comments</a>
												</li>
												<li class="post-comment">
													<div class="comet-avatar">
														<img src="images/resources/comet-1.jpg" alt="">
													</div>
													<div class="post-comt-box">
														<form method="post">
															<textarea placeholder="Post your comment"></textarea>
															<div class="add-smiles">
																<span >
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
</svg></span>
															</div>
															
															<button type="submit"></button>
														</form>	
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
                                
<!-- loop end -->
<?php

endforeach;
?>
   </div>
								</div>


                                <div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title"><i class="ti-heart"></i> My Interest</h4>	
										<div class="your-page">
                                        
       <div class="editing-interest">
<?php 

if (isset($_POST['btnint']))
{

    $id=$_SESSION['uid'];
    $interest=$_POST['cboint'];

    $insert="INSERT INTO interest_detail (interest_id,user_id)
    Values ('$interest','$id')" ;

$run=mysqli_query($connect,$insert);
if($run)
          {
              echo"<script>alert(' Successfuly Added!')</script>";
            
          }
      
          else
          {
              echo"<script>alert(' Please Try again!')</script>";
            
          }

}

?>

<form action="" method="post">

<select   name="cboint" id="" >

<option dis >Choose Interest</option>
  
<?php 
                           $rselect="SELECT * FROM interest
                                     ORDER BY name ASC";
                           $rresult=mysqli_query($connect,$rselect);
                           $rcount=mysqli_num_rows($rresult);
           
                           for($i=0;$i<$rcount;$i++)   
                           {
                           $rrows=mysqli_fetch_array($rresult);
                           $roleid=$rrows['id'];
                           $rolename=$rrows['name'];
                           echo "<option value='$roleid'>$rolename </option>"; 
                           }
                           ?>

</select>
<input type="submit" class="mtr-btn" value="Save" name="btnint" style="color:white; background-color:#002bb9">


<ol class="interest-added">

<?php 

$id=$_SESSION['uid'];
$query1="SELECT idd.*,i.name
		From  interest_detail idd, interest i
		WHERE idd.user_id='$id'
		AND  idd.interest_id=i.id";

$result1=mysqli_query($connect,$query1);
$count1=mysqli_num_rows($result1);

for($i=0;$i<$count1;$i++) 
{ 
	$row=mysqli_fetch_array($result1);
	$interests=$row['name'];
	
	echo"<li><a href=''>$interests</a><span class='remove' title='remove'><i class='fa fa-close'></i></span></li>";
											



}
?>

												</ol>
</form>
       </div>


											
										</div>

									</div><!-- page like widget -->
									
								</aside>
							</div>
                          


							

                         
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<script src="js/ajax.js"></script>
		
		


	<?php 

include('footer.php');

?>




    </body>
</html>

