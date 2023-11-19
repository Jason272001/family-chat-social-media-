<?php 

include('header.php');
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

    

</script>
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
			
			<?php
			    $uid=$_SESSION['uid'];
			$fselect="SELECT f.*,u.*,u.id AS fuid From friend f, user u 
			WHERE CASE WHEN f.user_one='$uid' THEN 
			f.user_two=u.id WHEN f.user_two='$uid' THEN
			f.user_one=u.id END 
			";
			 $fquery=mysqli_query($connect,$fselect);
			 $fcount=mysqli_num_rows($fquery);
			
		
			
			?>



				<span style="background-color:balck; color: #088dcd;"><?php echo $fcount;?> Friends</span>
				
				
			</div>
			
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
							</div>

                     



                            <div class="col-lg-6">
								<div class="central-meta">
									<div class="groups">
										<span><i class="fa fa-users"></i> joined Groups</span>
									</div>
									<ul class="nearby-contct">
										
                                    
<?php 

if (isset($_REQUEST['data'])) {
    $id=$_REQUEST['data'];


    $select="SELECT * from user
    WHERE name LIKE '%$id%'";
    
    $query=mysqli_query($connect, $select);
    $count=mysqli_num_rows($query);

if ($count>0) {



    for ($i=0; $i <$count ; $i++) { 
        $datas=mysqli_fetch_array($query);
        $simage=$datas['picture'];
       
        $sname=$datas['name'];
        $sid=$datas['id'];
    




?>
<?php
if ($sid!=$_SESSION['uid']) {
    ?>

     
        <li>
				<div class="nearly-pepls">
					<figure>
						<a href="profile_view.php?id=<?php echo $sid;?>" title=""><img src="<?php echo $simage?>"style="width:70px;height:70px" alt=""></a>
					</figure>
								<div class="pepl-info">
									<h4><a href="profile_view.php?id=<?php echo $sid;?>" title=""><?php echo $sname?></a></h4>
												
													

<?php
$id=$_SESSION['uid'];
			$selectc="SELECT f.* From friend_request f
	WHERE CASE WHEN f.send_user='$id' THEN 
	f.recive_user='$sid' WHEN f.recive_user='$id' THEN
	f.send_user='$sid' END 
	";


    $queryc=mysqli_query($connect, $selectc);
	$countf=mysqli_num_rows($queryc);
	


	if ($countf>0)
	{
	   $ffselect="SELECT f.* From friend f 
	   WHERE CASE WHEN f.user_one='$uid' THEN 
	   f.user_two='$sid' WHEN f.user_two='$uid' THEN
	   f.user_one='$sid' END 
	   ";
		$ffquery=mysqli_query($connect,$ffselect);
	
	   
	   $datac=mysqli_fetch_array($queryc);
	   $frid=$datac['id'];
	   $status=$datac['status'];
	   if ($status=='pending') 
	   
	   {
	   
		   echo"<a href='cancle_request.php?id=$frid&data=$sid' title=''  class='add-butn'  data-ripple=''>Cancle Request </a>";
	   }
	   
	   elseif ($status=='confirm') 
	   {
		$ffdata=mysqli_fetch_array($ffquery);
		$unf=$ffdata['id'];
		   echo"<a href='unfriend.php?id=$frid&data=$sid&unf=$unf' class='add-butn' title=''  data-ripple=''>Unfriend </a>";
	   }
   }
	   
	   
	   else {
		   echo"<a href='friend_request.php?id=$sid'  class='add-butn' title='' data-ripple=''>Add Friend </a>";
	   }
   										
?>


								</div>
				</div>
		</li>





<?php
}




 }


}

else{
    echo"<p> Sorrry He is not hear  !</p>";
}
}
else{

    echo"<p> Type the Name Who you wnat to search  !</p>";
}

?>
                               
								
								
										
									
										
									</ul>
									<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
								</div><!-- photos -->
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
