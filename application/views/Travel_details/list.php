<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Travel details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Vehicles/"><i class="fa fa-dashboard"></i> Back To Vehicles</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">
         <div class="col-md-8"><h2 class="box-title"></h2> </div>
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <a href="<?php echo base_url();?>TravelDetails/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Travelling</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="vehicleTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Vehicle Name</th>
                  <th>Driver Name</th>
                  <th>Date of travel</th>
                  <th>Starting KM</th>
                  <th>Ending KM</th>
                  <th>Total KM</th>
                  <th>Root Details</th>
                  <th>Fuel (Ltr)</th>
                  <th>Fuel Cost</th>
                  <th>Other Expense</th>
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
