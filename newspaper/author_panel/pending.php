<?php include('forget_password.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset PHP</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <form class="login-form" action="" method="post" style="text-align: center;">
        <p>
            We sent an email to <b><?php echo $_GET['email'] ?></b> to help you recover your account.
        </p>
        <p>Please login into your email account and click on the link we sent to reset your password</p>
    </form>


    <div class="check">
        <!-- <form method="post" action="token.php">
            <div class="form-group">
                <label>Token</label>
               
                <input type="text" name="token">
            </div>
            <div class="form-group">
                <button type="submit" name="token" class="login-btn">Submit</button>
            </div>
        </form> -->


        <form class="login-form" action="token.php" method="post">
            <h2 class="form-title">Reset password</h2>
            <!-- form validation messages -->
            <?php include('f_messages.php'); ?>
            <div class="form-group">
                <label>Enter Token</label>
                <input type="token" name="token" required>
                <input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>">
                <!-- <input type="hidden" name="token" value="<?php echo $token ?>"> -->
            </div>
            <div class="form-group">
                <button type="submit" name="token-check" class="login-btn">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>