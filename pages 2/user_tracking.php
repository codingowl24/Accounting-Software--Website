<?php
include "config_test.php";
include "Config.php";
include "session.php";
admin_manager_protect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Log - TMT Finance</title>

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
                <a class="navbar-brand" href="index.html">TMT</a> -->
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
																
																
														
												
											
											<td><h2 class="panel-title" align="center"><?php $fname = $_GET["name"]; echo $fname. "'s Transactions";?></h2></td>
											<td></td>
										</tr>
									</table>
									
									
								</div>
								
							<div style="width: 925px" align="right">
 								<div class="search" style="padding-bottom: 10px; width: 300px">
 							<br>
                			<form method="post"  id"searchTrans" action="<?php $StringURL = "user_tracking.php?name=".$row['username']; ?>">
                            <div class="input-group custom-search-form">
                            	
                                <input type="text" class="form-control input-md" placeholder="Search Transactions..." name="findTrans" >
                               
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" form_id="searchTrans"  type="button" name="srch" style="height: 2.5em;" >
                                        <i class="fa fa-search"></i>
                                    </button>
                                    
                                </span>
                            </div>
                             </form>
                             </div>

                      </div>  
								
								
								<div class="row" align="center" style="width:950px">
								<br>
									<?php
									
								if (isset($_POST['srch']) && isset($_POST['findTrans'])) {
											
									
									$findTran = filter_var($_POST['findTrans'], FILTER_SANITIZE_STRING);
									
									$query = "SELECT * FROM genJournal WHERE UserID = '$fname' AND amount = '$findTran' order by date desc";
								$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
								$data = mysqli_num_rows($results);
								

								if ($data > 0)
								{
									
									echo "<table class='search'>";
											echo "<thead>";
											echo "<tr>";
																			echo "<tr>";		
								echo "<th class='col-lg-1' align='center'><label>Account Title</label></th>";
								echo "<th class='col-lg-1' align='right' style='width:3%'><label>Amount</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Normal Side</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Entry #</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Submitted by</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Date & Time</label></th>";
						//		echo "<th class='col-lg-1' align='center'><label>Time</label></th>";	
								echo "<th class='col-lg-1' align='center'><label>Status</label></th>";	
								echo "<th class='col-lg-1' align='center'><label>Approved/Rejected by</label></th>";
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
									echo "<td class='col-sm-1' align='center'>".$newDate." @ ".$newTime."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['StatusMessage']."</td>";
									echo "<td class='col-sm-1' align='center'>".$row['ManApprove']."</td>";
									echo "</tr>";
		
								}
								
									echo "</tbody>";
									echo "</table>";
									
								// Style for scroll bar		
									echo "
									<style>
										#search{
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
											</style> 
													
				
									";
									
									
								}
								else {
									echo "<font color='red' size='5'><b>No Results Found</b></font>";
								}
	}
								
								
								
								
								
								if (!isset($_POST['srch']) && !isset($_POST['findTrans'])) {
									//Get from the url
									$fname = $_GET["name"];
								//	print_r($fname);
								//	echo $fname. "'s Transactions";
								
								
											echo "<table class='trans'>";
											echo "<thead>";
											echo "<tr>";
								echo "<th class='col-lg-1' align='center'><label>Account Title</label></th>";
								echo "<th class='col-lg-1' align='right' style='width:2%'><label>Amount</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Normal Side</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Entry #</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Submitted by</label></th>";
								echo "<th class='col-lg-1' align='center'><label>Date & Time</label></th>";
						//		echo "<th class='col-lg-1' align='center'><label>Time</label></th>";	
								echo "<th class='col-lg-1' align='center'><label>Status</label></th>";	
								echo "<th class='col-lg-1' align='center'><label>Approved/Rejected by</label></th>";
											echo "</tr>";	
											echo "</thead>";
                                            echo "<tbody>";

								$query = "SELECT * FROM genjournal WHERE UserID = '$fname' order by date desc ";
								$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
								while($row = mysqli_fetch_assoc($results)){
									$date="";
									date_default_timezone_set('UTC');
									$jDate = date('m/d/Y');
									$date = $row['Date'];
									
									$newDate = date("M-d-y", strtotime($date));
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
									echo "</tr>";
									
									}
								
				// Style for scroll bar				
				echo "
				
					<style>
					#trans{
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
				</style> 
		
				";
				
				echo "</tbody>";
				echo "</table>";
				}


	?>
							
				
						
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
