<?php
require ('Config.php');
session_start();
$Error = "";
$successMessage = "";
if (isset($_POST['login'])) {
	if (!($_POST['username'] == "" && $_POST['password'] == "")) {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);

		// check matching username and Password 
		$result = mysql_query("SELECT `username`, `password`, usertype FROM `users` WHERE `username`='$username' AND `password`='$password'");
		$row = mysql_fetch_array($result);
		$login_type = $row['usertype'];
		
		$data = mysql_num_rows($result);
		if ($data == 1) {
			$_SESSION['login_user'] = $username;
			// Initializing Session
			
			if($login_type == 1)
			{
			header('Location: admin.php');
			}
				if($login_type == 2)
			{
			header('Location: manager.php');
			}
				if($login_type == 0)
			{
			header('Location: dashboard.php');
			}

		} else {
			$Error = "Username or Password is Incorrect...!!!!";
		}


	} else {
		$Error = "Username or Password is Empty...!!!!";
	}
}


?>