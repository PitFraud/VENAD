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
      Reminder/Notification Information
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
                  <h3 class="panel-title"><b>Add New Notification/Reminder</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="reminder_id" value="<?php if(isset($records->reminder_id)) echo $records->reminder_id; ?>"/>
                    <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Title</label>
                      <input type="text" class="form-control" name="reminder_title" value="<?php if(isset($records->reminder_title)) echo $records->reminder_title; ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Description</label>
                      <input type="text" class="form-control" name="reminder_description" value="<?php if(isset($records->reminder_description)) echo $records->reminder_description; ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Broadcast time</label>
                      <input type="time" class="form-control" name="brodcast_time" id="timeInput" class="form-control" value="<?php if(isset($records->reminder_broadcast_time)) echo $records->reminder_broadcast_time; ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">How many times?</label>
                      <input type="number" class="form-control" id="no_of_times" name="no_of_times" value="<?php if(isset($records->reminder_no_of_times)) echo $records->reminder_no_of_times; ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Start date</label>
                      <input type="date" class="form-control" id="no_of_times" name="reminder_date" value="<?php if(isset($records->reminder_date)) echo $records->reminder_date; ?>" required>
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
