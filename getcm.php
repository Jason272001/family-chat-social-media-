<?php   
include('connect.php');


function getComments($id1,$connect){


 
$result=$connect->query("SELECT c.* FROM comment c 
        WHERE c.post_id = '$id1'

         ORDER BY c.id ASC");


$result1=$connect->query("SELECT count(id) As id FROM comment "); 
$usercount=$result1->fetch_all(MYSQLI_ASSOC);
if($usercount>0){


    $comments=$result->fetch_all(MYSQLI_ASSOC);

    return $comments;


}

else{
$comments=[];
return $comments;

}


}

?>