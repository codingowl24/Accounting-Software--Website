<?php

if (isset($_POST['ok'])) {
		$id = "";
		$act = "1";
		$deact = "0";
		$messagea = "";
		$messageb ="";
		$f0_submitted = (INT)$_POST['uid'];
		//echo $f0_submitted;
		
		mysql_query("Update users set active = '$act' where userid = $f0_submitted");
		//$result_update = mysql_query($query_update);
		$messagea = "Activated";
		

}	

else {
	
	if (isset($_POST['no']))
	{
		$act = "1";
		$deact = "0";
		$message = "";
		$f0_submitted = $_POST['uid'];
		//echo $f0_submitted;
	
		mysql_query("Update users set active = '$deact' where userid = $f0_submitted");
		$messageb = "Deactivated";
	}
	
}


 if (isset($_POST['kk']))
    {
        $act = "1";
        $deact = "0";
        $message = "";
        $acctid = $_POST['aid'];
        //echo $f0_submitted;
 
        mysql_query("Update chartofaccounts set Active = '$act' where AccountNumber = $acctid");
    }
	
 else{
 	if (isset($_POST['nn']))
    {
        $act = "1";
        $deact = "0";
        $message = "";
        $acctid = $_POST['aid'];
        //echo $f0_submitted;
 
        mysql_query("Update chartofaccounts set Active = '$deact' where AccountNumber = $acctid");
    }
	
	
 }
	
?>