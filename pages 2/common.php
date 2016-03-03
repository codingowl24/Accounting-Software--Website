<?php
    //phpinfo();
   // include 'config_test.php';
	
	function getAccountBalance($name){
		$debit = 0.00;
		$credit =0.00;
		$balance = 0.00;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tmt_finances";
		$cxn = new mysqli($servername, $username, $password, $dbname);
		$account = str_replace(' ', '', $name);
		$query = "Select * From $account";
		$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
		while ($row = mysqli_fetch_assoc($results)) {
				$debit += $row['Debit'];
				$credit += $row['Credit'];
		}
		if($row['NormalSide']='L'){
			if("$credit" < "$debit"){
			$balance = $debit - $credit;
			}else
			{
				$balance = $credit - $debit;
				$balance = -$balance;
			}
		}else if($row['NormalSide']='R'){
			if("$credit" < "$debit"){
			$balance = $debit - $credit;
			$balance = -$balance;
			}else
			{
				$balance = $credit - $debit;
				
			}
		}

		return $balance;
	}
	
		function getPeriodAmount($name){
		$debit = 0.00;
		$credit =0.00;
		$balance = 0.00;
		// date_default_timezone_set('UTC');
		// $jDate = date('m/d/Y');
		// $currentdate = strtotime($jDate);
		// $startdate = strtotime('2015-01-01');
  //       $timeperiod = strtotime('2001-01-01') - strtotime('2000-01-01');
  //       $subcode = ($currentdate - $startdate) / $timeperiod;
  //       $jcode = 1 + $subcode;
  //       $jcode = floor($jcode);

        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tmt_finances";
		$cxn = new mysqli($servername, $username, $password, $dbname);
		$account = str_replace(' ', '', $name);
		// $query = "Select Debit, Credit From genledger where JCode = '$jcode' and AccountName = '$name' ";
		$query = "Select Debit, Credit From genledger where AccountName = '$name' ";
		$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));

		while ($row = mysqli_fetch_assoc($results)) {
				$debit += $row['Debit'];
				$credit += $row['Credit'];
	
		}

		if("$credit" < "$debit"){
			$balance = $debit - $credit;
		}else
			{
				$balance = $credit - $debit;
				  // $balance = -$balance;
			}
		 $normalside = $row['NormalSide'];
		 if($normalside =='L')
		 	$balance = -$balance;
		return $balance;
	}
?>