<?php 
/*menyembunyikan laporan error di php*/
error_reporting(0);
include 'database.php';
include 'func_database.php';
/*memulai session*/ 
session_start();
/*cek session login*/
$sesi=$_SESSION['loggedIn'];
if ($sesi=='true') {
	header("location: dashboard.php");
}
if ($_POST['login']=='login') {
	$uname=$_POST['username'];
	$pass=$_POST['password'];

	$result=cekAuth($uname,$pass);
	$row=$result->fetch_assoc();
	
	if ($uname == $row['uname'] && $pass == $row['pass']) {
		$loggedIn='true';
		$uname=$_POST['username'];

		$_SESSION['loggedIn']=$loggedIn;
		$_SESSION['username']=$uname;
		header("location: dashboard.php");
	}
} print_r($_SESSION['loggedIn']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP-login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<body>
	<div class="container" style="padding-top: 60px">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sign In</h3>
					</div>
					<div class="panel-body">
						<form role="form" name="formlogin" action="" method="post">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>
								<!-- Change this to a button or input when using this as a form -->
								<input type="submit" name="login" value="login" class="btn btn-sm btn-success">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>