<style type="text/css">
   .fsize
  {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Transfer Shares
         <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>ShareTransfer/"><i class="fa fa-dashboard"></i> Back to List</a></li>
        <li class="active"></li>
      </ol>
    </section>
     <!-- Main content -->
     <form class="form-horizontal" method="POST" action="<?php echo base_url();?>/ShareTransfer/add" enctype="multipart/form-data">
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-8"><h2 class="box-title"></h2> </div>
            </div>
            <div class="box-body">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
             <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>TRANSFER SHARES</b></h3>
                </div>
                  <div class="panel-body" style="font-weight:bold;">
                  <input type="hidden" name="transfer_id" value="<?php if(isset($records->transfer_id)) echo $records->transfer_id ?>"/>
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="fsize">From</label>
                  <select class="form-control" name="from" id="fromSelect">
                    <option value="" selected>--SELECT--</option>
                    <?php foreach ($shareholders as $shareholder): ?>
                      <option value="<?php echo $shareholder->member_id; ?>"><?php echo $shareholder->member_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- <div class="col-md-6">
                  <label class="fsize">To</label>
                  <select class="form-control" name="from" id="toSelect">
                    <?php foreach ($shareholders as $shareholder): ?>
                      <option value="<?php echo $shareholder->member_id; ?>"><?php echo $shareholder->member_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div> -->
                <div class="col-md-6">
                  <label class="fsize">Holding shares</label>
                  <select class="form-control" name="from" id="avlshareSelect">

                  </select>
                </div>

              </div><br>

              </div><!--form-group--><br>
            <!-- /.box-header -->
          </div>
        </div>
      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             <br>
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
    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
