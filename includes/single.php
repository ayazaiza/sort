<?php

$get =@$_GET['item_uni_id'];


$sub_section = "SELECT * FROM `links` WHERE `uni_id` = '$get' AND `status`='active' ORDER BY `id` DESC";
$sub_query = mysqli_query($connection,$sub_section);


$sub_row =  mysqli_fetch_array($sub_query);

?>


<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(../img/ba.jpg);">
		<h2 class="l-text2 t-center">
			<?php echo $sub_row['name']; ?>
		</h2>
    </section>
    

    	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">

                        <div class="item-blog p-b-80">
							<a href="blog-detail.html" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="../images/blog-04.jpg" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
                                <?php echo $sub_row['date']; ?>
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="<?php echo $sub_row['link']; ?>" class="m-text24">
										<?php echo $sub_row['name']; ?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

								<p class="p-b-12">
                                <?php echo $sub_row['description']; ?>
								</p>

								<a href="<?php echo $sub_row['link']; ?>" class="s-text20">
									Continue Shopping
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>




                    </div>
            </div>
            </div>
            </div>

</section>