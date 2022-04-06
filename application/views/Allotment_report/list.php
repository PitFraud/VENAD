<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Allotment Report
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Purchase/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
      <li class="active">Allotment Report</li>
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
              <th>Item Name</th>
              <th>Member Name</th>
              <th>Member Type</th>
              <th>Quantity</th>
              <th>Weight</th>
              <th>Unit</th>
              <th>Vaccination</th>
              <th>Vaccination Date</th>
              <th>Date&Time</th>
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
