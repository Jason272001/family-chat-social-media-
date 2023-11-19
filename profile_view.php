
<?php 

include('header.php');
include('cm.php');
include('postreaction.php');
if (isset($_REQUEST['id'])) {
    $id=$_REQUEST['id'];

    if ($_REQUEST['id']==$_SESSION['uid']) {
        echo"<script>location='profile.php'</script>";
    } else {
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
       
	<script src="js/script.js"></script>

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
    
	<script src="js/ajax.js"></script>
 
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
	
	$datac=mysqli_fetch_array($queryc);
	$frid=$datac['id'];
	$status=$datac['status'];
    if ($status=='pending') 
	
	{
    
		echo"<a href='cancle_request.php?id=$frid&data=$sid' title=''  data-ripple=''>Cancle Request </a>";
    }
	
	elseif ($status=='confirm') 
	{
		$ffselect="SELECT f.* From friend f 
		WHERE CASE WHEN f.user_one='$uid' THEN 
		f.user_two='$sid' WHEN f.user_two='$uid' THEN
		f.user_one='$sid' END 
		";
		 $ffquery=mysqli_query($connect,$ffselect);
		$ffdata=mysqli_fetch_array($ffquery);
		$unf=$ffdata['id'];
		
		echo"<a href='unfriend.php?id=$frid&data=$sid&unf=$unf' title=''  data-ripple=''>Unfriend </a>";
    }
}
	
	
	else {
        echo"<a href='friend_request.php?id=$sid' title='' data-ripple=''>Add Friend </a>";
    }

    ?>				
         
				
                <a href="chat.php?id=<?php echo $id; ?>" title="" data-ripple="">Message</a>
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
									<a class="active" href="profile_view.php?id=<?php echo $_REQUEST['id'];?>" title="" data-ripple="">time line</a>
									<a class="" href="profile_view_photo.php?id=<?php echo $_REQUEST['id'];?>" title="" data-ripple="">Photos</a>
								
								
									
									
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
							<div class="col-lg-6">
                            <div class="loadMore">
							
                        
                                <?php
             $id=$_REQUEST['id'];

    $result=$connect->query("SELECT p.*,u.*,p.created_at AS utime, p.id AS pid FROM post p , user u WHERE u.id= p.user_id
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
    } else {
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


                                        <?php

                                            if(!empty($display['photo'])) {?>

                                            <img src='<?= $display['photo'];?>' style='width:870px; height:470px' alt=''>

                                      <?php  } else {
                                      }
    ?>

												
												
												<div class="description">
													
													<p>
                                                    <?= $display['caption'];?>
													</p>
                                                    
												</div>
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
 


<form action="" method="post">



<ol class="interest-added">

<?php
    $id=$_REQUEST['id'];
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
