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
      Add Vaccination Schedule
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>VaccinationSchedule/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>ADD Vaccination</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                <div class="form-group row">
                  <input type="hidden" name="schedule_id" value="<?php if(isset($records->schedule_id)) echo $records->schedule_id ?>"/>
                  <?php echo validation_errors(); ?>
                  <div class="col-md-6">

                    <label class="fsize">Select Allotment</label>
                    <select class="form-control" name="allotment_id">
                      <?php foreach ($allotment_details as $allotment): ?>
                        <option <?php if(isset($records->schedule_allotment_fk)){if($records->schedule_allotment_fk==$allotment->allot_id){echo "selected";}} ?> value="<?php echo $allotment->allot_id; ?>"><?php echo $allotment->member_name.'  - '.$allotment->product_name.' - '.$allotment->allot_weight.''.$allotment->unit_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Select Vaccine</label>
                    <select class="form-control" name="vaccine_name">
                      <?php foreach ($vaccine_list as $vaccine): ?>
                        <option <?php if(isset($records->schedule_vaccine_fk)){if($records->schedule_vaccine_fk==$vaccine->vaccination_name){echo "selected";}} ?> value="<?php echo $vaccine->vaccination_id ?>"><?php echo $vaccine->vaccination_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Vaccine Dose</label>
                    <input type="text" class="form-control" name="vaccine_dose" value="<?php if(isset($records->schedule_vaccine_dose)) echo $records->schedule_vaccine_dose ?>">
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Total Dose</label>
                    <input type="text" class="form-control" name="vaccine_total_dose" value="<?php if(isset($records->schedule_vaccine_total_dose)) echo $records->schedule_vaccine_total_dose ?>">
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Vaccine Date</label>
                    <input type="date" class="form-control" name="vaccine_date" value="<?php if(isset($records->schedule_vaccine_date)) echo $records->schedule_vaccine_date ?>">
                  </div>

                  <div class="col-md-6">
                    <label class="fsize">Status</label>
                    <select class="form-control" name="vaccine_status">
                      <option <?php if(isset($records->schedule_status)){if($records->schedule_status=="0"){echo "selected";}} ?> value="0">Pending</option>
                      <option <?php if(isset($records->schedule_status)){if($records->schedule_status=="1"){echo "selected";}} ?> value="1">Completed</option>
                      <option <?php if(isset($records->schedule_status)){if($records->schedule_status=="2"){echo "selected";}} ?> value="2">Partial</option>
                    </select>
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
                <button type="submit" class="btn btn-primary">Add Schedule</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
