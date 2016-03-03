<?php 

//phpinfo();
include 'config_test.php';
include 'session.php'; 

protect_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - TMT Finance</title>

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
	

    <script type="text/javascript">
    $(document).ready(function() {
        $('#s10b').multiselect();
    });
</script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#s10c').multiselect();
    });
</script>
<script type="text/javascript">
 $(function(){
	$('#dp3').datepicker();
});
</script>

<script type="text/javascript">
 $(function(){
	$('#dp2').datepicker();
});
</script>
<style>
	#selectAccounts {
		padding: 10px;
	}
	#creditAccounts {
		padding: 10px;
	}
</style>

</head>
<body>

<script>
	function resetPage(){
		location.reload();
	}
</script>

<!-- uploading multiple files list -->
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
<!-- <script>
	function calculatorButton(){
		alert("Test");
	}
</script> -->
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
						<li class="active">
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
        <?php
        $i =0;
		
        ?>
		<!-- <embed src="Tax Calculator.jar"></embed> -->
       <div id="page-wrapper">
            <div class="container-fluid">
            	<div class="row">

            		<div style="float: left; padding-left: 10px; padding-top: 10px;">
            			
            			<div>User: <i><b><?php echo $login_session;?></b></i></div>
            			<label>Submissions:<?php if($_SESSION['submission'] ){ echo" ". $_SESSION['count'];
						echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Transaction Submitted successfully.
                    </div>';} ?></label>
            		</div>
            		<div style="float: right; padding-right: 10px; padding-top: 10px;">
            			<label>Today's Date:</label>
            		<label><?php  echo date('m/d/Y');?></label>
            		</div>
            	</div>
                <div class="row">
         		
                <h1 class="page-header">Transactions</h1>

                    <div class="col-sm-12">
                    	        <div class="col-sm-6" style="width: 350px; margin-right: 60px;">
                             	
                             	 <div class='input-group date' style="">           			
					            		<input class="form-control"   id="dp3"  type="text" placeholder="Date"/>
					            		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					            		</span>
					            		</div>
                             <!-- <img src="" width="50" height="50" /> -->
                             </div>
                             
                             
                    	    <div class="search" style="padding-bottom: 10px; width: 460px; white-space: nowrap;">
                			<form method="post"  id"searchTrans">
                				<div class="row" style="width: 850px; white-space: nowrap;" >
                					<div class="col-md-6" style="float:left">
                            <div class="input-group custom-search-form">
                            	
                                <input type="text" class="form-control input-md" placeholder="Search..." name="findTrans" id="dp2">
                                
                               
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" form_id="searchTrans" type="button" name="srch" style="height: 2.5em;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    
                                </span>
                            </div>
                            </div>
                             </form>

                             </div>
                             </div>
                        <div class="panel panel-info" >
								<div class="panel-heading">
									<h3 class="panel-title">Select Accounts</h3>
								</div>
								<div class="row" style="padding: 10px;">
									<div class="col-md-3">
									<form method="post" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

										<div class="form-group" id="selectAccounts">
											<label>Debits</label>
										<select name="acctN[]" id="s10b" class="form-control" style="overflow-y: scroll;"  size="2" multiple="multiple">
											<?php
											$query = "SELECT * FROM ChartOfAccounts AccountName ORDER BY Type ASC";
											$results = mysqli_query($cxn, $query);
											$check ="";
											while ($row = mysqli_fetch_assoc($results)) {
												if ($check != $row['Type'] ) {
													echo "<optgroup label='".$row['Type']."'>";
													$check = $row['Type'];
												}
												echo "<option value ='".$row['AccountName']."'>".$row['AccountName']."</option>";
												echo "</optgroup>";
											}
											?>
										</select>
										
										</div>
										</div>
										<div class="col-md-3">
										<div class="form-group" id="creditAccounts" style="">
											<label>Credits</label>
										<select name="acctC[]" id="s10c" class="form-control" style="overflow-y: scroll; white-space:normal;"  size="3" multiple="multiple">
											<?php
											$query = "SELECT * FROM ChartOfAccounts AccountName ORDER BY Type ASC";
											$results = mysqli_query($cxn, $query);
											$check ="";
											while ($row = mysqli_fetch_assoc($results)) {
												if ($check != $row['Type'] ) {
													echo "<optgroup label='".$row['Type']."'>";
													$check = $row['Type'];
												}
												echo "<option value ='".$row['AccountName']."'>".$row['AccountName']."</option>";
												echo "</optgroup>";
											}
											?>
										</select>
										
										</div>
										</div>
										<div class="col-sm-1">
										<div class='form-group' style='padding-top: 10px; padding-left: 10px;'>
										<!-- <input type='image' src='../dist/images/very-basic-calculator-icon.png' alt='Submit' onclick='calculatorButton()'> -->									
										</div>
										</div>

									
									
									
									
									<style>
										#dateTime{
											/*border:solid 2px black;*/
											float:right;
											/*margin-top:-52px;*/
										}
									</style>

									<div class="col-md-4" id="dateTime">
										<div class="form-group" style="padding-top: 10px; padding-left: 80px;">
										<input type="submit" value="Add Selected Accounts" name="add" class="btn btn-primary btn-lg"/>
									
										</div>
							</div>	
							</form>
							</div>
                        </div>
                    </div>
                    <div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            
<script type="text/javascript">
function validate(){
	var i;
	var debit = 0.0;
	var credit = 0.0;
	var same =0;
	var passtest = 0;
	var testC = "";
	var testD = "";
	var test = "";
	var form = document.getElementById("myForm");
	var dCount = 0;
	var cCount = 0;
	var debitNames="";
	var creditNames="";
	
	//reset border colors
	for (i = 0; i < form.elements.length; i++) {
		if (form.elements[i].id === "amt" || form.elements[i].id === "amtC") {
			form.elements[i].style.borderColor = "";
		}
	}
	//alert("Enter function");
	for(  i = 0; i < form.elements.length; i++){
		//alert(i);
		if(form.elements[i].id === "action" && form.elements[i].value === "Debit"){
			test = form.elements[i].value;
			debitNames = form.elements[i-1].value;
					if(debitNames === creditNames){
   		document.getElementById("amtTD").innerHTML = "You have two of the same accounts. Please check the transaction and try again";
   		return false;
   }
			//alert(debitNames);
			dCount++;
			var amt = Number(form.elements[i+1].value);
			
			if(form.elements[i+1].value !="" && amt != 0.00 && !isNaN(amt)){
				// Get the value from the input element id amt
				testD= form.elements[i+1].value;
				debit += parseFloat(testD);
			} 
			// else if (isNaN(amt) && form.elements[i+1].value != "") {
				// document.getElementById("amtTD").innerHTML = "Only numeric characters can be entered";
				// form.elements[i+1].style.borderColor = "red";
				// return false;
			// } 
			else{
				var j;
				for(  j = 0; j < form.elements.length; j++){
					// empty debit amt
					if(form.elements[j].type === "text" && form.elements[j].value ===""){
						document.getElementById("amtTD").innerHTML = "You must enter amounts into the highlighted fields";
						form.elements[j].style.borderColor = "red";
						
					} 
					// debit amt is 0
					else if (form.elements[j].id === "amt" && Number(form.elements[j].value) === 0.00) {
						document.getElementById("amtTD").innerHTML = "You cannot debit/credit an amount of 0";
						form.elements[j].style.borderColor = "red";
					}				
				}
				return false;
			}	
		}
		
		else if(form.elements[i].id === "actionC" && form.elements[i].value === "Credit"){
			test = form.elements[i].value;
			creditNames = form.elements[i-1].value;
					if(debitNames === creditNames){
   		document.getElementById("amtTD").innerHTML = "You have two of the same accounts. Please check the transaction and try again";
   		return false;
   }
			//alert(creditNames);
			cCount++;
			var amt = Number(form.elements[i+1].value);

			if(form.elements[i+1].value != "" && amt != 0.00 && !isNaN(amt)){
				// Get the value from the input element id amt
				testC = form.elements[i+1].value;
				credit += parseFloat(testC);

			} 
			// else if (isNaN(amt) && form.elements[i+1].value != "") {
				// document.getElementById("amtTD").innerHTML = "Only numeric characters can be entered";
				// form.elements[i+1].style.borderColor = "red";
				// return false;
			// } 
			else{
				var j;
				for(  j = 0; j < form.elements.length; j++){
					//empty credit amt
					if(form.elements[j].type === "text" && form.elements[j].value ===""){
						document.getElementById("amtTD").innerHTML = "You must enter amounts in the highlighted fields";
						form.elements[j].style.borderColor = "red";
					}
					//credit amt is 0
					else if (form.elements[j].id === "amtC" && Number(form.elements[j].value) === 0.00) {
						document.getElementById("amtTD").innerHTML = "You cannot debit/credit an amount of 0";
						form.elements[j].style.borderColor = "red";
					}
				}
				return false;
			}			
		}
		else{
			// If it is not id action or id amt just Alert value if any
			test = form.elements[i].type;
			//alert(test);
		}
 }
///******    END OF FOR LOOP ******   /// 
   if (dCount < 1) {
   		document.getElementById("amtTD").innerHTML = "There must be at least 1 Debit Action";
   		return false;
   } else if (cCount < 1) {
   		document.getElementById("amtTD").innerHTML = "There must be at least 1 Credit Action";
   		return false;
   }
   else{
   	debitNames = "";
   	creditNames ="";
   }
   
   if(debit == credit){
   	//alert("Debits and Credit equal");
      //	return true;
   }
   
   else{
   	 document.getElementById("amtTD").innerHTML = "Debits must equal credits.";
   	return false;
   }
 }
</script>

<!-- <script>
	function addSrc(){
		var location = document.getElementById("src-div");
		var src = document.createElement("INPUT");
		src.setAttribute("class","form-control");
		src.setAttribute("type","file");
		location.appendChild(src);	
	}
</script> -->
<style>
#amtDescrip {
    display: none;
    position:absolute;
    top: 80px; 
    right: 100px;
    padding: 5px; 
    margin: 10px;
    z-index: 100;
    background: white;
    border: 1px solid #c0c0c0;
    opacity: 0.8; 
    width: 120px;
   /*border:solid black 2px;*/
    color: black;
    font-weight:bold;
   
    text-align: left;
    
}
</style>

<script type="text/javascript">
    function textDect(){
    	var i = 0;
    	var form = document.getElementById("myForm");
    	for(  i = 0; i < form.elements.length; i++){
    		if(form.elements[i].id === "action"){
    			if(form.elements[i+1].id === "amt"){
    				var c = form.elements[i+1];
    				if(isNaN(c.value)){
    					c.value = "";
    				}
    			}
    		}
    		else if(form.elements[i].id === "actionC"){
    			    if(form.elements[i+1].id === "amtC"){
    				var c = form.elements[i+1];
    				if(isNaN(c.value)){
    					c.value = "";
    				}
    			}
    		}
    		
    	}
    }
    </script>
    
    <script>
    function inProgress(){
    	var i = 0;
    	var form = document.getElementById("myForm");
    	for(  i = 0; i < form.elements.length; i++){
    		if(form.elements[i].id === "action"){
    			if(form.elements[i+1].id === "amt"){
    				var c = form.elements[i+1];
    				if(c.value != null && c.value != ""){
    					return "You have a transaction progress";
    			}
    		}
    	}
    }
}
    	
    </script>
    
    <script>
	function amtHandler () {
		var form = document.getElementById("myForm");
		var nanCount = 0;
		//document.getElementById("amtTD").innerHTML = "";		
		for (var i = 0; i < form.elements.length; i++) {
			if (form.elements[i].id === "amt") {
				
				//form.elements[i].style.borderColor = "";
				var val = Number(form.elements[i].value);
				
				if (form.elements[i].value === "") {
					continue;
				}
				
				if (isNaN(val)) { 
					nanCount++;
					form.elements[i].style.borderColor = "red";
					continue;
				}				
				form.elements[i].value = val.toFixed(2).toString();
			}
						if (form.elements[i].id === "amtC") {
				
				//form.elements[i].style.borderColor = "";
				var val = Number(form.elements[i].value);
				
				if (form.elements[i].value === "") {
					continue;
				}
				
				if (isNaN(val)) { 
					nanCount++;
					form.elements[i].style.borderColor = "red";
					continue;
				}				
				form.elements[i].value = val.toFixed(2).toString();
			}
		}
		if (nanCount > 0) {
			document.getElementById("amtTD").innerHTML = "Only numeric characters can be entered";
		}
	}
</script>

<script>
	function removeCell(r){
		x = confirm("Are you sure you want to Remove");
		if(x == true){
		var i = r.parentNode.parentNode.rowIndex;
		document.getElementById("myTable").deleteRow(i);
		}
	}
</script>


            <!-- /.container-fluid -->
            <div class="container-fluid">
            	        <div class="row">
                        	<div class="col-lg-12">
           						<div class="panel panel-info" style="min-height: 100px; ">
									<div class="panel-heading">
									<h3 class="panel-title">Perform Transaction</h3>
									</div>
								<form name='transaction' id="myForm" onsubmit="return validate()" onchange = 'amtHandler()' enctype="multipart/form-data" action='processTransReadyJournal.php'  method='post'>
								<?php
								$_SESSION['submission'] = FALSE;
								if (isset($_POST['add'])) {

									if (isset($_POST['acctN']) && isset($_POST['acctC'])) {
										$cell = 0;
												echo "<table class='table' id='myTable' style=''>";
												echo "<thead>";
												echo "<tr>";
												echo "<th>Account Name</th>";
												echo "<th>Action</th>";
												echo "<th>Amount</th>";
												echo "</tr>";
												echo "</thead>";
												foreach ($_POST['acctN'] as $name) {
												$query = "SELECT * FROM ChartOfAccounts WHERE AccountName = '$name'";
												$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
												$row = mysqli_fetch_assoc($results);
												echo "<tbody>";
												echo "<tr id=''>";
												echo "<td class ='col-md-6' data-hint='Account to be used'><span class ='hint--top'><select name='account[]' id='acctDebits'  class='form-control' style=''><option value = '" . $row['AccountName'] . "'>" . $row['AccountName'] . "</option></span></select></td>";
												echo "<td class ='col-md-2' data-hint='Action on account'><span class='hint--top'><select name='debOrCred[]' id='action' class='form-control' style='' required>
														<option value='Debit'>Debit</option>
													</select></span></td>";
													echo "<td class ='col-md-2' id='amt-col' data-hint='Enter a number. Decimals must start with a 0.'><span class='hint--right'><input type='text' placeholder='0.00' name='amount[]' onkeyup='textDect(this.value)'  class='form-control' id='amt' style='text-align:right;'></span> </td>";
													echo "<td class ='col-sm-2'>$</td>";
													echo "<td class ='col-sm-2'><button  onclick=' removeCell(this)' class='btn btn-danger'>Remove</button></td>";
													echo "<input name='type[]' type='hidden' value = '".$row['Type']."'/>";
													echo "<input name='side[]' type='hidden' value = '".$row['NormalSide']."'/>";
													echo "</tr>";
												}
												echo "</tbody>";
												foreach ($_POST['acctC'] as $name) {
												$query = "SELECT * FROM ChartOfAccounts WHERE AccountName = '$name'";
												$results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
												$row = mysqli_fetch_assoc($results);
												echo "<tbody>";
												echo "<tr id=''>";
												echo "<td class ='col-md-6' data-hint='Account to be used'><span class ='hint--top'><select name='account[]' id='acctCredits'  class='form-control' style=''><option value = '" . $row['AccountName'] . "'>" . $row['AccountName'] . "</option></span></select></td>";
												echo "<td class ='col-md-2' data-hint='Action on account'>
												<span class='hint--top'><select name='debOrCred[]' id='actionC' class='form-control' style='' required>
														<option value='Credit'>Credit</option>
													</select></span></td>";
													echo "<td class ='col-md-2' id='amt-col' data-hint='Enter a number. Decimals must start with a 0.'><span class='hint--right'><input type='text' placeholder='0.00' name='amount[]' onkeyup='textDect(this.value)'  class='form-control' id='amtC' style='text-align:right;'></span> </td>";
													echo "<td class ='col-sm-2'>$</td>";
													echo "<td class ='col-sm-2'><button type ='button'  onclick='removeCell(this)' class='btn btn-danger'>Remove</button></td>";
													echo "<input name='type[]' type='hidden' value = '".$row['Type']."'/>";
													echo "<input name='side[]' type='hidden' value = '".$row['NormalSide']."'/>";
													echo "</tr>";
												}
												echo "</tbody>";
												echo "</table>";
											
									echo "<label style='margin-left:7px;'>Description</label>";
									echo "<textarea name='src-doc' class='form-control' rows ='4' cols='50' placeholder='Transaction Description' style='max-width:575px; margin-left:8px;'></textarea>
									<div class='' id ='amtTD' style='color:red; padding-top:12px; padding-bottom:12px; padding-left:8px; width:420px; font-size:large;'> </div>";
									echo "<div class='btn-group' style='padding:10px;'>";
									echo "<label>Upload Source (Optional)</label>";
									
									// echo "<div class= 'form-inline' style''>";
									// echo "<div class ='form-group' id='src-div'>";
									// echo "<input type='file' class='form-control' name='fileToUpload' id='fileToUpload'>";
									// echo "</div>";
									// echo "<div class='form-group' id='sources' style = ''>";
									// echo "<button type='button' onclick='addSrc()' name='add-src' class='btn btn-default btn-xs' id='add-src' style=' margin-left:15px;'><img src='../dist/images/download.jpeg' style='height:13px; width:13px;' /></button>";
									// echo "<button type='button' onclick='removeSrc()' name='remove-src' class='btn btn-default btn-xs' id='remove-src' style=' margin-left:15px;'><img src='../dist/images/redminussign.jpeg' style='height:13px; width:13px;' /></button>";
									// echo "<span id='src-btn-info'>Add and delete Sources</span>";
									// echo "</div>";
									// echo "</div>";
									
									
									echo "
									<input type='file' name='file[]' id='fileup' multiple='multiple' onchange='makeFileList();'>
								    <br>
									<label id='fileList'></label>
									<br>
									";
									
									
									echo "<div class ='row' style='padding-bottom:15px; padding-left:8px; width:650px; padding-top:10px; margin-top:10px;'>";
									echo "<div class = 'col-md-2' style='padding:15px;'>";
									echo "<input type='submit' id = 'btn-submit' class='btn btn-primary btn-lg' value='Submit' name='subTrans'>";
									echo "</div>";
									echo "<div class = 'col-md-3' style='padding:15px;'>";
									echo "<button type ='button' class = 'btn btn-warning btn-lg' onclick='resetPage()' name = 'reset' style=''>Reset</button>";
									echo "</div>";
									echo "<div class = 'col-md-3' style='padding:15px;'>";
									echo "<input type='button' id ='calcButton'  alt='Submit' onclick='calculatorButton()' style ='' data-toggle='modal'>";
									echo "</div>";	
									echo "</div>";

	
									echo " <div class='' id = 'calculator' style = 'margin-left:800px; margin-top:-320px; float:left; display:none;'>";
            	        			echo "<div class='row'>";
                        			echo "<div class='col-lg-6' style ='width:270px;'>";
           							echo "<div class='panel panel-info' style='min-height: 100px; '>";
									echo "<div class='panel-heading'>";
									echo "<h3 class='panel-title'>Calculator</h3>";
									echo"</div>";
																	
									echo "<div style ='margin-left:auto; margin-right:auto; width:270px;'>";
									
									echo "<div class = 'row' id ='first-row' style='padding-right:35px;'>";
									echo "<div class='input-group col-sm-4'  style='padding:10px; margin-left:auto; margin-right:auto; width:215px; '>";
									echo "<span class='input-group-addon'>$</span>
            						<input type='text' name='ans' id = 'ans' class='form-control' aria-label=''>
            						<span class='input-group-addon'>.00</span>";
									echo "</div>";
									echo "</div>";
									//end of first row
									
									//second row
									echo "<div class ='row' style='padding-top:10px; margin-left:auto; margin-right:auto; padding-left:10px;'>";
									echo "<div class = 'col-sm-1'  style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '1' onclick='oneButton()' id = 'one' style = 'font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>1</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '2' id = 'two' onclick='twoButton()'  style = 'font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>2</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '3' onclick='threeButton()' id = 'three' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>3</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '+' onclick ='plusButton()' id = 'plus' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>+</button></div>";
									echo "</div>";
									echo "</div>";
									//end second row
									
									// third row
									echo "<div class ='row' style='padding-top:20px; margin-left:auto; margin-right:auto; padding-left:10px;'>";
									echo "<div class = 'col-sm-1'  style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '4' onclick='fourButton()' id = 'four' style = 'font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>4</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '5' onclick='fiveButton()' id = 'five' style = 'font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>5</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '6' onclick='sixButton()' id = 'six' style = 'font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>6</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '-' id = 'minus' onclick = 'minusButton()' style = 'background-color:#E0E0E0; font-size:25px; border:solid 1px; border-radius:10px; padding:10px; padding-left:13px; padding-right:13px;'>-</button></div>";
									echo "</div>";
									echo "</div>";
									//end third row
									
									
									//fourth row
									echo "<div class ='row' style='padding-top:20px; margin-left:auto; margin-right:auto; padding-left:10px;'>";
									echo "<div class = 'col-sm-1'  style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '7' onclick='sevenButton()' id = 'seven' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>7</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '8' onclick='eightButton()' id = 'eight' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>8</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '9' onclick='nineButton()' id = 'nine' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>9</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '*' onclick = 'multipleButton()' id = 'times' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px; padding-left:13px; padding-right:13px;'>*</button></div>";
									echo "</div>";
									echo "</div>";
									//end fourth row
									
									// fifth row
									echo "<div class ='row' style='padding-top:20px; margin-left:auto; margin-right:auto; padding-left:10px; padding-bottom:15px;'>";
									echo "<div class = 'col-sm-1'  style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class ='btn btn-info' value = '0' onclick='zeroButton()' id = 'zero' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>0</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' value = '=' id = 'equals' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px;'>=</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1' style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class = 'btn btn-info' id = 'decimal' onclick= 'decimalButton()' value = '.' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px; padding-left:13px; padding-right:13px;'>.</button></div>";
									echo "</div>";
									echo "<div class = 'col-sm-1'  style = 'padding-right:30px;'>";
									echo "<div><button type = 'button' class='btn btn-info' id = 'divide' onclick='divideButton()' value = '/' style = ' font-size:25px; border:solid 1px; border-radius:10px; padding:10px; padding-left:13px; padding-right:13px;'>/</button></div>";
									echo "</div>";
									echo "</div>";
									//end of fifth row
									
									
									

									echo "</div>";
									echo "</div>";
									echo "</div>";
            						echo "</div>";
        							

									
									}	
								}
							// Search Trans need to change this 
								elseif (isset($_POST['srch']) && isset($_POST['findTrans'])) {
								// 	$query = "SELECT * FROM Transactions WHERE UserID = '".$_POST['findTrans']."'";
								// $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
								// while($row = mysqli_fetch_assoc($results)){
								// 	$date="";
								// 	date_default_timezone_set('UTC');
								// 	$jDate = date('m/d/Y');
								// 	$date = $row['Date'];
								// 	$newDate = date("M-d", strtotime($date));
								// 	echo "<table class='table'>";
								// 	echo "<tr>";
								// 	echo "<td class='col-sm-2''>".$row['AccountName']."</td>";
								// 	echo "<td class='col-sm-2''>".$row['Amount']."</td>";
								// 	echo "<td class='col-sm-2''>".$row['Action']."</td>";
								// 	echo "<td class='col-sm-2''>".$row['Ref']."</td>";
								// 	echo "<td class='col-sm-2''>".$newDate."</td>";
								// 	echo "</tr>";
								// 	echo "</table>";
								$findTran = filter_var($_POST['findTrans'], FILTER_SANITIZE_STRING); 
                                    
                                    
                                    
                                $query = "SELECT * FROM Transactions WHERE amount = '$findTran' OR accountname like '$findTran' OR date LIKE '%$findTran%' OR action LIKE '%$findTran%'";
                                $results = mysqli_query($cxn, $query) or die(mysqli_error($cxn));
                                $rdata = mysqli_num_rows($results);
                                echo "<div  id='journal' style='width:925px' align = 'center'>";
                                if(!$_POST['findTrans']== "")
                                {
                                if ($rdata > 0)
                                {
                                        
                                echo "<table class='table' style='width: 925px'>";
                                echo "<thead>";
                                echo "<tr>";        
                                echo "<td class='col-lg-1' align='center'><label>Account Title</label></th>";
                                echo "<td class='col-lg-1' align='right' style='width:3%'><label>Amount</label></th>";
                                echo "<td class='col-lg-1' align='center'><label>Normal Side</label></th>";
                                echo "<td class='col-lg-1' align='center'><label>Entry #</label></th>";
                                echo "<td class='col-lg-1' align='center'><label>Date</label></th>";
                                echo "<td class='col-lg-1' align='center'><label>Time</label></th>";        
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
                                    echo "<td class='col-sm-1' align='center'>".$row['Ref']."</td>";
                                    echo "<td class='col-sm-1' align='center'>".$newDate."</td>";
                                    echo "<td class='col-sm-1' align='center'>".$newTime."</td>";
                                    echo "</tr>";
                                    
                                    }
                                
                                    echo "</table>";
                                }	



                                else{
                                    if($rdata <= 0)
    {
        echo "<font color='red' size='5'><b>No Results Found</b></font>";
                                }


								}

                                }
else{
    echo "<font color='red' size='5'><b>No Results Found</b></font>";
}
					
		}
		
								?>
								</form>	
								

<style>
	#calcButton{
		width: 50px;
		height:50px;
		background-image:url("../dist/images/very-basic-calculator-icon.png");
		background-repeat: no-repeat;
		/*background-size: cover;*/
		background-size:100% 100%;
		background-color:white;
		border:none;
	}
</style>
<script>
$(document).ready(function(){
    $("#calcButton").click(function(){
        $("#calculator").toggle();
    });
});
</script>
<script>
	function calculator(){
		var one = document.getElementById("one").value;
		var two = document.getElementById("two").value;
		var three = document.getElementById("thre").value;
		var four = document.getElementById("four").value;
		var five = document.getElementById("five").value;
		var six = document.getElementById("six").value;
		var seven = document.getElementById("seven").value;
		var eight = document.getElementById("eight").value;
		var nine = document.getElementById("nine").value;
		var zero = document.getElementById("zero").value;

		
	}
</script>
<script>
	function oneButton(){
		//alert("one Button Clicked");
		var one = document.getElementById("one").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = one;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(one);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function minusButton(){
		//alert("one Button Clicked");
		var one = document.getElementById("minus").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = one;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(one);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function plusButton(){
		//alert("one Button Clicked");
		var one = document.getElementById("plus").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = one;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(one);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function multipleButton(){
		//alert("one Button Clicked");
		var one = document.getElementById("multiple").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = one;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(one);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function twoButton(){
		//alert("one Button Clicked");
		var two = document.getElementById("two").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = two;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(two);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function threeButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("three").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function fourButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("four").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function fiveButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("five").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function sixButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("six").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function sevenButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("seven").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function eightButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("eight").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function nineButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("nine").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>
<script>
	function zeroButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("zero").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>

<script>
	function divideButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("divide").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>

<script>
	function decimalButton(){
		//alert("one Button Clicked");
		var three = document.getElementById("decimal").value;
		var ans = document.getElementById("ans");
		if(ans.value === ""){
			ans.value = three;
		}
		else{
			//alert("Not empty");
			var numberInside = ans.value;
			var newNum = numberInside.concat(three);
			//alert(newNum);
			ans.value = newNum;
		}
		
		
	}
</script>

</div>
</div>
  </div>
 </div>



        
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script> 
    <!-- <script src="http://bootstrapdocs.com/v1.4.0/js/bootstrap-modal.js"></script> -->   
    
</body>
</html>
