<?php

include('../database.php');
// if (isset($_GET['id'])) {
$id = $_GET['tid'];
$sql = "select * FROM categories WHERE categories.categories_id='$id'";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
session_start();

//check if session exists?
if (isset($_SESSION['login_user'])) {

    //}
?>
    <html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    </head>

    <body>
        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h1>Add Newspaper's Information</h1>
                    </div>
                    <div class="panel-body">
                        <form action="update_categories_connect.php" method="post" enctype="multipart/form-data">



                            <div class="form-group">
                                <label for="specialist">Edit Category</label>
                                <input type="hidden" name="categories_id" value="<?php echo $id; ?>" required>
                                <input type="text" class="form-control" id="categories_name" name="categories_name" value="<?php echo $row["categories_name"] ?>" required /><br>
                                <label for="specialist">Edit Category (Bangla)</label>
                                <input type="text" class="form-control" id="categories_name" name="bcategories_name" value="<?php echo $row["categories_name_ban"] ?>" required />
                            </div>



                            <input type="submit" name="update" value="Update">
                        </form>


                    </div>

                </div>
            </div>







        </div>
    </body>

    </html>
<?php
} else {
    header("location: admin_login.php");
}
?>