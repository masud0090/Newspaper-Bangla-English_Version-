<?php

include('../database.php');
// if (isset($_GET['id'])) {
$news_id = $_GET['tid'];
$sql = "select news_details.news_picture,news_details.news_headline,news_details.news_headline_ban, news_details.news_details,news_details.news_details_ban,news_details.date,news_details.sub_categories_id,news_details.categories_id,categories.categories_name FROM news_details,categories WHERE news_details.news_id=$news_id and news_details.categories_id=categories.categories_id";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
$sub_cat_id = $row['sub_categories_id'];

//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'categories_id=' + categoryID,
                        success: function(html) {
                            $('#sub_category').html(html);

                        }
                    });
                } else {
                    $('#sub_category').html('<option value="0">Select Category first</option>');

                }
            });


        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php
        include 'top_menu.php';
        ?>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            include 'sidenav.php';
            ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                <h1>Edit Newspaper Information</h1>
                            </div>
                            <div class="panel-body">
                                <form action="update_my_news_connect.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">

                                        <?php $img = $row['news_picture']; ?>

                                        <img src="../img/<?php echo $img; ?>" width="50px" height="50px"> <br>

                                        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                                        <label for="picture">Edit picture</label>
                                        <input type="file" class="form-control" id="picture" name="picture" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Edit Headline</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["news_headline"] ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="bname">Edit Headline (Bangla)</label>
                                        <input type="text" class="form-control" id="name" name="bname" value="<?php echo $row["news_headline_ban"] ?>" required />
                                    </div>


                                    <div class="form-group">
                                    <label for="name1">Add Newsdetails</label>
                                    <textarea name="news_info" id="editor">
                                    <?php echo $row["news_details"] ?>
                                        </textarea>
                                    <br> 
                                    
                                    </div>

                                    <div class="form-group">
                                    <label for="name2">Add Newsdetails (Bangla)</label>
                                    <textarea name="bnews" id="editor2">
                                    <?php echo $row["news_details_ban"] ?>
                                        </textarea>
                                    <br> 
                                    
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="name">ENTER CATEGORIES</label>
                                        <?php
                                        $query3 = "select * from categories where status=1 ";
                                        $res3 = mysqli_query($con, $query3);
                                        ?>

                                        <!-- category dropdown -->
                                        <select id="category" class="form-control" name="categories_id" required>
                                            <?php
                                            // $option = mysqli_fetch_array($res3);
                                            // $cat_id = $option['categories_id'];
                                            ?>
                                            <option value="<?php echo $row['categories_id']; ?>"> <?php echo $row['categories_name']; ?></option>
                                            <?php
                                            if ($res3->num_rows > 0) {
                                                while ($row3 = $res3->fetch_assoc()) {
                                                    echo '<option value="' . $row3['categories_id'] . '">' . $row3['categories_name'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">Category not available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <select id="sub_category" name="sub" class="form-control" height="15px">
                                            <label for="name">ENTER SUB Category</label>
                                            <?php
                                            // $query4 = "select * from sub_categories where sub_categories.categories_id=$cat_id ";
                                            // $res4 = mysqli_query($con, $query4);
                                            // $rows4 = mysqli_fetch_array($res4);
                                            ?>
                                            <!-- State dropdown -->
                                            <?php
                                            if ($sub_cat_id != 0) {
                                                $sql33 = "select sub_categories_name from sub_categories where sub_categories_id=$sub_cat_id";
                                                $res33 = mysqli_query($con, $sql33);
                                                $row33 = mysqli_fetch_assoc($res33);
                                            ?>

                                                <option value=""> <?php echo $row33['sub_categories_name']; ?></option>
                                            <?php } else { ?>
                                                <option value="0"> <?php echo 'no sub categories';  ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>







                                    <div class="form-group">
                                        <label for="date">NewsDate</label>
                                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
                                    </div>


                                    <div class="form-group">

                                        <div id="wrapper">
                                            <label for="yes_no_radio">Do you want to add featured?</label>
                                            <p>
                                                <input type="radio" name="yes_no" value="1">Yes</input>
                                            </p>
                                            <p>
                                                <input type="radio" name="yes_no" value="0" checked>No</input>
                                            </p>



                                        </div><br>

                                        <div class="form-group">
                                            <label for="date">FeaturedDate</label>
                                            <input type="date" class="form-control" id="fdate" name="date1" value="<?php echo date('Y-m-d'); ?>" />
                                        </div>



                                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                                </form>


                            </div>

                        </div>
                    </div>







                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <?php
                    include 'footer.php';
                    ?>
                </div>
            </footer>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
     <script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>