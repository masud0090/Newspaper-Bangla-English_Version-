<?php
include('../database.php');
session_start();

if (isset($_POST['submit'])) {
    // username and password sent from form 


    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];


    $sql = "SELECT user_id,status FROM user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);


    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    $u_status = $row['status'];
    $active = $row['user_id'];
    if ($count == 1 && $u_status == 'Active') {

        //  session_register("myusername");
        $_SESSION['author'] = $myusername;
        $_SESSION['user_id'] = $active;


        header("location: index.php");
    } else if ($count == 1 && $u_status == 'Banned') {


        echo ("<script language='javascript'>
      window.alert('You are banned ...');
       window.location.href='user_login.php?';</script>");
    } else {
        //     echo ("<script language='javascript'>
        //   window.alert('Your User name and Password is invalid ...');
        //    window.location.href='user_login.php?';</script>");
    }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <a href="http://www.demo.yogihosting.com/e/bootstrap-modal-login-form/css/style.css"></a>
</head>

<body>

    <div class="containerr">


        <div class="login">


            <!-- <div class="dropdown-menu stop-propagation"> -->
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">

                    <div class="content" style="background-color: #f7f7f7;">

                        <div class="center" style="width: 80%; align-items:center; padding:40px;margin:20px 40px;">
                            <center style="font-size:50px; margin:7px;">Sign In</center>

                            <form action="" class="md" method="post" id="loginform">
                                <input name="username" id="userNameTextBox" class="form-control" placeholder="Username" type="text" required>
                                <span id="userNamSpan"></span>
                                <br>
                                <input id="passwordTextBox" name="password" class="form-control" placeholder="Password" type="password" required>
                                <td><span id="passwordSpan"></span></td>
                                <br>
                                <input class="btn btn-success" data-toggle="tooltip" data-placement="bottom" id="submitButton" title="" value="Sign In" name="submit" type="submit">
                                <span id="messageSpan"></span>
                                <!-- <img id="loadingImg" src="demo_wait.gif" /> -->

                                <!-- <a class="for-pass" href="" target="" onclick="">Forgot password?</a> -->









                        </div>
















                        </form>








                    </div>

                </div>
                <div class="col-md-3">
                </div>
            </div>
            <!-- </div> -->
        </div>




    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>