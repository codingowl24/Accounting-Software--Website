<?php

include 'config_test.php';
include 'session.php';

protect_page();
$target_path = "Upload/";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal - TMT Finance</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link href="css/dashboard.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <!-- <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->
    
    <!-- Bootstrap Multiselector -->
        <script type="text/javascript" src="../bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js"></script> 		     
	<link rel="stylesheet" href="../bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css" type="text/css"/>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script> 		     
	<link rel="stylesheet" href="../datepicker/css/datepicker.css" type="text/css"/>

          <style>
    .table, thead, tr, th, tbody, td
    {
		border: none!important;
	}
    </style>
</head>
<body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#s10c').multiselect();
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#s10c').multiselect();
    });
</script>
<script type="text/javascript">
 $(function(){
	$('#dp3').datepicker();
});
</script>
<script type="text/javascript">
 $(function(){
	$('#dp4').datepicker();
});
</script>


    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="homepage.php"><img id ="logo" src="images/tmt.png"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="index.html">TMT</a> -->
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="dashboard.php"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard</a></li>
                    <!-- <li><a href="#"><i class="fa fa-tasks"></i> Accounts</a></li> -->
                         <li>
                            
                                <li>
                                    <a href="BalanceSheet.php">Balance Sheet</a>
                                </li>
                                <li>
                                    <a href="IncomeStatement.php">Income Statement</a>
                                </li>
                                <li>
                                    <a href="Ownersequity.php">Owner's Equity Statement</a>
                                </li>
                                 <li>
                                    <a href="trialbalance.php">Trial Balance</a>
                                </li>
                            
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="transaction.php"><i class="fa fa-money"></i> Transactions <span class="fa arrow"></span></a>
     					 <!-- /.nav-second-level -->
                        </li>
                        <li class="active"><a href="Journal.php" id="genjournal">Journal</a></li>
                    <!-- <li><a href="ledger.php">General Ledger</a></li> -->
                   
                    <li><a href="chart_of_accounts.php">View Chart of Accounts</a></li>
                </ul>
                               <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?php echo unread_count()   ; ?></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo unread_count(); ?> New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                   
                                </a>
                            </li>
                        
                            <li class="message-preview">
                                <a href="#">
                                  
                                </a>
                            </li>
                            <li><a href="inbox.php">Go to Inbox<span class="badge"></span></a></li>
                        </ul>
                    </li>
                      <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b><?php echo " $login_session";?></b><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php if(is_admin($login_id) === TRUE) {echo "admin.php";} if(is_manager($login_id) === TRUE){echo "manager.php";} if(is_user($login_id) === TRUE){echo "user_profile.php";} ?>"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="member.php"><i class="fa fa-gear"></i> Manage Account</a></li>
                            <li class="divider"></li>
                            <li><a href="log_out.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

<style>
	#test{
 /*position:fixed;*/
}
</style>
        <div id="page-wrapper">
        	
            <div class="row"  style="">
            	    <div style="float: left; padding-left: 10px; padding-top: 10px; width:100%;">
            			 <?php 
            			 if($_SESSION['approved'] ){
						echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Transaction Approved.
                    </div>';
						} 
                    						else if($_SESSION['rejected']) {
							echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Transaction Rejected.
                    </div>';
						}?>
						<script>
						
						 function filterFunction(){
							var x = document.getElementById("appr").checked;
							var y = document.getElementById("rejec").checked;
							var z = document.getElementById("pen").checked;
							if(x === true){
								document.getElementById("filter").click();
								
							}
							else if(y === true){
								document.getElementById("filter").click();
								document.getElementById("rejec").checked =true;
							}
							else if(z === true){
								document.getElementById("genjournal").click();
								document.getElementById("pen").checked = true;
							}
						}
						</script>
            		</div>
            		
            		
                    <div class="col-lg-12">	
                    	
                        <h1 class="page-header">Journal</h1>


							<form name="myForm" action=""   method="post"> 
								<div class="row">
									<div class="col-md-2">
										<label>From</label> 
                             	 <div class='input-group date' style="width: 190px;">           			
					            		<input class="form-control"   id="dp3" name="date-1" data-date-format="yyyy-mm-dd"  type="text" />
					            		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					            		</span>
					            		</div>
					            		</div>
					            		<div class="col-md-2" style="padding-left:30px;  text-align: left;">
					            			<label class="">To</label>
					            		 <div class='input-group date' style="width: 190px;">           			
					            		<input class="form-control" name="date-2" id="dp4" data-date-format="yyyy-mm-dd"  type="text" />
					            		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					            		</span>
					            		</div>
					           </div>
					            		<input type="hidden" id="mydatetime" name="mydatetime"/>
					            		<div class="col-md-2" style="margin-top: 25px; padding-left:50px;">
										<input type="submit" class="btn btn-primary btn-sm" style="" name="submitDate" value="Search" />
										</div>
										</div>
										</form>
										
										   		<form method="post" id="filterForm">
					            		<div class="row" style="padding-top: 15px; padding-bottom: 15px; padding-left: 7px;">
					            		<div class="col-md-4">
					            		<label class="radio-inline"> <input type="radio" onclick="filterFunction()" class="radio"  value="Pending" 	 id="pen" placeholder="" name="emp">Pending</label>
                             			<label class="radio-inline" > <input type="radio" class="radio" onclick="filterFunction()"  value="Approved" id="appr" placeholder="" name="emp">Approved</label>
                             			<label class="radio-inline" > <input type="radio" class="radio" onclick="filterFunction()"  value="Rejected" id="rejec" placeholder="" name="emp">Rejected</label>
                             			<input type="submit" id="filter"  name="filter" style="visibility: hidden;" />
                             			
                             			</div>									
										</div>
										</form>
										<script>
											function check1(){
												document.getElementById('appr').checked = true;
											}
										</script>
										<script>
											function check2(){
												document.getElementById('rejec').checked = true;
											}
										</script>
										<script>
											function check3(){
												document.getElementById('pen').checked = true;
											}
										</script>
										
										
							<?php 
							
							$queryG="";
							if(isset($_GET['Fromdate'])){
							$fromdate = $_GET['Fromdate'];
							$todate = $_GET['Todate'];
							// echo $fromdate;
							// echo $todate;
							if($fromdate!=null)
							{
							$queryG = "SELECT * FROM GenJournal WHERE Date BETWEEN '$fromdate' and '$todate' and Status='0' ORDER BY Entry ASC, Action DESC";
							// echo $queryG;
							// $resultsG = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
							// while($row = mysqli_fetch_assoc($results)){
							// }
						}
							}
						?>


    					<div class="" style="">
                        <label style="display: inline-block;">TMT Finances</label>

                        </div>
					<br>
					<br>
					<!-- <table>
					<thead>
					<tr>
					<td class='col-lg-1'>Date</th>
					<td class='col-lg-3' style=''>Account Titles and Explanations</th>
					<td class='col-lg-2'>Ref</th>
					<td class='col-lg-1' style='padding-right: 50px;'>Debit</th>
					<td class='col-lg-1' style='padding-right: 35px;'>Credit</th>
					<td class='col-lg-1' style='padding-right: 80px;'>Status</th>
					<td class='col-lg-3'style='padding-right: 80px;'>Action</th>
					</tr>
					</thead>
					</table> -->
					
					<div class='panel panel-default' id='journal' style=''>
					<table >
				
					<thead>
					<tr>
					<td class='col-lg-1'>Date</th>
					<td class='col-lg-3' style=''><label>Account Titles and Explanations</label></th>
					<td class='col-lg-2' style='padding-left: 80px'><label>Ref</label></th>
					<td class='col-lg-1' style='padding-left: 50px'><label>Debit</label></th>
					<td class='col-lg-1' style='padding-left: 50px'><label>Credit</label></th>
					<td class='col-lg-1' style='padding-right: 40px'><label>Status</label></th>
					<td class='col-lg-3'style='padding-right: 50px'><label>Action</label></th>
					</tr>
					</thead>
					<tbody>
					
					
                    <?php
                    echo "<button id = 'a' style = 'visibility:hidden;' onclick='check1()'></button>";
                    echo "<button id = 'r' style = 'visibility:hidden;' onclick='check2()'></button>";
					echo "<button id = 'p' style = 'visibility:hidden;' onclick='check3()'></button>";
					$check="";
					$entry =0;
					$a =1;	
					$date="";
					date_default_timezone_set('UTC');
					$jDate = date('m/d/Y');
					
					$updateAccount = array();
					
					
					
					
					if(isset($_GET['date-1'])){
					
					$fromdate = $_POST['date-1'];
					}

					if(isset($_GET['date-2'])){
					$todate = $_POST['date-2'];
					}
					
					$ref = 0;
					$action="";
					$name = "";
					$test = 0;
					$dupli=0;
					$var = 0;
					$num = 0;
					$updateAccount = array();
					echo "<script> 
									document.getElementById('p').click();
									</script>";	


							if (isset($_POST['filter'])) {
								
								$_SESSION['rejected'] = FALSE;
								$_SESSION['approved'] = FALSE;
								
								$status = $_POST['emp'];
								if($status === "Approved"){
									echo "<script> 
									document.getElementById('a').click();
									</script>";	
									$num = 1;
								}
								elseif ($status === "Rejected") {
								echo "<script> 
									document.getElementById('r').click();
									</script>";	
									$num = 1;
								}
								elseif ($status === "Pending") {
								echo "<script> 
									document.getElementById('r').click();
									</script>";	
									$num = 0;
								}
								
								$queryS = "SELECT * FROM GenJournal WHERE StatusMessage = '$status' AND Status = '1'";
								$results = mysqli_query($cxn, $queryS) or die(mysqli_error($cxn));
								$num_results = mysqli_num_rows($results); 
					
				if ($num_results > 0 ){
										
					while($row = mysqli_fetch_assoc($results)){
					$t = $row['Entry'];
					$Stringb = 'transfileupload.php?Entry='.$t;	
					
					

					
				
					echo "<tr>";
					$date = $row['Date'];
					$newDate = date("M-d", strtotime($date));
					$check = $row['Message'];
                    if ($row['Action'] == "Debit") {
                        $dupli += $row['Amount'];
                    }else{
                        $dupli -= $row['Amount'];
                    }					

					if ($row['Entry'] != $entry) {
						echo "<td class='col-lg-1'><label>".$newDate."</label></td>";	
					}
						
					else {
						echo "<td class='col-lg-1'><label></label></td>";	
					}
					
					

					
					

					$String = 'inledger.php?AccountName='.$row['AccountName'];
					
					if ($row['Action'] === "Debit"){

						
						echo "<td class='col-lg-3'> <label><a href='$String' >".$row['AccountName']."</label></a></td>";
					}
					else {
						echo "<td class='col-lg-3' style='padding-left: 50px;'><label><a href='$String' >".$row['AccountName']."</label></a>";

                    if($dupli == '0'){
                        echo "<p>".$check."</p></td>";
                        $dupli = 0;
                    }
					}
					$entry = $row['Entry'];
					
			
					if ($ref != $row['Entry']) {
						echo "<td class='col-lg-2' style='padding-left: 90px;' ><label>".$row['Entry']."</label><br><a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a></td>";
						
						//Source
						//echo "<a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a>";
						
						
					}
					else {
						echo "<td class='col-lg-2'><label></label></td>";
					} 					
					

					if ($row['Action'] == "Debit") {
						echo "<td class='col-lg-1' style='padding-left: 50px;' align = 'right'><label>".$row['Amount']."</label></td>";
						echo "<td><label></label></td>";
						
						$name = $row['AccountName'];
					}
					else {
						echo "<td><label></label></td>";

						echo "<td class='col-lg-1' style='padding-right: 50px;' align='right'><label >".$row['Amount']."</label></td>";
					
					}
					if ($row['Entry'] != $ref) {
					if ($row['Status'] == 0) {
							
							echo "<td class='col-lg-1' style='padding-right:30px'><label>Pending</label></td>";

							$Stringa = 'approve.php?EntryName='.$row['Entry'];
					
							echo "<td>";
							echo	"<form method='post' class='form-inline' action='$Stringa'>";
								?>
							<div class="col-lg-3" style="white-space: nowrap;">
							<input type="submit" class='btn btn-success btn-sm' value='Approve' name='ok'<?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>

								disabled = "disabled"
								<?php
							}
							?> />
					
							<input type='submit' class='btn btn-danger btn-sm' value='Reject' name='no' style="" <?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>
								disabled = "disabled"
								<?php
							}
							?> />
						</div>
							</form>
							</td>


<?php

					}
					else {
						if ($row['StatusMessage'] =='Approved') {

						
						echo "<td class='col-lg-1'><label style='color:green;'>".$row['StatusMessage']."</label></td>";
						}
						elseif ($row['StatusMessage'] =='Rejected') {

						echo "<td class='col-lg-1'><label style='color:red;'>".$row['StatusMessage']."</label></td>";
						}
					}
					}
					$ref = $row['Entry'];
					$test++;	
					echo "</tr>";
				} // end while loop


}
	
	
}// end if isset
				elseif(isset($_POST['submitDate'])){
								
								
					
					$fromdate = $_POST['date-1'];
					

					
					$todate = $_POST['date-2'];
					
								
								
								
							$queryG = "SELECT * FROM GenJournal WHERE Date BETWEEN '$fromdate' and '$todate'";
								$results = mysqli_query($cxn, $queryG) or die(mysqli_error($cxn));
								$num_results = mysqli_num_rows($results); 
					
			if ($num_results > 0 ){
				
										
					while($row = mysqli_fetch_assoc($results)){
					$t = $row['Entry'];
					$Stringb = 'transfileupload.php?Entry='.$t;	
					
					echo "<tr>";
					$date = $row['Date'];
					$newDate = date("M-d", strtotime($date));
					$check = $row['Message'];
                    if ($row['Action'] == "Debit") {
                        $dupli += $row['Amount'];
                    }else{
                        $dupli -= $row['Amount'];
                    }					

					if ($row['Entry'] != $entry) {
						echo "<td class='col-lg-1'><label>".$newDate."</label></td>";	
					}
						
					else {
						echo "<td class='col-lg-1'><label></label></td>";	
					}
					
					

					
					

					$String = 'inledger.php?AccountName='.$row['AccountName'];
					
					if ($row['Action'] === "Debit"){

						
						echo "<td class='col-lg-4'> <label><a href='$String' >".$row['AccountName']."</label></a></td>";
					}
					else {
						echo "<td class='col-lg-3' style='padding-left: 50px;'><label><a href='$String' >".$row['AccountName']."</label></a>";

                    if($dupli == '0'){
                        echo "<p>".$check."</p></td>";
                        $dupli = 0;
                    }
					}
					$entry = $row['Entry'];
					
			
					if ($ref != $row['Entry']) {
						echo "<td class='' style='padding-left: 80px;' ><label>".$row['Entry']."</label><br><a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a></td>";
						
						//Source
						//echo "<a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a>";
						
						
					}
					else {
						echo "<td class='col-lg-1'><label></label></td>";
					} 					
					

					if ($row['Action'] == "Debit") {
						echo "<td class='col-lg-1' style='padding-left: 35px;' align = 'right'><label>".$row['Amount']."</label></td>";
						echo "<td><label></label></td>";

						
						$name = $row['AccountName'];
					}
					else {
						echo "<td><label></label></td>";

						echo "<td class='col-lg-1' style='' align='right'><label style='padding-left: 30px;'>".$row['Amount']."</label></td>";
					
					}
					if ($row['Entry'] != $ref) {
					if ($row['Status'] == 0) {
							
							echo "<td class='col-lg-1' style='padding-right:30px'><label>Pending</label></td>";

							$Stringa = 'approve.php?EntryName='.$row['Entry'];
					
							echo "<td>";
							echo	"<form method='post' class='form-inline' action='$Stringa'>";
								?>
							<div class="col-lg-3" style="white-space: nowrap;">
							<input type="submit" class='btn btn-success btn-sm' value='Approve' name='ok'<?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>

								disabled = "disabled"
								<?php
							}
							?> />
					
							<input type='submit' class='btn btn-danger btn-sm' value='Reject' name='no' style="" <?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>
								disabled = "disabled"
								<?php
							}
							?> />
						</div>
							</form>
							</td>


<?php

					}
					else {
						if ($row['StatusMessage'] =='Approved') {

						echo "<td class='col-lg-1'><label style='color:green;'>".$row['StatusMessage']."</label></td>";
						}
						elseif ($row['StatusMessage'] =='Rejected') {

						echo "<td class='col-lg-1'><label style='color:red;'>".$row['StatusMessage']."</label></td>";
						}
					}
					}
					$ref = $row['Entry'];
					$test++;	
					echo "</tr>";
				} // end while loop
	
	}
else{
	echo "<td ></td>";
	echo "<td >";
	echo "<font size = '5' color='red'><b>No Entry Found</b></font>";
	echo "</td>";
}


}

// Start pending
elseif (isset($_POST['emp']) != "Approved" && isset($_POST['emp']) != "Rejected") {
								$queryS = "SELECT * FROM GenJournal WHERE StatusMessage = 'Pending' AND Status = '0' ";
								$results = mysqli_query($cxn, $queryS) or die(mysqli_error($cxn));
								$num_results = mysqli_num_rows($results); 
					
			if ($num_results > 0 ){

					while($row = mysqli_fetch_assoc($results)){
					$t = $row['Entry'];
					$Stringb = 'transfileupload.php?Entry='.$t;	
					
					echo "<tr>";
					$date = $row['Date'];
					$newDate = date("M-d", strtotime($date));
					$check = $row['Message'];
                    if ($row['Action'] == "Debit") {
                        $dupli += $row['Amount'];
                    }else{
                        $dupli -= $row['Amount'];
                    }					

					if ($row['Entry'] != $entry) {
						echo "<td class='col-lg-2'><label>".$newDate."</label></td>";	
					}
						
					else {
						echo "<td class='col-lg-1'><label></label></td>";	
					}
					
					

					
					

					$String = 'inledger.php?AccountName='.$row['AccountName'];
					
					if ($row['Action'] === "Debit"){

						
						echo "<td class='col-lg-4'> <label><a href='$String' >".$row['AccountName']."</label></a></td>";
					}
					else {
						echo "<td class='col-lg-3' style='padding-left: 50px;' ><label><a href='$String'>".$row['AccountName']."</label></a>";

                    if($dupli == '0'){
                        echo "<p>".$check."</p></td>";
                        $dupli = 0;
                    }
					}
					$entry = $row['Entry'];
					
			
					if ($ref != $row['Entry']) {
						echo "<td class='col-lg-1' style='padding-left: 80px;'><label>".$row['Entry']."</label><br><a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a></td>";
						
						//Source
						//echo "<a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a>";
						
						
					}
					else {
						echo "<td class='col-lg-1'><label></label></td>";
					} 					
					

					if ($row['Action'] == "Debit") {
						echo "<td class='col-lg-1'   align = 'right'><label>".$row['Amount']."</label></td>";
						echo "<td class='col-lg-1' ><label></label></td>";

						
						$name = $row['AccountName'];
					}
					else {
						echo "<td class='col-lg-1'><label></label></td>";

						echo "<td class='col-lg-1' style='padding-left:50px;' align='right'><label >".$row['Amount']."</label></td>";
					
					}
					if ($row['Entry'] != $ref) {
					if ($row['Status'] == 0) {
							
							echo "<td class='col-lg-1' style='padding-left:27px'><label>Pending</label></td>";

							$Stringa = 'approve.php?EntryName='.$row['Entry'];
					
							echo "<td>";
							echo	"<form method='post' class='form-inline' action='$Stringa'>";
								?>
							<div class="col-lg-3" style="white-space: nowrap;">
							<input type="submit" class='btn btn-success btn-sm' value='Approve' name='ok'<?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>

								disabled = "disabled"
								<?php
							}
							?> />
					
							<input type='submit' class='btn btn-danger btn-sm' value='Reject' name='no' style="" <?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>
								disabled = "disabled"
								<?php
							}
							?> />
						</div>
							</form>
							</td>


<?php

					}
					else {
						if ($row['StatusMessage'] =='Approved') {
						echo "<td class='col-lg-1'><label style='color:green;'>".$row['StatusMessage']."</label></td>";
						}
						elseif ($row['StatusMessage'] =='Rejected') {
						echo "<td class='col-lg-1'><label style='color:red;'>".$row['StatusMessage']."</label></td>";
						}
					}
					}
					$ref = $row['Entry'];
					$test++;	
					echo "</tr>";
				} // end while loop
		
		}
}



				?>
					</tbody>
					</table>
					</div>
				<style>
					#journal{
						overflow: auto;
						overflow-y:scroll;
						height: 730px;
						/*margin-bottom:150px;*/
						
					}
					a{
						cursor:pointer;
					}
					.table a{
						/*color:blue;*/
					}
					td{
						font-size:larger;
					}
				</style>
                    </div>
            </div>
        </div>
        </div>
        </div>

            
        <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script> 
</body>
</html>