<?php
include 'config_test.php';
 include 'common.php';
 include 'session.php';
 
 protect_page();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart of Accounts - TMT Finance</title>

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
        	<div class="row">
                <div class="col-lg-12">
                	<h1>Chart of Accounts </h1>
                    <div class="panel panel-info">
                        <div class="panel-heading">                            
                            <!-- <div class="row show-grid"> -->
                            	<ul class="nav nav-tabs">
								  <li role="presentation"><a href="chart_of_accounts.php">All Accounts</a></li>
								  <li role="presentation"><a href="chart_of_accounts_assets.php">Assets</a></li>
								  <li role="presentation"><a href="chart_of_accounts_liabilities.php">Liabilities</a></li>
								  <li role="presentation" class="active"><a href="#">Equity</a></li>
								  <li role="presentation"><a href="chart_of_accounts_expense.php">Expenses</a></li>
								</ul>                              
                            <!-- </div> -->
                        </div>                        
                    </div>                   
                </div>
                <table class="table table-hover">			   
			   <thead>
			   	<tr>
			   		<th class = "col-lg-1"><a href="#">Liquidity <span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a></th>
			   		<th class = "col-lg-1">Name of Account</th>
                    <th class = "col-lg-5">Description</th>
			   		<th class = "col-lg-2">Group</th>
			   		<th class = "col-lg-2">Balance</th>
			   	</tr>
			   	
			   	<tr>
			   		
			   	</tr>
			   </thead>
			   <tbody>
			   	
			   	<tbody>			
			   	   	
			   	   		 <?php 
			   	   		  $query = "SELECT * FROM chartofaccounts WHERE Type='OwnerEquity' ORDER BY Liquidity"; 
						  $results = mysqli_query($cxn, $query);			  
						  while ($row = mysqli_fetch_assoc($results))
						  {
						  $String = 'inledger.php?AccountName='.$row['AccountName'];
						  $balance = getPeriodAmount($row['AccountName']);						  	
						  echo"<tr>";
						  echo"<td class = 'col-lg-1'> ".$row['Liquidity']." </td>";
						  echo"<td class = 'col-lg-3'><abbr title='Click on account to view and keep track of changes in balances'><a href='$String'>".$row['AccountName']."</a></abbr></td>";	
						  echo"<td class = 'col-lg-2'> ".$row['Description']." </td>";
                          echo"<td class = 'col-lg-2'> ".$row['Group']." </td>";
						  echo"<td class = 'col-lg-2' align='right'>  $balance</td>";	

						  echo"</tr>";
						  }			
						  
			   	   		 ?>
			   	   	

			    </tbody>
			   	
			   
			   
			   <!-- <tbody>
			   	
			   		   			   	
			   <tr><th scope="row" span title="Account number identification in general ledger">301</th><td><abbr title='Click on account to view and keep track of changes in balances'><a href="inledger.php">Charitable Contributions</a></abbr><br></br><span style="color:#868686;">Funds contributed to the company</span></td><td>Equity</td><td>Equity</td>
			   	<?php
			   			$query = "SELECT * FROM chartofaccounts WHERE AccountName='Charitable Contributions'"; 
						  $results = mysqli_query($cxn, $query);			  
						  while ($row = mysqli_fetch_assoc($results))
						  {
						  $balance = getAccountBalance($row['AccountName']);
						  echo"<td> $balance </td>";				  
						  echo"</tr>";
						  }	
						  ?>
			   			</td></tr></span>
			   			
			   	<tr><th scope="row" span title="Account number identification in general ledger">305</th><td><abbr title='Click on account to view and keep track of changes in balances'><a href="inledger.php">Capital</a></abbr><br></br><span style="color:#868686;">Investment in company by its owner</span></td><td>Owner's Equity</td><td>Equity</td>
			   	<?php
			   			$query = "SELECT * FROM chartofaccounts WHERE AccountName='Capital'"; 
						  $results = mysqli_query($cxn, $query);			  
						  while ($row = mysqli_fetch_assoc($results))
						  {
						  $balance = getAccountBalance($row['AccountName']);
						  echo"<td> $balance </td>";				  
						  echo"</tr>";
						  }	
						  ?>
			   			</td></tr></span>	
			   		
			   	</tr></span>
			   	
			   	</tbody> -->
			</table>			   
            </div>
        </div>
    
</body>
</html>
