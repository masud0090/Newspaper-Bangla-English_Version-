<?php
include('database.php');
$hf_id = $_GET['hf'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>policy</title>
    <?php include('include/head.php'); ?>
</head>

<body>
    <?php include('include/nav.php'); ?>
    <div class="container">
        <br>

        <?php
        $query = "SELECT * from header_footer_policy where header_footer_policy.hf_id=$hf_id ";
        $res = mysqli_query($con, $query);
        $hf_rows = mysqli_fetch_assoc($res);

        ?>

        <h1 class="text-center"> <?php echo $hf_rows['hf_title']; ?></h1>
        <hr>

        <p><?php echo $hf_rows['hf_description']; ?></p>

    </div>
    <br>

    <!-- footer -->

    <?php include('include/footer.php'); ?>


    <!-- footer-end -->
</body>

</html>