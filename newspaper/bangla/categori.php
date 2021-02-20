<?php

include('database.php');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$cat_id = $_GET['cat'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <?php include('include/head.php'); ?>
    <title>view more</title>

</head>

<body>
    <!-- Top Bar Start -->

    <?php include('include/nav.php'); ?>

    <br>

    <?php


    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query($con, "SELECT COUNT(*) As total_records FROM `news_details` where categories_id=$cat_id and status='Published'");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


    $result2 = mysqli_query($con, "SELECT * from news_details where categories_id=$cat_id and status='Published' LIMIT $offset, $total_records_per_page"); ?>
    <!-- $res_data = mysqli_query($con, $sql); -->
    <?php
    while ($row = mysqli_fetch_array($result2)) {
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
    mysqli_close($con);
    ?>

    <div class="container main">

        <ul class="pagination">
            <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
            if ($total_records != 0) {
            ?>

                <li <?php if ($page_no <= 1) {
                        echo "class='disabled not-allowed'";
                    } ?>>
                    <a <?php if ($page_no > 1) {
                            echo "href='?cat=$cat_id&page_no=$previous_page'";
                        } ?>>Previous</a>
                </li>

            <?php
            } else {
                echo '<div id="success-alert" class="alert alert-primary alert-dismissible fade show"><strong>There are No News available..</strong></div>';
            }
            if ($total_no_of_pages <= 10) {
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                        echo "<li class='active'><a>$counter</a></li>";
                    } else {
                        echo "<li><a href='?cat=$cat_id&page_no=$counter'>$counter</a></li>";
                    }
                }
            } elseif ($total_no_of_pages > 10) {

                if ($page_no <= 4) {
                    for ($counter = 1; $counter < 8; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?cat=$cat_id&page_no=$counter'>$counter</a></li>";
                        }
                    }
                    echo "<li><a>...</a></li>";
                    echo "<li><a href='?cat=$cat_id&page_no=$second_last'>$second_last</a></li>";
                    echo "<li><a href='?cat=$cat_id&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                    echo "<li><a href='?cat=$cat_id&page_no=1'>1</a></li>";
                    echo "<li><a href='?cat=$cat_id&page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?cat=$cat_id&page_no=$counter'>$counter</a></li>";
                        }
                    }
                    echo "<li><a>...</a></li>";
                    echo "<li><a href='?cat=$cat_id&page_no=$second_last'>$second_last</a></li>";
                    echo "<li><a href='?cat=$cat_id&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                } else {
                    echo "<li><a href='?cat=$cat_id&page_no=1'>1</a></li>";
                    echo "<li><a href='?cat=$cat_id&page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";

                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?cat=$cat_id&page_no=$counter'>$counter</a></li>";
                        }
                    }
                }
            }
            if ($total_records != 0) {
            ?>

                <li <?php if ($page_no >= $total_no_of_pages) {
                        echo "class='disabled not-allowed'";
                    } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                            echo "href='?cat=$cat_id&page_no=$next_page'";
                        } ?>>Next</a>
                </li>
            <?php
            }


            if ($page_no < $total_no_of_pages) {
                echo "<li><a href='?cat=$cat_id&page_no=$total_no_of_pages'>Last</a></li>";
            } ?>
        </ul>
    </div>




    <!-- Footer Start -->
    <!-- Footer Start -->
    <?php
    $con = mysqli_connect("localhost", "root", "", "newspaper");
    ?>
    <?php include('include/footer.php');  ?>
    <!-- Footer End -->

    <!-- Footer Menu Start -->





    <!-- Footer end -->

    <!-- JavaScript Libraries -->
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->

</body>

</html>