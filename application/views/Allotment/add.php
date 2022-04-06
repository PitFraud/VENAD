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
      Allot Item Information
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Allotment/add" enctype="multipart/form-data">
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
                  <input type="hidden" name="allot_id" value="<?php if(isset($records->allot_id)) echo $records->allot_id ?>"/>
                  <h3 class="panel-title"><b>ALLOT ITEM</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                    <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">

                    <div class="col-md-6">
                      <label class="fsize">Choose Item</label>

                      <select class="form-control" name="item_type" id="product">
                        <?php foreach ($products as $product) {?>
                          <option <?php if(isset($records->allot_item_id)){if($records->allot_item_id==$product->product_id){echo "selected";}} ?> value="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Choose Member Type</label>
                      <select class="form-control" name="member_type" id="memberTypeSelect">
                        <option value="">Select member type</option>
                        <?php foreach ($member_types as $type) {?>
                          <option <?php if(isset($records->allot_member_id_fk)){if($records->allot_member_id_fk==$type->member_type_id){echo "selected";}} ?> value="<?php echo $type->member_type_id; ?>"><?php echo $type->member_type_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">

                    <div class="col-md-6">
                      <label class="fsize">Choose Member</label>
                      <select class="form-control" name="member_name" id="memberSelect">
                        <?php foreach ($members as $member) {?>
                          <option <?php if(isset($records->allot_member_id_fk)){if($records->allot_member_id_fk==$type->member_type_id){echo "selected";}} ?> value="<?php echo $type->member_type_id; ?>"><?php echo $type->member_type_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Quanity</label>
                      <input class="form-control" type="text" name="quantity" value="<?php if(isset($records->allot_quantity)) echo $records->allot_quantity ?>" placeholder="Quantity of item">
                    </div>
                     </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Weight</label>
                      <input class="form-control" type="text" name="weight" value="<?php if(isset($records->allot_weight)) echo $records->allot_weight ?>" placeholder="Weight of item">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Unit</label>
                      <select class="form-control" name="unit" id="">
                        <option value="" disabled>Select Unit</option>
                        <?php foreach ($units as $unit) {?>
                          <option  <?php if(isset($records->allot_unit_fk)){if($records->allot_unit_fk==$unit->unit_id){echo "selected";}} ?> value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                     </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Vaccination Days</label>
                      <select class="form-control" name="vaccination_days" id="">
                        <option value="" disabled>Select Days</option>
                        <?php foreach ($vaccinationdays as $days) {?>
                          <option <?php if(isset($records->allot_vaccine_fk)){if($records->allot_vaccine_fk==$days->vaccination_id){echo "selected";}} ?>  value="<?php echo $days->vaccination_id; ?>"><?php echo $days->vaccination_name." - ".$days->vaccination_days." Days"; ?></option>
                        <?php } ?>
                      </select>
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
                    <button type="submit" class="btn btn-primary">Allot</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
