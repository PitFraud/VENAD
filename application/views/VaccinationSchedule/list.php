<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Vaccination schedule details
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
            <a href="<?php echo base_url();?>VaccinationSchedule/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Vaccination schedule</a>
          <div class="">
            <div class="box-body table-responsive">
            <table id="scheduleTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sl.No</ths>
                <th>Member Name</th>
                <th>Vaccine Name</th>
                <th>Vaccine Dose</th>
                <th>Total Dose</th>
                <th>Vaccine Date</th>
                <th>Status</th>
                 <th>Receipt</th>
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
