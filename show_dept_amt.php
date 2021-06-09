
<?php
include 'dbconnect.php';

//$page="dept_fund.php?";

$pa="dept_fund.php";


$old_amount=0;
$Available_bal=0;
		if (isset($_GET['submit']))
		{
			if(isset($_GET['month']) and isset($_GET['year']) and isset($_GET['dept']) and isset($_GET['amount']) )
			{

				$month = $_GET['month'];
				$year = $_GET['year'];
				$amount = $_GET['amount'];
				//echo "$month,$year,$amount";
				$m= $month."-".strval($year);
				$d= $_GET['dept'];
				$d=str_replace(' ','_',$d);
				//echo $d;
				//echo "$m";
				$page="dept_fund.php?mon=$m";
				$sql1 = "select amount from add_fund where month='$m' ";
				$res = mysqli_query($con,$sql1);
				$old_amount=0;
				if (mysqli_num_rows($res)>0) 
				{
					
					while($row=mysqli_fetch_array($res))
					{
						$old_amount=$old_amount+$row[0];
						
					}

					//echo "MAin Fund".$old_amount;
					$sql2 = "select total,$d from deptwisefund where month='$m' ";
					$total_amt=0;
					$dept_amt=0;
					$res1 = mysqli_query($con,$sql2);
					if (mysqli_num_rows($res1) > 0) 
					{
						$row1=mysqli_fetch_array($res1);
						$total_amt=$row1[0];
						$dept_amt=$row1[1];
						//echo "<br>".$total_amt."<br>".$dept_amt;
					}
					
					if ($total_amt==0)
					{
						$s1 = "INSERT into deptwisefund values (DEFAULT,'$m',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";	
						mysqli_query($con,$s1); 
					}

					$gtotal=$total_amt + $amount;
					$dept_amt=$dept_amt+$amount;
					$Available_bal=$old_amount - $total_amt;

					if ($old_amount >= $gtotal)
					{

						//$d= $_GET['dept'];
						

						$sql = "INSERT into deptwisefund values (DEFAULT,'$m',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0) ON DUPLICATE KEY UPDATE $d=$dept_amt, total=$gtotal ";
						//$sql3 = "INSERT into deduct_dept values ('$m',0,0,0,0,0,0,0,0,0,0,0) ON DUPLICATE KEY UPDATE $d=$amount , total=$gtotal ";
						if (mysqli_query($con,$sql))
						{
							echo "<script>alert('found is added');</script>";
							echo "<script>location.href = '$page';</script>";
						}
						else
						{
							echo "<script> alert('Fund Not Added'); </script>";
							echo "<script>location.href = '$pa';</script>";
						}

						//echo mysqli_error($con);
					}

					else
					{
						echo "<script> alert('Your MAIN_FUND is Exided and Available MAIN A/C BAL is = $Available_bal For $month'); </script> ";
						echo "<script>location.href = '$page';</script>";
					}
				}
				else
				{
					echo "<script> alert('Main A/C Balance not Added for month $month'); </script> ";
					echo "<script>location.href = '$page';</script>";
				}
			}//isset check for all Textbox
			else
			{
				echo "<script> alert('Any one data not selected or Enter Check First'); </script> ";
				echo "<script>location.href = '<1pa></1pa>';</script>";
			}
		}
		//Ends Inserting Query


		/* For Updating data In Dept_fund */

		if(isset($_GET['update']))
		{
			if(isset($_GET['month']) and isset($_GET['year']) and isset($_GET['dept']) and isset($_GET['amount']) )
			{
			//variable Redaing from Entered data 
				$month = $_GET['month'];
				$year = $_GET['year'];
				$amount = $_GET['amount'];
				//echo "$month,$year,$amount";
				$m= $month."-".strval($year);
				$d= $_GET['dept'];
				$d=str_replace(' ','_',$d);
				$page="dept_fund.php?mon=$m";
			//Retriving data from main Account
				$sq1 = "select amount from add_fund where month='$m' ";
				$re1 = mysqli_query($con,$sq1);
				$old_amount=0;
				while($ro1=mysqli_fetch_array($re1))
				{
					$old_amount+=$ro1[0];
					
				}
				//echo $old_amount;

			// Retriving Total amount from department_fund table
				$sq2 = "select total,$d from deptwisefund where month='$m' ";
				$total_amt=0;
				$re2 = mysqli_query($con,$sq2);
				if (mysqli_num_rows($re2) > 0) {
				$ro2=mysqli_fetch_array($re2);
				$total_amt=$ro2[0];
				$damt=$ro2[1];
				//echo "<br>".$total_amt.$damt;
				}
				

				// calculating Grand Total
				$total_amt = $total_amt - $damt;
				$gtotal=$total_amt + $amount;
				$Available_bal=$old_amount - $total_amt;
				if ($old_amount >= $gtotal)	
				{
				
				$sql = "UPDATE deptwisefund set $d=$amount,total=$gtotal where month='$m'";
				if (mysqli_query($con,$sql))
				{
					echo "<script>alert('$d found is Updated to $amount');</script>";
					echo "<script>location.href = '$page';</script>";
				}
				else
				{
					echo "<script> alert('Not Updated'); </script>";
					echo "<script>location.href = '$page';</script>";
				}
				//echo mysqli_error($con);
				}
				else
				{
				echo "<script> alert('Your MAIN_FUND is Exided and Available MAIN A/C BAL is $Available_bal For $month'); </script> " ;
				echo "<script>location.href = '$page';</script>";
				}
			}//isset check for all Textbox
			else
			{
				echo "<script> alert('Any one data not selected or Enter Check First');</script> ";
				echo "<script>location.href = '$pa';</script>";
			}	
		}//Ends Update


		/* Start code for retriving data */
	if(isset($_GET['mon']) || isset($_GET['show']))
	{
		$m="";

		if (isset($_GET['show'])) //when show buuton pressed
		{
			$month = $_GET['month'];
			$year = $_GET['year'];
			$m= $month."-".strval($year);
		}
		elseif ($_GET['mon']) // when update or insert data
		{
			$m=$_GET['mon'];
		}
			
		$page="dept_fund.php?mon=$m";

		//Retriving data from main Account
		$sq1 = "select amount from add_fund where month='$m' ";
		$re1 = mysqli_query($con,$sq1);
		$old_amount=0;
		while($ro1=mysqli_fetch_array($re1))
		{
			$old_amount+=$ro1[0];

		}

		//Query for selecting deptwise Fund
		$s2="select * from deptwisefund where month='$m'";
		$re2=mysqli_query($con,$s2);
		if( mysqli_num_rows($re2) > 0)
		{
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


			?>
			<h2 class="w3-center "><b><?php echo "$m"; ?> Month Deptwise Fund</b></h2>
			<table class="w3-table-all w3-card-4  w3-small w3-text-black">
					<tr class="w3-green">
						<th class="w3-border-right">Sl No </th>
						<th class="w3-border-right">Department Names</th>
						<th class="w3-border-right">Amount</th>
					</tr>
				
			<?php  	
		
			while ($row2=mysqli_fetch_array($re2)) 
			{
				?>
		
				<?php 	
				for ($i=2; $i <	 25; $i++) 
				{ 		
					$j=$i-1;
					if($i==24)
					{
					?>
						<tr>
							<th colspan="2" class="w3-border-right"><?php echo "TOTAL AMOUNT DISTRIBUTED"; ?></th>
							<th class="w3-border-right"><?php echo $row2[$i]; ?></th>
						</tr>
					<?php
						$total_amt=$row2[$i];
					}
					else
					{
					?>
						<tr>
							<td class="w3-border-right"><?php echo $j; ?></td>
							<td class="w3-border-right"><?php echo $dept_names[$i]; ?></td>
							<td class="w3-border-right"><?php echo $row2[$i]; ?></td>
						</tr>
					<?php 
					}
				}
			}
			$Available_bal=$old_amount - $total_amt;
			?>
			
			<tr>
				<td colspan="3" class="w3-green" align="center"><b><h3>TOTAL MONTH FUND DETAILS <?php echo "$m"; ?></h3></b></td>
			</tr>
			<tr>
				<th colspan="2" class="w3-border-right"><?php echo "TOTAL AMOUNT IN FUND"; ?></th>
				<th class="w3-border-right"><?php echo $old_amount; ?></th>
			</tr>
			<tr>
				<th colspan="2" class="w3-border-right w3-text-red"><?php echo "TOTAL AMOUNT DISTRIBUTED"; ?></th>
				<th class="w3-border-right w3-text-red"><?php echo $total_amt; ?></th>
			</tr>
			<tr>
				<th colspan="2" class="w3-border-right"><?php echo "AVAILABLE BALANACE "; ?></th>
				<th class="w3-border-right"><?php echo $Available_bal; ?></th>
			</tr>
			
			<?php 
		}
		else
		{
			echo "<script>alert('Data is not Avilable For Month-Year $m You selected');</script>";
			echo "<script>location.href = '$pa';</script>";
		}


	}
	else
	{
		?>
		<h2 class="w3-center "><b>Monthly Deptwise Fund</b></h2>
		<table class="w3-table-all w3-hoverable w3-small w3-text-black">
				<tr class="w3-green ">
					<th class="w3-border-right">Sl No </th>
					<th class="w3-border-right">Department Names</th>
					<th class="w3-border-right">Amount</th>
				</tr>
				<tr>
					
					<td colspan="3">
						<p class="w3-text-green">No data is selected</p>
						<p class="w3-text-green">Select Month and Year for show month Data</p>
					</td>
				</tr>
				
		<?php 

	}	
?>

</table>