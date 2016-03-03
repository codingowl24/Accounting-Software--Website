
<?php

include 'config_test.php';
include 'session.php'; 
$dBal =0;
$cBal =0;
$ty = array();
$at = array();
$i =0;
$errCount = 0;
global $cxn;

$target_path = "Upload/";

if (isset($_POST['subTrans']) && isset($_POST['amount']) && isset($_POST['debOrCred']) && isset($_POST['account']) 
		&& isset($_POST['src-doc']) && $_POST['type'] && $_POST['side'] ){
			

			// $servername = 'localhost';
			// $username = 'root';
			// $password = 'zqc92923';
			// $dbname = 'tmt_finances';
			// $cxn = new mysqli($servername, $username, $password, $dbname);
   //      if (empty($_FILES["fileToUpload"])) {
   //          ++$errCount;
   //          $eventImgErr = "Event Image is required";
   //      } else {
   //          $imgData = mysqli_real_escape_string($cxn, file_get_contents($_FILES['fileToUpload']['tmp_name']));
   //          $imgType = mysqli_real_escape_string($cxn, $_FILES['fileToUpload']['type']);
   //          $imgSize = mysqli_real_escape_string($cxn, $_FILES['fileToUpload']['size']);
   //          if (!substr($imgType, 0, 5) == "image"){
   //              ++$errCount;
   //              $eventImgErr = "File type must be 'image'";
   //          }
   //          // elseif ($imgSize > $maxSizeBlob){
   //              // ++$errCount;
   //              // $eventImgErr = "Max file size is 65,535 bytes";
   //          // }
   //          else {
   //              $fileToUpload = $imgData;   
   //          }
   //      }

   
   $query = "SELECT  MAX(Entry) FROM GenJournal";
					$results = mysqli_query($cxn, $query) or die (mysqli_error($cxn));	
					$col = mysqli_fetch_row($results);	
					$entryNum = $col[0] + 1;	
        
        
        
               			// Start uploading source file
		       			 foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
						$name = $key.$_FILES['file']['name'][$key];
						$tmpnm = $_FILES['file']['tmp_name'][$key];
						$type = $_FILES['file']['type'][$key];
						$size = $_FILES['file']['size'][$key];
				//Optional		$extensions = array("jpeg","jpg","png"); 
				
				
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
        
        	$query = "INSERT INTO transfileupload (filename, entry, uname, type, size) VALUES ('$name', '$entryNum' ,'$login_username', '$type', '$size')";
			mysql_query($query);
		} // end for loop 
   
   
   
			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'tmt_finances';
			$cxn = new mysqli($servername, $username, $password, $dbname);
			$query = "SELECT  MAX(Entry) FROM GenJournal";
			$results = mysqli_query($cxn, $query) or die (mysqli_error($cxn));	
			$col = mysqli_fetch_row($results);	
			$entryNum = $col[0] + 1;	
			foreach ($_POST['debOrCred'] as $type) {
				$ty[] = $type;
			}
			foreach ($_POST['amount' ] as $amount) {
				$at[] = $amount;
				}
			foreach ($_POST['account' ] as $acctName) {
				$acct[] = $acctName;
				}
			foreach ($_POST['type' ] as $acctType) {
				$actT[] = $acctType;
				}
			foreach ($_POST['side' ] as $acctSide) {
				$actS[] = $acctSide;
				}
				foreach($_POST['amount'] as $tr){
				if ($ty[$i]=="Debit") {
				$dBal += floatval($at[$i]);
				$i++;
				}
				else {
				$cBal += floatval($at[$i]);
				$i++;
				}
				}	
				if($dBal == $cBal){
					$i =0;
				foreach ($_POST['account'] as $acct ) {
								
								$servername = 'localhost';
								$username = 'root';
								$password = '';
								$dbname = 'tmt_finances';
								$cxn = new mysqli($servername, $username, $password, $dbname);
								$query = "SELECT * FROM chartofaccounts WHERE AccountName = '$acct'";
								$results = mysqli_query($cxn, $query) or die (mysqli_error($cxn));
								$row = mysqli_fetch_assoc($results);
								$action = $ty[$i];
								$amt = floatval($at[$i]);
								$type = $actT[$i];
								$side = $actS[$i];
								
								//date
								date_default_timezone_set('UTC');
								 $JDate = date('Y-m-d');	
								// $JDate = "2000-00-00";
								// $currentdate = "2000-00-00";
								  // $currentdate = strtotime($JDate);
								
								// date_default_timezone_set('UTC');
								// $jDate = date('m/d/Y');
								// $currentdate = strtotime($jDate);
        //                         $startdate = strtotime('2015-01-01');
        //                         $timeperiod = strtotime('2001-01-01') - strtotime('2000-01-01');
        //                         $subcode = ($currentdate - $startdate) / $timeperiod;
        //                         $jcode = 1 + $subcode;
								$jcode=0;
								$ff = $entryNum;
								while($ff > 0){
									$ff = $ff - 10;
									$jcode++;
								}

								
								
								
								if(is_numeric($amt)){
								$queryA = "INSERT INTO Transactions(AccountName,Action,Amount,UserID, Ref,JCode)
								VALUES('$acct','$action','$amt','$login_username','$entryNum','$jcode')";
								$results = mysqli_query($cxn, $queryA) or die (mysqli_error($cxn));
								$name = $acct;
								$i++;
								}
								$query = "INSERT INTO GenJournal(AccountName, Action, Amount, UserID, Message, Entry, Date, Type,NormalSide,JCode)VALUES
								('$acct','$action','$amt','$login_username','".$_POST['src-doc']."','$entryNum','$JDate','$type','$side','$jcode')";
								$results = mysqli_query($cxn, $query) or die (mysqli_error($cxn));	
								
				}
				$_SESSION['submission'] = TRUE;
				$_SESSION['count']++;
				header("Location:http://localhost/startbootstrapV2/pages%202/transaction.php");
	
		}

	
}

			

		?>
		