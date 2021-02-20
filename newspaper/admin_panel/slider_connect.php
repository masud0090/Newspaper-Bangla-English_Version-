<?php

include('../database.php');

 
if (isset($_POST['submit'])) {
    // $id=$_POST['id'];
    
    // $url = $_POST['social_url'];
    // $specialist = $_POST['specialist']; 
    $news_id = $_POST['news_id'];
    // echo $contact_logo_id;
    
     if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {

          $sql3 = "UPDATE `news_details` SET slider= 1 WHERE news_details.news_id=$news_id";
          $results2 = mysqli_query($con, $sql3);
         echo ("<script language='javascript'>
             window.alert('Submitted successfully...');
             
             window.location.href='slider_display.php';</script>");
 
 
        }

        
          

        //   $results = mysqli_query($con, $sql);
        // if($results){
 
        //  $sql3="UPDATE `categories` SET featured = 0 WHERE categories.categories_id=$cat_id";
 
         // $sql3="UPDATE `categories` SET featured = 0 WHERE categories_id NOT IN($categories_id1,$categories_id2,$categories_id3,$categories_id4)";
         
 
         
         
        
     }
