<?php

//session_start();

$errors = [];
$user_id = "";
$token = '';

// Database connection
include('../database.php');

if (isset($_POST['reset-password'])) {
  $email =  $_POST['email'];

  $query = "SELECT email FROM user WHERE email='$email'";
  $results1 = mysqli_query($con, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  } else if (mysqli_num_rows($results1) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }

  $token = bin2hex(random_bytes(5));

  if (count($errors) == 0) {

    $sql2 = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
    $results2 = mysqli_query($con, $sql2);
    if ($results2) {

      $to = $email;
      $subject = "Reset your password on SkillHutch.com";
      $msg = "Hi there, click on this <a href=\"new_pass.php?token=" . $token . "\">link</a> to reset your password on our site";
      $msg = wordwrap($msg, 70);
      $headers = "From: rana90id@gmail.com";
      mail($to, $subject, $msg, $headers);
      header('location: pending.php?email=' . $email);
    } else {
      echo 'Unsuccessfull';
    }
  }
}


// NEW PASSWORD
if (isset($_POST['new_password'])) {

  $new_pass =  $_POST['new_pass'];
  $new_pass_c = $_POST['new_pass_c'];



  // $token = ['$token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {

    $f_token = $_POST['token'];
    // email  from the password_resets table 
    $sql3 = "SELECT email FROM password_resets WHERE token='$f_token'";
    $results3 = mysqli_query($con, $sql3);
    $email = mysqli_fetch_assoc($results3);


    if ($email['email']) {
      // $new_pass = ($new_pass);
      $myemail = $email['email'];
      $sql4 = "UPDATE user SET password='$new_pass' WHERE email='$myemail'";
      //$sql = "UPDATE registration SET password='$new_pass' from regisrstion r inner join password_resets p where r.email= p.email";
      $results4 = mysqli_query($con, $sql4);
      echo ("<script language='javascript'>
			window.alert('Password successfully Changed...');
			
			window.location.href='index.php';</script>");
      // header('location: mainindex.php');
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>