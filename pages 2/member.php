<?php
require ('config.php');
include 'member_validation.php';	
		
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
												
												<h3 class="panel-title">Welcome! <b><i><?php echo $login_session;?></i></b> Please change your password</h3>
											</div>
											<div class="panel-body" >
												<form role="form" action='member.php' method='POST'>
													<fieldset>
														<div class="form-group">
															<input class="form-control" placeholder="Old Password" name="oldpassword" type="password" autofocus>
															<span class="error"><font color="red"><b><?php echo $existError;?></b></font></span>
															<span class="error"><font color="red"><b><?php echo $empty;?></b></font></span>

														</div>
														<div class="form-group">
															<input class="form-control" placeholder="New Password" name="newpassword" type="password" autofocus>
															<span class="error"><font color="red"><b><?php echo $matchError;?></b></font></span>
															<span class="error"><font color="red"><b><?php echo $checkError;?></b></font></span>


															
															
														</div>
														<div class="form-group">
															<input class="form-control" placeholder="Confirm Password" name="confirmpassword" type="password" autofocus>
															<span class="error"><font color="red"><b><?php echo $matchError;?></b></font></span>

															
															
														</div>
														<label><a class="login" href="login.php">SignIn</a>	</label>
														<input type="submit" name="changepass" value="Change Password" class="btn btn-lg btn-primary" style="width:95%" >
														<span class="error"><font color="green"><b><?php echo $successMessage;?></b></font></span>
														

														
														
													
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
