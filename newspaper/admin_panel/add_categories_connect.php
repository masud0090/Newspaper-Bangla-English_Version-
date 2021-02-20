

    <?php

    $categories_name = $_POST['categories_name'];
    $bcategories_name = $_POST['bcategories_name'];



    // Database connection
    include('../database.php');
    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {

        $sql5 = "insert into categories(categories_name,categories_name_ban) values('$categories_name','$bcategories_name')";
        if (mysqli_query($con, $sql5)) {
            echo ("<script language='javascript'>
            window.alert('Submitted successfully...');

            window.location.href='show_categories_dispaly.php';</script>");


            echo "successfull";
        } else {

            echo ("<script language='javascript'>
            window.alert(' Not successfully Submitted ...');
             window.location.href='show_categories_dispaly.php';</script>");
            echo "not successfull";
        }
        // $stmt = $con->prepare("insert into categories(categories_name,categories_name_ban) values(?,?)");
        // $stmt->bind_param("s", $categories_name, $bcategories_name);
        // if ($execval = $stmt->execute()) {
        //     echo $execval;
        //     $stmt->close();
        //     $con->close();
        //     //echo "Submitted successfully...";
        //     echo ("<script language='javascript'>
		// 	window.alert('Submitted successfully...');
			
		// 	window.location.href='show_categories_dispaly.php';</script>");
        // } else {
        //     echo $execval;
        //     // echo ("<script language='javascript'>
		// 	// window.alert(' Not successfully Submitted ...');
		// 	// window.location.href='show_categories_dispaly.php';</script>");
        // }



        // $stmt->close();
        // $conn->close();


    }
    ?>