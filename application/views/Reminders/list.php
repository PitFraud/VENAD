<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Reminders
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Reminders/add"><i class="fa fa-dashboard"></i> Back To add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">
         <div class="col-md-8"><h2 class="box-title"></h2> </div>
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <a href="<?php echo base_url();?>Reminders/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Reminder</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="reminderTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Reminder Title</th>
                  <th>Description</th>
                  <th>Reminder Date</th>
                  <th>Broadcast Time</th>
                  <th>Remining Times</th>
                  <th>Status</th>
                  <th>Action</th>
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
