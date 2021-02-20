
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'newspaper');

    if (isset($_POST['update'])) {
        $uid = $_POST['categories_id'];

        $categories_name = $_POST['categories_name'];


        $sqlupdate = "Update categories SET  categories_name='$categories_name' WHERE categories_id='$uid'";
        $res = mysqli_query($con, $sqlupdate);
        if ($res) {

            echo ("<script language='javascript'>
                window.alert('Updated  successfully...');
    
                window.location.href='show_categories_dispaly.php';</script>");
            // echo '<br><br><br><br><br><br><b>Information Successfully Updated</b>';
        }
    }


    ?>
