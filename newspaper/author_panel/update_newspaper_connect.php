
    <?php
    include('../database.php');
    // include("database_connection.php");

    if (isset($_POST['update'])) {
        $nid = $_POST['news_id'];
        //$pic = $_POST['picture'];
        $picture = $_FILES['picture']['name'];
        $temp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($temp, "../img/$picture");
        $names = $_POST['name'];
        $bname = $_POST['bname'];
        // $specialists = $_POST['specialist'];
        $news_info = $_POST['news_info'];
        $bnews_info = $_POST['bnews'];
        $categories = $_POST['categories_id'];
        $input_date = $_POST['date'];
        $date = date("Y-m-d", strtotime($input_date));
        $subname = $_POST['sub'];

        if ($picture) {


            $sql = "Update news_details SET news_picture='$picture',news_headline='$names',news_headline_ban='$bname',news_details='$news_info',news_details_ban='$bnews_info',categories_id='$categories',date='$date',sub_categories_id='$subname'  where news_id='$nid'";


            // news_picture= '$picture', news_headline= '$names',news_details= '$news_info',categories_id= '$categories',date= '$date',news_featured= '$yes',featured_date= '$fffdate' WHERE news_id=$nid

            $res = mysqli_query($con, $sql);
            if ($res) {

                echo ("<script language='javascript'>
                    window.alert('Updated  successfully...');
        
                    window.location.href='add_newspaper_display.php';</script>");
                // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
            } else {
                // echo ("<script language='javascript'>
                // window.alert('not successfully...');

                // // window.location.href='add_newspaper_display.php';</script>");

                // echo '<br><br><br><br><br><br><b>Information Successfully
            }
        } else {

            $sql = "Update news_details SET news_headline='$names',news_headline_ban='$bname',news_details='$news_info',news_details_ban='$bnews_info',categories_id='$categories',date='$date',sub_categories_id='$subname'  where news_id='$nid'";


            // news_picture= '$picture', news_headline= '$names',news_details= '$news_info',categories_id= '$categories',date= '$date',news_featured= '$yes',featured_date= '$fffdate' WHERE news_id=$nid

            $res = mysqli_query($con, $sql);
            if ($res) {

                echo ("<script language='javascript'>
                    window.alert('Updated  successfully...');
        
                    window.location.href='add_newspaper_display.php';</script>");
                // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
            } else {
                // echo ("<script language='javascript'>
                // window.alert('not successfully...');

                // // window.location.href='add_newspaper_display.php';</script>");

                // echo '<br><br><br><br><br><br><b>Information Successfully
            }
        }
    }



    ?>
