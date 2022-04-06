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
      Distribution Informations
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Distribution/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <input type="hidden" name="dist_id" value="<?php if(isset($records->dist_id)) echo $records->dist_id ?>"/>
                  <h3 class="panel-title"><b>Distribute Items</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                    <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Choose Production Item</label>
                      <select class="form-control" name="production_item" id="productionItem" required>
                        <option value="">Select Production item</option>
                        <?php foreach ($production_items as $item) {?>
                          <option <?php if(isset($records->dist_item_id_fk)){if($records->dist_item_id_fk==$item->item_id){echo "selected";}} ?> value="<?php echo $item->item_id; ?>"><?php echo $item->item_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Choose Receiving Member Type</label>
                      <select class="form-control" name="member_type" id="memberTypeSelect" required>
                        <option value="">Select member type</option>
                        <?php foreach ($member_types as $type) {?>
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
                      <input class="form-control" type="text" name="quantity" id="quantity" value="<?php if(isset($records->dist_quantity_fk)) echo $records->dist_quantity_fk ?>" placeholder="Quantity of item" required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Weight</label>
                      <input class="form-control" type="text" name="weight" value="<?php if(isset($records->dist_weight)) echo $records->dist_weight ?>" placeholder="Weight of item" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Unit</label>
                      <select class="form-control" name="unit" id="" required>
                        <option value="" disabled>Select Unit</option>
                        <?php  foreach ($units as $unit) {?>
                          <option <?php if(isset($records->dist_unit)){if($records->dist_unit==$unit->unit_id){echo "selected";}} ?> value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                  </div>
                  <div class="form-group">
                  <div class="col-md-6">
                      <label for="">Distribution Code</label>
                      <input type="text" class="form-control" name="dist_code" autofocus required>
                    </div>
                    <div class="col-md-6">
                      <label for="">Available stock</label><br>
                      <span id="availabale_stock"></span>
                      <input type="hidden" name="availabale_stock_hidden" id="availabale_stock_hidden">
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
