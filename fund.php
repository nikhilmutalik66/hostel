
<?php
		include 'dbconnect.php'; // adding database connection



			$date1 = $_GET['date'];
			$reason = $_GET['reason'];
			$amount = $_GET['amount'];
			$date = date('Y-m-d',strtotime($date1));
			$month = date('F-Y',strtotime($date1));
			$m=strval($month);

			//Fetching Amount From total_fund for month
			$s1= "select amount from total_fund where month='$m'";

			$res = mysqli_query($con,$s1);
			$old_amount=0;
			if (mysqli_num_rows($res) > 0)
			{

				while($row=mysqli_fetch_array($res))
				{
				$old_amount+=$row[0];

				}
				//total amount for that month
				//echo "    old=  ".$old_amount;
			}
			$open="open";
			//After adding new fund for month i.e new_amt
			$new_amt = $old_amount + $amount;
			//query for insert fund to add_fund table
			$sql1 = "insert into add_fund values(DEFAULT,'$date','$m','$reason','$amount')";
			//query for insert new month fund to total_fund or existing month Update amount
			$sql2 = "insert into total_fund values(DEFAULT,'$m','$new_amt','$open') ON DUPLICATE KEY UPDATE amount='$new_amt' ";

			if (mysqli_query($con,$sql1))//1st query runs
			{
					echo "<script>alert('found is added in main_fund'); </script>";

					if(mysqli_query($con,$sql2))//2nd query runs

						echo "<script>alert('found is added in total_fund'); </script>";

					else
						//2nd query fails
						echo "<script> alert('not added in total_fund'); </script>";
			}

			else
			{
				//1st query fails
				echo "<script> alert('not added in main_fund'); </script>";
			}
			//showing db error
				echo mysqli_error($con);

			header('add_fund.php');


?>
