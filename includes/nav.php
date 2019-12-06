
<?php
    
		$main_category = "SELECT * FROM `category` WHERE `parent` = 'yes' AND `status`='active' ORDER BY `position` ASC LIMIT 0,6";

		$run_main = mysqli_query($connection,$main_category);

	

?>
<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.html" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
               <li> <a href="/sort/">Home</a></li>

                <?php 

                    while($row = mysqli_fetch_array($run_main)){

                    
         ?>
					<li>
						<a href="/sort/pages/main_category.php?mainc=<?php echo $row['name']; ?>">
						  <?php echo ucfirst($row['name']); ?>
					   </a>
                        <?php 
                        
                $par = $row['name'];

                $sub_category = "SELECT * FROM `category` WHERE `parent`='$par' AND `status`='active'";
                        
                $run_sub = mysqli_query($connection,$sub_category);

                

              ?>
						<ul class="sub_menu">

                        <?php 

                        while($row_sub = mysqli_fetch_array($run_sub)){
                            if(isset($row_sub['name'])){
                        ?>
                            <li><a href="/sort/pages/sub_category.php?subc=<?php echo $row_sub['name']; ?>"><?php echo ucfirst($row_sub['name']); ?></a></li>
                            
                    <?php }
                
                     } ?>
						</ul>
                    </li>
                    
                <?php } ?>
					<!-- <li>
						<a href="product.html">Shop</a>
                    </li> -->
                    <li>
						<a href="">More</a>
						<ul class="sub_menu">
                            <?php 

                            $more1 = "SELECT * FROM `category` WHERE `parent` = 'yes'
                                   AND `status`='active' ORDER BY `position` ASC LIMIT 6,12";
                                   
                            $run_more1 = mysqli_query($connection,$more1);
                                                               
                            while($row_more1 = mysqli_fetch_array($run_more1)){
                            
                            ?>
							<li><a href="/sort/pages/main_category.php?mainc=<?php echo $row_more1['name']; ?>"><?php echo $row_more1['name']; ?></a></li>
                            <?php } ?>
						</ul>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
	
	</div>

	<!-- top noti -->
	<div class="flex-c-m size22 bg0 s-text21 pos-relative">
	

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>


<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				

				<!-- Logo2 -->
				<a href="index.html" class="logo2">
					<img src="/sort/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
                    <?php
            
					$main_category2 = "SELECT * FROM `category` WHERE `parent` = 'yes' AND `status`='active' ORDER BY `position` ASC LIMIT 0,6";

					$run_main2 = mysqli_query($connection,$main_category2);

					?>
						<ul class="main_menu">
                        <li> <a href="/sort/">Home</a></li>
              
                        <?php 

				while($row2 = mysqli_fetch_array($run_main2)){


?>
							<li>
								<a href="/sort/pages/main_category.php?mainc=<?php echo $row2['name']; ?>"><?php echo ucfirst($row2['name']); ?></a>
								<ul class="sub_menu">
                                <?php 
                        
                        $par2 = $row2['name'];

                $sub_category2 = "SELECT * FROM `category` WHERE `parent`='$par2' AND `status`='active'";
                        
                $run_sub2 = mysqli_query($connection,$sub_category2);

                while($row_sub2 = mysqli_fetch_array($run_sub2)){
                    if(isset($row_sub2['name'])){

              ?>
                                    
									<li><a href="/sort/pages/sub_category.php?subc=<?php echo $row_sub2['name']; ?>"><?php echo ucfirst($row_sub2['name']); ?></a></li>
                    <?php } } ?>
								</ul>
							</li>
<?php } ?>

 <li>
						<a href="">More</a>
						<ul class="sub_menu">
                            <?php 

                            $more1 = "SELECT * FROM `category` WHERE `parent` = 'yes'
                                   AND `status`='active' ORDER BY `position` ASC LIMIT 6,12";
                                   
                            $run_more1 = mysqli_query($connection,$more1);
                                                               
                            while($row_more1 = mysqli_fetch_array($run_more1)){
                            
                            ?>
							<li><a href="/sort/pages/main_category.php?mainc=<?php echo $row_more1['name']; ?>"><?php echo $row_more1['name']; ?></a></li>
                            <?php } ?>
						</ul>
					</li>
							<!-- <li>
								<a href="product.html">Shop</a>
							</li> -->

							
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					

					<span class="linedivide2"></span>

					
						<!-- Header cart noti -->
					

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
					<?php
					
			$main_category3 = "SELECT * FROM `category` WHERE `parent` = 'yes' AND `status`='active' ORDER BY `position` ASC LIMIT 0,6";
		
			$run_main3 = mysqli_query($connection,$main_category3);
		
				  ?>


				<ul class="main-menu">
                <li> <a href="/sort/">Home</a></li>

					        <?php 

						while($row3 = mysqli_fetch_array($run_main3)){


						?>

					<li class="item-menu-mobile">
						<a href="/sort/pages/main_category.php?mainc=<?php echo $row3['name']; ?>">
							<?php echo $row3['name']; ?>
					   </a>
						<ul class="sub-menu">
                        <?php 
                        
                        $par3= $row3['name'];

						$sub_category3 = "SELECT * FROM `category` WHERE `parent`='$par3' AND `status`='active'";
								
						$run_sub3 = mysqli_query($connection,$sub_category3);

						while($row_sub3 = mysqli_fetch_array($run_sub3)){

                  	    if(isset($row_sub3['name'])){

                       ?>
							<li><a href="/sort/pages/sub_category.php?subc=<?php echo $row_sub3['name']; ?>"><?php echo $row_sub3['name']; ?></a></li>
                    <?php } } ?>	
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
         			<?php } ?>
					<!-- <li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li> -->

					<li class="item-menu-mobile">
						<a href="index.html">More</a>
						<ul class="sub-menu">
						<?php 

						$more1 = "SELECT * FROM `category` WHERE `parent` = 'yes'
							AND `status`='active' ORDER BY `position` ASC LIMIT 6,12";
							
						$run_more1 = mysqli_query($connection,$more1);
														
						while($row_more1 = mysqli_fetch_array($run_more1)){

						?>
						<li><a href="/sort/pages/main_category.php?mainc=<?php echo $row_more1['name']; ?>"><?php echo $row_more1['name']; ?></a></li>
						<?php } ?>
						
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					
				</ul>
			</nav>
		</div>
	</header>