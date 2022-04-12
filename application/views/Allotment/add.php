<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Allot to Integrators Information
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Allotment/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Allotment/add" enctype="multipart/form-data">
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
                  <input type="hidden" name="allot_id" value="<?php if (isset($records[0]->allot_id)) echo $records[0]->allot_id ?>" />
                  <h3 class="panel-title"><b>ALLOT TO INTEGARATORS</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Choose Item</label>
                      <select class="form-control" name="item_type" id="product22">
                        <?php foreach ($products as $product) { ?>
                          <option <?php if (isset($records[0]->allot_item_id)) {
                                    if ($records[0]->allot_item_id == $product->product_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?>&nbsp;&nbsp;-&nbsp;<?php echo $product->product_code; ?></option>
                        <?php } ?>
                      </select>
                      <br>
                      <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myItem">Add Item</a>
                    </div>
                    <div class="col-md-6">
                      <label for="">Integration Code</label>
                      <input type="text" name="integration_code" class="form-control" placeholder="Enter Integartion Code" style="text-transform: uppercase ;" value="<?php if(isset($records[0]->allot_integration_code)) echo $records[0]->allot_integration_code; ?>">
                    </div>

                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Choose Member Type</label>
                      <select class="form-control" name="member_type" id="memberTypeSelect">
                        <option value="">Select member type</option>
                        <?php foreach ($member_types as $type) { ?>
                          <option <?php if (isset($records[0]->member_type_id)) {
                                    if ($records[0]->member_type_id == $type->member_type_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $type->member_type_id; ?>"><?php echo $type->member_type_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Choose Member</label>
                      <select class="form-control" name="member_name" id="memberSelect">
                        <?php if (!empty($records[0]->allot_member_id_fk)) { ?>
                          <?php foreach ($members as $member) { ?>
                            <option <?php if (isset($records[0]->member_id)) {
                                      if ($records[0]->member_id == $member->member_id) {
                                        echo "selected";
                                      }
                                    } ?> value="<?php echo $member->member_id; ?>"><?php echo $member->member_name; ?></option>
                        <?php }
                        } ?>
                      </select>
                      <br>
                      <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myMembers">Add Member</a>
                    </div>
                    <div class="col-md-6">
                      <label for="">Integrator Type</label>
                      <select name="integartor_type" id="" class="form-control">
                        <option value="">SELECT</option>
                        <option value="1">Integrated Broiler</option>
                        <option value="2">Integrated Layer</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Quanity</label>
                      <input class="form-control" type="text" name="quantity" value="<?php if (isset($records[0]->allot_quantity)) echo $records[0]->allot_quantity ?>" placeholder="Quantity of item">
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Weight</label>
                      <input class="form-control" type="text" name="weight" value="<?php if (isset($records[0]->allot_weight)) echo $records[0]->allot_weight ?>" placeholder="Weight of item">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Unit</label>
                      <select class="form-control" name="unit" id="unit22">
                        <option value="" disabled>Select Unit</option>
                        <?php foreach ($units as $unit) { ?>
                          <option <?php if (isset($records[0]->allot_unit_fk)) {
                                    if ($records[0]->allot_unit_fk == $unit->unit_id) {
                                      echo "selected";
                                    }
                                  } ?> value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
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


<!-- Modal -->
<div id="myItem" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD ITEM</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>Allotment/addItem" method="POST">
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Item Type</label>
              <select name="item_type" id="item_type22" class="form-control" required>
                <option value="">-SELECT-</option>
                <?php foreach ($item_type as $item_types) { ?>
                  <option value="<?php echo $item_types->prod_cat_id ?>"><?php echo $item_types->prod_cat_name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Item Name</label>
              <input type="text" name="item_name" id="" class="form-control" placeholder="Enter Item Name">
            </div>
            <div class="col-md-6">
              <label for="">Item Code</label>
              <input type="text" name="item_code" id="" class="form-control" placeholder="Enter Item Code">
            </div>
            <div class="col-md-6">
              <label for="">Item Unit</label>
              <select name="item_unit" id="" class="form-control" required>
                <option value="">-SELECT-</option>
                <?php foreach ($item_unit as $item_units) { ?>
                  <option value="<?php echo $item_units->unit_id ?>"><?php echo $item_units->unit_name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Opening Stock</label>
              <input type="text" name="opening_stck" id="" class="form-control" placeholder="Enter Opening Stock">
            </div>
            <div class="col-md-6">
              <label for="">Minimum Stock</label>
              <input type="text" name="minimum_stck" id="" class="form-control" placeholder="Enter Minimum Stock">
            </div>
            <div class="col-md-12">
              <label for="">Description</label>
              <textarea name="description" class="form-control" id="" cols="30" rows="5" placeholder="Enter Item Discription"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
              <center><input type="submit" class="btn btn-success" value="SAVE"></center>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div id="myMembers" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD MEMBER</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>Allotment/addMember" method="POST">
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Member Type</label>
              <select name="mem_type" id="" class="form-control">
                <option value="">SELECT</option>
                <?php foreach($modal_member_type as $modal_member_types){ ?>
                  <option value="<?php echo $modal_member_types->member_type_id ?>"><?php echo $modal_member_types->member_type_name ?></option>
                <?php } ?>  
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Member Name</label>
              <input type="text" name="mem_name" id="" class="form-control" placeholder="Enter Member Name">
            </div>
            <div class="col-md-6">
              <label for="">Member ID</label>
              <input type="text" name="mem_id" id="" class="form-control" placeholder="Enter Member ID">
            </div>
            <div class="col-md-6">
              <label for="">Member Gender</label>
              <select name="mem_gender" id="" class="form-control">
                <option value="">SELECT</option>
                <option value="1">MALE</option>
                <option value="2">FEMALE</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Member Address</label>
              <input type="text" name="mem_address" id="" class="form-control" placeholder="Enter Member Address">
            </div>
            <div class="col-md-6">
              <label for="">Member DOB</label>
              <input type="date" name="mem_dob" id="" class="form-control" placeholder="Enter Member DOB">
            </div>
            <div class="col-md-6">
              <label for="">Member State</label>
              <select name="mem_state" id="mem_state" class="form-control">
                <option value="">SELECT</option>
                <?php foreach($modal_member_state as $modal_member_states){ ?>
                  <option value="<?php echo $modal_member_states->state_id ?>"><?php echo $modal_member_states->state_name ?></option>
                <?php } ?> 
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Member District</label>
              <select name="mem_district" id="mem_disctrict" class="form-control">

              </select>
            </div>
            <div class="col-md-6">
              <label for="">Member Panchayat</label>
              <select name="mem_panchayat" id="mem_panchayat" class="form-control">

              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
              <center><input type="submit" class="btn btn-success" value="SAVE"></center>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>