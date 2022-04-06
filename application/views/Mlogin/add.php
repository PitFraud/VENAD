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
    Member Login Details
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Mlogin/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="box-header">
          
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Add Member Login</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                     <div class="panel-body" style="font-weight:bold;">
                    <input type="hidden" name="member_id" value="<?php if(isset($records->vehicle_id)) echo $records->vehicle_id; ?>"/>
                           <?php echo validation_errors(); ?>
                  <div class="form-group row">
                  
                    <div class="col-md-6">
                      <label class="fsize">Select Member Type</label>
                      <select class="form-control" name="member_type" id="memberTypeSelect">
                        <option value="" selected>Select member type</option>
                        <?php foreach ($MemberTypes as $type): ?>
                          <option value="<?php echo $type->member_type_id; ?>"><?php echo $type->member_type_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Select Member</label>
                      <select class="form-control" name="member_id" id="memberSelect">

                      </select>
                    </div>
                  </div>
 <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Password</label>
                      <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    </div>
                  </div>
                </div>
              </div></div>
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
      </div>
