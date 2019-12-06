
<?php

    $section = "SELECT * FROM `category` WHERE `parent` = 'yes' AND `status`='active' ORDER BY rand() LIMIT 0,5";

    $run_section = mysqli_query($connection,$section);

    while($row_section = mysqli_fetch_array($run_section)){

    



?>


<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					<?php echo $row_section['name']; ?>
				</h3>
			</div>

			<div class="row">
                <?php
                $par = $row_section['name'];
            $sub_section = "SELECT * FROM `category` WHERE `parent`='$par' AND `status`='active' LIMIT 0,6";
            $sub_query = mysqli_query($connection,$sub_section);
            while($sub_row =  mysqli_fetch_array($sub_query)){
 

            ?>
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="images/blog-01.jpg" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="/sort/pages/sub_category.php?subc=<?php echo $sub_row['name']; ?>" class="m-text11">
									<?php echo ucfirst($sub_row['name']); ?>
								</a>
							</h4>

							
							<p class="s-text8 p-t-16">
								Duis ut velit gravida nibh bibendum commodo. 
							</p>
						</div>
					</div>
                </div>
                
            <?php } ?>

			

			
			</div>
		</div>
    </section>
    
    <?php } ?>