<?php
function cekAuth($username,$password)
{
	global $conn;
	$username=htmlentities($username);
	$password=htmlentities($password);
	$sql="select * from auth where uname='$username' and pass='$password'";
	$result = $conn->query($sql);
	return $result;
}