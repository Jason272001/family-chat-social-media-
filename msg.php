<?php 
include('connect.php');
session_start();

if(isset($_POST['id'])&&isset($_POST['message'])){
    $uid=$_SESSION['uid'];
    $id= $_POST['id'];
    $message=$_POST['message'];


    define('TIMEZONE','Asia/Rangoon');
    date_default_timezone_set(TIMEZONE); 

    $time=date("h:i:s a");

                if (empty($message)) {
                    echo" <script >alert('Comment is empty')</script>  ";
                } 
   

    else {
        $check="SELECT c.* From chat c
        WHERE CASE WHEN c.user_one='$id' THEN 
        c.user_two='$uid' WHEN c.user_two='$id' THEN
        c.user_one='$uid' END";


        $checkrun=mysqli_query($connect, $check);
        $checkcount=mysqli_num_rows($checkrun);
                    if ($checkcount>0) {
                        $data=mysqli_fetch_array($checkrun);
                        $ccid=$data['id'];


                        $insertmessage="INSERT INTO message (chat_id,from_id,to_id,message,status) 
                    VALUES  ('$ccid','$uid','$id','$message','unseen')";

                        $runinsert=mysqli_query($connect, $insertmessage);

                        $updatechat="UPDATE chat SET
                                last_sent_user_id='$uid',
                                last_message='$message'
                               
                                WHERE id='$ccid'";

                        $runupdate=mysqli_query($connect, $updatechat);
                            }
                
                else {
                    $createchat="INSERT INTO chat (user_one,user_two,last_sent_user,last_message)
                                        VALUES('$uid','$id','$uid','$message')";
                    $runcreatechat=mysqli_query($connect, $createchat);


                            if ($runcreatechat) {
                                $selectid="SELECT c.* From chat c
                            WHERE CASE WHEN c.user_one='$id' THEN 
                            c.user_two='$uid' WHEN c.user_two='$id' THEN
                            c.user_one='$uid' END";


                                $selectrun=mysqli_query($connect, $selectid);
                                $arr=mysqli_fetch_array($selectrun);
                                $cid=$arr['id'];


                                $insertmessage="INSERT INTO message (chat_id,from_id,to_id,message,status) 
                                                        VALUES  ('$cid','$uid','$id','$message','unseen')";

                                $runinsert=mysqli_query($connect, $insertmessage);
                            }
                }
    }

?>
	                                <div class="message me">
												<div class="text-main">
													<div class="text-group me">
														<div class="text me">
															<p><?php echo $message; ?></p>
														</div>
													</div>
													<span><?php echo $time;?></span>
												</div>
											</div>
								
										


 <?php   
}

?>



