<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Vehicle details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Vehicles/add"><i class="fa fa-dashboard"></i> Back To Vehicles</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">
        <div class="col-md-8">
          <h2 class="box-title"></h2>
        </div>
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
        <a href="<?php echo base_url(); ?>Vehicles/add" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add Vehicle</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="vehicleTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Vehicle Image</th>
                  <th>Vehicle Type</th>
                  <th>Registration Number</th>
                  <th>Vehicle Name</th>
                  <th>Engine Number</th>
                  <th>Make/Model</th>
                  <th>Chassis Number</th>
                  <th>MFD Year</th>
                  <th>Fuel Type</th>
                  <th>Color</th>
                  <th>Fuel Measurement</th>
                  <th>Track Usage</th>
                  <th>Group</th>
                  <th>Secondary/Auxilary</th>
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