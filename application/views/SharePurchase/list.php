<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Share Purchase details
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>SharePurchase/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
  <div class="row">
    <div class="box">
      <div class="box-header">
        <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
        <div class="col-md-8"><small></small></div>
        <a href="<?php echo base_url(); ?>SharePurchase/add" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add SharePurchase</a>
        <center>Number Of Share Holder: <span style="color:red;"><b><?php if(isset($no_of_share_holder[0]->count)) echo $no_of_share_holder[0]->count ?></b></span></center>
        <div class="">
          <div class="box-body table-responsive">
            <table id="sharePurchaseTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Share Holder</th>
                  <th>Share Name/Value</th>
                  <th>Period</th>
                  <th>Value</th>
                  <th>Patronage Divident %</th>
                  <th>Quantity</th>
                  <th>Total amount</th>
                  <th>Paid</th>
                  <th>Date and Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
