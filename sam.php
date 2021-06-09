<!DOCTYPE html>
<html>
	<head>
		<title>Add Recipts</title>
		<?php
			readfile('link.html');
		?>

	<script type="text/javascript">
		function checkdept(val)
		{
			var element=document.getElementById('reason');
			if(val=='OTHERS')
				element.style.display='block';
			else
				element.style.display='none';
		}
	</script>
	</head>

	<body>
		<!-- Navigation bar start -->
		<?php 
			readfile('navbar.html');
		?>
		<!-- Navigation bar Ends -->
		<div class="w3-container w3-margin-top ">
			<div class="w3-container  w3-blue w3-margin-top w3-border  w3-padding " style="width: 35%;margin-left: 30px;" >
					
					<header ><h3>ADD RECIPTS</h3></header>
					
					<form class="w3-container w3-white w3-padding-16 w3-border w3-text-white" action="">
						<label class="w3-text-teal"><b>Date</b></label>
						<input class="w3-input w3-border w3-light-grey" type="date">
						<br>
						<label class="w3-text-teal"><b>Cheque Number</b></label>
						<input class="w3-input w3-border w3-light-grey" type="text">
						<br>
						<label class="w3-text-teal"><b>Recieved Person Name</b></label>
						<input class="w3-input w3-border w3-light-grey" type="text">
						<br>
						
						<label class="w3-text-teal"><b>DEPT</b></label>
						<select class="w3-select w3-border" onchange="checkdept(this.value)" name="dept">
							<option value="" disabled selected>Choose DEPT</option>
							<option value="OUT SOURCE EXPENSES">OUT SOURCE EXPENSES </option>
							<option value="GUEST TEACHERS SALARY">GUEST TEACHERS SALARY</option>
							<option value="FOOD BILL">FOOD BILL</option>
							<option value="TEXT AND NOTE BOOKS">TEXT AND NOTE BOOKS</option>
							<option value="SHOE AND SOCKS">SHOE AND SOCKS</option>
							<option value="BASIC NEEDS">BASIC NEEDS</option>
							<option value="SPORT MATERIALS">SPORT MATERIALS</option>
							<option value="MEDICAL EXPENSES">MEDICAL EXPENSES</option>
							<option value="EXAMINATION FEE">EXAMINATION FEE</option>
							<option value="RENT">RENT</option>
							<option value="ELECTRICAL CHARGES">ELECTRICAL CHARGES</option>
							<option value="TELAPHONE CHARGES">TELAPHONE CHARGES</option>
							<option value="WATER CHARGES">WATER CHARGES</option>
							<option value="SCHOOL EXAMINATION EXPENSES">SCHOOL EXAMINATION EXPENSES</option>
							<option value="STATUTORY AND TDS">STATUTORY AND TDS</option>
							<option value="ADMINISTRATIVE EXPENSES">ADMINISTRATIVE EXPENSES</option>
							<option value="NATIONAL FESTIVAL EXPENSES">NATIONAL FESTIVAL EXPENSES</option>
							<option value="STATIONARY EXPENSES">STATIONARY EXPENSES</option>
							<option value="REPAIR AND MAINTENANCE">REPAIR AND MAINTENANCE</option>
							<option value="MISCELLANEOUS EXP">MISCELLANEOUS EXP</option>
							<option value="BANK CHARGES">BANK CHARGES</option>
							<option value="OTHERS">OTHERS</option>
						</select>
						<br>
						<input class="w3-input w3-border w3-light-grey" id="reason" type="text" style="display: none;" placeholder="which purpose">
						<br>
							
						<label class="w3-text-teal"><b>Amount</b></label>
						<input class="w3-input w3-border w3-light-grey" type="number">
						<br>
						<input class="w3-btn w3-blue-grey" type="submit" name="submit">
						<input class="w3-btn w3-blue-grey" type="reset" name="submit">
					</form>
					<br>
				
			</div>
			<div class="w3-container w3-display-right  w3-border " style="width: 60%;margin-right:  20px;" >
				<h1>Table Data</h1>
				<table class="w3-table-all w3-small ">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Points</th>
					</tr>
					<tr>
						<td>Jill</td>
						<td>Smith</td>
						<td>50</td>
					</tr>
					<tr>
						<td>Eve</td>
						<td>Jackson</td>
						<td>94</td>
					</tr>
					<tr>
						<td>Adam</td>
						<td>Johnson</td>
						<td>67</td>
					</tr>
				</table>
				
			</div>



		</div>
	
	
	
	

	<?php 
		if (isset($_GET['submit'])) {
			echo "<script> alert('submit');</script>";
		}
	 ?>
	</body>
</html>