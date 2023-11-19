<?php 

include('connect.php');


$uid=$_SESSION['uid'];




if (isset($_POST['action']))
{
	$post_id= $_POST['post_id'];
	$action=$_POST['action'];


	switch ($action) {
		case 'like':
			$sql="INSERT INTO reaction(post_id,user_id,reaction)
			                    VALUES($post_id,$uid,'$action')
			                    ON DUPLICATE KEY  UPDATE reaction='like'";
			break;

		case'unlike':
			$sql="DELETE FROM reaction WHERE user_id=$uid AND post_id=$post_id ";
			break;	
	
		
		default:
			// code...
			break;
	}
//execute query
	$r=mysqli_query($connect,$sql);
    if($r){

    }
    else{
        echo"error";
    }
	//return number of likes
 echo getRating($post_id);

exit(0);
}

//get number of likes and dislikes for each post

function getRating($postid)
{
	global $connect;
	$rating=array();
	$likes_query="SELECT count(*) FROM reaction WHERE post_id=$postid And reaction='like'";



	$likes_rs=mysqli_query($connect,$likes_query);
	

	$likes=mysqli_fetch_array($likes_rs);


	$rating=[
		'likes'=>$likes[0]
		
	];

	return ($rating);
}

function getLikes($postid)

{


global $connect;

$sql="SELECT count(*) FROM reaction WHERE post_id=$postid And reaction='like'";

$rs=mysqli_query($connect,$sql);

$result=mysqli_fetch_array($rs);

return $result[0];


}



//check if user already like post or not


function userLiked($postid)
{
	global $connect;
	global $uid;

$sql="SELECT * FROM reaction WHERE user_id=$uid And post_id=$postid And reaction='like'";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
if ($count==1) {
	return true;

}else{
	return false; 
}



}

//check if user already dislike post or not









 ?>
