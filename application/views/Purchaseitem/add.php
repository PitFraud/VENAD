<?php $arTax = array("" => '---Please Select---', 1 => 'Yes', 2 => 'No') ?>
<!-- Content Wrapper. Contains page content -->
<style>
  h4 {
    display: flex;
    flex-direction: row;
  }
  h4:before,
  h4:after {
    content: "";
    flex: 1 1;
    border-bottom: 2px solid #000;
    margin: auto;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Purchase Details Form
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Purchaseitem/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active">Purchase Form</li>
    </ol>
  </section>
  <!-- Main content -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Purchaseitem/add">
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <!-- /.box-header -->
            <!-- form start -->
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
            <!-- radio -->
            <div class="form-group">
              <?php echo validation_errors(); ?>
              <label for="inputEmail3" class="col-sm-2 control-label"></label>
            </div>
            <div class="box-body">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>PURCHASE FORM</b></h3>
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <h4><b>VENDOR DETAILS</b></h4>
                  <div class="form-group">
                    <div class="col-md-3" style="font-weight: bold;">
                      <label> Vendor Name <span style="color:red">*</span></label>
                      <input type="hidden" id="vendor_name" value="<?php if (isset($records->vendor_name)) echo $records->vendor_name; ?>" />
                      <?php echo form_dropdown('vendor_id', $vendor_names, '', 'id="vendor_id_fk" class="form-control select2"  data-pms-required="true" data-pms-type="dropDown"', 'name="vendor_id"'); ?>
                    </div>
                    <div class="col-md-3">
                      <label>Date: </label>
                      <input type="text" placeholder="Date" data-pms-required="true" class="form-control" name="purchase_date" id="date" value="<?php if (isset($records->purchase_date)) {echo $records->purchase_date;} else {echo date('d/m/Y');} ?>" style="font-weight: bold;">
                    </div>
                    <div class="col-md-3">
                      <label>Bill Number</label>
                      <input type="text" data-pms-required="true" id="purchase_invoice_number" class="form-control" name="purchase_invoice_number" placeholder="Invoice Number" value="<?php if (isset($records->invoice_number)) echo $records->invoice_number ?>" style="font-weight: bold;">
                    </div>
                    <div class="col-md-3">
                      <label>GSTIN No.</label>
                      <input type="text" data-pms-required="true" id="vendorgst" class="form-control" name="vendorgst" placeholder="GST Number" value="<?php if (isset($records->vendorgst)) echo $records->vendorgst ?>" style="font-weight: bold;">
                    </div>
                  </div>
                  <br>
                  <h4><b>PURCHASE ITEMS</b></h4>
                      <button class="btn btn-success btn-sm" id="add_new_item" data-toggle="modal" data-target="#myNewItem">Add New Item</button>
                  <div class="panel-body" style="font-weight:bold;">
                    <div class="box-body no-padding">
                      <div id="product" class="box-body no-padding"></div>
                      <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMore();" Style="color:green;"></i>
                      <i class="fa fa-fw fa-minus-square pull-right fa-2x" onClick="deleteRow();" Style="color:red;"></i>
                    </div>
                    <br>
                    <h4><b>TOTAL BILL DETAILS</b></h4>
                    <div class=" pull-left">
                      <div class="pull-left">
                        <h4>Old Balance &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><span id="old_bal" style="color:blue;">0</span><input type="hidden" id="old_bal_" name="old_bal"></b></h4>
                      </div></br>
                      <div class="pull-left">
                        <h4>Paid Amount &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input style="border: 1px solid #bfc9c2;width: 135px;" type="text" id="payng_amt" name="paid_amt" value="0"></h4>
                      </div>
                    </div>
                    <div class="NetTotalAmount pull-right">
                      <div class="pull-right">
                        <h4>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><span id="grand_total">0</span><input type="hidden" name="net_total" id="net_total" value="0" /></b></h4>
                      </div></br>
                      <div class="pull-right">
                        <h4>Net Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="net_bal" style="color:red;">0</span><input type="hidden" id="netbal" /><input type="hidden" name="net_balance" id="net_balance" /></b></h4>
                      </div>
                      <input type="hidden" id="new_bal" name="new_bal">
                    </div>
                  </div>
                </div>
                <!--first panel-->
              </div>
              <!-- /.box-footer -->
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!--/.col (right) -->
        </div>
    </section>
  </form>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- ADD NEW ITEM MODAL -->
<!-- Modal -->
<div id="myNewItem" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>Add New Item</h4>
      </div>
      <div class="modal-body">
        <form id="" action="<?php echo base_url() ?>Purchaseitem/addnewItem" method="POST">
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Item Type</label>
              
              <select name="prod_type_id" id="" class="form-control">
                <option value="">SELECT</option>
                
                <?php foreach($modal_prod_type as $types){ ?>
                  <option value="<?php echo $types->prod_cat_id ?>"><?php echo $types->prod_cat_name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Item Code</label>
              <input type="text" name="prod_code" class="form-control" placeholder="Enter Product Code">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Item Name</label>
              <input type="text" name="prod_name" id="" class="form-control" placeholder="Enter Product Name">
            </div>
            <div class="col-md-6">
              <label for="">Select Unit</label>
              <select name="prod_unit" id="" class="form-control">
                <option value="">SELECT</option>
                <?php foreach($modal_prod_unit as $units){ ?>
                  <option value="<?php echo $units->unit_id ?>"><?php echo $units->unit_name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Opening Stock</label>
              <input type="text" name="prod_op_stck" id="" class="form-control" placeholder="Enter Opening Stock">
            </div>
            <div class="col-md-6">
              <label for="">Minimum Stock</label>
              <input type="text" name="prod_min_stck" id="" class="form-control" placeholder="Enter Minimum Stock">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label for="">Description</label>
              <textarea name="prod_desc" id="" class="form-control" cols="30" rows="5" placeholder="Enter Product Description"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12"><br></div>
            <!-- <div class="col-md-12"><center><input name="helo" type="" value="Submit" class="btn btn-primary btn-sm"></center></div> -->
            <button name="submit" type="submit">SAVE</button>
            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- END NEW ITEM MODAL -->