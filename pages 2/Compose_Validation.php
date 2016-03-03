<?php
include 'Config.php';
include 'config_test.php';



?>

<?php
$tit = "";
$recip = "";
$mess = "";
$subError = "";
$recError = "";
$errorMessage = "";
$successMessage = "";
$target_path = "Upload/";
	
if (isset($_POST['send'])) {
	if (!($_POST["title"] == "")) {
		$tit = $_POST["title"];
		if (!($_POST["recipient"] == "")) {
			$recip = $_POST["recipient"];
			if (!($_POST["message"]== "")) {
				$mess = $_POST["message"];


if(get_magic_quotes_gpc()){
	$tit = stripslashes($tit);
	$recip = stripslashes($recip);
	$mess = stripslashes($mess);
	
}
				
				$ti = mysql_real_escape_string($tit);
				$reci = mysql_real_escape_string($recip);
				$messa = mysql_real_escape_string($mess);
				//$sourceDoc = mysql_real_escape_string($_FILES['file']['name']);
				
				
				//Check username
				$query = "Select userid, username from users where username = '$recip'";
				$querya = "Select max(id) as id from pm";
				$result = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
				$result1 = mysqli_query($cxn, $querya) or die(mysqli_error($cxn));
				$data = mysqli_num_rows($result);
				
				
				$col = mysqli_fetch_row($result1);
				$entry = $col[0] + 1;
				
				if ($data == 1) {
    
			
					
						
						
						$query = mysql_query("Insert into pm (title, user1, user2, message) VALUES ('$ti', '$login_username', '$reci', '$messa')");
						$successMessage = "Message sent successfully!!";
							
							
						// Single File upload
						
						// if(!is_dir($target_path)) mkdir($target_path);
						// $uploadfile = $target_path . basename($sourceDoc);		
						// (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile));
						
						
						// Multiple files upload
						foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
						$name = $key.$_FILES['file']['name'][$key];
						$tmpnm = $_FILES['file']['tmp_name'][$key];
						$type = $_FILES['file']['type'][$key];
						$size = $_FILES['file']['size'][$key];
						$extensions = array("jpeg","jpg","png"); 
						
						//$nospacename = str_replace(" ","",$name);
						//print_r($name);
						
						
						if($size > 10000000){
							$errorMessage = "File size must be less than 10 MB";
							
						}
						
						if(is_dir($target_path) == FALSE){
							mkdir("$target_path");
						}
						
						if(is_dir("$target_path" . $name) == FALSE){
						//	$uploadfile = $target_path . basename($name);	
							
						(move_uploaded_file($tmpnm, $target_path.$name));
						}
						else{
							rename($tmpnm, "$target_path".$name);
						}
						
						
						$query = "INSERT INTO fileupload (filename, uid, type, size, mid) VALUES ('$name', '$login_username', '$type', '$size', '$entry')";
						
						mysql_query($query);
						} // end foreach loop	
						
					
					
					
					
						

				

				} else {
					$recError = "This user does not exist!";
				}
				

			} else {
				$errorMessage = "Message cannot be empty!";
			}

		} else {
			$recError = "Recipient cannot be empty !!";
		}

	} else {
		$subError = "Subject cannot be empty";
	}


			


} //end post button


if(isset($_POST['cancel'])){
	$_POST['title'] = "";
	$_POST['recipient'] = "";
	$_POST['message'] = "";
	
	
	
	
	
	
}



?>