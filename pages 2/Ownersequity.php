<?php
include 'config_test.php';
include 'Config.php';
include 'common.php';

include "session.php";
protect_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner’s Equity Statement - TMT Finance</title>

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
                                <li class="active">
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

               <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" align="center">
                    	
                    	
                    	<div class="panel panel-info" style="width:700px" align="center">
								<div class="panel-heading">
									<h3 class="panel-title" align="center">TMT-FINANCES</h3>
									<h2 class="panel-title" align="center">Owner’s Equity Statement</h2>
									<h2 class="panel-title" align="center"><?php  echo date('F d, Y');?></h2>
                                    <h2 class="panel-title" align="center"><label></label></h2>
								</div>
								<div class="row" align="center">
									
									<style>
										.tbl{
											margin: 0 auto;
											width: 600px;
											border-spacing: 10px;
										}
									</style>

									
									
									<table class="tbl">
										<thead>
										<td width="45%"></td>
										<td class='col-lg-1' align="center"><b></b></td>
										<td class='col-lg-1' align="center"><b></b></td>

										</thead>
										
										<tbody>
											<?php

                                                $querya ="SELECT * FROM chartofaccounts WHERE AccountName= 'Capital'";
                                                $resultsa = mysqli_query($cxn, $querya) or die(mysqli_error($cxn));
                                                $rowA=mysqli_fetch_assoc($resultsa);
												echo "<td class='col-lg-1'>Owner's Capital</td>";
												echo "<td class='col-lg-1'><label></label></td>";

                                                $name = $rowA['AccountName'];
                                                $b = getAccountBalance($name);
                                                $bb=number_format($b,2);

												echo "<td class='col-lg-1' align='right'>$ $bb</td>";
                                                $total1 = $b;
												echo "<tr></tr>";


										
										
                                                $queryb ="SELECT * FROM chartofaccounts WHERE AccountName= 'Investments'";
                                                $resultsb = mysqli_query($cxn, $queryb) or die(mysqli_error($cxn));
                                                $rowB=mysqli_fetch_assoc($resultsb);



										echo "<td class='col-lg-1' >Add: Investments</td>";

                                        $namea = $rowB['AccountName'];
                                        $a2 = getAccountBalance($namea);
                                        $a = -$a2;
                                        $aa=number_format($a,2);



                                        echo "<td class='col-lg-2' align='right'><label></label>$ $aa</td>";
                                        $total2 = $a;
                                        echo "<td class='col-lg-1'><label></label></td>";
                                        echo "<tr></tr>";


			
                                        echo "<td class='col-lg-1' style='padding-left:45px;'>Net Income</td>";
                                        $querya ="SELECT * FROM chartofaccounts WHERE Type= 'Revenues'";
                                        $resultsa = mysqli_query($cxn, $querya) or die(mysqli_error($cxn));
                                        $totalrevenues=0.00;

                                        while ($rowA=mysqli_fetch_assoc($resultsa)){
                                            if($rowA['Balance']!='0.00'){
                                                $name = $rowA['AccountName'];
                                                $b3 = getAccountBalance($name);
                                                $b = -$b3;
                                                $totalrevenues+= $b;
                                            }
                                         }
                                        $queryb ="SELECT * FROM chartofaccounts WHERE Type= 'Expenses'";
                                        $resultsb = mysqli_query($cxn, $queryb) or die(mysqli_error($cxn));
                                        $totalexpenses=0.00;
                                        while ($rowB=mysqli_fetch_assoc($resultsb)){
                                            if($rowB['Balance']!='0.00'){
                                                $name = $rowB['AccountName'];
                                                $b = getAccountBalance($name);
                                                $totalexpenses+=$b;
                                            }
                                        }
                                        $netincome3 = $totalrevenues-$totalexpenses;
                                        $netincome = $netincome3;
                                        $totaln=number_format($netincome,2);
                                        echo "<td class='col-lg-1' style='border-bottom:1px solid' align='right'><label></label> $totaln</td>";

















                                        $totalp=$netincome+$total1+$total2;


                                        $totalpp=number_format($totalp,2);
                                        echo "<td class='col-lg-1' style='border-bottom:1px solid' align='right'> $totalpp</td>";
                                        echo "<tr></tr>";


                                        echo "<td class='col-lg-1'></td>";
                                        echo "<td class='col-lg-1'><label></label></td>";
                                        echo "<td class='col-lg-1' align='right'> $totalpp</td>";
                                        echo "<tr></tr>";



                                            $queryc ="SELECT * FROM chartofaccounts WHERE AccountName= 'Drawings'";
                                            $resultsc = mysqli_query($cxn, $queryc) or die(mysqli_error($cxn));
                                            $rowC=mysqli_fetch_assoc($resultsc);
										

											echo "<td class='col-lg-1' >Less: Drawing</td>";
											 echo "<td class='col-lg-1'><label></label></td>";
											echo "<td class='col-lg-1' style='border-bottom:1px solid' align='right'><label></label>".$rowC['Balance']."</td>";
                                            $total4=$rowC['Balance'];
											echo "<td class='col-lg-1'><label></label></td>";
											echo "<tr></tr>";

										echo "<td class='col-lg-1' >Owner's Capital</td>";
										echo "<td class='col-lg-1'><label></label></td>";

                                        $totalppp= $totalp - $total4;
                                         $totalp1=number_format($totalppp,2);
										echo "<td class='col-lg-2' style='border-bottom:double' align='right'>$ $totalp1</td>";
									




											?>
										</tbody>
										
									</table>
									
									
								</div>
						</div>
                    	
                    	
                   	</div>
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
