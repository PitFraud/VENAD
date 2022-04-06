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
    Travel Details Management
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>TravelDetails/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>Add Travel Details</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                    <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="travel_id" value="<?php if(isset($records->vehicle_id)) echo $records->vehicle_id; ?>"/>
                           <?php echo validation_errors(); ?>

                    <!-- #################################################### -->
                    <div class="col-md-6">
                      <label class="fsize">Select vehicle</label>
                      <select class="form-control" name="vehicleSelect">
                        <?php foreach ($vehicles as $vehicle): ?>
                          <option value="<?php echo $vehicle->vehicle_id; ?>"><?php echo $vehicle->vehicle_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Driver</label>
                      <select class="form-control" name="driverSelect">
                        <?php foreach ($drivers as $driver): ?>
                          <option value="<?php echo $driver->driver_id; ?>"><?php echo $driver->driver_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Travel date</label>
                      <input type="date" class="form-control" name="travel_date"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label class="fsize">Starting KM</label>
                      <input type="number" step="0.01" class="form-control" name="starting_km"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="fsize">Ending KM</label>
                      <input type="number" step="0.01" class="form-control" name="ending_km"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="fsize">Total KM</label>
                      <input type="number" step="0.01" class="form-control" name="total_km"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-10">
                      <label class="fsize">Root Details</label>
                      <input type="text"  class="form-control" name="root_details"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label class="fsize">Fuel in Ltr</label>
                      <input type="number" step="0.01" class="form-control" name="fuel"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="fsize">Fuel Cost</label>
                      <input type="number" step="0.01" class="form-control" name="fuel_cost"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="fsize">Other Expenses (Rs)</label>
                      <input type="number" step="0.01" class="form-control" name="other_expenses"  value="<?php if(isset($records->travel_date)) echo $records->travel_date ?>">
                      </select>
                    </div>


                    </div>

                  </div>
                

                </div>
              </div>
            </div>

              <div class="box-footer">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Travel Details</button>
                  </div>
                </div>
            </div>
              <br>
              
              </div>
            </div>
          </section>
        </form>
      </div>
