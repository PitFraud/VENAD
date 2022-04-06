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
    Vaccination   Management
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Vaccination/add" enctype="multipart/form-data">
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
                    <input type="hidden" name="vaccination_id" value="<?php if(isset($records->vaccination_id)) echo $records->vaccination_id ?>"/>
                           <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Vaccination Name</label>
                      <input type="text" class="form-control" name="vaccination_name" value="<?php if(isset($records->vaccination_name)) echo $records->vaccination_name ?>">
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Vaccination Days(after)</label>
                      <input type="number" class="form-control" name="vaccination_days" value="<?php if(isset($records->vaccination_days)) echo $records->vaccination_days ?>" placeholder="Vaccination Days(after)" required>
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
                    <button type="submit" class="btn btn-primary">Add Vaccination</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
