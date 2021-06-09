<?php
	include 'fetch_fund.php';
	require 'dbconnect.php';
	//select Department Name
	$query2="SELECT count(*) AS col FROM information_schema.columns WHERE table_name='deptwisepay' ";
	$col=0;
	$res2 = mysqli_query($con,$query2);
	$row2=mysqli_fetch_array($res2);
	$col=$row2[0];
	//echo $col;
	
	//Select Dept Names
	$query3 ="SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'deptwisepay'";
	$res3= mysqli_query($con,$query3);
	$dept_names=array();
	if ( mysqli_num_rows($res3) > 0) 
	{	
		$i=0;
		while ($row3 = mysqli_fetch_array($res3))
		{
			$dept_names[$i]=$row3[0];
			$i++;
		}
	}



	$flag=0;
	//select all data from deptwisepay
	$query4 ="SELECT * from deptwisepay where month='$f_month'";
	$res4= mysqli_query($con,$query4);
	$dept_pay_amt=array();
	if ( mysqli_num_rows($res4) > 0) 
	{	
		
		while ($row4 = mysqli_fetch_array($res4)) 
		{

			for ($i=0; $i < $col; $i++) 
				$dept_pay_amt[$i]=$row4[$i];
		
		}
		$flag=1;
	}
	else
	{
		//echo "Not data retrived";
		$flag=0;
	}

	//select all dept_fund from deptwisefund table based on month
	$query5 ="SELECT * from deptwisefund where month='$f_month'";
	$res5= mysqli_query($con,$query5);
	$dept_fund_amt=array();
	if ( mysqli_num_rows($res5) > 0) 
	{	
		
		while ($row5 = mysqli_fetch_array($res5)) 
		{

			for ($i=0; $i < $col; $i++) 
				$dept_fund_amt[$i]=$row5[$i];
		
		}
		



	?>
	<!-- Displaying Data in Table -->
	<h2 class="w3-center"><b><?php echo "$f_month"; ?> Month Deptwise Payment</b></h2>
			<table class="w3-table-all w3-card-4  w3-small w3-text-black">
					<tr class="w3-green">
						<th class="w3-border-right">Sl No </th>
						<th class="w3-border-right">Department Names</th>
						<th class="w3-border-right">Dept. Funds </th>
						<th class="w3-border-right">Dept. Payments</th>
						<th class="w3-border-right">Balance Amount</th>
					</tr>
				
	<?php  
	//echo "<br>"."$dept_fund_amt[11]";
	//Showing all Details
	if ($flag==0) {
	
	//echo "<br>";
	for ($i=2; $i < $col; $i++) { 
		$j=$i-1;
		if ($dept_names[$i]=="total") {
				?>
			<tr class="w3-grey">
			<th class="w3-border-right"><?php echo $j; ?></th>
			<th class="w3-border-right"><?php echo "TOTAL"; ?></th>
			<th class="w3-border-right"><?php echo $dept_fund_amt[$i]; ?></th>
			<th class="w3-border-right"><?php echo  "Your not done any Payments in $f_month"; ?></th>
			<th><?php echo $dept_fund_amt[$i] - $flag; ?></th>
		</tr>
		<?php 
			}
			else
			{
		?>
		<tr>
			<td class="w3-border-right"><?php echo $j; ?></td>
			<td class="w3-border-right"><?php echo $dept_names[$i]; ?></td>
			<td class="w3-border-right"><?php echo $dept_fund_amt[$i]; ?></td>
			<td class="w3-border-right"><?php echo $flag; ?></td>
			<td><?php echo $dept_fund_amt[$i] -$flag; ?></td>

		</tr>
		
		
		<?php
		}
	}
	}
	else
	{
		for ($i=2; $i < $col; $i++) { 
			$j=$i-1;
			if ($dept_names[$i]=="total") {
				?>
			<tr class="w3-grey w3-border-right">
			<th class="w3-border-right"><?php echo $j; ?></th>
			<th class="w3-border-right"><?php echo "TOTAL"; ?></th>
			<th class="w3-border-right"><?php echo $dept_fund_amt[$i]; ?></th>
			<th class="w3-border-right"><?php echo $dept_pay_amt[$i]; ?></th>
			<th ><?php echo $dept_fund_amt[$i] - $dept_pay_amt[$i]; ?></th>
		</tr>
		<?php 
			}
			else{
		?>
		<tr>
			<td class="w3-border-right"><?php echo $j; ?></td>
			<td class="w3-border-right"><?php echo $dept_names[$i]; ?></td>
			<td class="w3-border-right"><?php echo $dept_fund_amt[$i]; ?></td>
			<td class="w3-border-right"><?php echo $dept_pay_amt[$i]; ?></td>
			<td><?php echo $dept_fund_amt[$i] - $dept_pay_amt[$i]; ?></td>
		</tr>
		<?php 
		}
	}
	?>
	<tr>
		<td colspan="5" class="w3-center">
			<h3><?php echo "$f_month"; ?> BALANCE REPORT</h3>
		</td>
	</tr>
	<tr>
		<th colspan="3" class="w3-border-right">TOTAL AMOUNT </th>
		<th colspan="2"><?php echo "$f_total_amount"; ?></th>
	</tr>
	<tr>
		<th colspan="3" class="w3-border-right">PAID AMOUNT </th>
		<th colspan="2" class="w3-text-red"><?php echo "- $dept_pay_amt[24]"; ?></th>
	</tr>
	<tr>
		<th colspan="3" class="w3-border-right">AVAILABLE AMOUNT </th>
		<th colspan="2"><?php echo $f_total_amount - $dept_pay_amt[24]; ?></th>
	</tr>
<?php 
	
}
}
 
	else
	{

	?>
			<th colspan="5" class="w3-border-right"><?php echo  "NOT DATA IS AVAILABLE"; ?></th>
	<?php
	}
 ?>


 
 </table>