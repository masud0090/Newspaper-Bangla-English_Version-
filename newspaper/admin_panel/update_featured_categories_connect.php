
	<?php




	// Database connection
	include('../database.php');
	if (isset($_POST['submit'])) {

		$cat_id = $_POST['categories_id'];
		$cat_id2 = $_POST['categories_id2'];


		// $sql = "UPDATE categories SET featured= 1 WHERE categories_id= '$categories_id'";

		// $results = mysqli_query($con, $sql);
		// echo $sql;


		$sql = "UPDATE `categories` SET featured = 1 WHERE categories.categories_id=$cat_id2";
		$results = mysqli_query($con, $sql);
		if ($results) {

			$sql3 = "UPDATE `categories` SET featured = 0 WHERE categories.categories_id=$cat_id";

			// $sql3="UPDATE `categories` SET featured = 0 WHERE categories_id NOT IN($categories_id1,$categories_id2,$categories_id3,$categories_id4)";




			$results2 = mysqli_query($con, $sql3);
			echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='featured_categories_display.php';</script>");
		}
	}
	?>

           
