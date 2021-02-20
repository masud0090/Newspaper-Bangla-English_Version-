<?php include('change_password.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change password</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form class="login-form" action="enter_email.php" method="post">
        <h2 class="form-title">Change password</h2>
        <!-- form validation messages -->
        <?php include('messages.php'); ?>
        <div class="form-group">
            <label>Enter Your Current Password Please</label>
            <input type="password" name="password">
        </div>
        <div class="form-group">
            <button type="submit" name="reset-password" class="login-btn">Submit</button>
        </div>
    </form>
</body>

</html>