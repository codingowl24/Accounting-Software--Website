<?php
include 'config_test.php';
include 'session.php';
include 'common.php';

protect_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Ledger - TMT Finance</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="../dist/css/hint.css" rel="stylesheet">
    

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <!-- <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="../bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js"></script> 
     <script type="text/javascript" src="../dist/js/sb-admin-2.js"></script>		     
	<link rel="stylesheet" href="../bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css" type="text/css"/>
	

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->

    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script> 		     
	<link rel="stylesheet" href="../datepicker/css/datepicker.css" type="text/css"/>
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
                    <li class="active"><a href="ledger.php">General Ledger</a></li>
                   
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

               <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div style="float: right; padding-right: 10px; padding-top: 10px;">
            			<label>Today's Date:</label>
            		<label><?php  echo date('m/d/Y');?></label>
            		</div>
                        <h1 class="page-header">Ledger</h1>
          
                        <div class="panel panel-default">
	            			<div class="Assets">
	            				<h3 style="text-align: center;">Assets</h3>
	            				<?php
	            				$debit = 0.00;
								$credit = 0.00;
								$duplicate = 0.00;
	            					$query="SELECT * FROM GenLedger Where Type = 'Assets'";
									$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
									while ($row = mysqli_fetch_assoc($results)) {
										
										if ($row['Type'] == "Assets") {
											echo "<div>";
											echo "<label>".$row['AccountName']."</label>";
											if ($row['AccountName'] == $row['AccountName']) {
											echo "<table class='table'>";
											echo "<thead>";
											echo "<tr>";
											echo "<th class='col-sm-2'>Date</th>";
											echo "<th class='col-sm-2'>Explanation</th>";
											echo "<th class='col-sm-2'>Ref</th>";
											echo "<th class='col-sm-2'>Debit</th>";
											echo "<th class='col-sm-2'>Credit</th>";
											echo "<th class='col-sm-2'>Balance</th>";
											echo "</tr>";	
											echo "</thead>";
											echo "<tbody>";
											echo "<tr>";
											echo "<td class='col-sm-2'>".$row['Date']."</td>";
											echo "<td class='col-sm-2'>".$row['Explanation']."</td>";
											echo "<td class='col-sm-2'>".$row['Ref']."</td>";
											if ($row['Debit']) {
												echo "<td class='col-sm-2'>".$row['Debit']."</td>";
												echo "<td><label></label></td>";
											}
											else {
												echo "<td></td>";
												echo "<td class='col-sm-2'>".$row['Credit']."</td>";
												
											}
												echo "<td class='col-sm-2'>".$row['Balance']."</td>";
									
											
											
									}
								
											echo "</tr>";
											echo "</tbody>";
											echo "</table>";
											echo "</div>";			
							
							}
						}
	            	?>
	
	            			</div>
	            			
	            			<div class="Liablity">
	            				<h3 style="text-align: center;">Liability</h3>
	            				<?php
	            					$query="SELECT * FROM GenLedger Where Type='Liability'";
									$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
									while ($row = mysqli_fetch_assoc($results)) {
										
										if ($row['Type'] == "Liability") {
								echo "<div>";
											echo "<label>".$row['AccountName']."</label>";
											if ($row['AccountName'] == $row['AccountName']) {
											echo "<table class='table'>";
											echo "<thead>";
											echo "<tr>";
											echo "<th class='col-sm-2'>Date</th>";
											echo "<th class='col-sm-2'>Explanation</th>";
											echo "<th class='col-sm-2'>Ref</th>";
											echo "<th class='col-sm-2'>Debit</th>";
											echo "<th class='col-sm-2'>Credit</th>";
											echo "<th class='col-sm-2'>Balance</th>";
											echo "</tr>";	
											echo "</thead>";
											echo "<tbody>";
											echo "<tr>";
											echo "<td class='col-sm-2'>".$row['Date']."</td>";
											echo "<td class='col-sm-2'>".$row['Explanation']."</td>";
											echo "<td class='col-sm-2'>".$row['Ref']."</td>";
											if ($row['Debit']) {
												echo "<td class='col-sm-2'>".$row['Debit']."</td>";
												echo "<td><label></label></td>";
											}
											else {
												echo "<td></td>";
												echo "<td class='col-sm-2'>".$row['Credit']."</td>";
												
											}
												echo "<td class='col-sm-2'>".$row['Balance']."</td>";
									
											
											
									}
								
											echo "</tr>";
											echo "</tbody>";
											echo "</table>";
											echo "</div>";		
							}
						}
	            				?>
	
	            			</div>
	            			<div class="Owner_Equity">
	            				<h3 style="text-align: center;">Owner Equity</h3>
	            				<?php
	            					$query="SELECT * FROM GenLedger Where Type='Owner Equity'";
									$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
																		while ($row = mysqli_fetch_assoc($results)) {
										
										if ($row['Type'] == "Owner Equity") {
								echo "<div>";
											echo "<label>".$row['AccountName']."</label>";
											if ($row['AccountName'] == $row['AccountName']) {
											echo "<table class='table'>";
											echo "<thead>";
											echo "<tr>";
											echo "<th class='col-sm-2'>Date</th>";
											echo "<th class='col-sm-2'>Explanation</th>";
											echo "<th class='col-sm-2'>Ref</th>";
											echo "<th class='col-sm-2'>Debit</th>";
											echo "<th class='col-sm-2'>Credit</th>";
											echo "<th class='col-sm-2'>Balance</th>";
											echo "</tr>";	
											echo "</thead>";
											echo "<tbody>";
											echo "<tr>";
											echo "<td class='col-sm-2'>".$row['Date']."</td>";
											echo "<td class='col-sm-2'>".$row['Explanation']."</td>";
											echo "<td class='col-sm-2'>".$row['Ref']."</td>";
											if ($row['Debit']) {
												echo "<td class='col-sm-2'>".$row['Debit']."</td>";
												echo "<td><label></label></td>";
											}
											else {
												echo "<td></td>";
												echo "<td class='col-sm-2'>".$row['Credit']."</td>";
												
											}
												echo "<td class='col-sm-2'>".$row['Balance']."</td>";
									
											
											
									}
								
											echo "</tr>";
											echo "</tbody>";
											echo "</table>";
											echo "</div>";		
							}
						}
	            				?>
	
	            			</div>
	            			<div class="Expenses">
	            				<h3 style="text-align: center;">Expenses</h3>
	            				<?php
	            					$query="SELECT * FROM GenLedger Where Type='Expenses'";
									$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
										while ($row = mysqli_fetch_assoc($results)) {
										
										if ($row['Type'] == "Expenses") {
								echo "<div>";
											echo "<label>".$row['AccountName']."</label>";
											if ($row['AccountName'] == $row['AccountName']) {
											echo "<table class='table'>";
											echo "<thead>";
											echo "<tr>";
											echo "<th class='col-sm-2'>Date</th>";
											echo "<th class='col-sm-2'>Explanation</th>";
											echo "<th class='col-sm-2'>Ref</th>";
											echo "<th class='col-sm-2'>Debit</th>";
											echo "<th class='col-sm-2'>Credit</th>";
											echo "<th class='col-sm-2'>Balance</th>";
											echo "</tr>";	
											echo "</thead>";
											echo "<tbody>";
											echo "<tr>";
											echo "<td class='col-sm-2'>".$row['Date']."</td>";
											echo "<td class='col-sm-2'>".$row['Explanation']."</td>";
											echo "<td class='col-sm-2'>".$row['Ref']."</td>";
											if ($row['Debit']) {
												echo "<td class='col-sm-2'>".$row['Debit']."</td>";
												echo "<td><label></label></td>";
											}
											else {
												echo "<td></td>";
												echo "<td class='col-sm-2'>".$row['Credit']."</td>";
												
											}
												echo "<td class='col-sm-2'>".$row['Balance']."</td>";
									
											
											
									}
								
											echo "</tr>";
											echo "</tbody>";
											echo "</table>";
											echo "</div>";			
							}
						}
	            				?>
	
	            			</div>
	            			<div class="Revenues">
	            				<h3 style="text-align: center;">Revenues</h3>
	            				<?php
	            					$query="SELECT * FROM GenLedger Where Type='Revenues'";
									$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
																			while ($row = mysqli_fetch_assoc($results)) {
										
										if ($row['Type'] == "Revenues") {
								echo "<div>";
											echo "<label>".$row['AccountName']."</label>";
											if ($row['AccountName'] == $row['AccountName']) {
											echo "<table class='table'>";
											echo "<thead>";
											echo "<tr>";
											echo "<th class='col-sm-2'>Date</th>";
											echo "<th class='col-sm-2'>Explanation</th>";
											echo "<th class='col-sm-2'>Ref</th>";
											echo "<th class='col-sm-2'>Debit</th>";
											echo "<th class='col-sm-2'>Credit</th>";
											echo "<th class='col-sm-2'>Balance</th>";
											echo "</tr>";	
											echo "</thead>";
											echo "<tbody>";
											echo "<tr>";
											echo "<td class='col-sm-2'>".$row['Date']."</td>";
											echo "<td class='col-sm-2'>".$row['Explanation']."</td>";
											echo "<td class='col-sm-2'>".$row['Ref']."</td>";
											if ($row['Debit']) {
												echo "<td class='col-sm-2'>".$row['Debit']."</td>";
												echo "<td><label></label></td>";
											}
											else {
												echo "<td></td>";
												echo "<td class='col-sm-2'>".$row['Credit']."</td>";
												
											}
												echo "<td class='col-sm-2'>".$row['Balance']."</td>";
									
											
											
									}
								
											echo "</tr>";
											echo "</tbody>";
											echo "</table>";
											echo "</div>";			
							}
						}
	            				?>
	
	            			</div>
	            		</div>
                       
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        
            <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

            
    
</body>
</html>
