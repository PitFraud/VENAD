<?php
class numbertowordconvertsconver {
    function convert_number($number)
    {
        if (($number < 0) || ($number > 999999999))
        {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga)
        {
            $result .= $this->convert_number($giga) .  "Million";
        }
        if ($kilo)
        {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($kilo) . " Thousand";
        }
        if ($hecto)
        {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result))
            {
                $result .= " and ";
            }
            if ($deca < 2)
            {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n)
                {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result))
        {
            $result = "zero";
        }
        return $result;
    }
}
?>
<!-- Content Wrapper. Contains page content -->
 <style type="text/css">
   .table>tfoot>tr>td {
    border-top: 1px solid #ffffff;
}
 </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Invoice
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Purchase/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Purchase Invoice</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="invoice">

      <div id="divName">
       <div class="panel panel-default">
        <div class="panel-body">
      <!-- title row -->
    <div class="inner" id="invcontent">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-file"></i> <b>Invoice #<?php echo $records[0]->invoice_number;?></b>
            <small class="pull-right">Date: <?php echo date('d-m-Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-md-4 invoice-col">
          From
          <address>
            <strong><?php echo strtoupper($records[0]->vendorname);?></strong><br>
            <?php echo $records[0]->vendoraddress;?><br>
            Phone: <?php echo $records[0]->vendorphone;?><br>
            Email: <?php echo $records[0]->vendoremail;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-md-4 invoice-col">
          To
           <address>
            <strong>Venad Poultry Farmers Producer Company Limited</strong><br>
         NoXIV/542, Opposite Kottarakkara Railway Station,Kottarakkara,Kollam,Kerala-691006,India<br>State : Kerala Code : 32
         <br>Phone:0474 245 6225<br>Email : info@venadfarm.com<br>LIC NO : 11320002000801

          </address>
        </div>
        <!-- /.col -->
        <div class="col-md-4 invoice-col">Invoice
          <address>
          <b>Invoice #<?php echo $records[0]->invoice_number;?></b><br>
         <b>Date: <?php if(isset($records[0]->purchase_date)){ $pr_date = str_replace('-', '/', $records[0]->purchase_date); $pr_date =  date("d/m/Y",strtotime($pr_date));  echo $pr_date; }?></b><br>
       </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">

          <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;">
            <thead>
           <tr style="border-top: 1px solid #ddd;border-bottom:  1px solid #ddd;">
              <th style="border-right: 1px solid #ddd;padding: 10px;">S.No.</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Product Name</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;text-align: right;">Quantity</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Price</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Discount</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Tax</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;text-align: right;">Amount</th>
            </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:  1px solid #ddd;"></tr>
      <?php $sum = 0; $quantity_sum = 0; for($i=0;$i<count($records);$i++){?>
            <tr>
              <td style="border-right: 1px solid #ddd;padding: 10px;"><?php echo $j = $i + 1;?></td>
              <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;"><?php echo strtoupper($records[$i]->product_name); ?></td>
              <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;text-align: right;"><?php echo $records[$i]->purchase_quantity; ?> .Nos</td>
              <td style="border-right: 1px solid #ddd;padding: 10px;">Rs.<?php echo $records[$i]->purchase_price; ?></td>
              <td style="border-right: 1px solid #ddd;padding: 10px;"><?php echo $records[$i]->discount_price; ?> %</td>
              <!-- <td style="border-right: 1px solid #ddd;padding: 10px;"><?php echo $records[$i]->taxamount; ?> %</td> -->
              <td style="border-right: 1px solid #ddd;padding: 10px;"><?php echo $records[$i]->discount_price; ?> %</td>
              <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;text-align: right;"><?php echo $records[$i]->total_price; ?></td>
            </tr>
      <?php $sum = $sum + $records[$i]->total_price;
          $quantity_sum = $quantity_sum + $records[$i]->purchase_quantity;} ?>
          <tr>
            <td style="border-right: 1px solid #ddd;"></td>
            <td style="border-right: 1px solid #ddd;"></td>
            <td style="border-right: 1px solid #ddd;"></td>
            <td style="border-right: 1px solid #ddd;"></td>
            <td style="border-right: 1px solid #ddd;"></td>
            <td style="border-right: 1px solid #ddd;padding :100px;"></td>
          </tr>
            </tbody>
            <tfoot style="font-weight: bold;border-top:  1px solid #ddd;border-bottom: 1px solid #ddd;">

              <tr style="">
                <td style="border-right: 1px solid #ddd;"></td>  <td style="border-right: 1px solid #ddd;text-align: center;">Total</td>  <td style="border-right: 1px solid #ddd;text-align: right;"><?php echo $quantity_sum." "."Nos"; ?></td>  <td style="border-right: 1px solid #ddd;"></td>  <td style="border-right: 1px solid #ddd;"></td>
                   <td style="border-right: 1px solid #ddd;"></td><td style="padding: 10px;border-right: 1px solid #ddd;text-align: right;"><i class="fa
                    fa-inr"></i> <?php echo ($sum); ?></td>
              </tr>


            </tfoot>
          </table>
           <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
            <tr>
              <td style="padding: 10px;">Amount Chargable (In Words)<br>
                <?php $class_obj = new numbertowordconvertsconver();
                $convert_number = $sum;?><span style="font-weight: bold;"> <?php echo "INR". " ".$class_obj->convert_number($convert_number)." "."Only";?></span>

              </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
           </table>

          <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
            <tr style="padding: 10px;border-bottom: 1px solid #ddd;">
              <th style="border-right: 1px solid #ddd;padding: 10px;"></th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Old Balance</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Net Total</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Cash Paid</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;">Balance Amount</th>
              <th style="border-right: 1px solid #ddd;padding: 10px;"></th>
            </tr>
            <tr style="font-weight: bold;">
              <td style="border-right: 1px solid #ddd;padding: 10px;"></td>

            <td style="border-right: 1px solid #ddd;padding: 10px;"><i class="fa fa-inr"></i> <?php echo $records[0]->pur_old_bal;?></td>
            <td style="border-right: 1px solid #ddd;padding: 10px;"><i class="fa fa-inr"></i> <?php echo ($sum + $records[0]->pur_old_bal);?></td>
            <td style="border-right: 1px solid #ddd;padding: 10px;"><i class="fa fa-inr"></i> <?php echo ($sum + $records[0]->pur_old_bal);?></td>
            <td style="border-right: 1px solid #ddd;padding: 10px;"><i class="fa fa-inr"></i> <?php echo $records[0]->pur_new_bal;?></td>
            <td style="border-right: 1px solid #ddd;padding: 10px;"></td>
          </tr>
           </table>

        <!-- /.col -->
      </div>
      <!-- /.row -->


     </div>
      <!-- /.row -->
    </div>
  </div>
</div>

      <!-- this row will not appear when printing -->
      <div class="row no-print"><hr>
        <div class="col-xs-12">
          <a target="_blank" class="btn btn-default" id="print" onclick="printDiv('divName');"><i class="fa fa-print"></i> Print</a>
          <button type="button" id="genpdf" class="btn btn-success pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
      <a href="<?php echo base_url();?>purchase" class="btn btn-primary pull-right"><i class="fa fa-eye"></i> Go to View</a>
         </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
