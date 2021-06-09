<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update transaction</title>

    <?php
        require 'link.html';
    ?>
</head>
<body>
    <?php
        require 'navbar.html';
    ?>

        <div class="w3-panel">
			<form action="" class="w3-container w3-text-black  w3-light-grey w3-border w3-text-blue w3-margin">
				<h2 class="w3-margin w3-text-green w3-margin-bottom">Search Transaction Details</h2>
				<div class="w3-row-padding">
				  <div class="w3-quarter w3-margin-bottom">
				    <label>Cheque Number</label>
                    <input class="w3-input w3-border" type="text" name="cqno" value="<?php echo $_GET['a']; ?>" placeholder="Check Number" disabled>
                    <input class="w3-input w3-border" type="hidden" name="cqno" value="<?php echo $_GET['a']; ?>" placeholder="Check Number" >  
				  </div>

				  <div class="w3-quarter w3-margin-bottom">
				    <label>Check State (P-PAID, N-NOT PAID)</label>
				    <input class="w3-input w3-border" type="text" value="<?php echo $_GET['b']; ?>" name="state" placeholder="Check Number">	
                </div>
                <div class="w3-quarter w3-right w3-margin">
				    <input class="w3-btn w3-green" type="submit" value="Submit" name="submit" style="width:49%">
				    <input class="w3-btn  w3-green" type="reset" value="Clear" style="width:49%">
                </div>
            
                <form action="" class="w3-container w3-text-black  w3-light-grey w3-border w3-text-blue w3-margin">
                <h2 class="w3-margin w3-text-green w3-margin-bottom">Closed Check</h2></form>   
                <div class="w3-quarter w3-margin-bottom">
                    <label>New Check Number</label>
				    <input class="w3-input w3-border" type="text" value="<?php echo $_GET['b']; ?>" name="state" placeholder="Check Number">
				  </div>  
                  <div class="w3-quarter w3-margin-bottom">
                    <label>Check State (P-PAID, N-NOT PAID)</label>
				    <input class="w3-input w3-border" type="text" value="<?php echo $_GET['b']; ?>" name="state" placeholder="Check Number">
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
            </div>
</body>
</html>