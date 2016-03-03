<?php
include 'config_test.php';
include 'Config.php';
include 'session.php';
include 'Activate.php';


manager_protect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager - TMT Finance</title>

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
    
    <script>


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
                    <!-- <li class="active"><a href="#">General Ledger</a></li> -->
                    <li><a href="#">Adjust Accounts</a></li>
                    <li><a href="#">View Chart of Accounts</a></li>
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
                        </ul>                    </li>
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
                    	
                    	<div class="panel panel-info" style="width:950px" align="center">
								<div class="panel-heading">
									<h3 class="panel-title" align="center">Welcome! <i class="fa fa-user"></i> Manager <b><?php echo $login_session;?></b></h3>
								</div>
								<div class="row">
									
									
				
				
				
				
                <!-- <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Users Record</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
							  <li class="list-group-item"><b><?php echo admin_count(); ?></b> Aministrators <?php echo $login_username;?></li>
							  <li class="list-group-item"><b><?php echo manager_count() ?></b> Managers</li>
							  <li class="list-group-item"><b><?php echo user_count() ?></b> Users</li>
							  <a href="transaction.php"><button type="button" class="btn btn-primary navbar-btn">Transactions</button></a>
							</ul>
                        </div>
                    </div>
                </div> -->
                
                
                

                       <div style="width: 925px" align="right">
 							<div class="search" style="padding-bottom: 10px; width: 300px">
 	<br>
                			<form method="post"  id"searchTrans" action="Search_Result.php">
                            <div class="input-group custom-search-form">
                            	
                                <input type="text" class="form-control input-md" placeholder="Search User..." name="finduser" >
                               
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" form_id="searchTrans"  type="button" name="searchUser" style="height: 2.5em;" >
                                        <i class="fa fa-search"></i>
                                    </button>
                                    
                                </span>
                            </div>
                             </form>
                             </div>

                      </div>       
                        
					      <div class="" style="" >
                        <h3 class="page-header">Manager Control</h3>
                       
                       <!-- Search -->
                       </div>
                	

					<div  id='journal' style='width:925px' align = "center">
					<table class="table" style="width: 925px" >
					<thead>
					<tr>
					<td class='col-sm-1' style='width:4%' align="center"><label>User ID</label></th>
					<td class='col-lg-1' style='' align="center"><label>First & Last Name</label></th>
				
					<td class='col-lg-1' align="center"><label>User Name</label></th>
					<td class='col-lg-1' align="center"><label>Email</label></th>
					<td class='col-lg-1' align="center"><label>User Type</label></th>
					<!-- <td class='col-lg-2' align="center"><label>Action</label></th> -->
					<td class='col-lg-1' align="center"><label>Status</label></th>
					</tr>
					</thead>
					
					
					
					<tbody>
					<?php
					$type = "";
					$active ="";
					$user = "Ordinary user";
					$manager = "Manager";
					$admin = "Admin";
					$activate = "Activated";
					$deactivate = "Deactivated";
					


					$query = mysql_query("SELECT userid, firstname, lastname, username, email, usertype, active FROM users where usertype = 0");
					
					while ($row = mysql_fetch_array($query))
					{
					echo "<tr>";
					$id = $row['userid'];
					$fname = $row['firstname'];
					$lname = $row['lastname'];
					$uname = $row['username'];
					$email = $row['email'];
					$type = $row['usertype'];
					$active = $row['active'];
					$StringURL = "user_tracking.php?name=".$row['username'];
					
					echo "<td class='col-sm-1' style='width:5%' align='center'>$id </td>";
					echo "<td class='col-lg-1' align='center'><a href='$StringURL' onclick='openRequestedPopup();'>$fname $lname </a></td>";
				//	echo "<td class='col-lg-1'>$lname </td>";
					echo "<td class='col-lg-1' align='center'>$uname </td>";
					echo "<td class='col-lg-1' align='center'>$email </td>";
					
					
					//usertype
					if ($type == 1)
					{
						echo "<td class='col-lg-1' align='center'>$admin </td>";
					}
					else {
						if($type == 2)
						{
							echo "<td class='col-lg-1' align='center'>$manager </td>";
						}
						else{
							if($type == 0)
							{
								echo "<td class='col-lg-1' align='center'>$user </td>";
							}
						}
					}

					// echo "<td class='col-lg-1' align='right' style='width:5%'>";
					// echo "<div class='col-lg-1' style='white-space: nowrap;'>
					// <form id='view_admin' method='post' action='manager.php'>
					// <input type='hidden' name='uid' value='$id' >
// 				
// 
// 					
					// </form>
					// </div>";
					
					//<input type='submit' class='btn btn-success btn-sm' value='Activate' name='ok' >
					//<input type='submit' class='btn btn-danger btn-sm' value='Deactivate' name='no' onclick='Deactivate();'>	
					//Active or no
					 if($active == 1)
					 {
						 echo "<td class='col-lg-1' style='color:green;' align='center'><b>$activate</b> </td>";
					 }
					 else{
						 if($active == 0)
						 {
							 echo "<td class='col-lg-1' style='color:red;' align='center'><b>$deactivate</b> </td>";						
						 }
							
					}
					}
				
					?>
					
					</tbody>
					</table>
					</div>
<div>
	
	
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
