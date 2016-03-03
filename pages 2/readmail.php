<?php
include 'config_test.php';
include 'Config.php';
include 'session.php';
include 'Compose_Validation.php';


protect_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose - TMT Finance</title>

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
                            <!-- <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a> -->
                            
                                <li>
                                    <a href="compose.php"><i class="fa fa-pencil"></i> Compose</a>
                                </li>
                                <li class="active">
                                    <a href="inbox.php"><i class="fa fa-envelope"></i> Inbox <?php echo "(".unread_count().")"   ; ?> <span class="fa arrow"></span></a>
                                
                                </li>
                                <li>
                                    <a href="sent.php">Sent</a>
                                </li>
                           
                            <!-- /.nav-second-level -->
                        </li>
					
                   
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?php echo unread_count()   ; ?></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo unread_count()   ; ?> New Messages</li>
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
                            <li><a href="inbox.php">Go to Inbox<span class="badge"></span></a></li>
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
                    <div class="col-lg-12" align="center">
                    	
                    	
                    	<div class="panel panel-info" style="width:700px" align="center">
								<div class="panel-heading">
									<h3 class="panel-title" align="center"><i class="fa fa-envelope"></i><b> <?php echo "$login_session"; ?>'s Email</b></h3>
								</div>
								<br>
								
								<div class="row">
									<?php
									
									
									$mailid = $_GET['mail'];
									
									$querya = mysql_query("Select id, title, timestamp, user1, user2, message from pm where id = '$mailid' AND user2 = '$login_username'");
									$queryb = mysql_query("SELECT pm.id as id, pm.title as title, pm.user1 as user1, pm.user2 as user2, pm.message as message, 
									pm.timestamp as timestamp, fileupload.filename as filename from pm, fileupload where pm.id = '$mailid' AND pm.id = fileupload.mid");
									
									$data = mysql_num_rows($querya);
									if ($data == 1){
										mysql_query("Update pm set userread = '1' where id = '$mailid' AND user2 = '$login_username' ");
									//header("Location:http://localhost/startbootstrapV2/pages%202/readmail.php?mail=".$mailid);
									
									while ($row = mysql_fetch_array($querya))
										{
										$id = $row['id'];
										$u1 = $row['user1'];
										$u2 = $row['user2'];		
										$ti = $row['title'];
										$timestamp = $row['timestamp'];
										$mess = $row['message'];
									//	$src = $row['filename'];
										$newDate = date("M-d-y", strtotime($timestamp));
										$newTime = date("H:i:s", strtotime($timestamp));
										
									mysql_query("Update pm userread = '1'");
									echo "<table class='table' style='width: 680px'>";
									echo "<tr >";
									echo "<td class='col-lg-1' ><b>Subject:</b> $ti</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td class='col-sm-1' style='width:5%'><b>From:</b> <i class='fa fa-user'></i> $u1  </td>";
									echo "<td class='col-lg-1' >$newDate $newTime </td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td class='col-sm-1' style='width:5%'><b>To:</b> $u2  </td>";
									echo "</tr>";
									
									echo "<tr>";
									echo "<td class='col-lg-9'>$mess </td>";
									//echo "<td class='col-lg-1'><a href=".$target_path . basename($row['filename']) ."> {$row['filename']} </a></td>";
									//echo "<td class='col-lg-9'><a href=".$target_path . basename($row['filename']) ."> {$row['filename']} </a> </td>";
									echo "</tr>"; 
									 
									  	
										while($row = mysql_fetch_array($queryb)){			
										$src = $row['filename'];	
										
										$nospace = str_replace(" ","%20",$src);
										
										echo "<tr>";	
										if($src != '0'){
										echo "<td class='col-sm-2' align='center'><i class='fa fa-paperclip fa-lg'></i><a href=".$target_path . basename($nospace) ."> {$nospace} </a><br></td>";	
										}
										}
									
									 
								
									}
									}	// end of while loop
									
									echo "</tr>";
									echo "</table>";
									
								
									
									?>
									
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
