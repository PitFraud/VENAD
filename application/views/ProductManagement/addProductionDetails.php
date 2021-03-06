<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add production Details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
      
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>ProductManagement/addProductionDetailsData" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
            <div class="col-md-8">
              <h2 class="box-title"></h2>
            </div>
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>ADD PRODUCTION DETAILS</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="">Select Chicken Type</label>
                      <select name="chicken_type" id="chicken_type" class="form-control">
                        <option value="">SELECT</option>
                        <option value="1">Broiler</option>
                        <option value="2">Layer</option>
                      </select>
                    </div> 
                    <div class="col-md-6">
                      <label for="">Current Chicken Weight</label>
                      <input type="text" name="current_weight" id="current_weights" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">No. of Chicken used</label>
                      <input type="number" step="0.01" name="chicken_used_count" class="form-control" value="<?php if (isset($records->production_chicken_count)) { echo $records->production_chicken_count; } ?>" placeholder="Number of chicken used for production">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Total Weight of Chicken</label>
                      <input type="number" id="chicken_weight_count" name="chicken_weight_count" class="form-control" value="<?php if (isset($records->production_chicken_count)) { echo $records->production_chicken_count; } ?>" placeholder="Total Weight Of Chicken">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" name="production_id" value="<?php if (isset($records->production_id)) { echo $records->production_id; } ?>">
                      <label class="fsize">Select Item</label>
                      <select class="form-control" name="item_name" id="item_list">
                        <?php foreach ($productionItems as $item) { ?>
                          <option <?php if (isset($records->production_item_id_fk)) { if ($records->production_item_id_fk == $item->item_id) { echo "selected"; }} ?> value="<?php echo $item->item_id; ?>"><?php echo $item->item_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">MFD</label>
                      <input type="date" name="mfd" class="form-control" value="<?php if (isset($records->production_mfd)) { echo $records->production_mfd; } ?>" placeholder="Enter manufacturing date. Eg:10-15-2020">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Expiry Date</label>
                      <input type="date" name="expiry_date" class="form-control" value="<?php if (isset($records->production_expiry)) { echo $records->production_expiry; } ?>" placeholder="Enter expiry date Eg:10-15-2021">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Quantity/No. Packets</label>
                      <input type="number" name="no_of_packets" class="form-control" value="<?php if (isset($records->production_quantity)) { echo $records->production_quantity; } ?>" placeholder="Quantity">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Weight Per Packet</label>
                      <input type="number" step="0.01" name="packet_weight" class="form-control" value="<?php if (isset($records->production_packet_weight)) { echo $records->production_packet_weight; } ?>" placeholder="Weight of a single packet in grams? Eg: 250,350,500">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Raw material/Chicken used [weight]</label>
                      <input type="number" step="0.01" id="row_mat_count" name="row_mat_count" class="form-control" value="<?php if (isset($records->production_row_mat_count)) { echo $records->production_row_mat_count; } ?>" placeholder="Quantity Of Raw Material">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Unit</label>
                      <select class="form-control" name="unit" id="">
                        <option value="" disabled>Select Unit</option>
                        <?php foreach ($units as $unit) { ?>
                          <option <?php if (isset($records->production_unit_id_fk)) {if ($records->production_unit_id_fk == $unit->unit_id) {echo "selected";}} ?> value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                        <?php } ?>
                      </select><br>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Price</label>
                      <input type="number" name="price" class="form-control" value="<?php if (isset($records->production_price)) {echo $records->production_price;} ?>" placeholder="Enter Price">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                        <label class="fsize">Product Code</label>
                        <input type="text" name="prod_code" class="form-control" value="" style="text-transform:uppercase" value="<?php if (isset($records->production_code)) {echo $records->production_code;} ?>" placeholder="Enter Product Code">
                    </div>
                    <div class="col-md-6">
                        <label class="fsize">Waste/Remaining Chicken Qty</label>
                        <input type="text" id="prod_waste" name="prod_waste" class="form-control" value=""  value="<?php if (isset($records->production_code)) {echo $records->production_code;} ?>" placeholder="Ente Waste Chicken Qty">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                       <center><span id="stock_listss" style="color:red;"></span></center> 
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
                <button type="submit" class="btn btn-primary">Confirm Production</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </form>
</div>