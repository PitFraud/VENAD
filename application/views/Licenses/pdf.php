<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            License Details
            <small id="date" class="col-md-4"></small>
            <!-- <small>Optional description</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>FinYear/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
            <li class="active">License Details</li>
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
                <div class="box-body">
                    <embed src="<?php echo base_url() ?>upload/license/<?php echo $pdf->license_upload ?>" width="1200px" height="2100px" />
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->