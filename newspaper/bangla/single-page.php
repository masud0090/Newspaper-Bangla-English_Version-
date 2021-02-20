<?php
include('database.php');
// $con = mysqli_connect('localhost', 'root', '', 'newspaper');
// if (isset($_GET['id'])) {
$news_id = $_GET['nid'];
$sql1 = "select * FROM news_details WHERE news_details.news_id='$news_id '";

$res1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($res1);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <?php include('include/head.php'); ?>
</head>

<body>
    <!-- Top Bar Start -->

    <?php include('include/nav.php'); ?>

    <!-- Nav Bar End -->
    <?php
    $sql2 = "select * FROM news_details WHERE news_details.news_id='$news_id '";

    $res2 = mysqli_query($con, $sql2);
    $rows4 = mysqli_fetch_assoc($res2);

    $_SESSION['view'] = $rows4['count'];

    if (isset($_SESSION['view'])) {

        $_SESSION['view'] = $_SESSION['view'] + 1;
    } else {
        $_SESSION['view'] = 1;
    }
    $p = $_SESSION['view'];

    $sql = "UPDATE news_details
    SET count =$p
    WHERE news_details.news_id='$news_id '";
    $results4 = mysqli_query($con, $sql);
    ?>

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <?php


                $query = "select * from categories,news_details where news_details.news_id=$news_id and categories.categories_id=news_details.categories_id";

                $results1 = mysqli_query($con, $query);
                while ($home = mysqli_fetch_assoc($results1)) {
                ?>
                    <li class="breadcrumb-item"><a href="categori.php?cat=<?php echo $home['categories_id']; ?>"><?php echo $home['categories_name_ban']; ?></a></li>
                <?php
                }
                ?>
                <!-- <li class="breadcrumb-item active">News details</li> -->
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                            <?php $img = $row1['news_picture']; ?>

                            <img src="img/<?php echo $img; ?>">
                        </div>
                        <div class="sn-content">

                            <h3 class="sn-title"><?php echo $row1['news_headline_ban']; ?></h3>
                            <?php echo $row1['news_details_ban']; ?>
                            <!-- <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer molestie, lorem eu eleifend bibendum, augue purus mollis sapien, non rhoncus eros leo in nunc. Donec a nulla vel turpis consectetur tempor ac vel justo. In hac habitasse platea dictumst. Cras nec sollicitudin eros. Nunc eu enim non turpis sagittis rhoncus consectetur id augue. Mauris dignissim neque felis. Phasellus mollis mi a pharetra cursus. Maecenas vulputate augue placerat lacus mattis, nec ornare risus sollicitudin.
                                </p>
                                <p>
                                    Mauris eu pulvinar tellus, eu luctus nisl. Pellentesque suscipit mi eu varius pulvinar. Aenean vulputate, massa eget elementum finibus, ipsum arcu commodo est, ut mattis eros orci ac risus. Suspendisse ornare, massa in feugiat facilisis, eros nisl auctor lacus, laoreet tempus elit dolor eu lorem. Nunc a arcu suscipit, suscipit quam quis, semper augue.
                                </p>
                                <p>
                                    Quisque arcu nulla, convallis nec orci vel, suscipit elementum odio. Curabitur volutpat velit non diam tincidunt sodales. Nullam sapien libero, bibendum nec viverra in, iaculis ut eros.
                                </p>
                                <h3>Lorem ipsum dolor sit amet</h3>
                                <p>
                                    Vestibulum sit amet ullamcorper sem. Integer hendrerit elit eget purus sodales maximus. Quisque ac nulla arcu. Morbi venenatis arcu ac arcu cursus pharetra. Morbi sit amet viverra augue, ac ultricies libero. Praesent elementum lectus mi, eu elementum urna venenatis sed. Donec auctor purus ut mattis feugiat. Integer mi erat, consectetur sed tincidunt vitae, sagittis elementum libero. Vivamus a mauris consequat, hendrerit lectus in, fermentum libero. Integer mattis bibendum neque et porttitor.
                                </p>
                                <p>
                                    Mauris quis arcu finibus, posuere dolor eu, viverra felis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In porta, ex vitae accumsan facilisis, nisi tellus dictum metus, quis fringilla dui tellus in tellus. Praesent pharetra orci at vehicula posuere. Sed molestie fringilla lorem, vel imperdiet tortor blandit at. Quisque non ultrices lorem, eget rhoncus orci. Fusce porttitor placerat diam et mattis. Nam laoreet, ex eu posuere sollicitudin, sem tortor pellentesque ipsum, quis mattis purus lectus ut lacus. Integer eu risus ac est interdum scelerisque.
                                </p>
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <p>
                                    Praesent ultricies, mauris eget vestibulum viverra, neque lorem malesuada mauris, eget rhoncus lectus enim a lorem. Vivamus at vehicula risus, eget facilisis massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et posuere sapien. Fusce bibendum lorem sem, quis tincidunt felis mattis nec.
                                </p>
                                <p>
                                    Proin vel nulla purus. Nunc nec eros in nisi efficitur rutrum quis sed eros. Mauris felis dolor, rhoncus eget gravida vitae, pretium vel arcu. Cras blandit tellus eget tellus dictum venenatis. Sed ultricies bibendum dictum. Etiam facilisis erat id turpis tincidunt malesuada. Duis bibendum sapien eu condimentum sagittis. Proin nunc lorem, ullamcorper vel tortor sodales, imperdiet lacinia dui. Sed congue, felis id rhoncus varius, urna lacus imperdiet nunc, ut porttitor mauris mi quis mi. Integer rutrum est finibus metus eleifend scelerisque. Morbi auctor dignissim purus in interdum. Vestibulum eu dictum enim. Suspendisse et sem vitae velit feugiat facilisis.
                                </p>
                                <p>
                                    Nam sodales scelerisque nunc sed convallis. Vestibulum facilisis porta erat, sit amet pharetra tortor blandit id. Nunc velit tellus, consectetur sed convallis in, tincidunt finibus nulla. Integer vel ex in mauris tincidunt tincidunt nec sed elit. Etiam pretium lectus lectus, sed aliquet erat tristique euismod. Praesent faucibus nisl augue, ac tempus libero pellentesque malesuada. Vivamus iaculis imperdiet laoreet. Aliquam vel felis felis. Proin sed sapien erat. Etiam a quam et metus tempor rutrum. Curabitur in faucibus justo. Etiam imperdiet iaculis urna.
                                </p> -->
                        </div>
                    </div>
                    <div class="sn-related">
                        <h3>এই বিভাগে সর্বাধিক পঠিত খবর</h3>
                        <div class="row sn-slider">
                            <?php
                            $m_cat_sql = "SELECT categories_id from news_details where news_id=$news_id";
                            $m_cat_res = mysqli_query($con, $m_cat_sql);
                            $m_cat_row = mysqli_fetch_assoc($m_cat_res);
                            $m_cat_id = $m_cat_row['categories_id'];
                            $m_cat_sql1 = "SELECT * from news_details where status='Published' and categories_id=$m_cat_id ORDER BY count DESC";
                            $m_cat_res1 = mysqli_query($con, $m_cat_sql1);
                            while ($m_cat1_rows = mysqli_fetch_assoc($m_cat_res1)) {
                            ?>
                                <div class="col-md-4">
                                    <div class="sn-img">
                                        <img src="img/<?php echo $m_cat1_rows['news_picture']; ?>">
                                        <div class="sn-title">
                                            <a href="single-page.php?nid=<?php echo $m_cat1_rows['news_id']; ?>"><?php echo $m_cat1_rows['news_headline_ban']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <!-- <div class="col-md-4">
                                <div class="sn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="sn-title">
                                        <a href="">Interdum et fames ac ante</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="sn-title">
                                        <a href="">Interdum et fames ac ante</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h3 class="sw-title">এই বিভাগের আরো খবর</h3>
                            <div class="news-list">
                                <?php
                                $cat_sql = "SELECT categories_id from news_details where news_id=$news_id";
                                $cat_res = mysqli_query($con, $cat_sql);
                                $cat_row = mysqli_fetch_assoc($cat_res);
                                $cat_id = $cat_row['categories_id'];
                                $cat_sql1 = "SELECT * from news_details where status='Published' and categories_id=$cat_id";
                                $cat_res1 = mysqli_query($con, $cat_sql1);
                                while ($cat1_rows = mysqli_fetch_assoc($cat_res1)) {
                                ?>
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/<?php echo $cat1_rows['news_picture']; ?>">
                                        </div>
                                        <div class="nl-title">
                                            <a href="single-page.php?nid=<?php echo $cat1_rows['news_id']; ?>"><?php echo $cat1_rows['news_headline_ban']; ?></a>
                                        </div>
                                    </div>
                                    <!-- <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-2.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div> -->
                                    <!-- <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-3.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div> -->
                                    <!-- <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-4.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div> -->
                                    <!-- <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="img/news-350x223-5.jpg" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div> -->
                                <?php
                                }
                                ?>

                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">আলোচিত</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">জনপ্রিয়</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">সর্বশেষ</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">

                                        <?php $sql4 = "SELECT * FROM news_details where news_details.news_featured=1 and status='Published' order by featured_date DESC LIMIT 5";
                                        $res2 = mysqli_query($con, $sql4);
                                        while ($row9 = mysqli_fetch_array($res2)) {
                                        ?>


                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/<?php echo $row9['news_picture'] ?>" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="single-page.php?nid=<?php echo $row9['news_id']; ?>"><?php echo $row9['news_headline_ban']; ?></a>
                                                </div>
                                            </div>
                                        <?php

                                        }

                                        ?>

                                        <a class=" read_more btn btn-primary" href="featured_more_list.php" role="button">সব খবর</a>

                                    </div>


                                    <div id="popular" class="container tab-pane fade">
                                        <?php $sql5 = "select *from news_details where status='Published' order by date DESC limit 5";
                                        $res5 = mysqli_query($con, $sql5);
                                        while ($row5 = mysqli_fetch_array($res5)) {
                                        ?>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/<?php echo $row5['news_picture'] ?>" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="single-page.php?nid=<?php echo $row5['news_id']; ?>"><?php echo $row5['news_headline_ban']; ?></a>
                                                </div>
                                            </div>
                                        <?php

                                        }

                                        ?>

                                        <a class=" read_more btn btn-primary" href="more_recent_list.php" role="button">সব খবর</a>

                                    </div>
                                    <div id="latest" class="container tab-pane fade">

                                        <?php $sql2 = "SELECT news_details.news_id, news_details.news_picture, news_details.news_headline_ban FROM news_details where status='Published'
                                        ORDER BY count DESC limit 5";
                                        $res2 = mysqli_query($con, $sql2);
                                        while ($row5 = mysqli_fetch_array($res2)) {
                                        ?>
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="img/<?php echo $row5['news_picture'] ?>" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="single-page.php?nid=<?php echo $row5['news_id']; ?>"><?php echo $row5['news_headline_ban']; ?></a>
                                                </div>
                                            </div>

                                        <?php

                                        }

                                        ?>

                                        <a class=" read_more btn btn-primary" href="viewed_more_list.php" role="button">সব খবর</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div> -->
                        <hr>

                        <div class="sidebar-widget">

                            <?php
                            $query = "select cat.categories_id cat_id, cat.categories_name_ban cat_name, COUNT(n.news_id) count_name FROM news_details n, categories cat WHERE cat.categories_id=n.categories_id and n.status='Published' group BY cat.categories_name_ban";
                            $res = mysqli_query($con, $query);
                            ?>

                            <h3 class="sw-title">সংবাদ বিভাগ</h3>
                            <div class="category">
                                <ul>
                                    <?php while ($rows = mysqli_fetch_assoc($res)) { ?>
                                        <li><a href="categori.php?cat=<?php echo $rows['cat_id']; ?>"><?php echo $rows['cat_name']; ?></a><span><?php echo "(" . $rows['count_name'] . ")"; ?></span></li>
                                        <!-- <li><a href="">International</a><span>(87)</span></li>
                                        <li><a href="">Economics</a><span>(76)</span></li>
                                        <li><a href="">Politics</a><span>(65)</span></li>
                                        <li><a href="">Lifestyle</a><span>(54)</span></li>
                                        <li><a href="">Technology</a><span>(43)</span></li>
                                        <li><a href="">Trades</a><span>(32)</span></li> -->

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>

                        <!-- <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">Tags Cloud</h2>
                            <div class="tags">
                                <a href="">National</a>
                                <a href="">International</a>
                                <a href="">Economics</a>
                                <a href="">Politics</a>
                                <a href="">Lifestyle</a>
                                <a href="">Technology</a>
                                <a href="">Trades</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->

    <!-- Footer Start -->

    <?php include('include/footer.php'); ?>

    <!-- Footer end -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>