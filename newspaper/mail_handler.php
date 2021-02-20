<?php
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['msg'];

	$to = 'sultanan087@mail.com'; // Receiver Email ID, Replace with your email ID
	$subject = 'Form Submission';
	$message = "Name :" . $name . "\n" . "Phone :" . $subject . "\n" . "Wrote the following :" . "\n\n" . $msg;
	$headers = "From: " . $email;

	if (mail($to, $subject, $message, $headers)) {
		// echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
		echo ("<script language='javascript'>
            window.alert('Sent Successfully! Thank you" . " " . $name . ", We will contact you shortly!');
             window.location.href='index.php';</script>");
	} else {
		echo "Something went wrong!";
	}
}
