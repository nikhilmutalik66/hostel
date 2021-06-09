<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>transactions</title>
		<?php
				require 'link.html';
		 ?>
	</head>
	<body>
		<?php require 'navbar.html'; ?>
		<div class="w3-panel">
			<form action="" class="w3-container w3-text-black  w3-light-grey w3-border w3-text-blue w3-margin">
				<h2 class="w3-margin w3-text-green w3-margin-bottom">Search Transaction Details</h2>
				<div class="w3-row-padding">
				  <div class="w3-quarter w3-margin-bottom">
				    <label>Month (choose both mon-year)</label>
						<select class="w3-select w3-border " name="month" >
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
				  </div>
				  <div class="w3-quarter w3-margin-bottom">
				    <label>Year (choose both mon-year)</label>
						<select class="w3-select w3-border" name="year" >
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
				  </div>

				  <div class="w3-quarter w3-margin-bottom">
				    <label>Check State</label>
				    <select class="w3-select w3-border" name="state">
							<option value="" disabled selected>select check state</option>
								<option value="N">Not Paid</option>
								<option value="P">Paid</option>
								<option value="C">Cancled</option>
				    </select>
				  </div>
					<div class="w3-quarter w3-margin-bottom">
						<label>Check No. only (don't select other)</label>
						<input class="w3-input w3-border" type="text" name="cqno" placeholder="Check Number">
					</div>
				  <div class="w3-quarter w3-right w3-margin">
				    <input class="w3-btn w3-green" type="submit" value="Submit" name="submit" style="width:49%">
				    <input class="w3-btn  w3-green" type="reset" value="Clear" style="width:49%">
				  </div>
				</div>
	   		</form>

			<div class="w3-panel w3-blue">
				<div class="w3-center">
			<h3><b>ALL TRANSACTION DETAILS</b> </h3>
			</div>
					<?php
						require 'all_data.php';
					?>
			</div>
		</div>
	</body>
</html>
