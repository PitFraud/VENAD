<style type="text/css">
.fsize
{
  font-size: 14px;
  font-family: 'Rubik', sans-serif;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Reminder Information
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Reminders/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="box-header">
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Add Reminders</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                  <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="reminder_id" value="<?php if(isset($records->vehicle_id)) echo $records->vehicle_id; ?>"/>
                           <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Reminder Title</label>
                      <input type="text" class="form-control" name="reminder_title" value="<?php if(isset($records->reminder_title)) echo $records->reminder_title; ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Description</label>
                      <input type="text" class="form-control" name="reminder_description" value="<?php if(isset($records->reminder_description)) echo $records->reminder_description; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Reminder Date</label>
                      <input type="date" class="form-control" name="reminder_date" value="<?php if(isset($records->reminder_date)) echo $records->reminder_date; ?>">
                    </div>
                    </div>
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
                    <button type="submit" class="btn btn-primary">Add Reminder</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
