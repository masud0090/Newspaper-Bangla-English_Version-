<>

    <?php
    // Database connection
    include('../database.php');
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];


    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $stmt = $con->prepare("insert into user(type,username,email,password, status) values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $role, $username, $email, $password, $status);
        if ($execval = $stmt->execute()) {
            echo $execval;
            $stmt->close();
            $con->close();
            //echo "Submitted successfully...";
            echo ("<script language='javascript'>
			window.alert('Submitted successfully...');
			
			window.location.href='add_user_display.php';</script>");
        } else {
            echo $execval;
            echo ("<script language='javascript'>
            window.alert(' Not successfully Submitted ...');
             window.location.href='add_user_display.php';</script>");
        }



        // $stmt->close();
        // $con->close();


    }
    ?>