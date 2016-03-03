<?php
include 'Config.php';
include 'config_test.php';
include 'session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - TMT Finance</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link href="css/dashboard.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>

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

        </nav>

               <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    	
                    	
                    	<div class="panel panel-info" style="width:800px" align="center">
								<div class="panel-heading">
									<h2 class="panel-title" align="center">Testing</h2>
									
								</div>
								<div class="row" align="center">
									<form action="test.php" method="post" enctype="multipart/form-data">
									<input type="file" multiple="multiple" name="fileup[]" id="fileup" onChange="makeFileList();"/>
									<input type="submit" name="upload" value="Upload"/>
									</form>
									
									<label id="fileList"></label>
								</div>
						</div>
                    	
	
                    	<?php
                    	
                    	$target_path = "Upload/";
                    	$en = 0;
						
						$querya = mysql_query("Select distinct g.accountname as AccountName, g.Date as Date, g.Amount as Amount, g.Entry as Entry, 
								g.Status as Status, g.Action as Action, g.Message as Message, t.filename as filename, t.Entry as tEntry 
								from transfileupload as t INNER JOIN genjournal as g ON t.entry = g.entry where g.entry='2'");
								
while($row = mysql_fetch_array($querya)){			
$src = $row['filename'];	
$acct = $row['AccountName'];
$jentry = $row['Entry'];
									
$nospace = str_replace(" ","%20",$src);
echo "<table width='800px'>";										
echo "<tr>";	

if ($en != $row['tEntry']){
echo "<td class='col-sm-4' align='center'>$acct</td>";

echo "<td class='col-sm-3' align='center'>$jentry</td>";
//echo "<td class='col-sm-5' align='center'><i class='fa fa-paperclip fa-2x'></i><a href=".$target_path . basename($nospace) ."> {$nospace} </a><br></td>";	
									

									
									
									
									
									
					date_default_timezone_set('UTC');
					$JDate = date('Y-m-d');	
					
					$currentdate = strtotime($JDate);		
									
								echo "$JDate";		
									
									
									
									
									
									
									
									
									
									
									


}
$en = $row['tEntry'];
}
echo "</tr>";  
echo "</table>";
						
						
						
						
                    	
                    	
                    	// if(isset($_POST['upload'])){
                    	 // foreach ($_FILES['fileup']['tmp_name'] as $key => $tmp_name) {
						// $name = $key.$_FILES['fileup']['name'][$key];
						// $tmpnm = $_FILES['fileup']['tmp_name'][$key];
						// $type = $_FILES['fileup']['type'][$key];
						// $size = $_FILES['fileup']['size'][$key];
						// $extensions = array("jpeg","jpg","png"); 
// 						
						// print_r($name);
// 						
// 						
						// if($size > 10000000){
							// $errorMessage = "File size must be less than 10 MB";
// 							
						// }
// 						
						// if(is_dir($target_path) == FALSE){
							// mkdir("$target_path");
						// }
// 						
						// if(is_dir("$target_path" . $name) == FALSE){
						// //	$uploadfile = $target_path . basename($name);	
// 							
						// (move_uploaded_file($tmpnm, $target_path.$name));
						// }
						// else{
							// rename($tmpnm, "$target_path".$name);
						// }
// 						
// 						
						// $query = "INSERT INTO fileupload (filename, uid, type, size) VALUES ('$name', '$login_username', '$type', '$size')";
// 						
// 						
						// echo "<br>";
						// mysql_query($query);
						// } // end foreach loop
//                     	
                    // } //end if isset
                  echo "<table border=''>";
				  echo "<tbody>";  
                    
                  $queryS = "SELECT * FROM GenJournal WHERE StatusMessage = 'Pending' AND Status = '0' ";
								$results = mysqli_query($cxn, $queryS) or die(mysqli_error($cxn));
								$num_results = mysqli_num_rows($results); 
					
			

					while($row = mysqli_fetch_assoc($results)){
					$t = $row['Entry'];
					$Stringb = 'transfileupload.php?Entry='.$t;	
					
					echo "<tr>";
					$date = $row['Date'];
					$newDate = date("M-d", strtotime($date));
					$check = $row['Message'];
                    if ($row['Action'] == "Debit") {
                        $dupli += $row['Amount'];
                    }else{
                        $dupli -= $row['Amount'];
                    }					

					if ($row['Entry'] != $entry) {
						echo "<td class='col-lg-2'><label>".$newDate."</label></td>";	
					}
						
					else {
						echo "<td class='col-lg-1'><label></label></td>";	
					}
					
					

					
					

					$String = 'inledger.php?AccountName='.$row['AccountName'];
					
					if ($row['Action'] === "Debit"){

						
						echo "<td class='col-lg-4'> <label><a href='$String' >".$row['AccountName']."</label></a></td>";
					}
					else {
						echo "<td class='col-lg-3' style='padding-left: 50px;' ><label><a href='$String'>".$row['AccountName']."</label></a>";

                    if($dupli == '0'){
                        echo "<p>".$check."</p></td>";
                        $dupli = 0;
                    }
					}
					$entry = $row['Entry'];
					
			
					if ($ref != $row['Entry']) {
						echo "<td class='col-lg-1' style='padding-left: 80px;'><label>".$row['Entry']."</label><br><a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a></td>";
						
						//Source
						//echo "<a href='$Stringb'><i class='fa fa-paperclip fa-2x'></i></a>";
						
						
					}
					else {
						echo "<td class='col-lg-1'><label></label></td>";
					} 					
					

					if ($row['Action'] == "Debit") {
						echo "<td class='col-lg-1' ' style='padding-left: 120px;' align = 'right'><label>".$row['Amount']."</label></td>";
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						
						$name = $row['AccountName'];
					}
					else {
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td class='col-lg-1' style='padding-right: 50px;' align='right'><label >".$row['Amount']."</label></td>";
					
					}
					if ($row['Entry'] != $ref) {
					if ($row['Status'] == 0) {
							
							echo "<td class='col-lg-1' style='padding-left:0px'><label>Pending</label></td>";

							$Stringa = 'approve.php?EntryName='.$row['Entry'];
					
							echo "<td>";
							echo	"<form method='post' class='form-inline' action='$Stringa'>";
								?>
							<div class="col-lg-3" style="white-space: nowrap;">
							<input type="submit" class='btn btn-success btn-sm' value='Approve' name='ok'<?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>

								disabled = "disabled"
								<?php
							}
							?> />
					
							<input type='submit' class='btn btn-danger btn-sm' value='Reject' name='no' style="" <?php 
                            
                            if (is_manager($login_id) === false)
							{
								?>
								disabled = "disabled"
								<?php
							}
							?> />
						</div>
							</form>
							</td>


<?php

					}
					else {
						if ($row['StatusMessage'] =='Approved') {
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td class='col-lg-1'><label style='color:green;'>".$row['StatusMessage']."</label></td>";
						}
						elseif ($row['StatusMessage'] =='Rejected') {
						echo "<td><label></label></td>";
						echo "<td><label></label></td>";
						echo "<td class='col-lg-1'><label style='color:red;'>".$row['StatusMessage']."</label></td>";
						}
					}
					}
					$ref = $row['Entry'];
					$test++;	
					echo "</tr>";
				} // end while loop
		
	



				?>
					</tbody>
					</table>
                    	?>
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

