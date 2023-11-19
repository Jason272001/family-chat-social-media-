
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

</script>
</head>
<body>
	
<script src="js/ajax.js"></script>
<form method="post" enctype="multipart/form-data">
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
								<div class="central-meta">
									<div class="new-postbox">
										<figure>
										<?php 
   echo"<img src='$image' alt='' style='width:60px; height: 60px;' >";
?>
												</figure>
										<div class="newpst-input">
											<form method="post">
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



if (isset($_POST['btncomment'])){

	$id=$_SESSION['uid'];
	$pid=$_POST['pid'];
	$cmt=$_POST['textcomment'];


	$insetc="INSERT INTO comment (user_id,post_id,comment)
							VALUES('$id','$pid','$cmt')";
	$runc=mysqli_query($connect,$insetc);


}






          $id=$_SESSION['uid'];
        
        $result=$connect->query("SELECT p.*,u.*,p.created_at AS utime,p.id AS pid FROM post p , user u WHERE u.id= p.user_id
        ORDER BY p.created_at DESC");
    
    
    
    $posts=$result->fetch_all(MYSQLI_ASSOC);
    
    
        $result1=$connect->query("SELECT count(id) As id FROM post ");
    
        $usercount=$result1->fetch_all(MYSQLI_ASSOC);
    
        ?>
								
                                <div class="loadMore">
                   
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
												<ins><a href="profile_view.php?id=<?php echo $display['user_id']?>" title=""><?= $display['name'];?></a></ins>
												<span>published: <?= $display['utime'];?></span>
											</div>
											<div class="post-meta">


                                        <?php 
                                        
                                        if(!empty($display['photo'])){?>

                                            <img src='<?= $display['photo'];?>' style='width:870px; height:470px' alt=''>

                                      <?php  }
                                        else{}
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
										<div class="coment-area" >
											<ul class="we-comet">


											<div id="chatBox">
									
 	<input type="hidden" class="pid" name="" value="<?php echo $display['pid']; ?>">

<?php
$ppid=$display['pid'];
$selc="SELECT c.*,p.*,u.*, c. created_at AS ccat FROM comment c, user u, post p
			WHERE c.post_id = '$ppid' AND u.id = c. user_id
			AND p.id=c.post_id
			ORDER BY ccat DESC Limit 3 ;
			";
$rsc=mysqli_query($connect, $selc);
$ccount=mysqli_num_rows($rsc);

		if($ccount>0){
				for ($i=0; $i <$ccount ; $i++) { 
		

					$comment = mysqli_fetch_array($rsc);

?>

											<li>
													<div class="comet-avatar">
														<img src="<?php echo $comment['picture'];?>" style="width:40px;height:40px;" alt="">
													</div>
													<div class="we-comment">
														<div class="coment-head">
															<h5><a href="time-line.html" title=""><?php echo $comment['name'];?></a></h5>
															<span><?php echo$comment['ccat'];?></span>
														</div>
														<p><?php echo$comment['comment'];?></p>
													</div>
													
												</li>
											<?php 
				}}
											?>
											</div>


												<li>
													<a href="commentdisplay.php?id=<?php echo $display['pid'] ?>" title="" class="showmore underline">more comments</a>
												</li>
												<li class="post-comment">
													<div class="comet-avatar">
														<img src="<?php echo $image; ?>" alt="">
													</div>
													<div class="post-comt-box">
														<form method="post">
															<input type="hidden" name="pid" value="<?php echo$display['pid'] ?>">
															<textarea id="textcomment" name="textcomment" class="textcomment"  placeholder="Post your comment"></textarea>
															<div class="add-smiles">
																<span ><button type="submit" name="btncomment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-send-fill comment-save"  data-id="<?php echo $display['pid']?>"viewBox="0 0 16 16">
  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
</svg></button>
</span>
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


                         



                         
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
<!-- <script>




	$(document).ready(function() {


$('.comment-save').on('click', function() {

var post_id = $(this).data('id');
var comment = $('#textcomment').val();

if(comment=='' && post_id=='') return; 
alert(comment)

$.post("cm.php",
		{
			comment: comment,
			post_id:post_id
		},
		function(data,status){
			$("#textcomment").val("");
			$("#chatBox").append(data);
			scrollDown();
		});


		let fechData=function(){


$.post("displaycm.php",

{
post_id:post_id
},	
		function(data,status){
		
			$("#chatBox").append(data);
			if(data !="")
			scrollDown();
		});

}
fechData();

setInterval(fechData,500);



	});


//auto reload



});

//auto reload

 -->

</script>
	
	
		</form>
	<?php 
    
    include('footer.php');
    ?>
                    
</body>	

</html>