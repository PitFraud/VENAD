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
      Add Feed Purchase
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>FeedPurchase/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="box-header">
            <button type="button" name="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Item</button>
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>ADD Feeds Details</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                 <div class="panel-body" style="font-weight:bold;">
                <div class="form-group row">
                  <input type="hidden" name="feeds_id" value="<?php if(isset($records->vaccination_id)) echo $records->vaccination_id ?>"/>
                  <?php echo validation_errors(); ?>
                  <div class="col-md-6">
                    <label class="fsize">Select Feed</label>
                    <select class="form-control" name="feed_name" required>
                      <option value="">Select feed</option>
                        <?php foreach ($feeds as $feed): ?>
                          <option value="<?php echo $feed->feed_id ?>"><?php echo $feed->feed_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="fsize">Vendor name</label>
                    <input type="text" class="form-control" name="vendor_name" value="" required>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                    <label class="fsize">Quantity</label>
                    <input type="text" class="form-control" name="quantity" value="" required>
                  </div>
                  <div class="col-md-6">
                    <label class="fsize">Units</label>
                    <select class="form-control" name="unit" required>
                      <?php foreach ($units as $unit): ?>
                        <option value="<?php echo $unit->unit_id ?>"><?php echo $unit->unit_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                    <label class="fsize">Price</label>
                    <input type="text" class="form-control" name="price" value="" required>
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
                <button type="submit" class="btn btn-primary">Add To Stock</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Feed Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>FeedPurchase/addNewFeed" method="post">
          <label for="">Feed Name</label>
          <input type="text" name="feed_name" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
