<?php
  require 'dbconnect.php';
  require 'fetch_fund.php';
  

  if (isset($_GET['submit']))
  {
    $f_amount=0;
    $f_m="";
    $f_s="";
    $q="";
    $flag=0;
    if (isset($_GET['month']) and isset($_GET['year']))
    {
        $month=$_GET['month'];
        $year=$_GET['year'];
        $m= $month."-".strval($year);

        $q_1 = "SELECT amount,month,state FROM total_fund where month='$m'";
        $res_1 = mysqli_query($con,$q_1);
        if (mysqli_num_rows($res_1) > 0) 
        {
            
            $row_1=mysqli_fetch_array($res_1);
            $f_amount = $row_1[0];
            $f_m = $row_1[1];
            $f_s = $row_1[2];
        }


          if (isset($_GET['state']))
          {
              $state=$_GET['state'];
              $q="SELECT * from transaction where month='$m' and check_state='$state'";
          }
          else
          {
              $q="SELECT * from transaction where month='$m'";
          }
      }
      else
      {
        if(isset($_GET['state']))
          {
            $state=$_GET['state'];
            $q="SELECT * from transaction where check_state='$state'";
          }
        else
        {
          if(isset($_GET['cqno']) and ($_GET['cqno'])!=0)
          {
            $cqno=$_GET['cqno'];
            $q="SELECT * from transaction where cheque='$cqno'";
          }
          else
          {
              $q="SELECT * from transaction where month='$f_month'";
              $flag=1;
          }
        }
    }
    //echo $q;
    ?>
    <table class="w3-table-all w3-margin-bottom  w3-card-4 w3-text-black">
      <tr>
        <th class="w3-border-right">SL NO</th>
        <th class="w3-border-right">CHECK NO</th>
        <th class="w3-border-right">DATE</th>
        <th class="w3-border-right">MONTH</th>
        <th class="w3-border-right">CHECK STATE</th>
        <th class="w3-border-right">PIAD TO</th>
        <th class="w3-border-right">DEPT</th>
        <th class="w3-border-right">REASON</th>
        <th class="w3-border-right">AMOUNT</th>
        <th class="w3-border-right">UPDATE</th>
      </tr>

    <?php

    $res=mysqli_query($con,$q);
    if(mysqli_num_rows($res)>0)
    {
      $i=1;
      $amt=0;
      while ($row=mysqli_fetch_row($res)) {
        ?>
        <tr>
          <form  action="" method="get">


          <td class="w3-border-right"><?php echo "$i"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="a" value="<?php echo "$row[1]"; ?>" ><?php echo "$row[1]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="b" value="<?php echo "$row[2]"; ?>" ><?php echo "$row[2]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="c" value="<?php echo "$row[3]"; ?>" ><?php echo "$row[3]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="d" value="<?php echo "$row[4]"; ?>" ><?php echo "$row[4]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="e" value="<?php echo "$row[5]"; ?>" ><?php echo "$row[5]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="f" value="<?php echo "$row[6]"; ?>" ><?php echo "$row[6]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="g" value="<?php echo "$row[7]"; ?>" ><?php echo "$row[7]"; ?></td>
          <td class="w3-border-right"><input type="hidden" name="h" value="<?php echo "$row[8]"; ?>" ><?php echo "$row[8]"; ?></td>
          <td class="w3-border-right">
          <input type="submit" class="w3-bth w3-green" name="submit" value="UPDATE">
          <?php
          if($f_s!="closed"){
            ?>
          <input type="submit" class="w3-bth w3-red" name="submit" value="delete" onclick="return confirm('If You really delete data?');"> 
        </td>
          <?php } ?>
  </form>
        </tr>

        <?php
          
        $amt+=$row[8];

        $i++;
      }
      if((isset($_GET['month']) and isset($_GET['year']) and $f_s="open") or $flag==1)
      {
      ?>
      <tr class="w3-gery">
        <th colspan="8" class="w3-border-right" ><b>TOTAL PAYMENT AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $amt;?></th>
        <th>Rupees</th>
      </tr>
      <tr class="w3-green">
        <th colspan="10" >REPORT OF <?php echo $f_month; ?></t>
      </tr>
      <tr>
      <th colspan="9" class="w3-border-right" ><b>TOTAL RECIPT AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $f_total_amount;?></th>
      </tr>
      <tr>
      <th colspan="9" class="w3-border-right" ><b>TOTAL PAYMENT AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $amt;?></th>
      </tr>
      <tr>
      <th colspan="9" class="w3-border-right" ><b>TOTAL REMANING AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $f_total_amount -$amt;?></th>
      </tr>
      <?php
    }
    if($f_s=="closed")
    {
      ?>
      <tr class="w3-gery">
        <th colspan="8" class="w3-border-right" ><b>TOTAL PAYMENT AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $amt;?></th>
        <th>Rupees</th>
      </tr>
      <tr class="w3-green">
        <th colspan="10" >REPORT OF <?php echo $f_m; ?></t>
      </tr>
      <tr>
      <th colspan="9" class="w3-border-right" ><b>TOTAL RECIPT AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $f_amount;?></th>
      </tr>
      <tr>
      <th colspan="9" class="w3-border-right" ><b>TOTAL PAYMENT AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $amt;?></th>
      </tr>
      <tr>
      <th colspan="9" class="w3-border-right" ><b>TOTAL CLOSSED WITH REMAINING AMOUNT</b></th>
        <th class="w3-border-right"><?php echo $f_amount -$amt;?></th>
      </tr>
      <?php
    }
  }
    else
    {
      ?>
      <tr>
          <td colspan="10"><h3>No DATA SELECTED</h3></td>
      </tr>

      </table>
      <?php
    }

  }
 ?>
