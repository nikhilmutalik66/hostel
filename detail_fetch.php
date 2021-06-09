<!DOCTYPE html>



<?php 
//Button Click or Not
if (isset($_GET['submit'])) 
{
	if(isset($_GET['month']))
	{
		require 'dbconnect.php';
		$m=$_GET['month'];
		$y=$_GET['year'];
		$month = $m."-".$y;
		$total_amount=0;
		$opening_bal=0;
		$total_recipts=0;
		$total_pay=0;
		$t_d=0;
		$t_c=0;
		/* Fetch Amount from add_fund for Recipts and Opening bal of month */
		$query1 = "	SELECT * FROM add_fund where month='$month'";
		$res1 = mysqli_query($con,$query1);
		if (mysqli_num_rows($res1) > 0)
		{
			while ($row1=mysqli_fetch_array($res1)) 
			{
				if ($row1[3]=="OB") 
				{
					$opening_bal+=$row1[4];
					$total_amount+=$row1[4];
				}
				else
				{
					$total_recipts+=$row1[4];
					$total_amount+=$row1[4];
				}
			}
		

		/* Fetch Amount from deptwisepay for Total Payment of month */
		$query2 = "	SELECT total FROM deptwisepay where month='$month'";
		$res2 = mysqli_query($con,$query2);
		if (mysqli_num_rows($res2) > 0)
		{
			$row2=mysqli_fetch_array($res2);
			$total_pay=$row2[0];
		
		//echo "$month <br> $opening_bal <br> $total_recipts <br> $total_pay ";

?>
<table border="1px" class="w3-table-all w3-text-black">
	<tr>
		<th>SL NO</th>
		<th>DATE</th>
		<th>CHEQUE NO</th>
		<th>FOR/FROM DETAILS</th>
		<th>DEBIT</th>
		<th>CREDIT</th>
		<th>AMOUNT</th>
	</tr>
	<?php  
	$total=0;


	//Crete view

	$q="CREATE VIEW if not EXISTS one as SELECT mid,date,amount,reason,month FROM add_fund WHERE month='$month' UNION SELECT cheque,date,amount,dept,reason FROM transaction WHERE month='$month' ORDER BY `date` ASC;";
	mysqli_query($con,$q);
		

		//Fetch View one Details
		$query3 = "	SELECT * FROM one ";
		$res3 = mysqli_query($con,$query3);
		if (mysqli_num_rows($res3) > 0)
		{
			$i=1;
			while ($row3=mysqli_fetch_array($res3)) 
			{
				if ($row3[3]=="FUND FROM KREIS" || $row3[3]=="OB") 
				{
					$total=$total+$row3[2];
					$t_c=$t_c+$row3[2];
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo "$row3[1]"; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo "$row3[3]"; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo "+ $row3[2]"; ?></td>
					<td><?php echo "$total"; ?></td>
				</tr>
				<?php 
				}
				else
				{
					$total=$total-$row3[2];
					$t_d=$t_d+$row3[2];
					?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo "$row3[1]"; ?></td>
					<td><?php echo "$row3[0]"; ?></td>
					<td><?php echo "$row3[3]"." - $row3[4]"; ?></td>
					<td><?php echo "- $row3[2]"; ?></td>
					<td><?php echo ""; ?></td>
					<td><?php echo "$total"; ?></td>
				</tr>
					

					<?php 
				}
				$i++;
			}
		}
		else
		{
			echo "data not fetched dept_fund";
		}
		

		?>
		
		</table>
		<h2 class="w3-text-white">Total Credit = <?php echo "$t_c"; ?></h2>
		<h2 class="w3-text-white">Total Debit = <?php echo "$t_d"; ?></h2>
			<br><br><br>

		<h2 class="w3-text-white">Monthly Report <?php echo "$month"; ?></h2>
		<table class="w3-table-all w3-text-black" border="1px">
			<tr>
				<th colspan="2"><?php echo "$month"; ?></th>
			</tr>
			<tr>
				<td>Opening Balance</td>
				<td><?php echo "$opening_bal"; ?></td>
			</tr>
			<tr>
				<td>Recipts</td>
				<td><?php echo "$total_recipts"; ?></td>
			</tr>
			<tr>
				<td>Total Recipts </td>
				<td><?php echo $total_recipts + $opening_bal; ?></td>
			</tr>
			<tr>
				<td>Payment </td>
				<td><?php echo $total_pay; ?></td>
			</tr>
			<tr>
				<td>Remaing (Next Month Opening) </td>
				<td><?php echo $total_recipts+ $opening_bal - $total_pay; ?></td>
			</tr>
		</table>
		<?php 

		}
		else
		{
			echo "data not fetched add_fund for $month";
		}

		}
		else
		{
			echo "data not fetched dept_fund";
		}

	}

}

 ?>