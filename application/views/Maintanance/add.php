<style type="text/css">
.fsize
{
  font-size: 14px;
  font-family: 'Rubik', sans-serif;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Add Maintanance Records
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Maintanance/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="box-header">
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Add Maintanance data</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                   <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="vehicle_id" value="<?php if(isset($records->vehicle_id)) echo $records->vehicle_id; ?>"/>
                           <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Select Vehicle</label>
                      <select class="form-control" name="vehicle_name">
                        <?php foreach ($vehicles as $vehicle): ?>
                          <option value="<?php echo $vehicle->vehicle_id; ?>"><?php echo $vehicle->vehicle_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Driver</label>
                      <select class="form-control" name="driver_name">
                        <?php foreach ($drivers as $driver): ?>
                          <option value="<?php echo $driver->driver_id; ?>"><?php echo $driver->driver_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Complaint</label>
                        <input type="text" class="form-control" name="complaint" value="" placeholder="" required>
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Reason</label>
                      <input type="text" class="form-control" name="reason" value="" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Date</label>
                      <input type="date" class="form-control" name="date" value="" placeholder="" required>
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Workshop Name</label>
                      <input type="text" class="form-control" name="workshop" value="" placeholder="" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Cost</label>
                      <input type="number" step="0.01" class="form-control" name="cost" value="" placeholder="" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Insurance Received If Any</label>
                      <input type="number" step="0.01" class="form-control" name="insurance" value=0 placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Remarks</label>
                      <input type="text" class="form-control" name="remarks" value="" placeholder="" required>
                    </div>
                  </div>
                </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Maintanance Details</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
