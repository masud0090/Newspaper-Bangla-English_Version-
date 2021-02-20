<?php




?>
<!-- Top Bar Start -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tb-contact">
                    <?php

                    $query = "SELECT * from contact_us";
                    $res = mysqli_query($con, $query);
                    $home_rows10 = mysqli_fetch_assoc($res)

                    ?>
                    <p><i class="fas fa-envelope"></i> <?php echo $home_rows10['contact_email'] ?></p>
                    <p><i class="fas fa-phone-alt"></i> <?php echo $home_rows10['phone_number'] ?> </p>
                </div>
            </div>
            <div class="col-md-6">

                <?php

                $query = "SELECT * from header_footer_policy where header=1 ";
                $res = mysqli_query($con, $query);

                ?>

                <div class="tb-menu">
                    <?php
                    while ($home_rows12 = mysqli_fetch_assoc($res)) { ?>
                        <a href="policy.php?hf=<?php echo $home_rows12['hf_id']; ?>"><?php echo $home_rows12['hf_title']; ?></a>
                    <?php
                    }
                    ?>


                    <!-- <a href="">Privacy</a>
                    <a href="">Terms</a> -->
                    <a href="contact.php" class="">Contact Us</a>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- start marque -->


<!-- start marque -->

<div class="container-fluid row" style="background:#ffe6f9;margin:0px;padding:0px">
    <div class="col-md-3  " style="padding-top:5px;background:linear-gradient(#b30f0f,darkred);height:40px; margin-left:0px;">
        <h4 class="text-light text-right">সর্বশেষ </h4>
    </div>

    <div class="col-md-9" style="font-size:13px;padding-top:7px">


        <!-- <marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="2" scrolldelay="50"  style="color: red;">
                  Mir Cloud in BASIS Softexpo 2020
                  </marquee> -->

        <marquee scrollamount="5" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            <?php $sql2 = "SELECT news_details.news_id, news_details.news_picture, news_details.news_headline_ban FROM news_details ORDER BY count DESC limit 4";
            $res2 = mysqli_query($con, $sql2);
            while ($home_rows = mysqli_fetch_assoc($res2)) { ?>
                <i class="fa fa-forward text-danger" aria-hidden="true"></i><a class="markup" href="single-page.php?nid=<?php echo $home_rows['news_id']; ?>"> <b><?php echo $home_rows['news_headline_ban'] . " &nbsp;"; ?> &nbsp</b></a>
            <?php
            }
            ?>
        </marquee>
        <!-- span class="markup" onclick=""single-page.php?nid=<?php echo $home_rows['news_id']; ?>""  -->


    </div>

</div>

<!-- </div> <br> -->





<!-- end marque -->





<!-- end marque -->
<!-- Top Bar Start -->

<!-- Brand Start -->
<div class="brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="b-logo">
                    <a href="index.php">
                        <img src="img/logo1.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-3">
                <div class="b-ads">
                    <a href="https://htmlcodex.com">
                        <img src="img/ads-1.jpg" alt="Ads">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <form action="news_search.php" style="width: 100%;display:flex" id="btn5" method="post">


                    <div class="b-search">
                        <input type="text" name="query" class="searchButton" placeholder="অনুসন্ধান করুন" required>
                        <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                    </div>
                </form>







            </div>
            <div class="col-lg-1 col-md-1">

                <div id="right_block">
                    <script type="text/javascript" async="" src="https://platform.twitter.com/widgets.js"></script>


                    <a href="../../newspaper/index.php" class="switcher">English</a>


                </div>
            </div>

        </div>
    </div>
</div>


<!-- Brand End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <?php
                $query = "SELECT * from categories";
                $res = mysqli_query($con, $query);
                ?>
                <a href="index.php" class="nav-item nav-link active"><i class="fa fa-home"></i></a>

                <?php while ($home_rows = mysqli_fetch_assoc($res)) { ?>

                    <div class="navbar-nav mr-auto">

                        <?php
                        $m_cat = $home_rows['categories_id'];
                        $query3 = "SELECT * from sub_categories where categories_id=$m_cat";
                        $res3 = mysqli_query($con, $query3);
                        if (mysqli_num_rows($res3) != 0) {

                        ?>
                            <div class="nav-item dropdown">

                                <a href="categori.php?cat=<?php echo $home_rows['categories_id']; ?>" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $home_rows['categories_name_ban']; ?></a>


                                <div class="dropdown-menu">
                                    <?php
                                    // $m_cat = $home_rows['categories_id'];
                                    $query2 = "SELECT sc.sub_categories_id, sc.sub_categories_name_ban from sub_categories sc where sc.categories_id=$m_cat";
                                    $res2 = mysqli_query($con, $query2);
                                    while ($s_rows = mysqli_fetch_assoc($res2)) {

                                    ?>
                                        <a href="view_sub_category_list.php?scat=<?php echo $s_rows['sub_categories_id']; ?>" class="dropdown-item"><?php echo $s_rows['sub_categories_name_ban']; ?></a>
                                        <!-- <a href="#" class="dropdown-item">judiciary</a>
                                <a href="#" class="dropdown-item">city</a>
                                <a href="#" class="dropdown-item">districts</a> -->
                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>
                        <?php
                        } else {

                        ?>
                            <div class="nav-item dropdown">

                                <a href="categori.php?cat=<?php echo $home_rows['categories_id']; ?>" class="nav-link ">
                                    <?php echo $home_rows['categories_name_ban']; ?></a>

                            </div>
                        <?php
                        }
                        ?>
                        <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">economy</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">business</a>
                                    
                                </div>
                            </div>
                            <a href="single-page.php" class="nav-item nav-link">world</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">sports</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">fifa world cup 2018</a>
                                    <a href="#" class="dropdown-item">icc cricket world cup</a>
                                </div>
                            </div>
                            <a href="single-page.php" class="nav-item nav-link">entertainment</a>


                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">lyfe style</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">health</a>
                                    <a href="#" class="dropdown-item">travel</a>
                                </div>
                            </div>
                            <a href="single-page.php" class="nav-item nav-link">arts</a>
                            <a href="single-page.php" class="nav-item nav-link">special</a>
                            <a href="single-page.php" class="nav-item nav-link">opinion</a>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">more</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">feature </a>
                                    <a href="#" class="dropdown-item">crime </a>
                                    <a href="#" class="dropdown-item">advice</a>
                                    <a href="#" class="dropdown-item">nature</a>
                                    <a href="#" class="dropdown-item">pohela boishak</a>
                                    <a href="#" class="dropdown-item">1426</a>
                                </div>
                            </div>
                             -->
                    </div>
                <?php
                }
                ?>
                <!-- <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div> -->
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->