<?php
include('database.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <?php include('include/head.php'); ?>
    <title>view more</title>
</head>

<body>
    <!-- Top Bar Start -->

    <?php include('include/nav.php'); ?>

    <br>

    <?php


    $search_content = $_POST['query'];

    $sql = "SELECT t.news_id, t.news_picture, t.news_headline_ban, t.news_details_ban, t.categories_id, c.categories_id, c.categories_name_ban,sc.sub_categories_id, sc.sub_categories_name_ban FROM news_details t , categories c, sub_categories sc WHERE t.categories_id = c.categories_id AND t.sub_categories_id=sc.sub_categories_id AND ( t.news_headline_ban like '%" . $search_content . "%' OR t.news_details_ban like '%" . $search_content . "%' OR sc.sub_categories_name_ban like '%" . $search_content . "%' OR c.categories_name_ban like '%" . $search_content . "%')";
    $res_data = mysqli_query($con, $sql);
    $res_count = mysqli_num_rows($res_data);
    if ($res_count > 0) {

    ?><?php

        while ($row = mysqli_fetch_array($res_data)) {

        ?>
    <!-- here goes the data -->


    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                </div>


                <div class="col-md-8">


                    <div class="tab-content">


                        <div id="m-viewed" class="container tab-pane active">
                            <?php //while ($home_rows = mysqli_fetch_assoc($res2)) { 
                            ?>
                            <div class="tn-news">

                                <div class="tn-img">
                                    <img src="img/<?php echo $row['news_picture']; ?>">
                                </div>
                                <div class="tn-title">
                                    <a href="single-page.php?nid=<?php echo $row['news_id']; ?>"><?php echo $row['news_headline_ban']; ?></a>
                                </div>
                            </div>
                            <?php
                            //  }
                            ?>

                        </div>

                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>



    <!-- //here goes the data   -->
<?php


        }
    } else {
?>
<div class="text-center" style="font-size: 35px;"> <?php echo 'কোনও সংবাদ পাওয়া যায় নি'; ?></div>
<?php
    }
    // mysqli_close($con);
?>
<!-- <div class="row">
        <div class="col-md-5">
        </div>

        <div class="col-md-2">

        </div>

        <div class="col-md-5">
        </div>



    </div> -->




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