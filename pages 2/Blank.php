<?php
include 'config_test.php';
include 'Config.php';
include 'session.php';

protect_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMT Finance</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link href="css/dashboard.css" rel="stylesheet">
    
    

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
                    <li><a href="dashboard.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <!-- <li><a href="#"><i class="fa fa-tasks"></i> Accounts</a></li> -->
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Balance Sheet</a>
                                </li>
                                <li>
                                    <a href="#">Income Statement</a>
                                </li>
                                <li>
                                    <a href="#">Owner's Equity Statement</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="transaction.php"><i class="fa fa-bar-chart-o fa-fw"></i> Transactions <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Journal.php">Journal</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <li class="active"><a href="#">General Ledger</a></li>
                    <li><a href="#">Adjust Accounts</a></li>
                    <li><a href="#">View Chart of Accounts</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">2 New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                      <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b><?php echo " $login_session";?></b><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php if(is_admin($login_id) === TRUE) {echo "admin.php";} if(is_manager($login_id) === TRUE){echo "manager.php";} if(is_user($login_id) === TRUE){echo "user_profile.php";} ?>"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="member.php"><i class="fa fa-gear"></i> Settings</a></li>
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
