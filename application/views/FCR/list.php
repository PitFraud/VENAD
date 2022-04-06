<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Feed Conversion Ratio Details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Vehicles/"><i class="fa fa-dashboard"></i> Back To Vehicles</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">

        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
        <div class="">
          <div class="box-body table-responsive">
            <table id="FCRTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Farmer Name</th>
                  <th>Product Name</th>
                  <th>Feed Conversion Ratio</th>
                  <th>Alloted Quantity</th>
                  <th>Alloted weight</th>
                  <th>Feeds given</th>
                  <th>Received Quantity</th>
                  <th>Received Weight</th>
                  <th>Allotment Date</th>
                  <th>Receival Date</th>

                  <!-- <th>Action</th> -->
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
