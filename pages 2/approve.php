<?php

include 'config_test.php';
include 'session.php';
include 'common.php';
?>


<?php
if (isset($_POST['ok'])) {
	$key = $_GET["EntryName"];
	$balance = 0.00;
	$nameI ="";
	$date ="";
	$ref =0;
	$message="";
	$amount = 0.00;
	$type ="";
	// $jcode =1;
	$side ="";
		$query = "Update GenJournal Set Status ='1', StatusMessage='Approved' Where Entry ='$key'";
		$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
		$dupli="";
		$querya ="SELECT * FROM GenJournal WHERE Entry = '$key'";
		$resultsa = mysqli_query($cxn, $querya) or die(mysqli_error($cxn));
		while ($row = mysqli_fetch_assoc($resultsa)) {
			$name = $row['AccountName'];
			$string = str_replace(' ', '', $name);
			//echo $row['AccountName'];
			$amount = $row['Amount'];
			if ($string != $dupli) {
			if ($row['Action'] == "Debit") {
				$query = "INSERT INTO ".$string." (AccountName,Debit)VALUES('$string','$amount')";
				$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
			}
			else {
				$query = "INSERT INTO ".$string." (AccountName,Credit)VALUES('$string','$amount')";
				$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
				}
			}
		}
		$query = "SELECT * FROM GenJournal WHERE Status = 1 AND StatusMessage ='Approved' AND Entry = '$key'";
		$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
		while ($row = mysqli_fetch_assoc($results)) {
			if ($row['StatusMessage'] != "") {
		$name = $row['AccountName'];
		$action = $row['Action'];
		$balance = getAccountBalance($name);
		// if($row['Balance']=0.00)
		// {
		// 	$balance=0.00;
		// }
		// $balance = computeAccountBalance($name, $action);
		$date = $row['Date'];
		$message = $row['Message'];
		$ref = $row['Entry'];
		$amount = $row['Amount'];
		$type = $row['Type'];
		$side = $row['NormalSide'];
		$jcode = $row['JCode'];
		if($row['NormalSide'] == 'R')
		{
		  	$balance= -$balance;
		}


		if($action == 'Debit'){

			$queryD = "INSERT INTO GenLedger (Date, AccountName, Explanation, Ref, JCode, Debit, Balance, Type, NormalSide)
			VALUES('$date','$name','$message','$ref', '$jcode', '$amount','$balance','$type','$side')";
			$queryG = "UPDATE chartofaccounts SET Balance = $balance WHERE AccountName = '$name'";
			$resultsG = mysqli_query($cxn, $queryG) or die(mysqli_error($cxn));
			$resultsD = mysqli_query($cxn, $queryD) or die(mysqli_error($cxn));
			
		}
		else {

			$queryC = "INSERT INTO GenLedger (Date, AccountName, Explanation, Ref, JCode, Credit, Balance, Type, NormalSide)
			VALUES('$date','$name','$message','$ref', '$jcode', '$amount','$balance','$type','$side')";
			$queryH = "UPDATE chartofaccounts SET Balance = $balance WHERE AccountName = '$name'";
			$resultsH = mysqli_query($cxn, $queryH) or die(mysqli_error($cxn));
			$resultsC = mysqli_query($cxn, $queryC) or die(mysqli_error($cxn));
		}
	  }			
	}
			$_SESSION['rejected'] = FALSE;
			$_SESSION['approved'] = TRUE;
	  header("Location:http://localhost/startbootstrapV2/pages%202/Journal.php");
}

if (isset($_POST['no'])) {
	$key = $_GET["EntryName"];
	$query = "Update GenJournal Set Status ='1', StatusMessage='Rejected' Where Entry ='$key'";
	$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
	
		$_SESSION['rejected'] = TRUE;
		$_SESSION['approved'] = FALSE;
	 header("Location:http://localhost/startbootstrapV2/pages%202/Journal.php");
	 	
}
?>