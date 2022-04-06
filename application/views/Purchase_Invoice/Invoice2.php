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
          </div>
          <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;">
            <tr style="border-top: 1px solid #ddd;border-bottom:  1px solid #ddd;">
              <th style="border-right: 1px solid #ddd;padding: 2px;text-align: center;"><small>Reciepient(Billed To)</small></th>
              <th style="border-right: 1px solid #ddd;padding: 2px;text-align: center;"><small>Delivery(Shipped To)</small></th>
              <th style="border-right: 1px solid #ddd;padding: 2px;text-align: center;"><small>Bill No</small></th>
            </tr>
            <tr>
              <td style="border-right: 1px solid #ddd;padding: 5px;">
                <strong><?php echo strtoupper($records[0]->vendorname);?></strong><br>
                <?php echo $records[0]->vendoraddress;?><br>
                Phone: <?php echo $records[0]->vendorphone;?><br>
                Email: <?php echo $records[0]->vendoremail;?><br>
                GST: 32AAFCV4857JIZ1
              </td>
              <td style="border-right: 1px solid #ddd;padding: 5px;">
                <strong>Venad Poultry Farmers Producer Company Limited</strong><br>
                NoXIV/542, Opposite Kottarakkara Railway Station,Kottarakkara,Kollam,Kerala-691006,India<br>State : Kerala Code : 32
                <br>Phone:0474 245 6225<br>Email : info@venadfarm.com<br>LIC NO : 11320002000801 <br>GST: 32AAFCV4857JIZ1
              </td>
              <td style="border-right: 1px solid #ddd;padding: 5px;">
                Invoice #<?php echo $records[0]->invoice_number;?> & Date: <?php if(isset($records[0]->purchase_date)){ $pr_date = str_replace('-', '/', $records[0]->purchase_date); $pr_date =  date("d/m/Y",strtotime($pr_date));  echo $pr_date; }?><br>
                Transport Mode: By Road <br>
                Vehicle No.: KL61E1262 <br>
                Date & Supply(State) : KERALA <br>
                Sales Person: Raju
              </td>
            </tr>
          </table>

          <!-- Table row -->
          <div class="row">

            <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;">
              <thead>
                <tr style="border-top: 1px solid #ddd;border-bottom:  1px solid #ddd;">
                  <th style="border-right: 1px solid #ddd;padding: 10px;">S.No.</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">Description of Goods</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">HSN Code</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">UOM</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">QTY</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">Unit Price Inclg Tax <i class="fa fa-inr"></i></th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">Unit Price Exclg Tax <i class="fa fa-inr"></i></th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">Discount <i class="fa fa-inr"></i></th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">Taxable Value <i class="fa fa-inr"></i></th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">GST %</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">IGST %</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;">SGST %</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;text-align: center;">CGST %</th>
                  <th style="border-right: 1px solid #ddd;padding: 10px;text-align: right;">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr style="border-bottom:  1px solid #ddd;"></tr>
                <?php $sum = 0; $quantity_sum = 0; $taxable_total = 0; $discount_tot = 0; for($i=0;$i<count($records);$i++){?>
                  <tr>
                    <td style="border-right: 1px solid #ddd;padding: 10px;"><?php echo $j = $i + 1;?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;"><?php echo strtoupper($records[$i]->product_name); ?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;"><?php echo strtoupper($records[$i]->product_code); ?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;">BGS</td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;text-align: right;"><?php echo $records[$i]->purchase_quantity; ?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">Rs.<?php echo $records[$i]->total_price; ?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">Rs.<?php echo $records[$i]->total_price; ?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;"><?php echo $records[$i]->discount_price; ?></td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">Rs.1000</td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">12%</td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">0%</td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">6%</td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;">6%</td>
                    <td style="border-right: 1px solid #ddd;padding: 10px;font-weight: bold;text-align: right;"><i class="fa fa-inr"></i> <?php echo $records[$i]->total_price; ?></td>
                  </tr>
                  <?php $sum = $sum + $records[$i]->total_price;
                  $quantity_sum = $quantity_sum + $records[$i]->purchase_quantity;
                  $discount_tot += $records[$i]->discount_price; } ?>

                  <tr>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;padding :20px;"></td>
                  </tr>
                </tbody>
                <tfoot style="font-weight: bold;border-top:  1px solid #ddd;border-bottom: 1px solid #ddd;">

                  <tr style="">
                    <td style="border-right: 1px solid #ddd;"></td><td style="border-right: 1px solid #ddd;">Net Weight(MT): 0.000</td>  <td style="border-right: 1px solid #ddd;text-align: center;">Total</td><td style="border-right: 1px solid #ddd;text-align: center;"></td>  <td style="border-right: 1px solid #ddd;text-align: center;"><?php echo $quantity_sum; ?></td>  <td style="border-right: 1px solid #ddd;"></td>  <td style="border-right: 1px solid #ddd;"></td>
                    <td style="border-right: 1px solid #ddd;padding :10px;"><i class="fa fa-inr"></i> <?php echo $discount_tot; ?></td> <td style="padding: 10px;border-right: 1px solid #ddd;text-align: center;"><i class="fa fa-inr"></i> <?php echo $taxable_total; ?></td><td style="border-right: 1px solid #ddd;" colspan="3"></td><td style="padding: 10px;border-right: 1px solid #ddd;text-align: center;"></td><td style="border-right: 1px solid #ddd;text-align: center;"><i class="fa fa-inr"></i> <?php echo ($sum); ?></td>
                    </tr>


                  </tfoot>
                </table>

                <div class="row">
                  <div class="col-md-4">
                    <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                      <tr style="border-bottom: 1px solid #ddd;">
                        <th style="border-right: 1px solid #ddd;padding: 5px;" colspan="2">Terms & Condition of Supply<br>ADVANCE TO BE PAID BY YOU <i class="fa fa-inr"></i> 0</th>
                      </tr>
                      <tr>
                        <td style="padding: 10px;">Bank A/C No. :</td>
                        <td>02354569877965455</td>
                      </tr>
                      <tr>
                        <td style="padding: 10px;">Bank Name :</td>
                        <td>HDFC Bank LTD Erode</td>
                      </tr>
                      <tr>
                        <td style="padding: 10px;">IFSC Code :</td>
                        <td>HDFC0000754</td>
                      </tr>
                      <tr>
                        <td style="padding: 10px;">Virtual A/C No.:</td>
                        <td>SKM2323TY</td>
                      </tr>
                      <tr>
                        <td style="padding: 10px;"></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="padding: 10px;"></td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-4">
                    <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                      <tr style="border-bottom: 1px solid #ddd;">
                        <th style="border-right: 1px solid #ddd;padding: 5px;">HSN Code</th>
                        <th style="border-right: 1px solid #ddd;padding: 5px;">QTY</th>
                        <th style="border-right: 1px solid #ddd;padding: 5px;">Taxable Value</th>
                        <th style="border-right: 1px solid #ddd;padding: 5px;">GST%</th>
                        <th style="border-right: 1px solid #ddd;padding: 5px;">IGST <i class="fa fa-inr"></i></th>
                        <th style="border-right: 1px solid #ddd;padding: 5px;">SGST <i class="fa fa-inr"></i></th>
                        <th style="border-right: 1px solid #ddd;padding: 5px;">CGST <i class="fa fa-inr"></i></th>
                      </tr>
                      <tr>
                        <td style="padding: 5px;">2098550</td>
                        <td style="padding: 5px;">50</td>
                        <td style="padding: 5px;">1000</td>
                        <td style="padding: 5px;">10 %</td>
                        <td style="padding: 5px;">00</td>
                        <td style="padding: 5px;">00</td>
                        <td style="padding: 5px;">00</td>
                      </tr>
                      <tr>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;">Total:</td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;">50</td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;">1000</td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;"></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;">00</td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;">00</td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;font-weight: bold;">00</td>
                      </tr>

                    </table>
                  </div>
                  <div class="col-md-4">
                    <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Gross Value: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Less Discount: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Taxable Value: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Total Tax: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Total Value: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">TCS@0.1%: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Rounded Off: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                      <tr style="border-bottom: 1px solid #ddd;">
                        <td style="border-right: 1px solid #ddd;padding: 5px;">Invoice Value: <i class="fa fa-inr"></i></td>
                        <td style="border-right: 1px solid #ddd;padding: 5px;">1000</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <table width="100%" style="border-right:1px solid #ddd;border-left: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                  <tr style="border-top: 1px solid #ddd;">
                    <td>Invoice Value (In Words): RUPEES ONE LAKH SIX THOUSAND ONE HUNDRED SIX ONLY</td>
                  </tr>
                  <tr>
                    <td>PAYMENT TERMS ADVANCE PAYMENT</td>
                  </tr>
                  <tr>
                  <td>
                    <br><br><br><br><br><br><br><br><br>
                  </td>
                  </tr>
                  <tr>
                    <td><small>(I/We recieved The above goods)</small></td>
                    <td><small>Certified That the Particulars given above are true<br>For:</small></td>
                  </tr>
                </table>

                <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>
            <!-- /.row -->
          </div>
        </div>
      <!-- </div> -->

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
