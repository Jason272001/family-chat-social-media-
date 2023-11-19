<?php 
include('header.php');
if (isset($_REQUEST['data'])) {
    $id=$_REQUEST['data'];




}



$id=$_SESSION['uid'];

  
$select="SELECT * from user
WHERE id='$id'";

$query=mysqli_query($connect, $select);
    $data=mysqli_fetch_array($query);
	$image=$data['picture'];
	$cp=$data['cover_photo'];
	$name=$data['name'];














?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
       
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

    

    </head>
    <body>
   

 
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
			
			<div class="add-btn" >
			
				<span style="background-color:balck; color: #088dcd;">1205 followers</span>

				
				
			</div>
			<!-- <form class="edit-phto" method="POST" enctype="multipart/form-data">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Edit Cover Photo
				<input type="file" onclick="triggerClickcp()" onchange="displaycp(this)" id="coverphoto" style="display: none;" name="coverphoto"/>
				</label>
				<input type="submit" name="btncphoto" style="background-color:#088dcd; color: white;" value="Save">
			</form> -->
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
<!-- 								
								<form class="edit-phto" method="POST" enctype="multipart/form-data">
									<i class="fa fa-camera-retro" onclick="triggerClickp()"></i>
									<label class="fileContainer">
										Edit Display Photo
										<input type="file"  name="profile" onchange="displayp(this)" id="profile" style="display: none;"/>
									</label>

									
									<input type="submit" name="btnphoto" style="background-color:#088dcd; color: white;" value="Save">
								</form> -->
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
									<a class="" href="profile.php" title="" data-ripple="">time line</a>
									<a class="" href="profile_photo.php" title="" data-ripple="">Photos</a>
									
									<a class="active" href="friend.php" title="" data-ripple="">Friends</a>
									
								
									
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
												<a href="profile_photo.php" title="">images</a>
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
							</div>
							<?php
$id=$_SESSION['uid'];
$selectfr="SELECT fr.*,u.*, fr.id AS rid   From friend_request fr,user u
WHERE fr.recive_user='$id' 
AND fr.send_user=u.id AND fr.status='pending'";
  $queryfr=mysqli_query($connect,$selectfr);
  $countfr=mysqli_num_rows($queryfr);
  

$fselect="SELECT f.*,u.*,u.id AS fuid, f.id AS friendid From friend f, user u 
			WHERE CASE WHEN f.user_one='$id' THEN 
			f.user_two=u.id WHEN f.user_two='$id' THEN
			f.user_one=u.id END 
			";
			 $fquery=mysqli_query($connect,$fselect);
			 $fcount=mysqli_num_rows($fquery);
			 

  ?>

							<div class="col-lg-6">
								<div class="central-meta">
									<div class="frnds">
										<ul class="nav nav-tabs">
											 <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a> <span><?php echo $fcount; ?></span></li>
											 <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span><?php echo $countfr; ?></span></li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">
										  <div class="tab-pane active fade show " id="frends" >
											<ul class="nearby-contct">
												

  <?php
if ($fcount>0) {

	

    for ($i=0; $i <$fcount ; $i++) {
		$fdata=mysqli_fetch_array($fquery);
		$fuid=$fdata['fuid'];
		$fimg=$fdata['picture'];
		$fname=$fdata['name'];
		$flid=$fdata['friendid'];
		$uid=$_SESSION['uid'];
	
        ?>



											<li>
												<div class="nearly-pepls">
													<figure>
														<a href="profile_view.php?id=<?php echo $fuid; ?>" title=""><img src="<?php echo $fimg;?>"style='width:60px; height:60px;' alt=""></a>
													</figure>
													<div class="pepl-info">
														<h4><a href="profile_view.php?id=<?php echo $fuid; ?>" title=""><?php echo $fname; ?></a></h4>
														
													<?php	echo"<a href='unfriend.php?frid=$fuid&unf=$flid' title='' class='add-butn more-action' data-ripple=''>unfriend</a>";?>
													
													</div>
												</div>
											</li>
									<?php }
											}?>
											
										</ul>
											<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
										  </div>



										  



										  <div class="tab-pane fade" id="frends-req" >
											<ul class="nearby-contct">




  <?php
if ($countfr>0) {
    for ($i=0; $i <$countfr ; $i++) {
        $datafr=mysqli_fetch_array($queryfr);

        $imagefr=$datafr['picture'];
        $namefr=$datafr['name'];['picture'];
		$frid=$datafr['rid'];
		$idu=$datafr['id'];
        ?>




											<li>
												<div class="nearly-pepls">
													<figure>
														<a href="profile_view.php?id=<?php echo $idu?>" title=""><img src="<?php echo $imagefr;?>"style='width:60px; height:60px;' alt=""></a>
													</figure>
													<div class="pepl-info">
														<h4><a href="profile_view.php?id=<?php echo $idu?>" title=""><?php echo $namefr;?></a></h4>
														
														<a href="cancle_request.php?frid=<?php echo $frid;?>" title="" class="add-butn more-action" data-ripple="">delete Request</a>
													<?php echo"<a href='confirm.php?id=$idu&frid=$frid' title='' class='add-butn' data-ripple=''>Confirm</a>";?>
													</div>
												</div>
											</li>	

											
<?php
    }
}
else{
	echo"<p>There is no Friends Request</p>";
}
?>				
										
										</ul>	
											  <button class="btn-view btn-load-more"></button>
										  </div>
										</div>
									</div>
								</div>	
							</div>


                            
                            <div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title"><i class="ti-heart"></i> My Interest</h4>	
										<div class="your-page">
                                        
       <div class="editing-interest">
 


<form action="" method="post">



<ol class="interest-added">

<?php
    $id=$_SESSION['uid'];
    $query1="SELECT idd.*,i.name
		From  interest_detail idd, interest i
		WHERE idd.user_id='$id'
		AND  idd.interest_id=i.id";

    $result1=mysqli_query($connect, $query1);
    $count1=mysqli_num_rows($result1);

    for($i=0;$i<$count1;$i++) {
        $row=mysqli_fetch_array($result1);
        $interests=$row['name'];

        echo"<li>$interests|</li>";
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

	
		
		




    <?php

include('footer.php'); ?>

    </body>
</html>
