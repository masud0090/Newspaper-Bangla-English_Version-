
	<?php


	// Database connection
	include('../database.php');
	//if (isset(['submit'])) {

	$did = $_GET['tid'];
	// $cat_id2=$_POST['categories_id2'];


	// $sql = "UPDATE categories SET featured= 1 WHERE categories_id= '$categories_id'";

	// $results = mysqli_query($con, $sql);
	// echo $sql;


	$sql5 = "UPDATE `news_details` SET slider = 0 WHERE news_id=$did";

	$results = mysqli_query($con, $sql5);
	if ($results) {

		echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			window.location.href='slider_display.php';</script>");
	}
	//}

	?>

           
