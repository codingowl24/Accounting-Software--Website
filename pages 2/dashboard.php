<?php 
include 'session.php';
include 'config_test.php';
include 'Config.php';
include 'common.php';
$_SESSION['submission'] = False;
$_SESSION['count'] = 0;

$_SESSION['rejected'] = FALSE;
$_SESSION['approved'] = FALSE;

protect_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TMT Finance</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link href="css/dashboard.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>

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
                    <li class="active"><a href="dashboard.php"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard</a></li>
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
                        <li><a href="Journal.php" id="genjournal">Journal</a></li>
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

			<div id="page-wrapper">
				<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard <small>Dashboard Home</small></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Welcome to your personal dashboard!
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                            	<?php
									
									$query = "Select accountname, balance, type from chartofaccounts where accountname = 'cash' or accountname = 'accounts receivable' or accountname = 'notes payable'
											  or accountname = 'short term borrowings' or accountname = 'salaries payable' or accountname = 'accounts payable' or accountname = 'sales taxes payable'";
									$results = mysqli_query($cxn, $query);
									$totalassets = 0.00;
									$totalliabilities = 0.00;
									
									while($row = mysqli_fetch_assoc($results)){
										if ($row['type'] === 'Assets') {
											$totalassets += $row['balance']; 
										} 
										else if ($row['type'] === 'Liability') {
											$totalliabilities += $row['balance'];
										} 								
									}									
									if ($totalliabilities > 0.00) {
										$ratio = $totalassets / $totalliabilities;
										if ($ratio > 3.5) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 1.7 && $ratio <= 3.5) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";	
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";	
									}							
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Current Ratio</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                            	<?php
                            		$query = "Select accountname, balance, type from chartofaccounts where accountname = 'cash' or accountname = 'notes payable'
											  or accountname = 'short term borrowings' or accountname = 'salaries payable' or accountname = 'accounts payable' or accountname = 'sales taxes payable'";
									$results = mysqli_query($cxn, $query);
									$totalassets = 0.00;
									$totalliabilities = 0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'Assets') {
											$totalassets += $row['balance']; 
										} 
										else if ($row['type'] === 'Liability') {
											$totalliabilities += $row['balance'];
										} 								
									}
									if ($totalliabilities > 0.00) {
										$ratio = $totalassets / $totalliabilities;
										if ($ratio > 3.4) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 1.5 && $ratio <= 3.4) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";
									}																
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Cash Ratio</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                            	<?php
                            		$query = "Select accountname, balance, type from chartofaccounts where type= 'revenues' or type= 'expenses'";
									$results = mysqli_query($cxn, $query);
									$totalrevenues=0.00;
									$totalexpenses=0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'Revenues') {
											$totalrevenues += $row['balance']; 
										} 
										else if ($row['type'] === 'Expenses') {
											$totalexpenses += $row['balance'];
										} 								
									}		
									$netincome = $totalrevenues - $totalexpenses;
									if ($totalrevenues > 0.00) {
										$ratio = $netincome / $totalrevenues;
										if ($ratio > 0.6) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 0.4 && $ratio <= 0.6) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";	
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";	
									}																			
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Net Profit Margin</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                            	<?php
                            		$query = "Select accountname, balance, type from chartofaccounts where accountname = 'equipment' or accountname = 'machinery'
											  or accountname = 'buildings' or accountname = 'land' or accountname = 'supplies' or type = 'revenues'";
									$results = mysqli_query($cxn, $query);
									$totalassets = 0.00;
									$totalrevenues = 0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'Assets') {
											$totalassets += $row['balance']; 
										} 
										else if ($row['type'] === 'Revenues') {
											$totalrevenues += $row['balance'];
										} 								
									}
									if ($totalassets > 0.00) {
										$ratio = $totalrevenues / $totalassets;
										if ($ratio > 2.0) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 1.0 && $ratio <= 2.0) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";
									}																

                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Fixed Asset Turnover</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			 <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                            	<?php
                            		$query = "Select accountname, balance, type from chartofaccounts where type = 'assets' or type = 'liability'";
									$results = mysqli_query($cxn, $query);
									$totalassets = 0.00;
									$totalliabilities = 0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'Assets') {
											$totalassets += $row['balance']; 
										} 
										else if ($row['type'] === 'Liability') {
											$totalliabilities += $row['balance'];
										} 								
									}		
									if ($totalassets > 0.00) {
										$ratio = $totalliabilities / $totalassets;
										if ($ratio < 0.4) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 0.4 && $ratio <= 1.0) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);	
										echo "<p class='alerts-heading'>$ratio_format</p>";		
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                            			echo "<i class='fa fa-money fa-5x'></i>";
                        				echo "</div>";
                        				echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";
									}																						
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Debt Ratio</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                                 <?php
                            		$query = "Select accountname, balance, type from chartofaccounts where type = 'ownerequity' or type = 'liability'";
									$results = mysqli_query($cxn, $query);
									$totalequity = 0.00;
									$totalliabilities = 0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'OwnerEquity') {
											$totalequity += $row['balance']; 
										} 
										else if ($row['type'] === 'Liability') {
											$totalliabilities += $row['balance'];
										} 								
									}
									if ($totalequity > 0.00) {
										$ratio = $totalliabilities / $totalequity;
										if ($ratio < 0.4) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 0.4 && $ratio <= 1.0) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";
									}																	
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Debt-to-Equity Ratio</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                            	<?php
                            		$query = "Select accountname, balance, type from chartofaccounts where type = 'assets' or type= 'revenues' or type= 'expenses'";
									$results = mysqli_query($cxn, $query);
									$totalassets = 0.00;
									$totalrevenues=0.00;
									$totalexpenses=0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'Assets') {
											$totalassets += $row['balance']; 
										} 
										else if ($row['type'] === 'Revenues') {
											$totalrevenues += $row['balance'];
										} 		
										else if ($row['type'] === 'Expenses') {
											$totalexpenses += $row['balance'];
										}						
									}			
									$netincome = $totalrevenues - $totalexpenses;	
									if ($totalassets > 0.00) {
										$ratio = $netincome / $totalassets;
										if ($ratio > 1.4) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 0.9 && $ratio <= 1.4) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";	
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";	
									}																			
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Return on Assets</p>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-3">
                    <div class="panel panel-default">
                            	<?php
                            		$query = "Select accountname, balance, type, normalside from chartofaccounts where type = 'ownerequity' or type= 'revenues' or type= 'expenses'";
									$results = mysqli_query($cxn, $query);
									$totalrevenues=0.00;
									$totalexpenses=0.00;
									$totalequityr=0.00;
									$totalequityl=0.00;
									
									while($row = mysqli_fetch_assoc($results)) {
										if ($row['type'] === 'Revenues') {
											$totalrevenues += $row['balance']; 
										} 
										else if ($row['type'] === 'Expenses') {
											$totalexpenses += $row['balance'];
										} 		
										else if ($row['type'] === 'OwnerEquity' && $row['normalside'] === 'R') {
											$totalequityr += $row['balance'];
										}
										else if ($row['type'] === 'OwnerEquity' && $row['normalside'] === 'L') {
											$totalequityl += $row['balance'];
										}						
									}		
									$netincome = $totalrevenues - $totalexpenses;
									$totalequity = $totalequityr - $totalequityl;
									if ($totalequity > 0.00) {
										$ratio = $netincome / $totalequity;
										if ($ratio > 1.4) {
											echo "<div class='panel-body alert-info' style='background-color: #B2D9B2; color: green;'>";	
										} else if ($ratio >= 0.9 && $ratio <= 1.4) {
											echo "<div class='panel-body alert-info' style='background-color: #FFFFCC; color: #E6E600;'>";
										} else {
											echo "<div class='panel-body alert-info' style='background-color: #FF9999; color: red;'>";
										}
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										$ratio_format = number_format($ratio, 2);
										echo "<p class='alerts-heading'>$ratio_format</p>";	
									} else {
										echo "<div class='panel-body alert-info'>";	
										echo "<div class='col-xs-5'>";
                                		echo "<i class='fa fa-money fa-5x'></i>";
                            			echo "</div>";
                            			echo "<div class='col-xs-5 text-right'>";
										echo "<p class='alerts-heading'>0.00</p>";	
									}																			
                        		?>
                                <p class="alerts-text" align="left" style="width: 200%;">Return on Equity</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Current Unread Messages </h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            
                            $querya = mysql_query("Select id, title, timestamp, user1, user2, message, userread from pm where user2 = '$login_username' and userread='0' order by timestamp desc");
                            
                            while ($row = mysql_fetch_array($querya))
										{	
										$mailid = $row['id'];
										$u1 = $row['user1'];
										$u2 = $row['user2'];		
										$ti = $row['title'];
										$timestamp = $row['timestamp'];
										$mess = $row['message'];
										$read = $row['userread'];
										
										$newDate = date("M-d-y", strtotime($timestamp));
										$newTime = date("H:i:s", strtotime($timestamp));
										
										$StringURL = "readmail.php?mail=".$row['id'];
										
									echo "<table class='table' style='width: 680px' >";
									echo "<tr>";
									echo "<td class='col-lg-1' >
									</td> ";							
									echo "<td class='col-lg-3' ><i class='fa fa-user'></i> $u1 </td>";
									if($read == 0){
									echo "<td class='col-lg-3' ><a href='$StringURL' onclick='openRequestedPopup();'><label>$ti</label> </a></td>";
									}
									else{
									echo "<td class='col-lg-3' ><a href='$StringURL' onclick='openRequestedPopup();'>$ti </a></td>";
									}	
								//	echo "<td class='col-lg-1'>$lname </td>";
									echo "<td class='col-lg-3' align:left' >$newDate $newTime </td>";
									
									 echo "</tr>";
									 echo "</table>";
								
									}
                            
                            
                            
                            
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Logins per week</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Sales Data</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">
    <?php $h = 30; ?>
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 143, 132, 274, 223, 143, 156, 223, 223],
                budget = [23, 19, 11, 34, 42, 52, 35, 22, 37, 45, 55, 57],
                sales = [11, 9, 31, 34, 42, 52, 35, 22, 37, 45, 55, 57],
                targets = [<?php echo $h; ?>, 19, 5, 4, 62, 62, 75, 12, 47, 55, 65, 67],
                avrg = [117, 119, 95, 114, 162, 162, 175, 112, 147, 155, 265, 167];

            $("#shieldui-chart1").shieldChart({
                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                primaryHeader: {
                    text: "Login Data"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [
                    {
                        seriesType: "polarbar",
                        collectionAlias: "Logins",
                        data: visits
                    },
                    {
                        seriesType: "polarbar",
                        collectionAlias: "Avg Visit Duration",
                        data: avrg
                    }
                ]
            });

            $("#shieldui-chart3").shieldChart({
                primaryHeader: {
                    text: "Sales Data"
                },
                dataSeries: [
                    {
                        seriesType: "bar",
                        collectionAlias: "Budget",
                        data: budget
                    },
                    {
                        seriesType: "bar",
                        collectionAlias: "Sales",
                        data: sales
                    },
                    {
                        seriesType: "spline",
                        collectionAlias: "Targets",
                        data: targets
                    }
                ]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: gridData
                },
                sorting: {
                    multiple: true
                },
                paging: {
                    pageSize: 7,
                    pageLinksCount: 4
                },
                selection: {
                    type: "row",
                    multiple: true,
                    toggle: false
                },
                columns: [
                    { field: "id", width: "70px", title: "ID" },
                    { field: "name", title: "Person Name" },
                    { field: "company", title: "Company Name" },
                    { field: "email", title: "Email Address", width: "270px" }
                ]
            });
        });
    </script>
    

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
    
</body>
</html>
