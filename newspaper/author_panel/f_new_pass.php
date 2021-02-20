<?php
include('forget_password.php');
$token = $_GET['tk'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset PHP</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form class="login-form" action="" method="post">
        <h2 class="form-title">New password</h2>

        <?php include('f_messages.php'); ?>
        <div class="form-group">
            <label>New password</label>
            <input type="password" name="new_pass">
        </div>
        <div class="form-group">
            <label>Confirm new password</label>
            <input type="password" name="new_pass_c">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="new_password" class="login-btn">Submit</button>
        </div>
    </form>
</body>

</html>