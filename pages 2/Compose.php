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
	
<script type="text/javascript">
		function makeFileList() {
			var input = document.getElementById("fileup");
			var ul = document.getElementById("fileList");
			while (ul.hasChildNodes()) {
				ul.removeChild(ul.firstChild);
			}
			for (var i = 0; i < input.files.length; i++) {
				var li = document.createElement("li");
				li.innerHTML = input.files[i].name;
				ul.appendChild(li);
			}
			if(!ul.hasChildNodes()) {
				var li = document.createElement("li");
				li.innerHTML = 'No Files Selected';
				ul.appendChild(li);
			}
		}
</script>	
	
	
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
                            
                                <li class="active">
                                    <a href="compose.php"><i class="fa fa-pencil"></i> Compose</a>
                                </li>
                                <li>
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
									<h3 class="panel-title" align="center"><i class="fa fa-pencil"></i> <b> Compose</b></h3>
								</div>
								<br>
								
								<div class="row">
									 <form role="form" action="Compose.php" method='POST' enctype="multipart/form-data">
                            			<fieldset>
                            		<div>
										<input list="uname" placeholder="Recipient" name="recipient" type="text" size="68"  ><br>
										<span class="error"><font color="red"><b><?php echo $recError;?></b></font></span>
										<datalist id="uname">
											
											<?php
												$query = "Select firstname, lastname, username from users";
												$result = mysqli_query($cxn, $query);
												
												
												
											while ($row = mysqli_fetch_assoc($result))
											{
												echo "<option value='".$row['username']."'>".$row['firstname']." ".$row['lastname']." </option>";
											}
												
											
											?>
											
											
											
											
											
										</datalist>
										
									</div>		
                            				
                            		<br>		
                            				
									<div>
										<input placeholder="Subject..." name="title" type="text" size="68"><br>
										<span class="error"><font color="red"><b><?php echo $subError;?></b></font></span>
									</div>
									
									<br>
									
									<div>
										 
										<textarea cols="70" rows="10" placeholder="Message..." id="message" name="message"></textarea><br>
										<span class="error"><font color="red"><b><?php echo $errorMessage;?></b></font></span>
									</div>
									
									<div>
										<input type="file" name="file[]" id="fileup" multiple="multiple" onchange="makeFileList();">
										<br>
										<label id="fileList"></label>
										<br>
										
										<input type="submit" name="send" value="Send" class="btn btn-sm btn-primary" style="width:15%">
										<input type="submit" name="cancel" value="Reset" class="btn btn-danger btn-sm" style="width:15%">
										<br />
										<span class="error"><font color="green"><b><?php echo $successMessage;?></b></font></span>
                                		
									</div>
									<br>
									</fieldset>
									</form>
									
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
