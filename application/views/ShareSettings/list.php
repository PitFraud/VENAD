<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Current Share Settings
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Share/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
  <div class="row">
    <div class="box">
      <div class="box-header">
        <div class="col-md-8"><small></small></div>
        <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
        <a href="<?php echo base_url(); ?>ShareSettings/showModifySettingsPage" class="btn btn-primary"><i class="fa fa-plus-square"></i> Modify</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="shareTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Share Name</th>
                  <th>Value</th>
                  <th>Period</th>
                  <th>Month/Days</th>
                  <th>Divident in %</th>
                  <th>Last updation</th>
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
