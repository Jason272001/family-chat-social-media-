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
									<a class="" href="profile.php" title="" data-ripple="">time line</a>
									<a class="active" href="profiel_photo.php" title="" data-ripple="">Photos</a>
									
									<a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>
									
								
									
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
												<a href="timeline-friends.html" title="">friends</a>
											</li>
											<li>
												<i class="ti-image"></i>
												<a href="timeline-photos.html" title="">images</a>
											</li>
											
												<i class="ti-comments-smiley"></i>
												<a href="messages.html" title="">Messages</a>
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
          $id=$_SESSION['uid'];
        
		  $result=$connect->query("SELECT p.*,u.*,p.created_at AS utime FROM post p , user u 
		  WHERE u.id= p.user_id
		  AND p.photo IS NOT NULL
		  AND p.user_id='$id'
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
	
		
		


	<?php 

include('footer.php');

?>





    </body>
</html>












