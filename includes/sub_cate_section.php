
<?php

$get =@$_GET['subc'];






?>


<section class="blog bgwhite p-t-94 p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                <?php echo $get; ?>
            </h3>
        </div>

        <div class="row">
            <?php
           // $par = $row_section['name'];
        $sub_section = "SELECT * FROM `links` WHERE `sub_category` = '$get' AND `status`='active' ORDER BY `id` DESC";
        $sub_query = mysqli_query($connection,$sub_section);
        while($sub_row =  mysqli_fetch_array($sub_query)){


        ?>
            <div class="col-sm-10 col-md-3 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="../img/1.jpg" alt="IMG-BLOG">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="/sort/pages/single_pro.php?item_uni_id=<?php echo $sub_row['uni_id']; ?>" class="m-text11">
                                <?php echo ucfirst($sub_row['name']); ?>
                            </a>
                        </h4>

                        
                        <p class="s-text8 p-t-16">
                          <?php echo $sub_row['description']; ?>
                        </p>
                    </div>
                </div>
            </div>

            
            
        <?php } ?>

        

        
        </div>
    </div>
</section>

<?php //} ?>