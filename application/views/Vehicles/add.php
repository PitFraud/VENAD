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
      Vehicle Management
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Vehicles/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>ADD Vehicle</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                 <div class="panel-body" style="font-weight:bold;">
                <div class="form-group row">
                  <input type="hidden" name="vehicle_id" value="<?php if(isset($records->vehicle_id)) echo $records->vehicle_id; ?>"/>
                  <?php echo validation_errors(); ?>
                  <div class="col-md-6">
                    <!-- <?php var_dump($records); ?> -->
                    <label class="fsize">Vehicle Type</label>
                    <select class="form-control" name="vehicle_type">
                      <?php foreach ($vehicle_types as $type): ?>
                        <option <?php if(isset($records->vehicle_type_fk)){if($records->vehicle_type_fk==$type->type_id){echo "selected";}} ?> value="<?php echo $type->type_id; ?>"><?php echo $type->type_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="fsize">Registration Number</label>
                    <input type="text" class="form-control" name="reg_no" value="<?php if(isset($records->vehicle_reg_no)) echo $records->vehicle_reg_no; ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="fsize">Vehicle Name</label>
                    <input type="text" class="form-control" name="vehicle_name" value="<?php if(isset($records->vehicle_name)) echo $records->vehicle_name; ?>">
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Engine Number</label>
                    <input type="text" class="form-control" name="engine_no" value="<?php if(isset($records->vehicle_engine_number)) echo $records->vehicle_engine_number; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Make/Model</label>
                    <input type="text" class="form-control" name="make_model" value="<?php if(isset($records->vehicle_make_model)) echo $records->vehicle_make_model; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Chassis Number</label>
                    <input type="text" class="form-control" name="chassis_no" value="<?php if(isset($records->vehicle_chassis_number)) echo $records->vehicle_chassis_number; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Year of MFD</label>
                    <input type="text" class="form-control" name="year_mfd" value="<?php if(isset($records->vehicle_year_of_mfd)) echo $records->vehicle_year_of_mfd; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">FUEL TYPE</label>
                    <select class="form-control" name="fuel_type">
                      <option value="PETROL">PETROL</option>
                      <option value="DIESEL">DIESEL</option>
                      <option value="CNG">CNG</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Color</label>
                    <input type="text" class="form-control" name="color" value="<?php if(isset($records->vehicle_color)) echo $records->vehicle_color; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Fuel Measurement</label>
                    <input type="text" class="form-control" name="fuel_measurement" value="<?php if(isset($records->vehicle_fuel_mesurement)) echo $records->vehicle_fuel_mesurement; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Image</label>
                    <input type="file" class="form-control" name="vehicle_image" value="<?php if(isset($records->vehicle_image)) echo $records->vehicle_image; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Track Usage</label>
                    <input type="text" class="form-control" name="track_usage" value="<?php if(isset($records->vehicle_track_usage)) echo $records->vehicle_track_usage; ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Group</label>
                    <select class="form-control" name="group">
                      <?php foreach ($vehicle_groups as $group): ?>
                        <option <?php if(isset($records->vehicle_group_fk)){if($records->vehicle_group_fk==$group->group_id){echo "selected";}} ?> value="<?php echo $group->group_id; ?>"><?php echo $group->group_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Secondary or Auxilary</label><br>
                    <label for="0">Secondary</label>
                    <input type="radio" name="sec_or_aux" value="0" id="0">
                    <label for="1">Auxilary</label>
                    <input type="radio" name="sec_or_aux" value="1" id="1">
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
                <button type="submit" class="btn btn-primary">Add Vehicle</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
