<?php

include('../database.php');
// if (isset($_GET['id'])) {
$news_id = $_GET['tid'];

$sql2="update news_details set status='pending' where news_details.news_id=$news_id";


$res = mysqli_query($con, $sql2);
        if ($res) {

                echo ("<script language='javascript'>
                    window.alert('Updated  successfully...');
        
                    window.location.href='pending_news_display.php';</script>");
                // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
            }
           else{
            echo ("<script language='javascript'>
            window.alert('not successfully...');

            // window.location.href='drafts_display.php';</script>");
            
        // echo '<br><br><br><br><br><br><b>Information Successfully
           }
