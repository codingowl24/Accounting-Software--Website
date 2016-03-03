<?php
$email = "";
$Error = "";
$successMessage = "";

if (isset($_POST['resendpass'])) {
	if (!($_POST["email"] == "")) {
		$email = $_POST["email"];
		// Calling Function To Remove Special Characters From E-mail
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		// Sanitizing E-mail(Remove unexpected symbol like <,>,?,#,!, etc.)
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
			// Generating Password
			$password = substr(str_shuffle($chars), 0, 8);
			$password1 = sha1($password);
			$connection = mysql_connect("localhost", "root", "");
			// Establishing Connection With Server..
			$db = mysql_select_db("users", $connection);
			// Selecting Database
			$query = mysql_query("UPDATE users SET password='$password1' WHERE email='$email'");
			if ($query) {
				$to = $email;
				$subject = 'Your New Password...';
				// Let's Prepare The Message For E-mail.
				$message = 'Hello User
					Your new password : ' . $password . '
					E-mail: ' . $email . '
					Now you can login with this email and password.';
				// Send The Message Using mail() Function.
				if (mail($to, $subject, $message)) {
					$successMessage = $password . " New Password has been sent to your mail. Please check your mail and SignIn.";
				}
			}
		} else {
			$Error = "Invalid Email";
		}
	} else {
		$Error = "Email is required";
	}
}
?>