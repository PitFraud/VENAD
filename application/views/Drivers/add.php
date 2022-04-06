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
    Add Drivers
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Drivers/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>Add Drivers</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                   <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <!-- <?php var_dump($records); ?> -->
                    <input type="hidden" name="driver_id" value="<?php if(isset($records->driver_id)) echo $records->driver_id ?>"/>
                           <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Driver Name</label>
                      <input type="text" class="form-control" name="driver_name" value="<?php if(isset($records->driver_name)) echo $records->driver_name ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Email</label>
                      <input type="text" class="form-control" name="email" value="<?php if(isset($records->driver_email)) echo $records->driver_email ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Mobile</label>
                      <input type="text" class="form-control" name="mobile" value="<?php if(isset($records->driver_mobile)) echo $records->driver_mobile ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Address</label>
                      <input type="text" class="form-control" name="address" value="<?php if(isset($records->driver_address)) echo $records->driver_address ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">License Number</label>
                      <input type="text" class="form-control" name="licence_no" value="<?php if(isset($records->driver_license_no)) echo $records->driver_license_no ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Image</label>
                      <input type="file" name="driver_image" size="" class="form-control" value="<?php if(isset($records->driver_image)) echo $records->driver_image ?>" required>
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
                    <button type="submit" class="btn btn-primary">Add Drivers</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
