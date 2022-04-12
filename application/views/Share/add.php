
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
    Share   Management
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Share/"><i class="fa fa-dashboard"></i> Back to List</a></li>
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
                  <h3 class="panel-title"><b>Add Share</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                  <div class="panel-body">
                  <div class="form-group row">
                    <input type="hidden" name="share_id" value="<?php if(isset($records->share_id)) echo $records->share_id ?>"/>
                           <?php echo validation_errors(); ?>
                    <div class="col-md-6">
                      <label class="fsize">Share Name</label>
                      <input type="text" class="form-control" placeholder="Share name" name="share_name" value="<?php if(isset($records->share_name)) echo $records->share_name ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="fsize">Share Value</label>
                      <input type="text" class="form-control" placeholder="Value of share" name="share_value" value="<?php if(isset($records->share_value)) echo $records->share_value; ?>">
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
                    <button type="submit" class="btn btn-primary">Add Share</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
