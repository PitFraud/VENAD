<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Integration Details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>ReceiveItem/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>ReceiveItem/add" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
            <div class="col-md-8">
              <h2 class="box-title"></h2>
            </div>
            <input type="hidden" name="rec_id" value="<?php if (isset($records->rec_id)) echo $records->rec_id ?>">
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <!-- <?php print_r($records); ?> -->
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Receive Item</b></h3>
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Select From Allotments</label>
                      <select class="form-control" name="allotment" id="allotment_id">
                        <?php foreach ($allotment_details as $allotment) : 
                          if($allotment->allot_integration_type == 1){
                            $x='Broiler';
                          }else{ $x='Layer';} ?>
                          <option <?php if (isset($records->rec_allotment_fk)) { if ($records->rec_allotment_fk == $allotment->allot_id) { echo "selected"; }} ?> value="<?php echo $allotment->allot_id; ?>"><?php echo $allotment->member_name . " - " . $x . " - " . $allotment->allot_integration_code . " - " . $allotment->allot_weight . " " . $allotment->unit_name . " - " . $allotment->allotment_date; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <input type="hidden" name="integration_type" id="integration_type_ids" value="">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Quanity</label>
                      <input class="form-control" type="text" name="quantity" id="quantity" value="<?php if (isset($records->rec_quantity)) echo $records->rec_quantity ?>" placeholder="Quantity of item">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Weight</label>
                      <!-- <input type="number" step="0.01"> -->
                      <input class="form-control" type="number" step="0.01" name="weight" id="weight" value="<?php if (isset($records->rec_weight)) echo $records->rec_weight ?>" placeholder="Weight of item">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Unit</label>
                      <select class="form-control" name="unit" id="unit">
                        <option value="" disabled>Select Unit</option>
                        <?php foreach ($units as $unit) { ?>
                          <option <?php if (isset($records->rec_unit)) { if ($records->rec_unit == $unit->unit_id) { echo "selected"; }} ?> value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    
                  </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                      <input type="radio" name="fcr_type" id="fcr_broiler" value="1">Broiler&nbsp;
                      <input type="radio" name="fcr_type" id="fcr_layer" value="2">Layer
                  </div>
                  <div class="col-md-6">
                    <label for="">Chicken Dead</label>
                    <input type="text" name="chicken_dead" class="form-control">
                  </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Total feed given</label>
                      <input type="text" name="feed_given" value="<?php if (isset($records->rec_given_feeds_total)) echo $records->rec_given_feeds_total ?>" class="form-control" id="feeding_quantity" readonly>
                      </select>
                    </div>
                    <div class="col-md-6" id="fcr_broiler_type" style="display: none;">
                      <label class="fsize">FCR Broiler</label>
                      <input type="text" name="fcr" value="<?php if (isset($records->rec_fcr)) echo $records->rec_fcr ?>" class="form-control" id="fcr" readonly>
                      <button type="button" name="button" class="btn btn-success form-control" id="fcr_btn">Calculate FCR</button>
                      </select>
                    </div>
                    <div class="col-md-6" id="fcr_layer_type" style="display: none;">
                      <label class="fsize">FCR Layer</label>
                      <input type="text" name="fcr" value="<?php if (isset($records->rec_fcr)) echo $records->rec_fcr ?>" class="form-control" id="fcr_layers" readonly>
                      <button type="button" name="button" class="btn btn-success form-control" id="fcr_layer_btn">Calculate FCR</button>
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
                <button type="submit" class="btn btn-primary">Add receival</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>

</div>
</section>
</form>
</div>