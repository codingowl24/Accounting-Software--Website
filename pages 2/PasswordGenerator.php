<?php
require ('Config.php');
// Initialize Variables To Null.
$fname = "";
$lname = "";
$username = "";
$newusername = "";
$email = "";
$fnameError = "";
$lnameError = "";
$usernameError = "";
$emailError = "";
$successMessage = "";
$passwordMessage = "";
$type = "";
$admin = "";
$manager = "";
$user = "";
$dropdownError = "";

if (isset($_POST['register'])) {
	// Checking if firstname is null
	if (!($_POST["fname"] == "")) {
		$fname = $_POST["fname"];
		// Check Name Only Contains Letters
		if (preg_match("/^[a-zA-Z]*$/", $fname)) {
			// Check last name
			if (!($_POST["lname"] == "")) {
				$lname = $_POST["lname"];
				// Check last Name Only Contains Letters

				if (preg_match("/^[a-zA-Z]*$/", $lname)) {

					$username = $fname{0} . $lname;

					//Check if username is alraredy existed
					$result1 = mysql_query("SELECT * FROM `users` WHERE `username`='$username'") or die(mysql_error());
					$data1 = mysql_num_rows($result1);
					if (($data1) == 0) {

						if (!($_POST["email"] == "")) {
							$email = $_POST["email"];

							// Check If E-mail Address Syntax
							$email = filter_var($email, FILTER_SANITIZE_EMAIL);
							if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
								$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
								$password = substr(str_shuffle($chars), 0, 8);
								$password1 = sha1($password);
								$result = mysql_query("SELECT * FROM users WHERE email='$email'");
								$data = mysql_num_rows($result);
								if (($data) == 0) {

									if (!($_POST['type'])) {
										$dropdownError = "Please select user type";
									} else {
										if ($_POST['type'] == '1') {
											$admin = '1';

											// Insert query
											$query = mysql_query("insert into `users`(`firstname`, `lastname`, `username`, `password`, `email`, `usertype`) values ('$fname', '$lname', '$username', '$password1', '$email', '$admin')");
											if ($query) {
												$to = $email;
												$from = "webmailservices123@gmail.com";
												$subject = 'Your registration is completed';
												/* Let's Prepare The Message For The E-mail */
												$message = 'Hello' . $fname . '
												 
											Your UserName and password is following:
											UserName: ' . $username . '
											Your new password : ' . $password . '
											Now you can login with this username and password.';
												/* Send The Message Using mail() Function */
												if (mail($to, "$subject", $message, "From: $from")) {
													$successMessage = "ID: " . $username . " Password: " . $password . " Password has been sent to your mail, Please check your mail and SignIn.";
												}
											}

										}

										if ($_POST['type'] == '2') {
											$admin = '2';
											$query = mysql_query("insert into `users`(`firstname`, `lastname`, `username`, `password`, `email`, `usertype`) values ('$fname', '$lname', '$username', '$password1', '$email', '$admin')");
											if ($query) {
												$to = $email;
												$from = "webmailservices123@gmail.com";
												$subject = 'Your registration is completed';
												/* Let's Prepare The Message For The E-mail */
												$message = 'Hello' . $fname . '
											Your UserName and password is following:
											UserName: ' . $username . '
											Your new password : ' . $password . '
											Now you can login with this username and password.';
												/* Send The Message Using mail() Function */
												if (mail($to, "$subject", $message, "From: $from")) {
													$successMessage = "ID: " . $username . " Password: " . $password . " Password has been sent to your mail, Please check your mail and SignIn.";
												}
											}
										}
										
														if ($_POST['type'] == '3') {
															$admin = '0';
											
											$query = mysql_query("insert into `users`(`firstname`, `lastname`, `username`, `password`, `email`, `usertype`) values ('$fname', '$lname', '$username', '$password1', '$email', '$admin')");
											if ($query) {
												$to = $email;
												$from = "webmailservices123@gmail.com";
												$subject = 'Your registration is completed';
												/* Let's Prepare The Message For The E-mail */
												$message = 'Hello' . $fname . '
											Your UserName and password is following:
											UserName: ' . $username . '
											Your new password : ' . $password . '
											Now you can login with this username and password.';
												/* Send The Message Using mail() Function */
												if (mail($to, "$subject", $message, "From: $from")) {
													$successMessage = "ID: " . $username . " Password: " . $password . " Password has been sent to your mail, Please check your mail and SignIn.";
												}
											}
										}

									}

								} else {
									$emailError = "This email is already registered. Please try another email...";
								}
							} else {
								$emailError = "Invalid Email";
							}
						} else {
							$emailError = "Email is required";
						}
					} else {
						$num = "0123456789";
						$newusername = $username . substr(str_shuffle($num), 0, 2);

						if (!($_POST["email"] == "")) {
							$email = $_POST["email"];

							// Check If E-mail Address Syntax
							$email = filter_var($email, FILTER_SANITIZE_EMAIL);
							if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
								$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
								$password = substr(str_shuffle($chars), 0, 8);
								$password1 = sha1($password);
								$result = mysql_query("SELECT * FROM users WHERE email='$email'");
								$data = mysql_num_rows($result);
								if (($data) == 0) {

									if (!($_POST['type'])) {
										$dropdownError = "Please select user type";
									} else {
										//select an admin if a user exists
										if ($_POST['type'] == '1') {
											$admin = '1';

											$query = mysql_query("insert into `users`(`firstname`, `lastname`, `username`, `password`, `email`, `usertype`) values ('$fname', '$lname', '$newusername', '$password1', '$email', '$admin')");

											if ($query) {
												$to = $email;
												$subject = 'Your registration is completed';
												/* Let's Prepare The Message For The E-mail */
												$message = 'Hello' . $fname . '
											Your UserName and password is following:
											UserName: ' . $newusername . '
											Your new password : ' . $password . '
											Now you can login with this username and password.';
												/* Send The Message Using mail() Function */
												if (mail($to, $subject, $message)) {
													$successMessage = "ID: " . $newusername . " Password: " . $password . " Password has been sent to your mail, Please check your mail and SignIn.";
												}
											}

										}
										// Select type manager if a user exists
										if ($_POST['type'] == '2') {
											$admin = '2';

											$query = mysql_query("insert into `users`(`firstname`, `lastname`, `username`, `password`, `email`, `usertype`) values ('$fname', '$lname', '$newusername', '$password1', '$email', '$admin')");

											if ($query) {
												$to = $email;
												$subject = 'Your registration is completed';
												/* Let's Prepare The Message For The E-mail */
												$message = 'Hello' . $fname . '
											Your UserName and password is following:
											UserName: ' . $newusername . '
											Your new password : ' . $password . '
											Now you can login with this username and password.';
												/* Send The Message Using mail() Function */
												if (mail($to, $subject, $message)) {
													$successMessage = "ID: " . $newusername . " Password: " . $password . " Password has been sent to your mail, Please check your mail and SignIn.";
												}
											}

										}
										
													// Select type user if a user exists
										if ($_POST['type'] == '3') {
											$admin = '0';

											$query = mysql_query("insert into `users`(`firstname`, `lastname`, `username`, `password`, `email`, `usertype`) values ('$fname', '$lname', '$newusername', '$password1', '$email', '$admin')");
													
											if ($query) {
												$to = $email;
												$subject = 'Your registration is completed';
												/* Let's Prepare The Message For The E-mail */
												$message = 'Hello' . $fname . '
											Your UserName and password is following:
											UserName: ' . $newusername . '
											Your new password : ' . $password . '
											Now you can login with this username and password.';
												/* Send The Message Using mail() Function */
												if (mail($to, $subject, $message)) {
													$successMessage = "ID: " . $newusername . " Password: " . $password . " Password has been sent to your mail, Please check your mail and SignIn.";
												}
											}

										}

									}

								} else {
									$emailError = "This email is already registered. Please try another email...";
								}
							} else {
								$emailError = "Invalid Email";
							}
						} else {
							$emailError = "Email is required";
						}

					}

				} else {
					$lnameError = "Only letters are allowed";
				}
			} else {
				$lnameError = "Last Name is required";
			}
		} else {
			$fnameError = "Only letters are allowed";
		}
	} else {
		$fnameError = "First Name is required";
	}
}
?>