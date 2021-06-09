<?php 
require 'dbconnect.php';

if(isset($_GET['update']))
{
	require 'databasebackup.php';
	
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="">
		
		<input type="submit" name="update">
	</form>
</body>
</html>