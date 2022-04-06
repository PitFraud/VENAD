<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Stock Information
      <small id="date" class="col-md-4"></small>

      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>PStock/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
          <div class="col-md-8">
            <h2 class="box-title"></h2>
          </div>



        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="classinfo_table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="text-align: center;">SINO</th>
                <th>PRODUCT NAME</th>
                <th>PRODUCT CODE</th>
                <th>PRODUCT PRICE</th>
                <th style="text-align: center;">TOTAL STOCK</th>
                <th style="text-align: center;">STOCK UPDATED DATE</th>
                <th>RECEIPT</th>
                <th>QR CODE</th>
                <th>BARCODE</th>

              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
