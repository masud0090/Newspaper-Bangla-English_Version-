<?php
include('../database.php');
$did = $_GET['tid'];
$sql = "DELETE FROM categories WHERE categories_id='$did'";
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
    
                window.location.href='show_categories_dispaly.php';</script>");


        // echo "successfull";
    } else {
        echo ("<script language='javascript'>
                window.alert(' Not Deleted successfully...');
                window.location.href='show_categories_dispaly.php';</script>");
        // echo "not successfull";
    }





    ?>




    <!-- echo ("<script language='javascript'>
			window.alert('Dlete Categories successfully...');
			window.location.href='add_categories_dispaly.php';</script>");
       <p>Information Deleted Successfully</p> -->
</body>

</html>