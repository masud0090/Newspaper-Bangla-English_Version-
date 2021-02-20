<?php

include('../database.php');


if (isset($_POST['submit'])) {
    // $id=$_POST['id'];

    $description = $_POST['description'];
    // $specialist = $_POST['specialist']; 
    $hf_id = $_POST['hf_id'];
    // echo $contact_logo_id;

    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {

        $sql5 = "Update header_footer_policy SET  hf_description='$description' WHERE hf_id='$hf_id'";
        //   $sqlupdate = "Update categories SET  categories_name='$categories_name' WHERE categories_id='$uid'";

        if (mysqli_query($con, $sql5)) {
            echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href=('header_footer_form.php?hf=$hf_id');</script>");


            // echo "successfull";
        } else {

            echo "not successfull";
        }
    }
}
