<?php
require ('Config.php');
include 'PasswordGenerator.php';	

include 'session.php';
admin_protect();
protect_page();							
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	<table  width="340px">
                    	<td><a href="admin.php"><input type="image" src="images/arrow2.png" name="image" width="25" height="25" onclick=""></a></td>
                        <td  style="padding-left:70px"><h3 class="panel-title"><b>Registration</b></h3></td>
                        </table>
                    </div>
					<div class="panel-body" >
												<form role="form" action='Register.php' method='POST'>
													<fieldset>
														<div class="form-group">
															<input class="form-control" placeholder="First Name" name="fname" type="text" autofocus>
															<span class="error"><b><font color="red"><?php echo $fnameError;?></b></font></span>
														</div>
														<div class="form-group">
															<input class="form-control" placeholder="Last Name" name="lname" type="text" autofocus>
															<span class="error"><b><font color="red"><?php echo $lnameError;?></b></font></span>
														</div>
												

														<div class="form-group">
															<input class="form-control" placeholder="Email" name="email" type="text" value="">
															<span class="error"><b><font color="red"><?php echo $emailError;?></b></font></span>
														</div>
														
														<div>
															<select name="type" id="userType">
																<option value="" selected="selected">Please Select User Type</option>
																<option value="1">Admin</option>
																<option value="2">Manager</option>
																<option value="3">User</option>
															</select>
															<br>
															<span class="error"><b><font color="red"><?php echo $dropdownError; ?></b></font></span>
														
														</div>

														<!--<div class="form-group">
															<input class="form-control" placeholder="Confirm Email" name="confirmemail" type="text" value="">
														</div>-->

														<!-- Change this to a button or input when using this as a form -->
														<div>
														<br>
														<input type="submit" name="register" value="Register" class="btn btn-lg btn-primary" style="width:95%" >
														<span class="success"><b><font color="green"><?php echo $successMessage;?></font></b></span>
														<span class="success"><?php echo $passwordMessage;?></span>
														<br>
														
														<label><a class="login" href="login.php">SignIn</a>	</label>
														</div>

													</fieldset>
												</form>
																										
											</div>
                </div>
            </div>
        </div>
    </div>

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
