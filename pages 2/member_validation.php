<?php
require ('Config.php');
include 'session.php';

$oldpassword = "";
$newpassword = "";
$confirmpassword = "";
$existError = "";
$matchError = "";
$checkError = "";
$empty = "";
//$Error = "";
$successMessage = "";

if (isset($_POST['changepass'])) {
	//Check old pass
	$oldpassword = sha1($_POST['oldpassword']);
	$result = mysql_query("SELECT `password` FROM `users` WHERE `password`='$oldpassword'");
	$data = mysql_num_rows($result);
	if ($data == 1) {
		
		if (!($_POST['oldpassword'] == ""))
		{
		if (!($_POST['newpassword'] == "" && $_POST['confirmpassword'] == "")) {
			$newpassword = $_POST['newpassword'];
			$confirmpassword = $_POST['confirmpassword'];

			//Check conditions of new pass
			if (preg_match('/[A-Z]+/', $newpassword) && preg_match('/[a-z]+/', $newpassword) && preg_match('/[\d]+/', $newpassword) && (strlen($newpassword) > 7)) {

				if ($newpassword == $confirmpassword) {
					$newpassword = sha1($confirmpassword);

					$query = mysql_query("UPDATE `users` SET `password`='$newpassword' WHERE `password`='$oldpassword'");
					if ($query) {
						$successMessage = "Password Changed Successfully.";
					}

				} else {
					$matchError = "Password not match...!!!!";
				}

			} else {
				$checkError = "Password must have: 
						  at least one upper case letter,
						  at least one number,
						  at least 8 characters";
			}

		} else {
			$checkError = "Password should not be empty....!!!!";
		}

	}else{
			$empty = "Old password should not be empty...!!!";
	} 
	}else {
		$existError = "Old password does not match....!!!!";
		
	}
}
?>