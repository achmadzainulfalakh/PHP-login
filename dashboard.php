<?php 
// memulai session
session_start();
/*cek session login*/
$sesi=$_SESSION['loggedIn'];
if ($sesi=='false' || !$_SESSION['loggedIn']) {
	header("location: index.php");
}
if ($_GET['logout']=='logout') {
	// menghapus semua variabel session
	session_unset();

	// mengakhiri session
	session_destroy(); 
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP-Dashboard</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	Selamat Datang di dashboard: <?php print $_SESSION['username']; ?><br>
	<a href="?logout=logout">logout</a>
</body>
</html>