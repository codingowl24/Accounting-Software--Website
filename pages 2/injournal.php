<?php
include 'config_test.php';
include 'session.php';

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
//     <script>
// function goBack() {
//     window.history.go(-1);
// }
// </script>
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
                    <div class="col-lg-12">
                    <div style="float: right; padding-right: 10px; padding-top: 10px;">
            			<label>Today's Date:</label>
            		<label><?php  echo date('m/d/Y');?></label>
            		</div>
                    <input type = 'image' src = 'images/arrow2.png' name = 'image' width = '50' height = '50' onclick='history.go(-1)'>
                       <?php  echo "<h1 class='page-header'>Journal Number:  ".$_GET["JournalRef"]."</h1>"; 

                       ?>

                        <div class="panel panel-default">
	            			<div class="">
	            				
	            				<?php
	            					echo "<h3 style='text-align: center;'>General Journal";
                                    echo "</h3>";
                                    echo "<h4  style='text-align: right;'>J".$_GET["JournalRef"]."</h4>";
	            					$journalref=$_GET["JournalRef"];
									echo "<table class='table table-bordered table-hover'>";
									echo "<thead>";
									echo "<tr>";
                                    echo "<th class='col-sm-2'>Date</th>";
									echo "<th class='col-sm-2'>AccountName</th>";

									echo "<th class='col-sm-2'>Debit</th>";
									echo "<th class='col-sm-2'>Credit</th>";
                                    echo "</tr>";	
									echo "</thead>";
                                    echo "<tbody>";
									echo "<tr>";
                                    $querya ="SELECT * FROM GenJournal WHERE JCode= '$journalref' and StatusMessage = 'Approved' ";
									$resultsa = mysqli_query($cxn, $querya) or die(mysqli_error($cxn));
                                    $dupli = 0;

    								while ($rowA=mysqli_fetch_assoc($resultsa)){
                                        $ref = 0;
                                        $check = $rowA['Message'];
                                        



                                        if ($rowA['Action'] == "Debit") {
                                            $dupli += $rowA['Amount'];
                                        }else{
                                            $dupli -= $rowA['Amount'];
                                        }

                                        if ($rowA['Action'] =='Debit' ){
                                            echo "<td class='col-lg-2'> <label style='padding-left:20px;'>".$rowA['Date']."</label></td>";
                                        } else {
                                            echo "<td class='col-lg-2' style='padding:0 60px 0 60px;'><label></label>";
                                            echo "</td>";  
                                        }

                                        if ($rowA['Action'] =='Debit' ){
                                            echo "<td class='col-lg-2'> <label style='padding-left:20px;'>".$rowA['AccountName']."</label></td>";
                                        }else {

                                            echo "<td class='col-lg-2' style='padding:0 60px 0 60px;'><label>".$rowA['AccountName']."</label>";
                                            if($dupli == '0'){
                                             echo "<p>".$check."</p></td>";
                                            $dupli = 0;
                                            }  
                                        }
                                                


                                            if ($rowA['Action'] == "Debit") {
                                                echo "<td class='' style=''><label>".$rowA['Amount']."</label></td>";
                                                echo "<td><label></label></td>";

                        
                                                $name = $rowA['AccountName'];
                                                }
                                            else {

                                            echo "<td><label></label></td>";
                                            echo "<td class='col-lg-1' style=''><label style=''>".$rowA['Amount']."</label></td>";
                    
                                            }
											echo "</tr>";
											
									// }
								// }																							
						}
                                            echo "</tbody>";
                                            echo "</table>";
	            	?>
	
	            			</div>

	            	<style>
                    #inledger{
                        
                    }
                    a{
                        cursor:pointer;
                    }
                    .table a{
                        /*color:blue;*/
                    }
                    td{
                        font-size:larger;
                        border:none;
                    }
                    tr{
                        border-top:none;
                    }
                    .table-bordered tr{
                        border-top:none;
                    }

                    




                </style>
                       
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
