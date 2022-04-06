<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Feeds Stock Details
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Panchayath/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
    <div class="row">
      <div class="box">
        <div class="box-header">
          <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <div class="">
            <div class="box-body table-responsive">
            <table id="feedStockTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sl.No</th>
                <th>FEED NAME</th>
                <th>DATE OF COLLECTION/PURCHASE</th>
                <th>PREVIOUS STOCK</th>
                <th>DATE OF USAGE</th>
                <th>BALANCE </th>
                <!-- <th>Action</th> -->
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
