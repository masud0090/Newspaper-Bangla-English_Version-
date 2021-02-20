<?php

include('../database.php');
// if (isset($_GET['id'])) {
$user_id = $_GET['tid'];

$sql2 = "update user set status='Banned' where user.user_id=$user_id";


$res = mysqli_query($con, $sql2);
if ($res) {

    echo ("<script language='javascript'>
                    window.alert('Banned this User successfully...');
        
                    window.location.href='add_user_display.php';</script>");
    // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
} else {
    echo ("<script language='javascript'>
            window.alert('not successfully...');

            // window.location.href='add_user_display.php';</script>");

    // echo '<br><br><br><br><br><br><b>Information Successfully
}
