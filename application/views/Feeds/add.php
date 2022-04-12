<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Feeds Management
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Feeds/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Feeds/add" enctype="multipart/form-data">
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
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>ADD Feeds Details</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="feeds_id" value="<?php if (isset($records->feeds_id)) echo $records->feeds_id ?>" />
                    <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Select From Allotments</label>
                      <select class="form-control" name="allotment">
                        <?php foreach ($allotment_details as $allotment) : ?>
                          <option <?php if (isset($records->feeds_allotment_fk)) {
                                    if ($records->feeds_allotment_fk == $allotment->allot_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $allotment->allot_id; ?>"><?php echo $allotment->member_name . " - " . $allotment->product_name . " - " . $allotment->allot_weight . " " . $allotment->unit_name . " - " . $allotment->allotment_date; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Distribution Date</label>
                      <input type="date" class="form-control" name="distribution_date" value="<?php if (isset($records->feeds_distribution_date)) {
                                                                                                echo $records->feeds_distribution_date;
                                                                                              } ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Feed name</label>
                      <select class="form-control" name="feeds_name">
                        <?php foreach ($feed_names as $feed) : ?>
                          <option <?php if (isset($records->feeds_id_fk)) {
                                    if ($records->feeds_id_fk == $feed->feed_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $feed->feed_id; ?>"><?php echo $feed->feed_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Feed details</label>
                      <input type="text" class="form-control" name="feeds_details" value="<?php if (isset($records->feeds_details)) echo $records->feeds_details ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Feeds Quantity</label>
                      <input type="text" class="form-control" name="feeds_quantity" value="<?php if (isset($records->feeds_quantity)) echo $records->feeds_quantity ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Units</label>
                      <select class="form-control" name="unit">
                        <?php foreach ($units as $unit) : ?>
                          <option <?php if (isset($records->feeds_unit)) {
                                    if ($records->feeds_unit == $unit->unit_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $unit->unit_id ?>"><?php echo $unit->unit_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <!-- ################################################# -->
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
                    <button type="submit" class="btn btn-primary">Add Feeds</button>
                  </div>
                </div>
              </div>
            </div>
    </section>
  </form>
</div>