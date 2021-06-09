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
			readfile('navbar.html');
			if (isset($_GET['submit'])) {
				include 'fund.php';
			}

		?>
		<!-- Navigation bar Ends -->

		<div class="w3-container w3-margin-top ">
			<div class="w3-card-4 w3-display-left w3-blue w3-margin-top w3-border  w3-padding " style="width: 35%;margin-left: 20px;" >
					<div class="w3-container w3-center">
						<h2><b>ADD RECIPTES</b></h2>
					</div>
					<form class="w3-container w3-card-4 w3-white w3-padding-16 w3-border w3-text-white" action="">
						<label class="w3-text-teal"><b>Date</b></label>
						<input class="w3-input w3-border w3-light-grey" type="date" name="date">
						<br>
						<label class="w3-text-teal"><b>Recipt</b></label>
						<select class="w3-select w3-border" name="reason">
							<option value="" disabled selected>Choose From</option>
							<option value="FUND FROM MANEGEMENT">FUND FROM MANEGEMENT</option>
							<option value="BANK INTERST">BANK INTERST</option>
							<option value="OTHER RECEIPT">OTHER RECEIPT</option>
							<option value="OB">OB</option>
						</select>
						<br><br>
						<label class="w3-text-teal"><b>Amount</b></label>
						<input class="w3-input w3-border w3-light-grey" name="amount" type="number">
						<br>
						<input class="w3-btn w3-blue" type="submit" value="Submit" name="submit">
						<input class="w3-btn w3-blue" type="reset" value="Reset" >
					</form>
					<br>

			</div>
		</div>
			<div class="w3-container w3-display-topright w3-padding-16 w3-border " style="width: 60%;margin-right: 20px;margin-left: 0px; margin-top: 10%;" >
				<h2 class="w3-center"><b>CUREENT MONTH RECIPTS</b></h2>
				<?php
					include 'show_funds.php';
				 ?>
			</div>



	</body>
</html>
