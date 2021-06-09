<?php 
require 'dbconnect.php';
	$f_total_amount=0;
	$f_month="";
		$query1 = "	SELECT amount,month FROM total_fund ORDER BY id DESC LIMIT 1";
		$res_amt = mysqli_query($con,$query1);
		if (mysqli_num_rows($res_amt) > 0) 
		{
			
			$row_amt=mysqli_fetch_array($res_amt);
			$f_total_amount = $row_amt[0];
			$f_month = $row_amt[1];
		}
		

	
		
 ?>