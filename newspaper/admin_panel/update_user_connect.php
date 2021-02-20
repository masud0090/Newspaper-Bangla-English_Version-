
    <?php
    include('../database.php');
    // include("database_connection.php");

    if (isset($_POST['update'])) {
        $uid = $_POST['user_id'];

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $status = $_POST['status'];


        $sql = "Update user SET username='$username',email='$email',password='$password',type='$role',status='$status'  where user_id='$uid'";

        // news_picture= '$picture', news_headline= '$names',news_details= '$news_info',categories_id= '$categories',date= '$date',news_featured= '$yes',featured_date= '$fffdate' WHERE news_id=$nid

        $res = mysqli_query($con, $sql);
        if ($res) {

            echo ("<script language='javascript'>
                    window.alert('Updated  successfully...');
        
                    window.location.href='add_user_display.php';</script>");
            // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
        } else {
            echo ("<script language='javascript'>
            window.alert('not successfully...');

            // window.location.href='add_user_display.php';</script>");

            // echo '<br><br><br><br><br><br><b>Information Successfully
        }
    }



    ?>
