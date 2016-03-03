<?php
include "Config.php";
include "config_test.php";
include "session.php";

admin_manager_protect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - TMT Finance</title>

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
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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

       <!-- </nav> -->

               <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" align="center">
                    	
                    	
                    	<div class="panel panel-info" style="width:950px" align="center">
								<div class="panel-heading">
									<table  width="925px">
										<tr>
											<td width="3%">
												<?php
														if(is_admin($login_id) === true)
														{
													 ?>
															<a href="admin.php"><input type="image" src="images/arrow2.png" name="image" width="25" height="25" onclick=""></a>	
														
														
														
														<?php	}	
															if (is_manager($login_id) === true)
															{ ?>
														<a href="manager.php"><input type="image" src="images/arrow2.png" name="image" width="25" height="25" onclick=""></a>			
															
															
															
														<?php	
															}
														?>	
												
												
												
												
												</td>
												
											<td><h2 class="panel-title" align="center">Search Results</h2></td>
											<td></td>
										</tr>
									</table>
											
								</div>


					<?php
					$type = "";
					$active ="";
					$user = "Ordinary user";
					$manager = "Manager";
					$admin = "Admin";
					$activate = "Activated";
					$deactivate = "Deactivated";
					$i="";
					
					
					
					

					if (isset($_POST['searchUser']) && isset($_POST['finduser']))
					{
						
						
					// $k = $_GET['findTrans'];
					// $terms = explode(" ", $k);
					// $query = "Select UserID, firstname, lastname, username, email, usertype, active from Users WHERE";
// 					
// 					
// 					
					// foreach ($terms as $each)
					// {
						// $i++;
						// if($i == 1){
							// $query .= " firstname LIKE '%$each%' ";
						// }
						// else {
							// $query .= " OR lastname LIKE '%$each%' ";
						// }
// 						
					// }
// 					
// //					echo $query;
// 	
// 			
					// $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
// 					
// 				
// 					
					 // $data = mysqli_num_rows($results);
					 

				
				
					
					$find = filter_var($_POST['finduser'], FILTER_SANITIZE_STRING);


										if (is_admin($login_id) === true)
										{
											$query = mysql_query("Select userid, firstname, lastname, username, email, usertype, active from users where ((firstname LIKE '%$find%' AND lastname LIKE '%$find%') OR 
											firstname LIKE '%$find%' OR lastname LIKE '%$find%' OR username LIKE '%$find%' OR email LIKE '%$find%')");
										}
										elseif (is_manager($login_id) === true) {
											$query = mysql_query("Select userid, firstname, lastname, username, email, usertype, active from users where Not usertype = '1' AND ((firstname LIKE '%$find%' AND lastname LIKE '%$find%') OR 
											firstname LIKE '%$find%' OR lastname LIKE '%$find%' OR username LIKE '%$find%' OR email LIKE '%$find%')");					
										}
										
										
										$data = mysql_num_rows($query);
									
										echo "<div  id='searchuser' style='width:925px' align = 'center'>";
									if (!$_POST['finduser'] == ""){
										if ($data > 0)
										{
												
											
					echo "<table class='table' style='width: 925px' >";
					echo "<thead>";
					echo "<tr>
					<td class='col-sm-1' style='width:4%' align='center'><label>User ID</label></th>
					<td class='col-lg-1' style='' align='center'><label>First & Last Name</label></th>
				
					<td class='col-lg-1' align='center'><label>User Name</label></th>
					<td class='col-lg-1' align='center'><label>Email</label></th>
					<td class='col-lg-1' align='center'><label>User Type</label></th>
					<td class='col-lg-2' align='center'><label>Action</label></th>
					<td class='col-lg-1' align='center'><label>Status</label></th>
					</tr>
					</thead>
					<tbody>";	
											
											
									
											
										while ($row = mysql_fetch_assoc($query))
										{
										echo "<tr>";
											
											$id = $row['userid'];
											$fname = $row['firstname'];
											$lname = $row['lastname'];
											$uname = $row['username'];
											$email = $row['email'];
											$type = $row['usertype'];
											$active = $row['active'];
											$StringURL = "user_tracking.php?name=".$row['firstname'];

											echo "<td class='col-sm-1' style='width:5%'>$id </td>";
											echo "<td class='col-lg-1' align='center'><a href='$StringURL' onclick='openRequestedPopup();'>$fname $lname </a></td>";
										//	echo "<td class='col-lg-1'>$lname </td>";
											echo "<td class='col-lg-1' align='center'>$uname </td>";
											echo "<td class='col-lg-1' >$email </td>";

											//usertype
											if ($type == 1)
											{
											echo "<td class='col-lg-1'>$admin </td>";
											}
											else {
											if($type == 2)
											{
											echo "<td class='col-lg-1'>$manager </td>";
											}
											else{
											if($type == 0)
											{
											echo "<td class='col-lg-1'>$user </td>";
											}
											}
											}
											//
											if(is_admin($login_id) === true){
											echo "<td class='col-lg-1' align='right' style='width:5%'>";
											echo "<div class='col-lg-1' style='white-space: nowrap;'>
												<form id='view_admin' method='post' action='admin.php'>
													<input type='hidden' name='uid' value='$id' >

													<input type='submit' class='btn btn-success btn-sm' value='Activate' name='ok' >
													<input type='submit' class='btn btn-danger btn-sm' value='Deactivate' name='no' onclick='Deactivate();'>

												</form>
											</div>";
											}
											if(is_manager($login_id) === true){
											echo "<td class='col-lg-1' align='right' style='width:5%'>";
											echo "<div class='col-lg-1' style='white-space: nowrap;'>
												<form id='view_admin' method='post' action='manager.php'>
													<input type='hidden' name='uid' value='$id' >

													<input type='submit' class='btn btn-success btn-sm' value='Activate' name='ok' >
													<input type='submit' class='btn btn-danger btn-sm' value='Deactivate' name='no' onclick='Deactivate();'>

												</form>
											</div>";
											}

											//Active or no
											if($active == 1)
											{
											echo "<td class='col-lg-1' style='color:green;'><b>$activate</b></td>";
											}
											else{
											if($active == 0)
											{
											echo "<td class='col-lg-1' style='color:red;'><b>$deactivate</b></td>";
											}

											}
										}
										
										
					echo "</tbody>";
					echo "</table>";	
					echo "</div>";
					
	            echo   "
				<style>
					#searchuser{
						overflow: auto;
						overflow-y:scroll;
						height: 800px;
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
				</style> ";	
										
										
									}
		else{
				
				//echo "<font color='red' size='5'><b>No Results Found</b></font>";
			
												
											
											}
		
		}
else{
	//echo "<font color='red' size='5'><b>No Results Found</b></font>";
}
	

			
// end if isset 
 }				
?>
					
					
					<?php
				
					
								if (isset($_POST['searchUser']) && isset($_POST['finduser'])) {
	
									
								$findTran = filter_var($_POST['finduser'], FILTER_SANITIZE_STRING);	
									
									
									
								$query = "SELECT * FROM genjournal WHERE amount = '$findTran' OR date LIKE '%$findTran%' order by date desc";
								$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
								$rdata = mysqli_num_rows($results);
								echo "<div  id='journalTrans' style='width:925px' align = 'center'>";
								
								if ($rdata > 0)
								{
										
								echo "<table class='table' style='width: 925px'>";
								echo "<thead>";
								echo "<tr>";		
								echo "<td class='col-lg-1' align='center'><label>Account Title</label></th>";
								echo "<td class='col-lg-1' align='right' style='width:3%'><label>Amount</label></th>";
								echo "<td class='col-lg-1' align='center'><label>Normal Side</label></th>";
								echo "<td class='col-lg-1' align='center'><label>Entry #</label></th>";
								echo "<td class='col-lg-1' align='center'><label>Submitted by</label></th>";
								echo "<td class='col-lg-1' align='center'><label>Date & Time</label></th>";
						//		echo "<td class='col-lg-1' align='center'><label>Time</label></th>";	
								echo "<td class='col-lg-1' align='center'><label>Status</label></th>";	
								echo "<td class='col-lg-1' align='center'><label>Approved/Rejected by</label></th>";
								echo "</tr>";
									
									
									
									
									
								while($row = mysqli_fetch_assoc($results)){
									$date="";
									date_default_timezone_set('UTC');
									$jDate = date('m/d/Y');
									$date = $row['Date'];
									$newDate = date("M-d", strtotime($date));
									$newTime = date("H:i:s", strtotime($date));
									
									echo "<tr>";
									echo "<td class='col-sm-1'>".$row['AccountName']."</td>";
									echo "<td class='col-sm-1' align='right' style='width:3%'>".$row['Amount']."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['Action']."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['Entry']."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['UserID']."</td>";
									echo "<td class='col-sm-1' align='center'>".$newDate." ".$newTime."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['StatusMessage']."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['ManApprove']."</td>";
					//				echo "<td class='col-sm-1' align='center'>".$newTime."</td>";
									
					
					
									echo "</tr>";
									
									}
								
									echo "</table>";
									echo "</div>";
				
				echo   "
				<style>
					#journalTrans{
						overflow: auto;
						overflow-y:scroll;
						height: 800px;
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
				</style> ";	
								}
else{
	if($data <= 0)
	{
		echo "<font color='red' size='5'><b>No Results Found</b></font>";
	}
}
								
							}
	
					?>
					
					
					
					
								
						<!-- </div> -->

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
