<?php 

include('header.php');
if (isset($_REQUEST['id'])) {
    $id=$_REQUEST['id'];

    if($_REQUEST['id']==$_SESSION['uid']) {
		echo"<script>location='profile_photo.php'</script>";
	}
    else{
    $select="SELECT * from user
WHERE id='$id'";

    $query=mysqli_query($connect, $select);
    $data=mysqli_fetch_array($query);
    $name=$data['name'];
	$cp=$data['cover_photo'];
	$image=$data['picture'];
}
}


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
			<figure><img src="<?php echo $cp;?>" style="width:1366px;height:400px;"alt="" id="profileDisplaycp"></figure>
			<div class="add-btn" >
			<?php
			    $sid=$_REQUEST['id'];
			$fselect="SELECT f.*,u.*,u.id AS fuid From friend f, user u 
			WHERE CASE WHEN f.user_one='$sid' THEN 
			f.user_two=u.id WHEN f.user_two='$sid' THEN
			f.user_one=u.id END 
			";
			 $fquery=mysqli_query($connect,$fselect);
			 $fcount=mysqli_num_rows($fquery);
			
			?>



				<span style="background-color:balck; color: #088dcd;"><?php echo $fcount;?> Friends</span>
<?php

$uid=$_SESSION['uid'];
$sid=$_REQUEST['id'];
 


    $selectc="SELECT f.* From friend_request f
	WHERE CASE WHEN f.send_user='$uid' THEN 
	f.recive_user='$sid' WHEN f.recive_user='$uid' THEN
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
	   $ffdata=mysqli_fetch_array($ffquery);
	   $unf=$ffdata['id'];
	   
	   $datac=mysqli_fetch_array($queryc);
	   $frid=$datac['id'];
	   $status=$datac['status'];
	   if ($status=='pending') 
	   
	   {
	   
		   echo"<a href='cancle_request.php?id=$frid&data=$sid' title=''  data-ripple=''>Cancle Request </a>";
	   }
	   
	   elseif ($status=='confirm') 
	   {
	   
		   echo"<a href='unfriend.php?id=$frid&data=$sid&unf=$unf' title=''  data-ripple=''>Unfriend </a>";
	   }
   }
	   
	   
	   else {
		   echo"<a href='friend_request.php?id=$sid' title='' data-ripple=''>Add Friend </a>";
	   }
   

    ?>				         <a href="chat.php?id=<?php echo $id; ?>" title="" data-ripple="">Message</a>
			</div>
			<form class="edit-phto" method="POST" enctype="multipart/form">
			
			</form>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img src="<?php echo $image;?>" alt=""id="profileDisplayp" style="width:196px;height:156px;">
								
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
									<a class="" href="profile_view.php?id=<?php echo $_REQUEST['id'];?>" title="" data-ripple="">time line</a>
									<a class="active" href="profile_view_photo.php?id=<?php echo $_REQUEST['id'];?>" title="" data-ripple="">Photos</a>
								
								
									
									
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


                            <?php
          $id=$_REQUEST['id'];
        
        $result=$connect->query("SELECT p.*,u.*,p.created_at AS utime FROM post p , user u WHERE u.id= p.user_id
        AND p.user_id='$id'
        AND p.photo IS NOT NULL
        ORDER BY p.created_at DESC");
    
    
    
    $posts=$result->fetch_all(MYSQLI_ASSOC);
    
    
        $result1=$connect->query("SELECT count(id) As id FROM post ");
    
        $usercount=$result1->fetch_all(MYSQLI_ASSOC);
    
        ?>
                            <div class="col-lg-6">								<div class="central-meta">
									<ul class="photos">
                                    <?php 
foreach ($posts as $display):


   
   

?>
										<li>
											<a class="strip" href="<?= $display['photo'];?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="<?= $display['photo'];?>" alt=""></a>
										</li>
                                        <?php

endforeach;
?>					
								
									</ul>
									<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
								</div><!-- photos -->
							</div><!-- centerl meta -->


                            <div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title"><i class="ti-heart"></i> My Interest</h4>	
										<div class="your-page">
                                        
       <div class="editing-interest">
 



<ol class="interest-added">

<?php 

$id=$_REQUEST['id'];
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

include('footer.php');

?>





    </body>
</html>


