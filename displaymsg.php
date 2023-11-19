<?php 
include('connect.php');
session_start();
$uid=$_SESSION['uid'];
if(isset($_POST['id'])){


$id=$_POST['id'];
$uid=$_SESSION['uid'];
$status='unseen';
$select="SELECT * FROM user WHERE id = '$id'";
	$run=mysqli_query($connect, $select);
	$data=mysqli_fetch_array($run);
   
   
	$name=$data['name'];
	$image=$data['picture'];
$result=$connect->query("SELECT * From message 
WHERE from_id='$id' 
AND  to_id='$uid' 
 ORDER BY id ASC ");


$result1=$connect->query("SELECT count(id) As id FROM message "); 
$usercount=$result1->fetch_all(MYSQLI_ASSOC);
if ($usercount>0) 
{
    $chats=$result->fetch_all(MYSQLI_ASSOC);

    foreach($chats as $chat){


if($chat['status']=='unseen'){

    $status='unseen';

$chat_id=$chat['chat_id'];
$id=$chat['id'];

$update="UPDATE message
            SET 
            status='seen'
            WHERE chat_id='$chat_id'";
            $run=mysqli_query($connect,$update);

          




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

}
}

?>