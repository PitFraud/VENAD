<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Share Settings
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Panchayath/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="box">
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
        <div class="box-header">
          <div class="col-md-8"><h2 class="box-title"></h2> </div>
        </div>
        <form class="form-control" action="<?php echo base_url(); ?>ShareSettings/modifyShareSettings" method="post">
        <div class="box-body">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title"><b>Settings</b></h3>
                <!-- <div class="col-md-6"> -->
                </div>
                <div class="form-group row">
                         <?php echo validation_errors(); ?>
                  <div class="col-md-8">
                    <label class="fsize">Select share</label>
                    <select class="form-control" name="share_id" id="shareSelect">
                      <option value="" selected>---SELECT SHARE---</option>
                      <?php foreach ($share_list as $item): ?>
                        <option value="<?php echo $item->share_id; ?>"><?php echo $item->share_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="fsize">Share Period</label>
                    <input type="number" class="form-control" placeholder="Period in months or days" name="share_period" id="share_period">
                  </div>
                  <div class="col-md-2">
                    <label class="fsize">Type</label>
                    <select class="form-control" name="period_type" id="period_type">
                      <option value="0">Day(s)</option>
                      <option value="1">Month(s)</option>
                    </select>
                  </div>
                  <div class="col-md-8">
                    <label class="fsize">Divident percentage</label>
                    <input type="number" class="form-control" placeholder="Patronage divident percentage" name="divident_percentage" min="0" max="100" id="divident_percentage">
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                  <button type="submit" class="btn btn-primary">Modify Settings</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </section>
</div>
