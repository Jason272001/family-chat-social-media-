<?php 
include('connect.php');

$uid=$_SESSION['uid'];
if(isset($_POST['post_id'])&&isset($_POST['comment'])){

    $post_id= $_POST['post_id'];
    $comment=$_POST['comment'];







                if (empty($comment)) {
                    echo" <script >alert('Comment is empty')</script>  ";
                } 
   

                
                else {
                   
                          


                                $insertcomment="INSERT INTO comment (post_id,user_id,comment,) 
                                                        VALUES  ('$post_id','$uid','$comment')";

                                $runinsert=mysqli_query($connect, $insertcomment);
                            
                
    }

?>

                                              
								
										


 <?php   
}

?>






