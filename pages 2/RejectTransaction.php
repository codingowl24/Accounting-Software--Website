<?php

include 'config_test.php';
include 'session.php';

protect_page();
?>



<?php
// if (isset($_POST['approve'])) {
	// $dupli ="";
	// echo "<h1>Help</h1>";
	// foreach ($_POST['entry'] as $key){
		// $query = "Update GenJournal Set Status ='1', StatusMessage='Approved' Where Entry ='$key'";
		// $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
		// // //Insert to Genledger All columns	
	// $querya ="SELECT * FROM GenJournal WHERE Entry = '$key'";
	// $resultsa = mysqli_query($cxn, $querya) or die(mysqli_error($cxn));
	// while ($row = mysqli_fetch_assoc($resultsa)) {
		// $name = $row['AccountName'];
		// //echo $row['AccountName'];
		// $amount = $row['Amount'];
		// if ($row['AccountName'] != $dupli) {
		// if ($row['Action'] == "Debit") {
			// $query = "INSERT INTO ".$name." (Debit)VALUES('$amount')";
			// $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
		// }
		// else {
			// $query = "INSERT INTO ".$name." (Credit)VALUES('$amount')";
			// $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
		// }
		// }
	// }
// 		
	// }
	// header("Location:http://localhost/TMT%20Finances/startbootstrapV2/pages%202/Journal.php");
// }
// 
// if (isset($_POST['reject']) && isset($_POST['entry'])) {
	// foreach ($_POST['entry'] as $key){
	// $query = "Update GenJournal Set Status ='2', StatusMessage='Rejected' Where Entry ='$key'";
	// $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
	// }
	// header("Location:http://localhost/TMT%20Finances/startbootstrapV2/pages%202/Journal.php");
// }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejected Transaction - TMT Finance</title>

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
                        <li><a href="Journal.php">Journal</a></li>
                    <li><a href="ledger.php">General Ledger</a></li>
                   
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
            	    
                    <div class="col-lg-12">	
                    	
                        <h1 class="page-header">Rejected Transaction</h1>






							
							<form name="myForm" action="" onsubmit="" method="get"> 
										<label>Search From</label> <label class="col-md-offset-1">To</label>
										 <div class='input-group date'  style="padding: 10px; width: 200px;">           			
					            		<input class="form-control"  id="Fromdate" name="Fromdate"  type="date" />
					            		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					            		</span>

					            		<input class="form-control"  id="Todate" name="Todate"  type="date" />
					            		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					            		</span>

					            		</div>
					            		<div>
					            		<input type="hidden" id="mydatetime" name="mydatetime"/>
										<input type="submit" class="btn btn-primary" name="submit" value="Search" />
										</div>
							</form>
							<?php 
							
							$queryG="";
							if(isset($_GET['Fromdate'])){
							$fromdate = $_GET['Fromdate'];
							$todate = $_GET['Todate'];
							// echo $fromdate;
							// echo $todate;
							if($fromdate!=null)
							{
							$queryG = "SELECT * FROM GenJournal WHERE Date BETWEEN '$fromdate' and '$todate' and StatusMessage='Rejected'";
							// echo $queryG;
							// $resultsG = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
							// while($row = mysqli_fetch_assoc($results)){
							// }
						}
							}




?>


                        <div class="" style="">
                        <label style="display: inline-block;">Some Company</label>

                        </div>
					
					<table class="table" >
					<thead>
					<tr>
					<td class='col-lg-2'>Date</th>
					<td class='col-lg-4' style='padding-right: 100px;'>Account Titles and Explanations</th>
					<td class='col-lg-2' >Ref</th>
					<td class='col-lg-1' style='padding-right: 100px;'>Debit</th>
					<td class='col-lg-1' style="padding-left: 50px;">Credit</th>
					<td class='col-lg-2'style="padding-left: 50px;">Status</th>
					
					</tr>
					</thead>
					</table>
					
					<div class='panel panel-default' id='journal' style=''>
					<table class="table">
					<tbody>
                    <?php
					$check="";
					$entry =0;
					$a =1;	
					$date="";
					date_default_timezone_set('UTC');
					$jDate = date('m/d/Y');
					$ref = 0;
					$action="";
					$name = "";
					$test = 0;
					$dupli=0;
					$updateAccount = array();
					// $queryZ = "SELECT * FROM ChartOfAccounts ORDER BY Type ASC";
					// $resultsZ = mysqli_query($cxn, $queryZ) or die(mysqli_error($cxn));

					$query = "SELECT * FROM GenJournal WHERE StatusMessage='Rejected' ORDER BY Entry ASC";

					if(!$queryG){
						$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
					}else{
						$results = mysqli_query($cxn, $queryG) or die(mysqli_error($cxn));
					}



					while($row = mysqli_fetch_assoc($results)){
						// $rowZ = mysqli_fetch_assoc($resultsZ);
						// if($rowZ['AccountName'] == $row['AccountName']){
// 							
						// }
					 echo "<tr>";
					$date = $row['Date'];
					$newDate = date("M-d", strtotime($date));
						$check = $row['Message'];
					if ($row['Entry'] != $entry) {
						echo "<td class='col-lg-2'><label>".$newDate."</label></td>";	
					}
						
					else {
						echo "<td class='col-lg-2'><label></label></td>";	
					}
					
					

					
					

					$String = 'inledger.php?AccountName='.$row['AccountName'];
					
					if ($row['Entry'] != $entry){

						
						echo "<td class='col-lg-2'> <label style='padding-left:20px;'><a href='$String' style='color:black'>".$row['AccountName']."</label></a></td>";
					}
					else {
						echo "<td class='col-lg-4' style='padding:0 60px 0 60px;'><label><a href='$String' style='color:black'>".$row['AccountName']."</label></a>";
							echo "<p>".$check."</p></td>";	
					}
					$entry = $row['Entry'];
					
			
					if ($ref != $row['Entry']) {
						echo "<td class=''><label style='padding-right:20px;'>".$row['Entry']."</label></td>";
					}
					else {
						echo "<td><label></label></td>";
					} 					
					

					if ($row['Action'] == "Debit") {
						echo "<td class='' style=''><label>".$row['Amount']."</label></td>";
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						
						$name = $row['AccountName'];
					}
					else {
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td class='col-lg-1' style=''><label style=''>".$row['Amount']."</label></td>";
					
					}
					if ($row['Entry'] != $ref) {
					if ($row['Status'] == 0) {
							
							echo "<td class=''><label>Pending</label></td>";

							$Stringa = 'approve.php?EntryName='.$row['Entry'];
					
							echo "<td>";
							echo	"<form method='post' class='form-inline' action='$Stringa'>";
								?>
							<div class="col-lg-4" style="white-space: nowrap;">
							<input type="submit" class='btn btn-success btn-sm' value='Approve' name='ok'<?php 
                            
                            if (is_user($login_id) === true)
							{
								?>

								disabled = "disabled"
								<?php
							}
							?> />
					
							<input type='submit' class='btn btn-danger btn-sm' value='Reject' name='no' style="" <?php 
                            
                            if (is_user($login_id) === true)
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
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td> class='col-lg-1'<label style='color:green;'>".$row['StatusMessage']."</label></td>";
						}
						elseif ($row['StatusMessage'] =='Rejected') {
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td class='col-lg-1'><label style='color:red;'>".$row['StatusMessage']."</label></td>";
						}
					}
					}
					$ref = $row['Entry'];
					$test++;	
					echo "</tr>";
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