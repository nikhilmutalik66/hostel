<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form action="" method="get">
		<input type="text" name="a">
		<input type="text" name="b">
		<input type="submit" value="submit" name="s">
	</form>

	<?php 
	$p="a.php";
	if (isset($_GET['s'])) {
			echo $_GET['a'];
			echo $_GET['b'];

			echo "<script> alert('Fund Not Added'); </script>";
			//echo "<script>location.href = '$p';</script>";
		}
	
	 ?>
</body>
</html>