<?php 
include('header.php');
$pid=$_GET['id'];

$selc="SELECT c.*,p.*,u.*, c. created_at AS ccat FROM comment c, user u, post p
			WHERE c.post_id = '$pid' AND u.id = c. user_id
			AND p.id=c.post_id
			ORDER BY ccat DESC ;
			";
$rsc=mysqli_query($connect, $selc);
$ccount=mysqli_num_rows($rsc);



?>


<div class="col-lg-6 m-3">
								<div class="central-meta">
									<div class="editing-interest">
										<h5 class="f-title"><i class="ti-bell"></i>All Comment </h5>
										<div class="notification-box">
											<ul>

<?php 

if ($ccount>0) {
    for ($i=0; $i <$ccount ; $i++) {
        $comment = mysqli_fetch_array($rsc);
        ?>
											
												<li>
													<figure><img src="<?php echo $comment['picture'];?>"" alt=""></figure>
													<div class="notifi-meta">
														<p><?php echo$comment['comment'];?></p>
														<span><?php echo$comment['ccat'];?></span>
													</div>
													
												</li>
												
												<?php }
    }?>
												
											</ul>
										</div>
									</div>
								</div>	
							</div><!-- centerl meta -->



                       <?php 
                       include('footer.php');
                       
                       ?>
                       
                       