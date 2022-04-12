<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Distribution Informations
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Distribution/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Distribution/add" enctype="multipart/form-data">
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
                  <input type="hidden" name="dist_id" value="<?php if (isset($records->dist_id)) echo $records->dist_id ?>" />
                  <h3 class="panel-title"><b>Distribute Items</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Choose Production Item</label>
                      <select class="form-control" name="production_item" id="productionItem" >
                        <option value="">Select Production item</option>
                        <?php foreach ($production_items as $item) { ?>
                          <option <?php if (isset($records->dist_item_id_fk)) {
                                    if ($records->dist_item_id_fk == $item->item_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $item->item_id; ?>"><?php echo $item->item_name; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myProduction">Add Production Item</button>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Choose Receiving Member Type</label>
                      <select class="form-control" name="member_type" id="memberTypeSelect" required>
                        <option value="">Select member type</option>
                        <?php foreach ($member_types as $type) { ?>
                          <option value="<?php echo $type->member_type_id; ?>"><?php echo $type->member_type_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Choose Member</label>
                      <select class="form-control" name="member_name" id="memberSelect" required>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Quanity</label>
                      <input class="form-control" type="text" name="quantity" id="quantity" value="<?php if (isset($records->dist_quantity_fk)) echo $records->dist_quantity_fk ?>" placeholder="Quantity of item" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Weight</label>
                      <input class="form-control" type="text" name="weight" value="<?php if (isset($records->dist_weight)) echo $records->dist_weight ?>" placeholder="Weight of item" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Unit</label>
                      <select class="form-control" name="unit" id="" required>
                        <option value="" disabled>Select Unit</option>
                        <?php foreach ($units as $unit) { ?>
                          <option <?php if (isset($records->dist_unit)) {
                                    if ($records->dist_unit == $unit->unit_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label for="">Distribution Code</label>
                      <input type="text" class="form-control" name="dist_code" autofocus required placeholder="Enter Distribution Code" value="<?php if (isset($records->dist_code)) echo $records->dist_code ?>">
                    </div>
                    <div class="col-md-6">
                      <label for="">Available stock</label><br>
                      <span id="availabale_stock"></span>
                      <input type="hidden" name="availabale_stock_hidden" id="availabale_stock_hidden">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                        <label for="">Next Distribution Date</label>
                        <input type="date" name="next_dist_date" class="form-control" id="" value="<?php if (isset($records->dist_next_date)) echo $records->dist_next_date ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="">Mode Of Purchase</label>
                        <select name="mop" id="" class="form-control">
                          <option value="">SELECT</option>
                          <option <?php if ($records->dist_mop == 1) echo "selected" ?> value="1">DEBIT</option>
                          <option <?php if ($records->dist_mop == 2) echo "selected" ?> value="2">CREDIT</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-md-6">
                      <label for="">Paid</label>
                      <input type="text" name="paid_amt" class="form-control" placeholder="Enter Amount" value="<?php if (isset($records->dist_paid)) echo $records->dist_paid ?>">
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
                <button type="submit" class="btn btn-primary">Add Distribution</button>
              </div>
            </div>
          </div>
        </div>
        <br>
      </div>
    </section>
  </form>
</div>



<!-- Modal -->
<div id="myProduction" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Production Item</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url() ?>Distribution/addProductionItem" method="POST">
            <div class="row">
              <div class="form-group">
                <div class="col-md-6">
                  <label for="">Production Name</label>
                  <input type="text" name="production_name" id="" class="form-control" placeholder="Enter Production Name">
                </div>
                <div class="col-md-6">
                  <label for="">Production Code</label>
                  <input type="text" name="production_code" id="" class="form-control" placeholder="Enter Production Code" style="text-transform: uppercase;">
                </div>
                <div class="col-md-6">
                  <label for="">MFD</label>
                  <input type="date" name="mf_date" id="" class="form-control" placeholder="Enter Manufacturing Date">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label for="">Expiry Date</label>
                  <input type="date" name="exp_date" id="" class="form-control" placeholder="Enter Expiery Date">
                </div>
                <div class="col-md-6">
                  <label for="">Quantity/No.of Packets</label>
                  <input type="text" name="Qty" id="" class="form-control" placeholder="Enter Quantity or No of Packets">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label for="">Weight Per Packet</label>
                  <input type="text" name="weight_per_pack" id="" class="form-control" placeholder="Enter Weight">
                </div>
                <div class="col-md-6">
                  <label for="">No. of Chicken Used</label>
                  <input type="text" name="no_chicken_used" id="" class="form-control" placeholder="Enter No of Chickens">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label for="">Raw Material/Chicken used[weight]</label>
                  <input type="text" name="raw_chicken_qty" id="" class="form-control" placeholder="Enter Raw Chicken Qty">
                </div>
                <div class="col-md-6">
                  <label for="">Unit</label>
                  <select name="unity" id="" class="form-control">
                    <option value="">SELECT</option>
                    <?php foreach($units as $unity){ ?>
                      <option value="<?php echo $unity->unit_id ?>"><?php echo $unity->unit_name ?></option>
                    <?php } ?>  
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label for="">Price</label>
                  <input type="text" name="price" class="form-control" id="" placeholder="Enter Price">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <center><input type="submit" class="btn btn-primary" name="submit" id="" value="save"></div></center>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>