<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Maintanance History
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Maintanance/add"><i class="fa fa-dashboard"></i> Back To add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">
        <div class="col-md-8"><h2 class="box-title"></h2> </div>
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <a href="<?php echo base_url();?>Maintanance/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Maintanance data</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="maintananceTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Vehicle Name</th>
                  <th>Driver</th>
                  <th>Complaint</th>
                  <th>Reason</th>
                  <th>Date</th>
                  <th>Workshop Name</th>
                  <th>Cost</th>
                  <th>Insurance Received</th>
                  <th>Remarks</th>
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
</div>
