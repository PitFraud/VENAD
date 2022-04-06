<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Voucher Details
        <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Voucherhead/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
        <li class="active">Voucher Details</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-8"><h2 class="box-title"></h2> </div>
				
				
				<div class="col-md-2">
                  <a href="<?php echo base_url();?>Voucher/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add new</a>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="receipt_list">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Voucher Head</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Payed To</th>
                  <th>Narration</th>
                  <th>Receipt</th>
                  <th>Edit/Delete</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
     </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






