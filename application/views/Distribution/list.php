<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sales/Distribution Details
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Distribution/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
  <div class="row">
    <div class="box">
      <div class="box-header">
        <div class="col-md-8">
          <h2 class="box-title"></h2>
        </div>
        <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
        <a href="<?php echo base_url(); ?>Distribution/add" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add Distribution</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="distributionTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Product Item</th>
                  <th>Distribution Code</th>
                  <th>Distributed to</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Unit</th>
                  <th>Date and time</th>
                  <th>Next Distribution Date</th>
                  <th>Mop</th>
                  <th>Paid</th>
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