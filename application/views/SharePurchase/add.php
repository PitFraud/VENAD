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
    Share Management
      <small id="date" class="col-md-4"></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>

  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>SharePurchase/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>Add Share Purchase</b></h3>
                  </div>
                  <div class="panel-body">
                  <div class="form-group row">
                    <input type="hidden" name="purchase_id" value="<?php if(isset($records->purchase_id)) echo $records->purchase_id ?>"/>
                           <?php echo validation_errors(); ?>
                      <div class="col-md-6">
                        <label class="fsize">Share Holder's Name</label>
                        <input type="text" class="form-control" name="purchase_shareholder_name" value="<?php if(isset($records->purchase_shareholder_name)) echo $records->purchase_shareholder_name ?>">
                      </div>

                      <div class="col-md-6">
                        <label class="fsize">Share Value</label>
                        <select class="form-control" name="purchase_share_name">
                          <?php foreach ($share_names as $share) { ?>
                            <option value="<?php echo  $share->share_id; ?>"><?php echo $share->share_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-md-6">
                        <label for="">Period(Months)</label>
                        <input type="text" name="purchase_share_period" id="" class="form-control" value="<?php if(isset($records->share_purchase_period)) echo $records->share_purchase_period ?>">
                      </div>

                      <div class="col-md-6">
                        <label for="">Paid Amount</label>
                        <input type="text" name="purchase_share_paid" id="" class="form-control" value="<?php if(isset($records->share_purchase_paid)) echo $records->share_purchase_paid ?>">
                      </div>

                      <div class="col-md-6">
                        <label for="">Patronage Divident Bonus</label>
                        <input type="text" name="purchase_share_patronage" id="" class="form-control" value="<?php if(isset($records->share_purchase_patronage_divident)) echo $records->share_purchase_patronage_divident ?>">
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
                    <button type="submit" class="btn btn-primary">Add Share Purchase</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>

