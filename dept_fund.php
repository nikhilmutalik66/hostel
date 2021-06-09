<!DOCTYPE html>
<html>
	<head>
		<title>Add Recipts</title>
		<?php
			readfile('link.html');
		?>
	</head>

	<body>

		<!-- Navigation bar start -->
		<?php 
			include 'navbar.html';
		 ?>
		<!-- Navigation bar Ends -->
		<div class="w3-container w3-margin-top ">
			<div class="w3-card-4 w3-display-left w3-deep-purple w3-margin-top w3-border  w3-padding " style="width: 40%; margin-left: 20px; margin-top: 100%;">
					<div class="w3-container w3-center">
						<h3><b>ADD DEPARTMENT-WISE FUND</b></h3>
					</div>
					<form class="w3-container w3-card-4 w3-white w3-padding-16 w3-border w3-text-white">
						<label class="w3-text-teal"><b>Month</b></label>
						<select class="w3-select w3-border" name="month" required>
							<option value="" disabled selected>Choose  Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="Septmber">Septmber</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
						<br><br>
						<label class="w3-text-teal"><b>Year</b></label>
						<select class="w3-select w3-border" name="year" required>
							<option value="" disabled selected>Choose  Year</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
						</select>
						<br><br>
						<label class="w3-text-teal"><b>DEPARTMENT</b></label>
						<select class="w3-select w3-border" name="dept" >
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
						<br><br>

						<label class="w3-text-teal"><b>Amount</b></label>
						<input class="w3-input w3-border w3-light-grey" type="number" name="amount">
						<br>
						<input class="w3-btn w3-blue" type="submit" value="submit" name="submit">
						&nbsp;&nbsp;&nbsp;
						<input class="w3-btn w3-blue" type="submit" value="update" name="update">
						&nbsp;&nbsp;&nbsp;
						<input class="w3-btn w3-blue" type="reset" value="Reset" >
						&nbsp;&nbsp;&nbsp;
						<input class="w3-btn w3-blue" type="submit" value="Show Data" name="show">
					</form>
					<br>
				
			</div>
		</div>	

		<div class="w3-container w3-card-4 w3-display-topright w3-border w3-padding-16 w3-deep-purple" style="width: 55%;margin-right: 10px; margin-left: 50px; margin-top: 8%;">
			
			<?php 
				include 'show_dept_amt.php';
			 ?>
		</div>

	
	</body>
</html>