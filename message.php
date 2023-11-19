<?php 
include('header.php');

$uid=$_SESSION['uid'];

$user="SELECT * FROM user
 where id='$uid'";

 $urun=mysqli_query($connect,$user);
 $data=mysqli_fetch_array($urun);

 $image=$data['picture'];



$select="SELECT u.*,c.*,u.id AS uuid,c.created_at as cct FROM user u, chat c
WHERE CASE WHEN c.user_one='$uid' THEN 
c.user_two=u.id WHEN c.user_two='$uid' THEN
c.user_one=u.id END
 ";


$run=mysqli_query($connect,$select);
$count=mysqli_num_rows($run);

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Soul Search</title>
		<meta http-equiv="refresh"> 
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
	</head>
	<body>
		<main>
			<div class="layout m-2" >
				<!-- Start of Navigation -->
				<!-- <div class="navigation">
					<div class="container">
						<div class="inside">
							<div class="nav nav-tab menu">
								<button class="btn"><img class="avatar-xl" src="<?php echo $image;?>" alt="avatar"></button>
								
								
								
							</div>
						</div>
					</div>
				</div> -->
				<!-- End of Navigation -->
				<!-- Start of Sidebar -->
				<div class="sidebar" id="sidebar" style="margin-left:50%; margin-top:7%">
					<div class="container"  >
						<div class="col-md-10">
							<div class="tab-content" >
								<!-- Start of Contacts -->
								
								<!-- End of Contacts -->
								<!-- Start of Discussions -->
								<div id="discussions" class="tab-pane fade active show" >
									
															
									<div class="discussions" id="chatlist">
									<div class="list-group" id="chats" role="tablist">
										
<?php 


if($count>0){
for ($i=0; $i <$count ; $i++) 
    {
		$chatlist=mysqli_fetch_array($run);
$userid=$chatlist['uuid'];

$id=$chatlist['id'];

$seen="SELECT * From message 
WHERE chat_id='$id'
AND to_id='$uid'
 AND status='unseen'";
$srun=mysqli_query($connect,$seen);


$scount=mysqli_num_rows($srun);
if ($scount>0) {
    ?>


	<a href="chat.php?id=<?php echo $userid;?>"onclick="chat(<?php echo $userid;?>)" class="filterDiscussions all unread single active" id="list-chat-list" data-toggle="list" role="tab">
   	<img class="avatar-md" src="<?= $chatlist['picture'] ?>" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
		<div class="new bg-yellow">
			<span><?php echo $scount;?></span>
		</div>
	<div class="data">
	<h5><?= $chatlist['name']?></h5>
	<span><?= $chatlist['cct']?></span>
	<p><?= $chatlist['last_message']?></p>
	</div>
	</a>																		
									



<?php
}

else{
?>

								<a href="chat.php?id=<?php echo $userid;?>"onclick="chat(<?php echo $userid;?>)" class="filterDiscussions all read single" id="list-chat-list2" data-toggle="list" role="tab">
												<img class="avatar-md" src="<?= $chatlist['picture'] ?>" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar">
												
												<div class="data">
												<h5><?= $chatlist['name']?></h5>
												<span><?= $chatlist['cct']?></span>
												<p><?= $chatlist['last_message']?></p>
												</div>
											</a>



<?php

}





}

}

?>
</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
				
			
			</div> <!-- Layout -->
		</main>

<script>
function chat(id)
{

	location='chat.php?id='+id;

}


</script>


<!-- 




		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
		<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> -->
		<!-- Bootstrap/Swipe core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- <script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script> -->
		<script src="dist/js/swipe.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script>
			function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
			scrollToBottom(document.getElementById('content'));
		</script>
	</body>

</html>
<?php 

include('footer.php');

?>
