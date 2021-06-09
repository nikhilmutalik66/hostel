
<?php 
require 'fetch_total_payment.php';
$pa="payment.php";
if (isset($_POST['submit']))
{

		
	$name = $_POST['pname'];
	$date1 = $_POST['date'];
	$cqno = $_POST['cqno'];
	$amount = $_POST['amount'];
	$dept = $_POST['dept'];
	$reason = $_POST['reason'];
	$month = strval(date('F-Y',strtotime($date1)));
	$d=str_replace(' ','_',$dept);
	//echo "<br>".$name."<br>".$cqno."<br>".$date1."<br>".$amount."<br>".$dept;
	$date = date('Y-m-d',strtotime($date1));
	//echo "$date"." "."$month"."  "."$reason";


	require 'dbconnect.php';

	
	$total_payment=0;
	$new_total_payment=0;
	$dept_amt=0;
	if ($flag==0) {
		
		//echo $total_payment;

		$qry1="INSERT into deptwisepay values (DEFAULT,'$month',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
		mysqli_query($con,$qry1);
		/*
		if(mysqli_query($con,$qry1))
			echo "inserted";
		else
			echo "Not Inserted";
			*/
	}
	else
	{
		for ($i=0; $i < $col; $i++) { 
			if($dept==$dept_names[$i])
			{
				$dept_amt=$dept_pay_amt[$i];
			}
		}

		$total_payment=$dept_pay_amt[24];
		//echo "$total_payment"."<br>".$dept_amt."<br>";

	}
	$dept_amt=$dept_amt+$amount;
	$new_total_payment=$total_payment+$amount;
	//echo "$new_total_payment"."<br>".$dept_amt;

	if($f_total_amount >= $total_payment)
	{
		$qry2 = "INSERT into transaction values (DEFAULT,'$cqno','$date','$month','N','$name','$dept','$reason','$amount')";
		$qry3="UPDATE deptwisepay set $d=$dept_amt,total=$new_total_payment where month='$month'";

		if (mysqli_query($con,$qry2)) 
		{
			//echo "<script>alert('Checque No=$cqno and Amount=$dept_amt added sucessfully'); </script>";


			if (mysqli_query($con,$qry3)) 
			{
				//echo "<script>alert('New Balance Updated to deptwisepay'); </script>";
				echo "<script>alert('Checque No=$cqno and Amount=$dept_amt added sucessfully'); </script>";
				echo "<script>location.href = '$pa';</script>";
			}
			else
			{
				echo "<script>alert('Not Updated'); </script>";
				echo "<script>location.href = '$pa';</script>";
				//echo mysqli_error($con);
			}
		}
		else
		{
			echo "<script> alert('$cqno is alredy added to Transaction'); </script>";
			echo "<script>location.href = '$pa';</script>";
			//echo mysqli_error($con);
		}
	}

}


