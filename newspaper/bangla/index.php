<?php
include('database.php');
// $query = "select DISTINCT news_details.news_id, news_details.news_headline, categories.categories_id from news_details, categories where news_details.news_id=categories.categories_id";


// $home_rows = mysqli_fetch_assoc($res);
// $tid = $home_rows['home_image'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>SkillHutch24.com</title> -->
    <?php include('include/head.php'); ?>

</head>

<body>
    <?php include('include/nav.php'); ?>

    <!-- Nav Bar End -->

    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">
                        <?php
                        $query = "SELECT * from news_details where news_details.slider=1 ";
                        $res = mysqli_query($con, $query);
                        while ($home_rows = mysqli_fetch_assoc($res)) { ?>

                            <div class="col-md-6">

                                <div class="tn-img">
                                    <img src="img/<?php echo $home_rows['news_picture']; ?>">
                                    <div class="tn-title">
                                        <a href="single-page.php?nid=<?php echo $home_rows['news_id']; ?>"><?php echo $home_rows['news_headline_ban']; ?></a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                            <div class="tn-img">
                                <img src="img/ echo $home_rows['picture'];" >
                                    <div class="tn-title">
                                        <a  href="">echo $home_rows['image_title'];</a>
                                    </div>
                                </div>
                            </div> -->
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">
                        <?php
                        $query2 = "select * from news_details where news_details.news_featured=1 order by featured_date DESC";
                        $res2 = mysqli_query($con, $query2);
                        while ($home_rows2 = mysqli_fetch_assoc($res2)) { ?>
                            <div class="col-md-6">

                                <div class="tn-img">

                                    <img src="img/<?php echo $home_rows2['news_picture']; ?>" style=" max-height: 155px; " />
                                    <div class="tn-title">
                                        <a href="single-page.php?nid=<?php echo $home_rows2['news_id']; ?>">"<?php echo $home_rows2['news_headline_ban']; ?>"</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                            <div class="tn-img">
                                <img src="img/news-350x223-2.jpg" />
                                <div class="tn-title">
                                    <a href="">Balance of payment shows record surplus at $4bn</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="img/news-350x223-3.jpg" />
                                <div class="tn-title">
                                    <a href="">WB to give $800m to cut pollution</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="img/news-350x223-4.jpg" />
                                <div class="tn-title">
                                    <a href="">Shakib to miss Bangabandhu T20 final for family reasons</a>
                                </div>
                            </div>
                        </div> -->

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <?php
                $query2 = "select * from categories where featured=1";

                $res2 = mysqli_query($con, $query2);
                // $home_rows9=mysqli_fetch_assoc($res2);
                while ($home_rows9 = mysqli_fetch_assoc($res2)) {
                    $cat_id = $home_rows9['categories_id'];
                    $query3 = "select * from news_details where categories_id=$cat_id and status='Published'";
                    $res3 = mysqli_query($con, $query3);


                ?>


                    <br>

                    <div class="col-md-6">
                        <h2><?php echo $home_rows9['categories_name_ban'] ?></h2>


                        <div class="row cn-slider">

                            <?php

                            $res3 = mysqli_query($con, $query3);
                            while ($home_rows10 = mysqli_fetch_assoc($res3)) { ?>

                                <div class="col-md-6">

                                    <div class="cn-img">
                                        <img src="img/<?php echo $home_rows10['news_picture'] ?>" />
                                        <div class="cn-title">
                                            <a href="single-page.php?nid=<?php echo $home_rows10['news_id']; ?>"><?php echo $home_rows10['news_headline_ban'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>

                        </div>

                    </div>

                <?php

                }
                ?>
            </div>
        </div>
    </div>

    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php $sql5 = "select * from news_details where news_details.news_featured=1 order by featured_date DESC";
                    $res5 = mysqli_query($con, $sql5); ?>

                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">

                            <a class="nav-link active" data-toggle="pill" href="#featured">আলোচিত সংবাদ</a>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link" data-toggle="pill" href="#latest">সর্বশেষ সংবাদ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="pill" href="#m-viewed">সর্বাধিক পঠিত</a>
                        </li>
                    </ul>

                    <?php
                    $sql4 = "select * from news_details where status='Published' order by date DESC limit 4";
                    $res2 = mysqli_query($con, $sql4); ?>


                    <div class="tab-content">
                        <div id="featured" class="container tab-pane active">
                            <?php
                            while ($home_rows12 = mysqli_fetch_assoc($res5)) { ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/<?php echo $home_rows12['news_picture'] ?>" />

                                    </div>

                                    <div class="tn-title">
                                        <a href="single-page.php?nid=<?php echo $home_rows12['news_id']; ?>"><?php echo $home_rows12['news_headline_ban'] ?>"</a>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                            <a class="featured_more btn btn-primary" href="featured_more_list.php" role="button">সব খবর</a>

                        </div>




                        <div id="latest" class="container tab-pane fade">
                            <?php
                            while ($home_rows10 = mysqli_fetch_assoc($res2)) { ?>

                                <div class="tn-news">




                                    <div class="tn-img">
                                        <img src="img/<?php echo $home_rows10['news_picture'] ?>" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="single-page.php?nid=<?php echo $home_rows10['news_id']; ?>"><?php echo $home_rows10['news_headline_ban'] ?></a>
                                    </div>

                                </div>
                            <?php
                            }
                            ?>
                            <a class="featured_more btn btn-primary" href="more_recent_list.php" role="button">সব খবর</a>
                        </div>


                        <?php $sql2 = "SELECT news_details.news_id,  news_details.news_picture, news_details.news_headline_ban FROM news_details where status='Published'
                       ORDER BY count DESC limit 4";
                        $res2 = mysqli_query($con, $sql2);
                        //$row2 = mysqli_fetch_assoc($res2);
                        ?>
                        <div id="m-viewed" class="container tab-pane fade">
                            <?php while ($home_rows = mysqli_fetch_assoc($res2)) { ?>
                                <div class="tn-news">

                                    <div class="tn-img">
                                        <img src="img/<?php echo $home_rows['news_picture']; ?>">
                                    </div>
                                    <div class="tn-title">
                                        <a href="single-page.php?nid=<?php echo $home_rows['news_id']; ?>"><?php echo $home_rows['news_headline_ban']; ?></a>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                            <a class="featured_more btn btn-primary" href="viewed_more_list.php" role="button">সব খবর</a>


                        </div>





                    </div>
                </div>

                <?php $sql3 = "select *from news_details where status='Published' order by date DESC limit 7";
                $res3 = mysqli_query($con, $sql3); ?>

                <div class="col-md-4">
                    <div class="main-news">
                        <div class="container">
                            <div class="mn-list">




                                <h2>আরও পড়ুন </h2>
                                <?php while ($home_rows = mysqli_fetch_assoc($res3)) { ?>
                                    <ul>

                                        <li><a href="single-page.php?nid=<?php echo $home_rows['news_id']; ?>"><?php echo $home_rows['news_headline_ban']; ?></a></li>
                                    </ul>
                                <?php
                                }
                                ?>
                                <br> <br>
                                <a class=" read_more btn btn-primary" href="read_more_list.php" role="button">সব খবর</a>
                                <!-- <li><a href="">2 hurt in Hatirpool Bazar shooting</a></li>
                                    <li><a href="">PM greets people on Victory Day</a></li>
                                    <li><a href="">Noakhali woman molestation: Charges pressed against 14 accused</a></li>
                                    <li><a href="">EU Digital Services Act set to bring in new rules for tech giants</a></li>
                                    <li><a href="">Five-storey building tilts in Savar</a></li>
                                    <li><a href="">Why India's doctors differ on Covid-19 plasma therapy</a></li>
                                    <li><a href="">Nullam congue massa vitae quam</a></li> -->


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-9"> -->
                <div class="row">

                    <?php
                    $sql5 = "select * from news_details where status='Published' order by date DESC limit 9 ";
                    $res5 = mysqli_query($con, $sql5); ?>
                    <?php
                    while ($home_rows5 = mysqli_fetch_assoc($res5)) { ?>
                        <div class="col-md-4">

                            <div class="mn-img">

                                <img src="img/<?php echo $home_rows5['news_picture'] ?> " />
                                <div class="mn-title">
                                    <a href="single-page.php?nid=<?php echo $home_rows5['news_id']; ?>"><?php echo $home_rows5['news_headline_ban'] ?></a>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>



                </div>
                <!-- </div> -->

                <!-- <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        <ul>
                            <li><a href="">Why doctors differ on Covid-19 plasma therapy</a></li>
                            <li><a href="">2 hurt in Hatirpool Bazar shooting</a></li>
                            <li><a href="">PM greets people on Victory Day</a></li>
                            <li><a href="">Noakhali woman molestation: Charges pressed against 14 accused</a></li>
                            <li><a href="">EU Digital Services Act set to bring in new rules for tech giants</a></li>
                            <li><a href="">Five-storey building tilts in Savar</a></li>
                            <li><a href="">Why India's doctors differ on Covid-19 plasma therapy</a></li>
                            <li><a href="">Nullam congue massa vitae quam</a></li>

                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Main News End-->

    <!-- footer -->

    <?php include('include/footer.php'); ?>


    <!-- footer-end -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>