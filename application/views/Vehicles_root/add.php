<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Vehicle Rout Map
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Vehicles_root/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Vehicles_root/add" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <div class="box-header">
            <div class="col-md-8">
              <h2 class="box-title"></h2>
            </div>
          </div>

          <div class="box-body">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Rout Map</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="vroot_id" value="<?php if (isset($records->root_id)) echo $records->root_id; ?>" />
                    <?php echo validation_errors(); ?>

                    <div class="col-md-4">
                      <label class="fsize">Vehicle Name</label>
                      <select name="vehicle_id_fk" class="form-control" style="font-weight: bold;">
                        <option value="">-SELECT-</option>
                        <?php foreach ($vehicle as $item) { ?>
                          <option value="<?php echo $item->vehicle_id; ?>"><?php echo $item->vehicle_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-4">
                      <label class="fsize">Driver Name</label>
                      <select name="driver_id_fk" class="form-control" style="font-weight: bold;">
                        <option value="">-SELECT-</option>
                        <?php foreach ($driver as $items) { ?>
                          <option value="<?php echo $items->driver_id; ?>"><?php echo $items->driver_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>


                    <div class="col-md-4">
                      <label class="fsize">Date</label>
                      <input type="date" data-pms-required="true" autofocus class="form-control" name="cdate" value="<?php if (isset($records->date)) echo $records->date ?>" style="font-weight: bold;">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="fsize">Rout Details</label>
                      <textarea class="form-control" name="vroot_details" rows="5" style="font-weight: bold;"><?php if (isset($records->vroot_details)) echo $records->vroot_details ?></textarea>
                    </div>
                  </div>
                  <h4>Route Details</h4>
                  <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover" id="annotations">
                      <thead>
                        <tr>
                          <th class="text-center col-md-3">
                            Destination
                          </th>
                          <th class="text-center col-md-3">
                            Place/Region
                          </th>
                          <th class="text-center col-md-3">
                            KM to Next Destination 
                          </th>
                          <th class="text-center col-md-3">
                            Arrival Time
                          </th>
                          <th class="text-center col-md-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr id='annotations_template' title='annotation'>
                          <td>
                            <input type="text" name='annotation_destination[]' placeholder="Enter Destination" class="form-control" />
                          </td>
                          <td>
                            <input type="text" name='annotation_place[]' placeholder="Enter Place/Region" class="form-control" />
                          </td>
                          <td>
                            <input type="text" name='annotation_km[]' placeholder="Enter Km To Next Destination" class="form-control" />
                          </td>
                          <td>
                            <input type="time" name='annotation_arrival_time[]' placeholder="Arrival Time" class="form-control" />
                          </td>
                          <td>
                            <button name="annotation_add" class='btn btn-success glyphicon glyphicon-plus row-add'></button>
                            <button name="annotation_delete" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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