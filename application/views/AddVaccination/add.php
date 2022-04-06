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
    Add Vaccination Details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Share/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>Add Vaccination Details</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                  <div class="form-group row">
                    <input type="hidden" name="share_id" value="<?php if(isset($records->share_id)) echo $records->share_id ?>"/>
                           <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Reg No</label>
                      <input type="text" class="form-control" name="reg_no" value="<?php if(isset($records->share_name)) echo $records->share_name ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Reg Farmername</label>
                      <input type="text" class="form-control" name="farmer_name" value="<?php if(isset($records->share_name)) echo $records->share_name ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Address</label>
                      <textarea name="address" class="form-control" value="<?php if(isset($records->share_name)) echo $records->share_name ?>"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Sale Date</label>
                      <input type="date" class="form-control" name="sale_date" value="<?php if(isset($records->share_name)) echo $records->share_name ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Chicken Qty</label>
                      <input type="text" class="form-control" name="" value="<?php if(isset($records->share_name)) echo $records->share_name ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Vaccine Qty</label>
                      <input type="text" class="form-control" name="sale_date" value="<?php if(isset($records->share_name)) echo $records->share_name ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Vaccine Details </label>
                      <select name="member_gender" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1" <?php if(isset($records->member_gender) && ($records->member_gender == "1")) { echo "selected";}?>>1st</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>2nd</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>3rd</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>4th</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>5th</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>6th</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>7th</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Vaccineted </label>
                      <select name="member_gender" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1" <?php if(isset($records->member_gender) && ($records->member_gender == "1")) { echo "selected";}?>>Yes</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>No</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Used Vaccine Name </label>
                      <select name="member_gender" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1" <?php if(isset($records->member_gender) && ($records->member_gender == "1")) { echo "selected";}?>>Yes</option>
                        <option value="2" <?php if(isset($records->member_gender) && ($records->member_gender == "2")) { echo "selected";}?>>No</option>
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
                    <button type="submit" class="btn btn-primary">Add Vaccination Details</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
