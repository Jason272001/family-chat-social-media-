<?php   
include('connect.php');


function getChats($uid1,$id1,$connect){


 
$result=$connect->query("SELECT c.* FROM message c WHERE
CASE WHEN c.from_id='$id1' THEN 
c.to_id='$uid1' WHEN c.to_id='$id1' THEN
c.from_id='$uid1' END 
         ORDER BY c.id ASC");


$result1=$connect->query("SELECT count(id) As id FROM message "); 
$usercount=$result1->fetch_all(MYSQLI_ASSOC);
if($usercount>0){


    $chats=$result->fetch_all(MYSQLI_ASSOC);

    return $chats;


}

else{
$chats=[];
return $chats;

}


}

?>