<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<?php

 session_start();
if(isset($_SESSION['email']) )
 {
     header("Location:./index.php");
 }
 
//  session_destroy();

if( isset($_GET['Empty']) )
{
?>	
	<div class="alert alert-danger alert-dismissible" style="text-align: center;">
		<button type="button" class="close" data-dismiss="alert" >&times;</button>
		<?php echo $_GET['Empty']?>
	</div>

<?php
}

if( isset($_GET['Error']) )

{
?>	

	<div class="alert alert-danger alert-dismissible" style="text-align: center;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $_GET['Error']?>
	</div>
<?php 
}

?>


<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">

				<form method="POST" action="./PHP/LoginChk.php"  enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<button type="submit" name="loginButton" class="btn btn-primary">Login</button>
						
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</body>
</html>
