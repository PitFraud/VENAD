<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Allot to Integrators
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
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <a href="<?php echo base_url();?>Allotment/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add allotment</a>
          <div class="">
            <div class="box-body table-responsive">
            <table id="allotmentTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sl.No</th>
                <th>Item Name</th>
                <th>Member Name</th>
                <th>Integration Code</th>
                <th>Member Type</th>
                <th>Quantity</th>
                <th>Weight</th>
                <th>Unit</th>
                <th>Date&Time</th>
                <th>Receipt</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
          <!-- <div class="col-md-8"><h2 class="box-title"></h2> </div> -->
        </div>
        </div>
      </div>
    </div>
</div>