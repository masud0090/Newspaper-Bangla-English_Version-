<?php

include('../database.php');

 
if (isset($_POST['submit'])) {
    // $id=$_POST['id'];
    
    $url = $_POST['social_url'];
    // $specialist = $_POST['specialist']; 
    $contact_logo_id = $_POST['contact_logo_id'];
    // echo $contact_logo_id;
    
     if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {

          $sql5 = "update  contact_logo set url='$url' where contact_logo_id=$contact_logo_id";
        //   $sqlupdate = "Update categories SET  categories_name='$categories_name' WHERE categories_id='$uid'";
       
        if (mysqli_query($con, $sql5)) {
            echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href=('add_social_link.php');</script>");


            


            // echo "successfull";
        } else {
			
            echo "not successfull";
        }
    } 
}
