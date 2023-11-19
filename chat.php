<?php 
include('header.php');
include('getmsg.php');

$id=$_GET['id'];
$uid=$_SESSION['uid'];

global $uid;
global $id;
if (isset($_GET['id'])) {
    $id=$_GET['id'];
	$uid=$_SESSION['uid'];
	$select="SELECT * FROM user WHERE id = '$id'";
	$run=mysqli_query($connect, $select);
	$data=mysqli_fetch_array($run);
   
   
	$name=$data['name'];
	$image=$data['picture'];


}
$chats=getChats($uid,$id,$connect);
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Soul Search</title>
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
			<div class="layout">
				<!-- Start of Navigation -->
				<div class="main">
					<div class="tab-content" id="nav-tabContent">
						<!-- Start of Babble -->
						<div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
							<!-- Start of Chat -->
							<div class="chat" id="chat1">
								<div class="top">
									<div class="container">
										<div class="col-md-12">
											<div class="inside">
												<a href="user_detail.php?id=<?php echo $id;?>"><img class="avatar-md" src="<?php echo $image;?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
											
												<div class="data">
													<h5><a href="#"><?php echo $name;?></a></h5>
													
												</div>
												<div class="dropdown">
													
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="content" id="content">
									<div class="container" id="chatBox">
										<div class="col-md-12">
											

								<?php  if(!empty($chats)){ 
									
									foreach($chats as $chat){
									if($chat['from_id']==$uid){

									?>
 	
												<div class="message me">
												<div class="text-main">
													<div class="text-group me">
														<div class="text me">
															<p><?php echo $chat['message'];?></p>
														</div>
													</div>
													<span><?php echo$chat['created_at'];?></span>
												</div>
											</div>

										<?php
									}

									else{
										?>

												<div class="message">
												<img class="avatar-md" src="<?php echo $image;?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
												<div class="text-main">
													<div class="text-group">
														<div class="text">
															<p><?php echo$chat['message'];?></p>
														</div>
													</div>
													<span><?php echo$chat['created_at'];?></span>
												</div>
											</div>

										<?php
									}

									}
									?>

											
										
								
										
										<?php }
										else{

										?>

										<div style="margin-left:38%; margin-bottom: 15%;">
										<p><h2>No Message found</h2></p>
										<p><h2>Say Hi to your friends!</h2></p>
										</div>
										<?php	
										}
										
										?>
							

										</div>
									</div>
								</div>

			<div class="container">
									<div class="col-md-12">
										<div class="bottom">
											<form class="position-relative w-100" method="post" id="fupForm" name="fupForm">
												<textarea class="form-control" name="txtmsg" id="txtmsg" placeholder="Start typing for reply..." rows="1"></textarea>
								<i style="margin-top:30px ;" class="material-icons btn send"id="msgsend" name="msgsend" data-id="<?php echo $id;?>">send</i>
											</form>
										
										</div>
									</div>
								</div>
							</div>
				
			
			</div> <!-- Layout -->
		</main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script >


var scrollDown=function(){

	let chatBox=document.getElementById("chatBox");
	chatBox.scrollTop=chatBox.scrollHeight;
}
scrollDown();


		$(document).ready(function() {


$('#msgsend').on('click', function() {
	
	var id = $(this).data('id');
	var message = $('#txtmsg').val();

if(message=='' && id=='') return; 
	

	$.post("msg.php",
			{
				message:message,
				id:id
			},
			function(data,status){
				$("#txtmsg").val("");
				$("#chatBox").append(data);
				scrollDown();
			});
});


//auto reload

let fechData=function(){


$.post("displaymsg.php",

{
	id:<?= $_GET['id']?>
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


</script>
		
</head>
		<!-- Bootstrap/Swipe core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

	<script src="dist/js/vendor/popper.min.js"></script>
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


<!-- 
$(document).ready(function() {


$('.msgsend').on('click', function() {

	var id = $(this).data('id');
	alert(document.getElementById('txtmsg').value);

	var message = document.getElementById('txtmsg').value;
	alert(message);

	let formData = new FormData();
	formData.append('message', message);
	formData.append('id', id);

	formData.append('msgsend', 'msgsend');



	$.ajax({
		url: 'msg.php',
		type: 'post',
		data: formData,
		contentType: false,
		processData: false,
		cache: false,
		success: function(data) {
			alert(data)

		},


		errror: function(data) {
			alert(data)
		}

	});

});










}); -->