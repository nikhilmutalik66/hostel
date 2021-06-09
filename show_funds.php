<?php 
	include 'link.html';
	include 'dbconnect.php';

		$query1 = "SELECT amount,month FROM total_fund ORDER BY id DESC LIMIT 1";
		$res_amt = mysqli_query($con,$query1);
		$row_amt=mysqli_fetch_array($res_amt);
		$amt = $row_amt[0];
		$mon = $row_amt[1];
		//echo "$row_amt[0]".$row_amt[1];
		//$nmonth = date("m", strtotime($mon));

		?>
		<table class="w3-table-all w3-small w3-center">
			<tr>
				<th class="w3-border-right">SL NO </th>
				<th class="w3-border-right">DATE</th>
				<th class="w3-border-right">MONTHS</th>
				<th class="w3-border-right">FROM</th>
				<th class="w3-border-right">AMOUNT</th>
			</tr>
			
		<?php 
		$query2 ="select * from add_fund where month='$mon' ";
		//$amt=array();
		$res_rem = mysqli_query($con,$query2);
		if ( mysqli_num_rows($res_rem) > 0) 
		{
			while ($row_rem = mysqli_fetch_array($res_rem)) {
				?>
			<tr>
				<td class="w3-border-right "><?php echo "$row_rem[0]"; ?></td>
				<td class="w3-border-right"><?php echo "$row_rem[1]"; ?></td>
				<td class="w3-border-right"><?php echo "$row_rem[2]"; ?></td>
				<td class="w3-border-right"><?php echo "$row_rem[3]"; ?></td>
				<td ><?php echo "$row_rem[4]"; ?></td>
				
			</tr>
				<?php  


			}
		}
 ?>

 <tr>
 	<th class="w3-border-right" colspan="4">TOTAL AMOUNT FOR MONTH <?php echo "$mon"; ?></th>
 	<th ><?php echo "$amt"; ?></th>
 </tr>
</table>