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
      Commission Management
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Commission/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>ADD COMMISSION</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                    <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">

                    <div class="col-md-6">
                      <label class="fsize">Commission Name</label>
                      <input type="text" class="form-control" name="commission_name" value="">
                    </div>

                    <div class="col-md-6">
                      <label class="fsize">Amount</label>
                      <input type="number" class="form-control" name="commission_amount" placeholder="Amount of commission" required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <div class="col-md-6">
                      <label class="fsize">Commission per/1 unit name</label>
                      <select class="form-control"  name="commission_unit" id="">
                        <option value="" disabled>Select Unit</option>
                        <?php foreach ($units as $unit) {?>
                          <option value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                        <?php } ?>
                      </select>
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
                    <button type="submit" class="btn btn-primary">Add Commission</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
