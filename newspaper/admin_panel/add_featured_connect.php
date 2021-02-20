<html>

<body>

	<?php


	$categories_id1 = $_POST['categories_id'];
	$categories_id2 = $_POST['categories_id2'];
	$categories_id3 = $_POST['categories_id3'];
	$categories_id4 = $_POST['categories_id4'];





	// Database connection
	include('../database.php');
	if (isset($_POST['submit'])) {


		// $sql = "UPDATE categories SET featured= 1 WHERE categories_id= '$categories_id'";

		// $results = mysqli_query($con, $sql);
		// echo $sql;


		$sql = "INSERT INTO categories (categories_id,featured) VALUES ($categories_id1,1),($categories_id2,1),($categories_id3,1),($categories_id4,1)
		 ON DUPLICATE KEY UPDATE featured=VALUES(featured)";
		$results = mysqli_query($con, $sql);
		if ($results) {

			$sql3 = "UPDATE `categories` SET featured = 0 WHERE categories_id NOT IN($categories_id1,$categories_id2,$categories_id3,$categories_id4)";

			$results2 = mysqli_query($con, $sql3);
			$results2 = mysqli_query($con, $sql3);
			echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='featured_categories_display.php';</script>");
		}
	}
	?>


	}






	// // header('location: ../mainindex.php');
	// }







	}


	?>









	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>