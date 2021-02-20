<?php

include('../database.php');


if (isset($_POST['submit'])) {
    // $id=$_POST['id'];
    $picture = $_FILES['picture']['name'];
    $temp = $_FILES['picture']['tmp_name'];
    move_uploaded_file($temp, "../img/$picture");
    $name = $_POST['name'];
    $bname = $_POST['bname'];
    // $specialist = $_POST['specialist']; 
    $news_info = $_POST['news_info'];
    $bnews_info = $_POST['bnews'];
    $categories = $_POST['categories_id'];
    // $subname = $_POST['subname'];
    $input_date = $_POST['date'];
    $date = date("Y-m-d", strtotime($input_date));
    $yes = $_POST['yes_no'];
    $ffdate = $_POST['fdate'];
    $fffdate = date("Y-m-d", strtotime($ffdate));
    $subname = $_POST['sub'];
    // $bsubname = $_POST['bsub'];



    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $value = "published";
        $sql5 = "insert into news_details(news_picture,news_headline,news_headline_ban,news_details,news_details_ban,categories_id,date,news_featured,featured_date,sub_categories_id,status) values('$picture','$name','$bname','$news_info','$bnews_info','$categories','$date','$yes','$fffdate','$subname','$value')";
       

        if (mysqli_query($con, $sql5)) {
            echo ("<script language='javascript'>
            window.alert('Submitted successfully...');

            window.location.href='my_news_display.php';</script>");


            echo "successfull";
        } else {

            // echo ("<script language='javascript'>
            // window.alert(' Not successfully Submitted ...');
            //  window.location.href='my_news_display.php';</script>");
            echo "not successfull";
        }
    }
}
