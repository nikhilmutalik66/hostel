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

			<div class="w3-container w3-display-left  w3-blue w3-border  w3-padding " style="width: 35%;margin-left: 30px; margin-top: 7%;" >

					<header class=""><h3><b>ADD PAYMENTS</b></h3></header>

					<form class="w3-container w3-card-4  w3-white w3-padding-16 w3-border w3-text-white" action="payment.php" method="post">
						<label class="w3-text-teal"><b>Date</b></label>
						<input class="w3-input w3-border w3-light-grey" type="date" name="date" >
						<br>
						<label class="w3-text-teal"><b>Cheque Number</b></label>
						<input class="w3-input w3-border w3-light-grey" type="text" name="cqno" >
						<br>
						<label class="w3-text-teal"><b>Recieved Person Name</b></label>
						<input class="w3-input w3-border w3-light-grey" type="text" name="pname" >
						<br>

						<label class="w3-text-teal"><b>DEPT</b></label>
						<select class="w3-select w3-border" onchange="checkdept(this.value)" name="dept" >
							<option value="" disabled selected>Choose DEPT</option>
							<option value="OUT SOURCE EXPENSES">OUT SOURCE EXPENSES </option>
							<option value="GUEST TEACHERS SALARY">GUEST TEACHERS SALARY</option>
							<option value="FOOD BILL">FOOD BILL</option>
							<option value="TEXT AND NOTE BOOKS">TEXT AND NOTE BOOKS</option>
							<option value="TA DA">TA DA</option>
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
						<input class="w3-input w3-border w3-light-grey" id="reason" type="text" style="display: none;" name="reason" placeholder="which purpose" >
						<br>

						<label class="w3-text-teal"><b>Amount</b></label>
						<input class="w3-input w3-border w3-light-grey" type="number" name="amount" >
						<br>
						<input class="w3-btn w3-blue-grey" type="submit" value="submit" name="submit">
						<input class="w3-btn w3-blue-grey" type="reset" name="submit">
					</form>
					<br>

			</div>
		</div>

		<div class="w3-container w3-blue w3-display-right w3-border" style="width: 60%;margin-right: 20px; margin-top: 26%;">

				<?php



						require 'add_cheque.php';

				?>
			<br>
		</div>

	</body>
</html>
