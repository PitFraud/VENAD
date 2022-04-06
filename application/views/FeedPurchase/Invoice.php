<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Invoice
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>purchase/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Purchase Invoice</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
	  <div class="inner" id="invcontent">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Venad Poultry Farmers Producer Company Limited
            <small class="pull-right">Date: <?php if(isset($records[0]->created_at)){ $pr_date = str_replace('-', '/', $records[0]->created_at); $pr_date =  date("d/m/Y",strtotime($pr_date));  echo $pr_date; }?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $records[0]->purchase_vendor_name;?></strong><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>Venad Poultry Farmers Producer Company Limited</strong><br>
         NoXIV/542, Opposite Kottarakkara Railway Station,<br>
			Kottarakkara, ,Kottarakkara,Kerala,India<br>
			PIN:691506<br>Phone:<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <!-- <b>Invoice #<?php //echo $records[0]->invoice_number;?></b> --><br>
          <br>
          <!--<b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567-->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr style="border-top: ridge;border-bottom: ridge;">
              <th>S.No.</th>
			  <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
			
			  <th>Total</th>
            </tr>
            </thead>
            <tbody>
			<?php $sum = 0; $quantity_sum = 0; for($i=0;$i<count($records);$i++){?>
			 <tr>
              <td><?php echo $j = $i + 1;?></td>
			  <td><?php echo $records[$i]->feed_name; ?></td>
              <td><?php echo $records[$i]->purchase_quantity; ?> Nos.</td>
              <td>Rs.<?php echo $records[$i]->purchase_price; ?></td>
			         <td>Rs.<?php echo $records[$i]->purchase_total_cost; ?></td>
            </tr>
			<?php $sum = $sum + $records[$i]->purchase_total_cost;
			   } ?>
            </tbody>
            <tfoot style="border-top: ridge;border-bottom: ridge;">
               <tr style="font-weight: bold;"><td></td><td></td><td></td>
                <td>Net Total  </td>
                <td>Rs. <?php echo $sum; ?></td>
              </tr>
        <tr>
            </tfoot>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column--> 
       <div class="col-xs-12">
			
		</div> 
        <!-- /.col -->
        <div class="col-xs-6">

          <div class="table-responsive">
           
          </div>
        </div>
        <!-- /.col -->
      </div>
	   </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a target="_blank" class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</a>
        
		  <a href="<?php echo base_url();?>purchase" class="btn btn-primary pull-right"><i class="fa fa-eye"></i> Go to View</a>
         </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






