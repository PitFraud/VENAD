<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Travel Report
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Travel_report/"><i class="fa fa-dashboard"></i> Back to Add</a></li>
      <li class="active">Travel Report</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="col-md-8"><h2 class="box-title"></h2> </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="allotment_report_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sl.No</th>
              <th>Vehicle Name</th>
              <th>Driver Name</th>
              <th>Date of travel</th>
              <th>Starting KM</th>
              <th>Ending KM</th>
              <th>Total KM</th>
              <th>Root Details</th>
              <th>Fuel (Ltr)</th>
              <th>Fuel Cost</th>
              <th>Other Expense</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</div>
