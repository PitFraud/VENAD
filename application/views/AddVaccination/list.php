<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Vaccination details
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
            <a href="<?php echo base_url();?>AddVaccination/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>Add Vaccination Details</a>
          <div class="">
            <div class="box-body table-responsive">
            <table id="shareTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sl.No</th>
                <th>Reg No</th>
                <th>Reg Farmername</th>
                <th>Address</th>
                <th>Sale Date</th>
                <th>Chicken Qty</th>
                <th>Vaccine Qty</th>
                <th>Vaccine Details</th>
                <th>Vaccineted </th>
                <th>Used Vaccine Name </th>
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
