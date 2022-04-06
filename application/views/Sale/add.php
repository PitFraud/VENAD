<?php $arTax = array("" => '---Please Select---', 1 => 'Yes', 2 => 'No') ?>
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sale Details Form
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Sale/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active">Sale Form</li>
    </ol>
  </section>

  <!-- Main content -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Sale/add/">
    <section class="content">
      <div class="row">

        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">

            <!-- /.box-header -->
            <!-- form start -->
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
            <!-- radio -->
            <div class="form-group">
              <?php echo validation_errors(); ?>
              <label for="inputEmail3" class="col-sm-2 control-label"></label>
            </div>
            <div class="box-body">
              <input type="hidden" id="shop_id_fk" class="form-control" name="shpid" value="<?php echo $this->session->userdata('shop_id') ?>" disabled />
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>SALES FORM</b></h3>
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <h4><b>CUSTOMER DETAILS</b></h4>
                  <div class="form-group">

                    <div class="col-md-3" style="font-weight: bold;">
                      <label> Bill No <span style="color:red">*</span></label>
                      <input type="text" placeholder="Bill No" class="form-control" name="bill_no" id="bill_no" value="<?php if (isset($records->auto_invoice)) { echo $records->auto_invoice; } else { echo rand(1111, 9999); } ?>" style="color:red;" />
                    </div>

                    <div class="col-md-3">
                      <label>Bill Date: </label>
                      <input type="text" placeholder="Bill Date" data-pms-required="true" class="form-control" name="purchase_date" id="date" value="<?php if (isset($records->purchase_date)) {echo $records->purchase_date;} else {echo date('Y/mm/dd');} ?>">
                    </div>

                    <div class="col-md-3">
                      <label>Invoice No.</label>
                      <input type="text" placeholder="Invoice Number" readonly class="form-control" name="invoice_no" id="invoice_n" value="<?php if (isset($records->invoice_number)) {echo $records->invoice_number;} else {echo $invno;} ?>" />
                    </div>

                    <div class="col-md-3">
                      <label>PO Date</label>
                      <input type="text" placeholder="" data-pms-required="true" class="form-control" name="purchase_date" id="pdate" value="<?php if (isset($records->purchase_date)) {echo $records->purchase_date;} else {echo date('Y/m/d');} ?>">
                    </div>
                  </div>

                  <div class="form-group">

                  <div class="col-md-4" style="font-weight: bold;">
                      <label>Member Type <span style="color:red">*</span></label>
                      <select class="form-control" name="member_type" id="member_types_all">
                        <option>--SELECT MEMBER TYPE--</option>
                        <?php
                        foreach ($member_type as $types) { ?>
                          <option value="<?php echo $types->member_type_id; ?>"><?php echo $types->member_type_name; ?></option>';
                        <?php } ?>
                        ?>
                      </select>
                    </div>

                    <div class="col-md-4" style="font-weight: bold;">
                      <label>Customer Name <span style="color:red">*</span></label>
                      <select class="form-control" name="customer_name" id="customer_name">
                        <option value="">SELECT</option>
                      </select>
                    </div>


                   <div class="col-md-4">
                      <label>Mobile No.</label>
                      <input type="text" class="form-control custphone" name="customer_phone" id="custphone" value="" />
                    </div>


                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>Address: </label>
                      <textarea class="form-control" name="customer_address" id="customer_addre"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="customer_email" class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="hidden" placeholder="Customer Email" class="form-control" name="customer_email" id="customer_email" value="0" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="hidden" placeholder="Customer GST" class="form-control" name="customer_gst" id="customer_gst" />
                    </div>
                  </div>
                  <br>
                  <h4><b>SALES ITEMS</b></h4><br>
                  <div class="box-body no-padding">
                    <div id="product" class="box-body no-padding"></div>
                    <i class="fa fa-fw fa-plus-square pull-left fa-2x" onClick="addMore();" Style="color:green;"></i>
                    <br /><br />
                    <i class="col-sm-5"></i>
                    <strong id="myDiv">Available Stock is: <span id="quant"></span></strong>
                    <i class="fa fa-fw fa-minus-square pull-right fa-2x" onClick="deleteRow();" Style="color:red;"></i>
                    <br /><br />
                    <div class="NetTotalAmount pull-righ" style="display: none;">
                      <table id="myTable" align="center" border="1" width="1000px">
                        <th style="background-color:#008000">
                          <font color="white">Sl no</font>
                        </th>
                        <th style="background-color:#008000">
                          <font color="white">Product Name</font>
                        </th>
                        <th style="background-color:#008000">
                          <font color="white">Quanity</font>
                        </th>
                        <th style="background-color:#008000">
                          <font color="white">Unit price</font>
                        </th>
                        <th style="background-color:#008000">
                          <font color="white">Total price</font>
                        </th>
                      </table>

                      <div class="pull-right">
                        <h3>Grand Tot: <b><span id="grand_tota"></span><br /><input type="text" name="net_total" id="net_total" /></b></h3>
                      </div>
                    </div>


                  </div>
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
                <!--first panel-->
              </div>


            </div>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
        <div class="box-footer">
          <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-4">
              <center>

                <button type="submit" class="btn btn-danger">Save</button>
                <button type="button" class="btn btn-primary" onclick="window.location.reload();">Cancel</button>
              </center>
            </div>
          </div>
        </div>
      </div>
      <!--/.col (right) -->
</div>

</section>
</form>
<!-- /.content -->

<!-- /.content-wrapper -->
