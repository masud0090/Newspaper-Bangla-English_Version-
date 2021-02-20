<?php
include('../database.php');
$nid = $_GET['tid'];
$sql = "DELETE FROM news_details WHERE news_id='$nid'";
mysqli_query($con, $sql);
?>
<html>

<head>

</head>

<body>

    <?php
    if (mysqli_query($con, $sql)) {

        echo ("<script language='javascript'>
    window.alert('Deleted  successfully...');

    window.location.href='pending_news_display.php';</script>");
    }
    // // echo "successfull";
    // } else {
    // echo ("<script language='javascript'>
    // window.alert(' Not Deleted successfully...');
    // window.location.href='add_categories_dispaly.php';</script>");
    // // echo "not successfull";
    // }


    ?>



    <!-- <p>Information Deleted Successfully</p> -->
</body>

</html>