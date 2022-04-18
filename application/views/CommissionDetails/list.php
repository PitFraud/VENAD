<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Commission details
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>CommissionDetails/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
  <div class="row">
    <div class="box">
      <div class="box-header">
        <!-- <div class="col-md-8"><h2 class="box-title"></h2> </div> -->
        <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
        <!-- <a href="<?php echo base_url(); ?>Commission/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Commmission</a> -->
        <div class="">
          <div class="box-body table-responsive">
            <table id="commissionDetailsTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Farmer Name</th>
                  <th>Item Name</th>
                  <th>Member type</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Unit</th>
                  <th>Total Feeds Given</th>
                  <th>Feed Conversion Ratio</th>
                  <th>Commission Amount</th>
                  <th>Date&Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo base_url(); ?>CommissionDetails/add_commission" method="post">
        <div class="modal-header">
          <input type="hidden" name="member_id" id="member_id" value="">
          <input type="hidden" name="allot_id" id="allot_id" value="">
          <h5 class="modal-title" id="exampleModalLabel">Enter Commission Amount</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="rec_id" name="rec_id" value="">
          <label for="commissionamount">Enter Commission amount</label>
          <input type="text" name="commission_amount" value="" id="commission_amount" placeholder="Enter commission amount">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>